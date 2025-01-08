<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class);
    }


    private function getFirstVariantProduct()
    {
        return $this->product_variants->where('in_stock', true)->where('stock_quantity', '>', 0)->first();
    }

    public function getProductPriceAttribute()
    {
        return $this->getFirstVariantProduct()?->sell_price ?? 0;
    }


    public function getDiscountAmountAttribute()
    {
        return $this->getFirstVariantProduct()?->discount_value ?? 0;
    }
    public function getAfterDiscountPriceAttribute()
    {
        return $this->getFirstVariantProduct()?->after_discount_value ?? 0;
    }


}
