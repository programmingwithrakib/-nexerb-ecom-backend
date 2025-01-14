<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationAttribute extends Model
{
    public function variation_options()
    {
        return $this->hasMany(VariationOption::class, 'variation_attribute_id', 'id');
    }
}
