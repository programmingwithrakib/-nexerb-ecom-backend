<?php

namespace App\Http\Resources\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'sku' => $this->sku,
            'stock_quantity' => $this->stock_quantity,
            'in_stock' => $this->in_stock,
            'price' => $this->sell_price,
            'discount_amount' => $this->discount_amount_calc,
            'after_discount_price' => $this->after_discount_sell_price
        ];
    }
}
