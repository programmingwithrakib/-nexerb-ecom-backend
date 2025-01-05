<?php

namespace Database\Seeders;

use App\Models\HomeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Trending Products',
                'sequence' => 1,
            ],
            [
                'name' => 'Top Products',
                'sequence' => 2,
            ],
            [
                'name' => 'Best Selling Products',
                'sequence' => 3,
            ],
            [
                'name' => 'Feature Products',
                'sequence' => 4,
            ],
            [
                'name' => 'Popular Products',
                'sequence' => 5,
            ]
        ];

        foreach ($data as $category) {
            HomeCategory::insert([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'sequence' => $category['sequence'],
            ]);
        }
    }
}
