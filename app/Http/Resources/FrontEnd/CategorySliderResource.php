<?php

namespace App\Http\Resources\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategorySliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $data = [
            'banner_title' => $this->banner_title,
            'banner_desc' => $this->banner_desc,
            'banner_video' => $this->banner_video,
            'banner_image_sm' => $this->banner_image_sm,
            'banner_image_md' => $this->banner_image_md,
            'banner_image_lg' => $this->banner_image_lg,
            'link_url_1' => $this->link_url_1,
            'link_url_2' => $this->link_url_2,
            'link_url_3' => $this->link_url_3,
        ];

        if($id = $this->category_id){
            $data['category_id'] = $id;
        }

        if($id = $this->home_category_id){
            $data['home_category_id'] = $id;
        }


        return $data;

    }
}
