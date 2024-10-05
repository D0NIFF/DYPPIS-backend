<?php

namespace App\Models\ProductService;

use App\Http\Requests\ProductService\IndexProductRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Platform extends Model
{

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'slug',
        'title',
        'img',
        'banner',
        'type_id',
    ];

    protected $hidden = [
        'id',
        'type_id',
    ];

    protected function casts(): array
    {
        return [
            'slug' => 'string',
            'title' => 'string',
            'img' => 'string',
            'banner' => 'string',
        ];
    }

    /**
     *  Return platform type
     *
     *  @return BelongsTo
     */
    public function getType(): BelongsTo
    {
        return $this->belongsTo(PlatformType::class, 'type_id');
    }


    /**
     *  Return product with paginate
     *
     *  @param IndexProductRequest $request
     *  @return mixed
     */
    public function getProducts(IndexProductRequest $request) : mixed
    {
        return $this->hasMany(Product::class, 'platform_id')
            ->paginate((int) $request->get('perPage', 30), ['*'], 'page', (int) $request->get('page', 1));
    }


    public function getCategories() : mixed
    {
        return $this->belongsToMany(ProductCategory::class, 'product_filters', 'platform_id', 'category_id')
            ->get();
    }


}
