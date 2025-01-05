<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\VariationAttribute;
use App\Models\VariationOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VariationAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $variationAttributes = [
            [
                'name' => 'Size',
                'options' => ['Small', 'Medium', 'Large', 'M', 'L', 'X', 'XL', 'XXL'],
            ],
            [
                'name' => 'Color',
                'options' => Color::get()->pluck('code')->toArray(),
            ],
            [
                'name' => 'Material',
                'options' => ['Cotton', 'Polyester', 'Leather', 'Silk']
            ],
            [
                'name' => 'Pattern',
                'options' => ['Solid', 'Striped', 'Floral', 'Plaid']
            ],
        ];

        foreach ($variationAttributes as $attribute) {
            $variation_attribute = VariationAttribute::create([
                'name' => $attribute['name'],
            ]);
            foreach ($attribute['options'] as $option) {
                VariationOption::create([
                    'name' => $option,
                    'variation_attribute_id' => $variation_attribute->id,
                ]);
            }
        }
    }
}
