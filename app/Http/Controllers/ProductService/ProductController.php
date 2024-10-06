<?php

namespace App\Http\Controllers\ProductService;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductService\IndexProductRequest;
use App\Models\ProductService\Platform;
use App\Models\ProductService\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     *  Method calculating the product discount and return the result in %
     *
     *  @param int $price
     *  @param int|null $oldPrice
     *  @return int|null
     */
    public static function getDiscount(int $price, ?int $oldPrice): ?int
    {
        if($price > $oldPrice || $price == null || $oldPrice == null) return null;

        $percentValue = $oldPrice / 100; // Gets 1% of the price
        return ($oldPrice - $price) / $percentValue;
    }


    public static function getPlatformProducts(Platform $platform, Request $request)
    {
        $response = $platform->hasMany(Product::class, 'platform_id', 'id')
            ->where('deleted_at', '=', null);

        if ($request->get('filters') != null && $request->get('filters') != 'null')
        {
            $response = self::filterProducts($request->get('filters'), $response);
        }

        /*
         *  Sort the records, if sets 'sort'
         */
        if($request->get('sort') != null && $request->get('sort') != 'null')
        {
            $response = $response->orderBy($request->get('sort'), $request->get('orderBy', 'desc'));
        }

        return $response->paginate($request->get('perPage', 30),  ['*'], 'page', $request->get('page', 1));
    }

    /**
     * @param mixed $filters
     * @param $response
     * @return mixed
     */
    public static function filterProducts(array $filters, $response): mixed
    {
        if (isset($filters['delivery_id'])) {
            $response = $response->where('delivery_id', '=', $filters['delivery_id']);
            unset($filters['delivery_id']);
        }
        if (isset($filters['platform_id'])) {
            $response = $response->where('platform_id', '=', $filters['platform_id']);
            unset($filters['platform_id']);
        }
        if (isset($filters['category_id'])) {
            $response = $response->where('category_id', '=', $filters['category_id']);
            unset($filters['category_id']);
        }

        if (isset($filters['priceFrom'])) {
            $response = $response->where('price', '>=', $filters['priceFrom']);
            unset($filters['priceFrom']);
        }
        if (isset($filters['priceTo'])) {
            $response = $response->where('price', '<=', $filters['priceTo']);
            unset($filters['priceTo']);
        }
        if (isset($filters['discount'])) {
            if ($filters['discount'] == true)
                $response = $response->where('old_price', '>=', 1);
            else
                $response = $response->where('old_price', '=', null);

            unset($filters['discount']);
        }

        if ($filters != null && count($filters) > 0) {

        }
        return $response;
    }
}
