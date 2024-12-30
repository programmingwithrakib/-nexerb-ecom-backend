<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Main categories
        $mainCategories = [
            "Winter Collection'24" => null,
            'Mens' => null,
            'Womens' => null,
            'Kids' => null,
            'Accessories' => null,
            'Sale!' => null,
        ];

        // Insert main categories
        foreach ($mainCategories as $categoryName => $parentId) {
            $mainCategoryId = DB::table('categories')->insertGetId([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
                'short_desc' => null,
                'icon' => null,
                'image' => null,
                'video' => null,
                'is_active' => true,
                'show_as_banner' => 'none',
                'parent_id' => $parentId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // If the category is "Winter Collection'24", we add additional subcategories
            if ($categoryName === "Winter Collection'24") {
                $this->addAdditionalSubcategories($mainCategoryId);
            }

            // If the category is "Mens" or "Womens", add respective subcategories
            if ($categoryName === 'Mens') {
                $this->addMensSubcategories($mainCategoryId);
            }

            if ($categoryName === 'Womens') {
                $this->addWomensSubcategories($mainCategoryId);
            }
        }
    }

    /**
     * Add subcategories for "Winter Collection'24".
     */
    private function addAdditionalSubcategories(int $parentId): void
    {
        $subcategories = [
            'All Winter' => $parentId,
            'Winter Mens' => $parentId,
            'Winter Womens' => $parentId,
            'Winter Kids' => $parentId,
        ];

        $this->insertSubcategories($subcategories);
    }

    /**
     * Add subcategories for "Mens".
     */
    private function addMensSubcategories(int $parentId): void
    {
        $subcategories = [
            'Tops' => $parentId,
            'Blazers' => $parentId,
            'Jackets' => $parentId,
            'Hoodies' => $parentId,
            'Sweaters' => $parentId,
            'Activewear' => $parentId,
            'Winter Vests' => $parentId,
            'Casual Shirts' => $parentId,
            'Formal Shirts' => $parentId,
            'T-Shirts' => $parentId,
            'Polos' => $parentId,
            'Panjabis' => $parentId,
            'Sherwanis' => $parentId,
            'Kabli Set' => $parentId,
            'Panjabi Sets' => $parentId,
            'Ethnic Vests' => $parentId,
        ];

        $this->insertSubcategories($subcategories);
    }

    /**
     * Add subcategories for "Womens".
     */
    private function addWomensSubcategories(int $parentId): void
    {
        $subcategories = [
            'Blazers' => $parentId,
            'Sweaters' => $parentId,
            'Jackets' => $parentId,
            'Hoodies' => $parentId,
            'Activewears' => $parentId,
            'Shawls' => $parentId,
            'Three-Piece Sets' => $parentId,
            'Two-Piece Sets' => $parentId,
            'Gowns' => $parentId,
            'Kurtis' => $parentId,
            'Tops' => $parentId,
            'Boxy' => $parentId,
            'Tunic Tops' => $parentId,
            'T-shirts' => $parentId,
            'Dresses' => $parentId,
            'Dupattas' => $parentId,
            'Shrugs' => $parentId,
            'Ponchos' => $parentId,
        ];

        $this->insertSubcategories($subcategories);
    }

    /**
     * Insert multiple subcategories at once.
     */
    private function insertSubcategories(array $subcategories): void
    {
        $data = [];
        foreach ($subcategories as $name => $parentId) {
            $data[] = [
                'name' => $name,
                'slug' => Str::slug($name),
                'parent_id' => $parentId,
                'short_desc' => null,
                'icon' => null,
                'image' => null,
                'video' => null,
                'is_active' => true,
                'show_as_banner' => 'none',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('categories')->insert($data);
    }
}
