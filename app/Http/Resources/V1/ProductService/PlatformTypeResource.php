<?php

namespace App\Http\Resources\V1\ProductService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlatformTypeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'image' => $this->getImage(),
        ];
    }
}
