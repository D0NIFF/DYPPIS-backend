<?php

namespace App\Http\Resources\MediaStorage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaStorageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request) : array
    {
        return [
            'id' => $this->id,
            'file_name' => $this->file_name,
            'file_type' => $this->file_type,
            'file_size' => $this->file_size,
            'category' => new MediaStorageCategoryResource($this->category),
        ];
    }
}
