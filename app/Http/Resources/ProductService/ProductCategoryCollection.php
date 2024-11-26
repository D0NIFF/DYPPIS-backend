<?php

namespace App\Http\Resources\ProductService;

use App\Http\Resources\MediaStorage\MediaStorageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'data' => $this->collection->transform(function($platform) {
                return [
                    'id' => $platform->id,
                    'slug' => $platform->slug,
                    'title' => $platform->title,
                    'image' => $platform->image ? new MediaStorageResource($platform->image) : null,
                ];
            }),
        ];
    }
}
