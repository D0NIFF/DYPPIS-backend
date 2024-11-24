<?php

namespace App\Models\ProductService;

use App\Models\MediaStorage\MediaStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'image_id',
        'banner_id',
        'type_id',
    ];

    public function image()
    {
        return $this->belongsTo(MediaStorage::class, 'image_id');
    }

    public function banner()
    {
        return $this->belongsTo(MediaStorage::class, 'banner_id');
    }

    public function type()
    {
        return $this->belongsTo(PlatformType::class, 'type_id');
    }
}
