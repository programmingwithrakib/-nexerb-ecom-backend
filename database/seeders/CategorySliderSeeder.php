<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategorySlider;
use App\Models\HomeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $home_category_ids = HomeCategory::get()->pluck('id');
        foreach ($home_category_ids as $id) {
            for ($i = 0; $i <= 4; $i++){
                CategorySlider::create([
                    'home_category_id' => $id,
                    'banner_image_sm' => fake()->imageUrl(500, 250),
                    'banner_image_md' => fake()->imageUrl(700, 400),
                    'banner_image_lg' => fake()->imageUrl(1266, 500),
                    'banner_title' => fake()->title(),
                    'banner_desc' => fake()->text(),
                ]);
            }
        }


        $category_ids = Category::get()->pluck('id');
        foreach ($category_ids as $id) {
            for ($i = 0; $i <= 4; $i++){
                CategorySlider::create([
                    'category_id' => $id,
                    'banner_image_sm' => fake()->imageUrl(500, 250),
                    'banner_image_md' => fake()->imageUrl(700, 400),
                    'banner_image_lg' => fake()->imageUrl(1266, 500),
                    'banner_title' => fake()->title(),
                    'banner_desc' => fake()->text(),
                ]);
            }
        }

        for ($i = 0; $i <= 4; $i++){
            CategorySlider::create([
                'banner_image_sm' => fake()->imageUrl(500, 250),
                'banner_image_md' => fake()->imageUrl(700, 400),
                'banner_image_lg' => fake()->imageUrl(1266, 500),
                'banner_title' => fake()->sentence(),
                'banner_desc' => fake()->text(),
            ]);
        }
    }
}
