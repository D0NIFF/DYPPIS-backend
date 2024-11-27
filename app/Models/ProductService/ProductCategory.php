<?php

namespace App\Models\ProductService;

use App\Models\MediaStorage\MediaStorage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'slug',
        'title',
        'image_id',
        'is_public',
    ];

    public function image()
    {
        return $this->belongsTo(MediaStorage::class, 'image_id');
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class, 'product_filters', 'category_id', 'platform_id');
    }
}
