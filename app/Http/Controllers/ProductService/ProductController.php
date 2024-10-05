<?php

namespace App\Http\Controllers\ProductService;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public static function getDiscount(int $price, int $oldPrice): int
    {
        $percentValue = $price / 100; // Gets 1% of the price
        return ($price - $oldPrice) / $percentValue;
    }
}
