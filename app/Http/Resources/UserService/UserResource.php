<?php

namespace App\Http\Resources\UserService;

use App\Http\Resources\MediaStorage\MediaStorageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'nickname' => $this->nickname,
            'email' => $this->email,
            'avatar' => $this->avatar ? new MediaStorageResource($this->avatar) : null,
        ];
    }
}
