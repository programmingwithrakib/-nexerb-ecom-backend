<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{

    public function variation_attribute()
    {
        return $this->belongsTo(VariationAttribute::class);
    }


}
