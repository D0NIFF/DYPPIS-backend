<?php

namespace App\Models\ProductService;

use App\Http\Controllers\ProductService\ProductController;
use App\Http\Requests\ProductService\IndexProductRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

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
     *  @param Request $request
     *  @return mixed
     */
    public function getProducts(Request $request) : mixed
    {
        return ProductController::getPlatformProducts($this, $request);
    }


    public function getCategories() : mixed
    {
        return $this->belongsToMany(ProductCategory::class, 'product_filters', 'platform_id', 'category_id')
            ->get();
    }


}
