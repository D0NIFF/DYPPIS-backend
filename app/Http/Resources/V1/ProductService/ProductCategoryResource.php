<?php

namespace App\Http\Resources\V1\ProductService;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'img' => $this->img,
            'is_public' => $this->is_public,
            'test' => $request->get('filters'),
            'products' => new ProductCollection($this->getProducts($request)),
            'deliveries' => ($this->getDeliveries()),
        ];
    }
}
