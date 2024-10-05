<?php

namespace App\Http\Controllers\ProductService;

use App\Http\Controllers\Controller;
use function App\Http\Controllers\Api\V1\ProductService\_doing_it_wrong;

class ProductHelperController extends Controller
{
    public static function isUuid(string $uuid, $version = null) : bool
    {
        if (!is_string($uuid))
            return false;

        if ( is_numeric( $version ) )
        {
            if ( 4 !== (int) $version ) {
                _doing_it_wrong( __FUNCTION__, __( 'Only UUID V4 is supported at this time.' ), '4.9.0' );
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
}
