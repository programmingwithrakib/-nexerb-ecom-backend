<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{

    public function products()
    {
        return $this->hasManyThrough(Product::class, SuggestionProduct::class, 'suggestion_id', 'id', 'id', 'product_id');
    }
}
