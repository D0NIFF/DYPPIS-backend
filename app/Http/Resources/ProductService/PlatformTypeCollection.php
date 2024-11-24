<?php

namespace App\Http\Resources\ProductService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PlatformTypeCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function($platformType) {
                return new PlatformTypeResource($platformType);
            }),
        ];
    }
}
