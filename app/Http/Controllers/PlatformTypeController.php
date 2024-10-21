<?php

namespace App\Http\Controllers;

use App\Models\ProductService\PlatformType;
use Illuminate\Support\Facades\Cache;

class PlatformTypeController extends Controller
{
    private static int $secondsToDay = 86400;

    public static function index()
    {
        /*
         *  Save cache 1 year
         */
        return Cache::remember('platform-types', self::$secondsToDay * 365, function () {
            return PlatformType::all()
                ->pluck('slug')
                ->toArray();
        });
    }
}
