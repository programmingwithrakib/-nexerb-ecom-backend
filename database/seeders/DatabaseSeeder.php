<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate:refresh');
        $this->call(BrandSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(VariationAttributeSeeder::class);
        $this->call(ProductVariatSeeder::class);
        $this->call(HomeCategorySeeder::class);
        $this->call(HomeCategoryProductSeeder::class);
        $this->call(CategorySliderSeeder::class);
        $this->call(SuggestionSeeder::class);
        $this->call(SuggestionKeywordSeeder::class);
        $this->call(SuggestionProductSeeder::class);
    }
}
