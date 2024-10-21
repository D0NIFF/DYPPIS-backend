<?php

namespace App\Http\Resources\V1\ProductService;

use App\Http\Requests\ProductService\IndexProductRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlatformResource extends JsonResource
{
    /**
     *  Transform the resource into an array.
     *
     *  @param bool $isCollection default false
     *  @return array<string, mixed>
     */
    public function toArray(Request $request, bool $isCollection = false): array
    {
        if($isCollection)
        {
            return [
                'slug' => $this->slug,
                'title' => $this->title,
                'img' => $this->img,
                'banner' => $this->banner,
                'categories' => ($this->getCategories()),
            ];
        }
        else
        {
            return [
                'slug' => $this->slug,
                'title' => $this->title,
                'img' => $this->img,
                'banner' => $this->banner,
                'products' => new ProductCollection($this->getProducts($request)),
                'categories' => ($this->getCategories()),
            ];
        }
    }
}
