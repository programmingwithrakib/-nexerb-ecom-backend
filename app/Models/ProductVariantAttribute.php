<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantAttribute extends Model
{
    public function variation_option()
    {
        return $this->belongsTo(VariationOption::class);
    }

    public function variation_attribute()
    {
        return $this->belongsTo(VariationAttribute::class);
    }
}
