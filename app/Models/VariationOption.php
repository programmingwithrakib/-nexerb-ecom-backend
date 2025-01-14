<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{

    public function products()
    {
        return $this->hasMany(ProductVariant::class, 'variation_option_id', 'id');
    }


}
