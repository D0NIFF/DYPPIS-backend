<?php

namespace App\Http\Controllers\ProductService;

use App\Http\Controllers\Controller;

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
}
