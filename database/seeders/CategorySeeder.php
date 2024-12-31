<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            [
                'name' => 'Winter Collection',
                'children' => [
                    ['name' => 'All Winter'],
                    ['name' => 'Winter Mens'],
                    ['name' => 'Winter Kids'],
                    ['name' => 'Winter Womens'],
                ]
            ],
            [
                'name' => 'Mens',
                'children' => [
                    [
                        'name' => 'tops',
                        'children' => [
                            ['name' => 'A'],
                            ['name' => 'B'],
                            ['name' => 'C'],
                        ]
                    ],
                    ['name' => 'bottoms'],
                ]
            ]

        ];

        foreach ($categories as $category) {
            $main_category = Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
            ]);

            foreach ($category['children'] ?? [] as $child) {
                $sub_cat = Category::create([
                    'name' => $child['name'],
                    'slug' => Str::slug($child['name']),
                    'parent_id' => $main_category->id,
                ]);

                foreach ($child['children'] ?? [] as $child) {
                    $sub_sub_cat = Category::create([
                        'name' => $child['name'],
                        'slug' => Str::slug($child['name']),
                        'parent_id' => $sub_cat->id,
                    ]);

                    foreach ($child['children'] ?? [] as $child) {
                        $sub_sub_sub_cat = Category::create([
                            'name' => $child['name'],
                            'slug' => Str::slug($child['name']),
                            'parent_id' => $sub_sub_cat->id,
                        ]);
                    }
                }
            }
        }

    }
}
