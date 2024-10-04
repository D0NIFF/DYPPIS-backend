<?php

namespace App\Models\ProductService;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'slug',
        'title',
        'description',
        'price',
        'old_price',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function getSeller() : mixed
    {
        return $this->belongsToMany(User::class, 'products_users', 'product_id', 'user_id')
            ->first();
    }
}
