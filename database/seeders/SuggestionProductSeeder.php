<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Suggestion;
use App\Models\SuggestionProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuggestionProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 3; $i++){
            SuggestionProduct::create([
                'product_id' => fake()->randomElement(Product::get()->pluck('id')->toArray()),
                'suggestion_id' => fake()->randomElement(Suggestion::get()->pluck('id')->toArray()),
            ]);
        }
    }
}
