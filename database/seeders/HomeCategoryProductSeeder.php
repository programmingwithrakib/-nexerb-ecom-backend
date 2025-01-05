<?php

namespace Database\Seeders;

use App\Models\HomeCategory;
use App\Models\HomeCategoryProducts;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeCategoryProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skip = 0;
        foreach(HomeCategory::all() as $category) {
            $product_ids = Product::skip($skip)->limit(10)->get()->pluck('id');
            $skip += 10;

            $sequence = 0;
            foreach ($product_ids as $product_id) {
                HomeCategoryProducts::create([
                    'home_category_id' => $category->id,
                    'product_id' => $product_id,
                    'sequence' => $sequence
                ]);
                $sequence += 1;
            }
        }
    }
}
