<?php

namespace App\Http\Resources\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
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
            'slug' => $this->slug,
            'unit' => $this->unit,
            'min_purchase_quantity' => $this->min_purchase_quantity,
            'description' => $this->description,
            'thumbnail' => $this->thumbnail,
            'images' => $this->product_images->where('is_active', true)->pluck('image')->toArray(),
            'video_link' => $this->video,
            'video_provider' => $this->video_provider,
            'available_emi' => $this->available_emi,
            'in_stock' => $this->in_stock,
            'brand' => BrandResource::make($this->brand),
            'category' => CategoryMinimizeResource::make($this->category),
            'product_variant_info' => VariantResource::make($this->active_variant),
            'variations' => $this->product_variation_options,
        ];
    }
}
