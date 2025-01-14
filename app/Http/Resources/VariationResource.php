<?php

namespace App\Http\Resources;

use App\Http\Resources\FrontEnd\VariationOptionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VariationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'options' => VariationOptionResource::collection($this->variation_options)
        ];
    }
}
