<?php

namespace App\Models\ProductService;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class ProductCategory extends Model
{
    use Searchable;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'slug',
        'title',
        'img',
        'is_public',
    ];


    protected $hidden = [
        'id'
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
            'title' => 'array',
            'img' => 'string',
            'is_public' => 'boolean',
        ];
    }

    /**
     *  Return all products by this category (paginate by Filters)
     *
     *  @param Request $request
     *  @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProducts(Request $request) : Collection
    {
        return $this->hasMany(Product::class, 'category_id', 'id')
            ->get();
    }

    /**
     *  Return all deliveries by this category
     *
     *  @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDeliveries() : Collection
    {
        return $this->belongsToMany(ProductDelivery::class, 'product_categories_deliveries', 'category_id', 'delivery_id')
            ->get();
    }
}
