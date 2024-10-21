<?php

namespace App\Models\ProductService;

use App\Http\Requests\ProductService\IndexProductRequest;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
     *  @param IndexProductRequest $request
     *  @return mixed
     */
    public function getProducts(IndexProductRequest $request) : mixed
    {

        return $this->hasMany(Product::class, 'category_id', 'id')
            ->paginate((int) $request->get('perPage', 30), ['*'], 'page', (int) $request->get('page', 1));
    }

    /**
     *  Return all deliveries by this category
     *
     *  @return Collection
     */
    public function getDeliveries() : Collection
    {
        return $this->belongsToMany(ProductDelivery::class, 'product_categories_deliveries', 'category_id', 'delivery_id')
            ->get();
    }
}
