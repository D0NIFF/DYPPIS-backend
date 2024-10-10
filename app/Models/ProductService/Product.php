<?php

namespace App\Models\ProductService;

use App\Http\Controllers\ProductService\ProductController;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'old_price',
        'discount',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }


    /**
     *  Return the product seller
     *
     *  @return mixed
     */
    public function getSeller() : mixed
    {
        return $this->belongsToMany(User::class, 'products_users', 'product_id', 'user_id')
            ->first();
    }

    public function getPictures() : mixed
    {
        return $this->belongsToMany(ProductMediaStorage::class, 'product_pictures', 'product_id', 'image_id')
            ->get();
    }

    /**
     *  Return the product platform
     *
     *  @return Platform
     */
    public function getPlatform() : Platform
    {
        return $this->belongsTo(Platform::class, 'platform_id')
            ->first();
    }

    /**
     *  Return the product category
     *
     *  @return ProductCategory
     */
    public function getCategory(): ProductCategory
    {
        return $this->belongsTo(ProductCategory::class, 'category_id')
            ->first();
    }

    /**
     *  Return the product delivery
     *
     *  @return ProductDelivery
     */
    public function getDelivery() : ProductDelivery
    {
        return $this->belongsTo(ProductDelivery::class, 'delivery_id')
            ->first();
    }


    /**
     *  Return product discount in %
     *
     *  @return ?int
     */
    public function getDiscount() : ?int
    {
        return ProductController::getDiscount($this->price, $this->old_price);
    }
}
