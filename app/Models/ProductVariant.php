<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;


    // If variation_combination is stored as JSON, cast it to an array
    protected $casts = [
        'variation_combination' => 'array',
        'sku' => 'int',
    ];


    /**
     * $variationCombination = [1,3,2]
     */

    public function scopeExtractVariationMatch(Builder $builder, $variationCombination)
    {
        $builder->whereRaw('JSON_CONTAINS(variation_combinations, ?)', [json_encode($variationCombination)])
        ->whereRaw('JSON_LENGTH(variation_combinations) = ?', [count($variationCombination)]);
    }

    public function getDiscountAmountFlatAttribute()
    {
        $sell_price =  $this?->sell_price ?? 0;
        $after_discount_sell_price = $this->after_discount_sell_price ?? 0;
        $price =  $sell_price - $after_discount_sell_price;
        return round($price, 2);
    }
    public function getDiscountAmountCalcAttribute()
    {
        $discount_type = $this?->discount_type ?? '';
        $discount_amount = $this?->discount_amount ?? 0;
        if ($discount_type == 'percent') {
            return $discount_amount . "%";
        }
        else{
            return $discount_amount;
        }
    }
}
