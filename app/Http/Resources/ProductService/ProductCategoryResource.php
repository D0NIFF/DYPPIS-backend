<?php

namespace App\Http\Resources\ProductService;

use App\Http\Resources\MediaStorage\MediaStorageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'image' => $this->image ? new MediaStorageResource($this->image) : null,
            'platforms' => $this->type ? new PlatformCollection($this->platforms) : null,
        ];
    }
}
