<?php

namespace App\Http\Resources\ProductService;

use App\Http\Resources\MediaStorage\MediaStorageCollection;
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
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'details' => $this->details,
            'views' => $this->views,
            'images' => $this->images ? new MediaStorageCollection($this->images) : null,
            'platform' => $this->platform ? new PlatformResource($this->platform) : null,
            'category' => $this->category ? new ProductCategoryResource($this->category) : null,
            'delivery' => $this->delivery ? new ProductDeliveryResource($this->delivery) : null,
        ];
    }
}
