<?php

namespace Database\Seeders;

use App\Models\ProductVariant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductVariatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product_variants = ProductVariant::factory()->count(150)->create();
        try {
            ProductVariant::insert($product_variants->toArray());
        }
        catch (\Exception $e) {

        }
    }
}
