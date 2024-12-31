<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
