<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductKeywords;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory()->count(50)->create();
        try {
            $products->each(function (Product $product) {
                $keywords = fake()->words(5);
                foreach ($keywords as $keyword) {
                    ProductKeywords::create([
                        'product_id' => $product->id,
                        'keyword_name' => $keyword
                    ]);
                }
            });
        }
        catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
