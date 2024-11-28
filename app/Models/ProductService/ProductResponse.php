<?php

namespace App\Models\ProductService;

use Illuminate\Database\Eloquent\Model;

class ProductResponse extends Model
{
    //
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'response',
        'attachments',
    ];
}
