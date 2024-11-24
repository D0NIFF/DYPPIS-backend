<?php

namespace App\Models\ProductService;

use App\Models\MediaStorage\MediaStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformType extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'platform_types';

    protected $fillable = [
        'slug',
        'title',
        'image_id',
    ];

    protected $casts = [
        'title' => 'array',
    ];

    public function image()
    {
        return $this->belongsTo(MediaStorage::class, 'image_id');
    }
}
