<?php

namespace App\Http\Resources\FrontEnd;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class VariationOptionResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'count_of_product' => Cache::remember("count_of_product_{$this->id}", now()->addMinutes(10), function () {
                return Product::whereHas('product_variants', function ($product_variant) {
                    $product_variant->whereJsonContains('variation_combinations', $this->id);
                })->count('id');
            }),
        ];
    }
}
