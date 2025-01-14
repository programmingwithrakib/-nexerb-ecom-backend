<?php

namespace App\Http\Resources\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'brand' => $this->brand,
            'category' => $this->category,
            'thumbnail' => $this->thumbnail,
            'thumbnail_next' => $this->thumbnail_next,
            'in_stock' => $this->in_stock,
            'price' => $this->product_price,
            'discount_amount' => $this->discount_amount,
            'after_discount_price' => $this->after_discount_price
        ];
    }
}
