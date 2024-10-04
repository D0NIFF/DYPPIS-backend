<?php

namespace App\Models\ProductService;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDelivery extends Model
{

    protected $keyType = 'string';
    public $incrementing = false;


    protected $fillable = [
        'id',
        'title',
        'description',
    ];

    protected $hidden = [
        'pivot'
    ];

    protected function casts(): array
    {
        return [
            'title' => 'array',
            'description' => 'array',
        ];
    }
}
