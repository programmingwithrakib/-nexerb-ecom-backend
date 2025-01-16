<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;


    // If variation_combination is stored as JSON, cast it to an array
    protected $casts = [
        'variation_combination' => 'array',
    ];

    public function variation_options()
    {
        return $this->belongsToMany(
            VariationOption::class,
            null, // No pivot table, but we’ll use a custom query
            null, // Local key (not applicable here)
            null  // Foreign key (not applicable here)
        )->whereIn('id', $this->variation_combinations ?? []);
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
