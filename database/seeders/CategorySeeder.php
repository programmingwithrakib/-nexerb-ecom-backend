<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
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
                        ]
                    ],

                    [
                        'name' => 'bottoms',
                        'children' => [
                            ['name' => 'Pajamas'],
                            ['name' => 'Formal Pants'],
                            ['name' => 'Denim Pants'],
                            ['name' => 'Twill Pants'],
                            ['name' => 'Joggers'],
                            ['name' => 'Cargo Pants']
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
                            ['name' => 'Jackets'],
                            ['name' => 'Hoodies'],
                            ['name' => 'Sweaters'],
                            ['name' => 'Activewear'],
                            ['name' => 'Winter Vests'],
                            ['name' => 'Casual Shirts'],
                        ]
                    ],

                    [
                        'name' => 'bottoms',
                        'children' => [
                            ['name' => 'Leggings'],
                            ['name' => 'Formal Pants'],
                            ['name' => 'Denim Pants'],
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
                            ['name' => 'Blazers'],
                            ['name' => 'Jackets'],
                            ['name' => 'Hoodies'],
                            ['name' => 'Sweaters'],
                            ['name' => 'Activewear'],
                            ['name' => 'Winter Vests'],
                            ['name' => 'Casual Shirts'],
                        ]
                    ],
                    [
                        'name' => 'Girls',
                        'children' => [
                            ['name' => 'Leggings'],
                            ['name' => 'Formal Pants'],
                            ['name' => 'Denim Pants'],
                            ['name' => 'Ethnic Bottoms'],
                            ['name' => 'Western Bottoms'],
                        ]
                    ],
                    [
                        'name' => 'New Born',
                        'children' => [
                            ['name' => 'Leggings'],
                            ['name' => 'Formal Pants'],
                            ['name' => 'Denim Pants'],
                            ['name' => 'Ethnic Bottoms'],
                            ['name' => 'Western Bottoms'],
                        ]
                    ],
                ]
            ],

            [
            'name' => 'Accessories',
            'children' => [
                [
                    'name' => 'Bags',
                    'children' => [
                        ['name' => 'Backpack'],
                        ['name' => 'Ladis Bangs']
                    ]
                ],
                [
                    'name' => 'Mufflers',
                    'children' => []
                ],
                [
                    'name' => 'Scarves',
                    'children' => []
                ],
                [
                    'name' => 'Shoes',
                    'children' => []
                ],
                [
                    'name' => 'Caps',
                    'children' => []
                ],
                [
                    'name' => 'Socks',
                    'children' => []
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

                foreach ($child['children'] ?? [] as $sub_child) {
                    $sub_sub_cat = Category::create([
                        'name' => $sub_child['name'],
                        'slug' => Str::slug($sub_child['name']),
                        'parent_id' => $sub_cat->id,
                    ]);

                    foreach ($sub_child['children'] ?? [] as $sub_sub_child) {
                        $sub_sub_sub_cat = Category::create([
                            'name' => $sub_sub_child['name'],
                            'slug' => Str::slug($sub_sub_child['name']),
                            'parent_id' => $sub_sub_cat->id,
                        ]);
                    }
                }
            }
        }

    }
}
