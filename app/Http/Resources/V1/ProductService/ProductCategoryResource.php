<?php

namespace App\Http\Resources\V1\ProductService;

use App\Http\Requests\ProductService\IndexProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request, $isColletion = false): array
    {
        if($isColletion)
        {
            return [
                'slug' => $this->slug,
                'title' => $this->title,
                'img' => $this->img,
                'is_public' => $this->is_public,
                'deliveries' => ($this->getDeliveries()),
            ];
        }
        else
        {
            return [
                'slug' => $this->slug,
                'title' => $this->title,
                'img' => $this->img,
                'is_public' => $this->is_public,
                'products' => new ProductCollection($this->getProducts(IndexProductRequest::create($request))),
                'deliveries' => ($this->getDeliveries()),
            ];
        }

    }
}
