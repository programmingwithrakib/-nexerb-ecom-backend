<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariationAttribute;
use App\Models\VariationOption;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sell_price = fake()->randomFloat('2', '100', '10000');
        $buy_price = $sell_price - fake()->randomFloat('2', '100', '500');

        $discount_type = fake()->randomElement([null, 'flat', 'percent']);
        $discount_amount = 0;
        if($discount_type === 'percent') {
            $discount_amount = fake()->randomFloat('0', '1', '100');
        }
        else if ($discount_type === 'flat') {
            $discount_amount = fake()->randomFloat('2', '10', '500');
        }

        $after_discount_sell_price = $sell_price - $discount_amount;

        return [
            'sell_price' => $sell_price,
            'buy_price' => $buy_price,
            'sku' => fake()->unique()->ean8(),
            'thumbnail' => fake()->imageUrl('500', '500'),
            'stock_quantity' => fake()->randomDigit(),
            'after_discount_sell_price' => $after_discount_sell_price,
            'discount_amount' => $discount_amount,
            'discount_type' => $discount_type,
            'in_stock' => fake()->randomElement([true, false]),
        ];
    }
}
