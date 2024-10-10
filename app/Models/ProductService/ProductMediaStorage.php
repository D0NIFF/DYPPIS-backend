<?php

namespace App\Models\ProductService;

use Illuminate\Database\Eloquent\Model;

class ProductMediaStorage extends Model
{
    protected $fillable = [
        'id',
        'file_name',
        'file_type',
        'file_size',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'file_name' => 'string',
            'file_type' => 'string',
            'file_size' => 'integer',
            'created_at' => 'datetime',
        ];
    }


}
