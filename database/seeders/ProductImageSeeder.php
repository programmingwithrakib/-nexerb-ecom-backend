<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::get('id')->each(function ($product) {
            for ($i = 1; $i <= 5; $i++) {
                ProductImage::insert([
                    'product_id' => $product->id,
                    'image' => fake()->imageUrl('300px', '400px')
                ]);
            }
        });
    }
}
