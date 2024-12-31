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
                            ['name' => 'Blazers'],
                            ['name' => 'Jackets'],
                            ['name' => 'Hoodies'],
                            ['name' => 'Sweaters'],
                            ['name' => 'Activewear'],
                            ['name' => 'Winter Vests'],
                            ['name' => 'Casual Shirts'],
                            ['name' => 'Formal Shirts'],
                            ['name' => 'T-Shirts'],
                            ['name' => 'Polos'],
                            ['name' => 'Sherwanis'],
                            ['name' => 'Kabli Set'],
                            ['name' => 'Panjabi Sets'],
                            ['name' => 'Ethnic Vests'],
                            ['name' => 'Bottoms'],
                        ]
                    ],
                    ['name' => 'bottoms',
                    'children' => [
                            ['name' => 'Pajamas'],
                            ['name' => 'Formal Pants'],
                            ['name' => 'Denim Pants'],
                            ['name' => 'Twill Pants'],
                            ['name' => 'Joggers'],
                            ['name' => 'Cargo Pants'],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Womens',
                'children' => [
                    [
                        'name' => 'tops',
                        'children' => [
                            ['name' => 'Blazers'],
                            ['name' => 'Sweaters'],
                            ['name' => 'Jackets'],
                            ['name' => 'Hoodies'],
                            ['name' => 'Activewear'],
                            ['name' => 'Three-Piece Sets'],
                            ['name' => 'Two-Piece Sets'],
                            ['name' => 'Gowns'],
                            ['name' => 'Kurtis'],
                            ['name' => 'Tops'],
                            ['name' => 'Boxy'],
                            ['name' => 'Tunic Tops'],
                            ['name' => 'Dresses'],
                            ['name' => 'Dupattas'],
                            ['name' => 'Shrugs'],
                            ['name' => 'Ponchos'],
                        ]
                    ],
                    ['name' => 'bottoms',
                    'children' => [
                            ['name' => 'Denim Pants'],
                            ['name' => 'Leggings'],
                            ['name' => 'Ethnic Bottoms'],
                            ['name' => 'Western Bottoms'],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Kids',
                'children' => [
                    [
                        'name' => 'Boys',
                        'children' => [
                            ['name' => 'Jackets'],
                            ['name' => 'Shirts'],
                            ['name' => 'Polos'],
                            ['name' => 'Panjabi'],
                            ['name' => 'Pants'],
                        ]
                    ],
                    ['name' => 'Girls',
                    'children' => [
                            ['name' => 'Denim Pants'],
                            ['name' => 'Leggings'],
                            ['name' => 'Ethnic Bottoms'],
                            ['name' => 'Western Bottoms'],
                        ]
                    ],
                    ['name' => 'New Born',
                    'children' => [
                            ['name' => 'Denim Pants'],
                            ['name' => 'Leggings'],
                            ['name' => 'Ethnic Bottoms'],
                            ['name' => 'Western Bottoms'],
                        ]
                    ],
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
