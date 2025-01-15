<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function product_keywords()
    {
        return $this->hasMany(ProductKeywords::class);
    }


    private function getFirstVariantProduct()
    {
        return $this->product_variants->where('in_stock', true)->where('stock_quantity', '>', 0)->first();
    }

    public function getProductPriceAttribute()
    {
        return $this->getFirstVariantProduct()?->sell_price ?? 0;
    }


    public function getDiscountAmountFlatAttribute()
    {
        $product = $this->getFirstVariantProduct();
        $sell_price =  $product?->sell_price ?? 0;
        $after_discount_sell_price = $product->after_discount_sell_price ?? 0;
        $price =  $sell_price - $after_discount_sell_price;
        return round($price, 2);
    }
    public function getDiscountAmountAttribute()
    {
        $product = $this->getFirstVariantProduct();
        $discount_type = $product?->discount_type ?? '';
        $discount_amount = $product?->discount_amount ?? 0;
        if ($discount_type == 'percent') {
            return $discount_amount . "%";
        }
        else{
            return $discount_amount;
        }
    }



    public function getAfterDiscountPriceAttribute()
    {
        return $this->getFirstVariantProduct()?->after_discount_sell_price ?? 0;
    }


}
