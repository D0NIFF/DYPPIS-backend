<?php

namespace App\Models\MediaStorage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaStorage extends Model
{
    use HasFactory;

    protected $table = 'media_storage';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'file_name',
        'file_type',
        'file_size',
        'category_id',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(MediaStorageCategory::class, 'category_id');
    }
}
