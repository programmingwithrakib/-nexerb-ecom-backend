<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();
        return [
            'brand_id' => fake()->randomElement(Brand::all()->pluck('id')->toArray()),
            'category_id' => fake()->randomElement(Category::all()->pluck('id')->toArray()),
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'unit' => 'pcs',
            'sku' => $this->faker->unique()->ean8(),
            'available_emi' => $this->faker->randomElement([true, false]),
            'is_active' => $this->faker->randomElement([true, false]),
            'in_stock' => $this->faker->randomElement([true, false]),
            'is_published' => $this->faker->randomElement([true, false]),
            'thumbnail' => $this->faker->imageUrl('300px', '400px'),
            'thumbnail_next' => $this->faker->imageUrl('300px', '400px')
        ];
    }
}
