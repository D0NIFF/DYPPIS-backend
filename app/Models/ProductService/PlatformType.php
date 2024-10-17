<?php

namespace App\Models\ProductService;

use App\Models\MediaStorage;
use Illuminate\Database\Eloquent\Model;

class PlatformType extends Model
{
    protected $fillable = [
        'id',
        'slug',
        'title',
        'image_id',
    ];

    protected $hidden = [
        'id',
        'image_id',
    ];

    protected function casts(): array
    {
        return [
            'id' => 'string',
            'slug' => 'string',
            'title' => 'string',
            'image_id' => 'string',
        ];
    }

    public function getImage()
    {
        return $this->hasOne(MediaStorage::class, 'id', 'image_id')
            ->first();
    }
}
