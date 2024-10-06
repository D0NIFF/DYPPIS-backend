<?php

namespace App\Http\Resources\V1\ProductService;

use App\Http\Resources\V1\UserService\UserResource;
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
            'price' => (float)$this->price,
            'old_price' => (float)$this->old_price,
            'discount' => $this->getDiscount(),
            'seller' => new UserResource($this->getSeller()),
            'platform' => $this->getPlatform(),
            'category' => $this->getCategory(),
            'delivery' => $this->getDelivery(),
        ];
    }
}
