<?php

namespace App\Models\ProductService;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'old_price',
        'response_id',
        'platform_id',
        'category_id',
        'delivery_id',
        'delivery_id',
        'created_at',
    ];

    protected $hidden = [
        'response_id',
        'platform_id',
        'category_id',
        'delivery_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function casts()
    {
        return [
            'id' => 'string',
            'price' => 'float',
            'old_price' => 'float',
            'response_id' => 'string',
            'platform_id' => 'string',
            'category_id' => 'string',
            'delivery_id' => 'string',
        ];
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class, 'platform_id');
    }
}
