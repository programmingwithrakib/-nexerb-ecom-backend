<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function product_variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function product_keywords()
    {
        return $this->hasMany(ProductKeywords::class);
    }

    public function getActiveVariantAttribute()
    {
        return $this->product_variants->where('in_stock', true)->where('stock_quantity', '>', 0)->first();
    }


    public function getProductVariationsAttribute()
    {
        // Eager load related models to avoid N+1 queries
        $this->load(['product_variants.variation_attribute', 'product_variants.variation_option']);

        return $variation_attributes = $this->product_variants->groupBy('variation_attribute_id')->map(function ($product_variant, $key) {
            return [
                'attribute' => [
                    'id' => $key,
                    'name' => $product_variant->first()->variation_attribute->name,
                    'values' => $product_variant->map(function ($variant) {
                        return [
                            'id' => $variant->variation_option->id,
                            'name' => $variant->variation_option->name,
                        ];
                    }),
                ]
            ];
        })->values()->toArray();
    }

    public function getProductPriceAttribute()
    {
        return $this->getActiveVariantAttribute()?->sell_price ?? 0;
    }


    public function getDiscountAmountFlatAttribute()
    {
        $product = $this->getActiveVariantAttribute();
        $sell_price =  $product?->sell_price ?? 0;
        $after_discount_sell_price = $product->after_discount_sell_price ?? 0;
        $price =  $sell_price - $after_discount_sell_price;
        return round($price, 2);
    }
    public function getDiscountAmountAttribute()
    {
        $product = $this->getActiveVariantAttribute();
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
        return $this->getActiveVariantAttribute()?->after_discount_sell_price ?? 0;
    }


    public function getProductVariationOptionsAttribute()
    {
        $variation_options = $this->product_variants
            ->pluck('variation_combinations')
            ->flatMap(function ($item){
                return json_decode($item);
            })->toArray();

        return  VariationOption::with('variation_attribute')
            ->whereIn('id', $variation_options)
            ->get()
            ->groupBy('variation_attribute_id')
            ->map(function ($item, $key) {
                $variation_attribute = $item->first()->variation_attribute;
                return [
                    'attribute' => $variation_attribute->name,
                    'values' => $item->map(function ($item) {
                        return $item->only('id', 'name');
                    })
                ];
            })->values()->toArray();

    }


}
