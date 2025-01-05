<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{




    public function home_categories_products()
    {
        return $this->hasMany(HomeCategoryProducts::class);
    }

    /*/**
     Product::class        - The final model we want to access (products)
     HomeCategoryProducts::class        - The intermediate model (home_categories_products)
     'product_id'       - Foreign key on the `home_categories_products` table
     'id'               - Foreign key on the `products` table
     'id'               - Local key on the `home_categories` table
     'home_category_id'   - Local key on the `home_categories_products` table
     */


//    public function products()
//    {
//        return $this->hasManyThrough(Product::class, HomeCategoryProducts::class, 'product_id', 'id', 'id', 'home_category_id');
//    }
}
