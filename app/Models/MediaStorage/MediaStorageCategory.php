<?php

namespace App\Models\MediaStorage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaStorageCategory extends Model
{
    use HasFactory;

    protected $table = 'media_storage_categories';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'slug',
        'title',
        'url',
        'path',
    ];

    public function media() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MediaStorage::class, 'category_id');
    }
}
