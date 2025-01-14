<?php

namespace App\Http\Resources\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'count_of_product' => $this->products()->distinct('id')->count('id')
        ];
    }
}
