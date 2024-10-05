<?php

namespace App\Http\Controllers\ProductService;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ProductHelperController extends Controller
{
    public static function isUuid(string $uuid, $version = null) : bool
    {
        if ( is_numeric( $version ) )
        {
            if ( 4 !== (int) $version ) {
                // Log::alert('Only UUID V4 is supported at this time. 4.9.0');
                return false;
            }
            $regex = '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/';
        }
        else
        {
            $regex = '/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/';
        }

        return (bool) preg_match( $regex, $uuid );
    }


    public static function getDiscount(int $price, int $oldPrice) : int
    {
        $percentValue = $price / 100; // Gets 1% of the price
        return ($price - $oldPrice) / $percentValue;
    }
}
