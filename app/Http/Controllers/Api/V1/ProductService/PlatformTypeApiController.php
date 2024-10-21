<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductService\PlatformTypeCollection;
use App\Http\Resources\V1\ProductService\ProductCollection;
use App\Models\ProductService\PlatformType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlatformTypeApiController extends Controller
{
    private static int $secondsToDay = 86400;

    /**
     *  [GET] - Return platform types
     *
     *  @param string $field
     *  @return mixed
     */
    public function index(string $field = 'all') : mixed
    {
        /* TODO: Remove cache forget after testing */
        if($field == 'all' || $field == null)
        {
            Cache::forget('platform-types');
            return Cache::remember('platform-types', self::$secondsToDay * 365, function () {
                return new PlatformTypeCollection(PlatformType::all());
            });
        }
        else
        {
            Cache::forget('platform-types-' . $field);
            return Cache::remember('platform-types-' . $field, self::$secondsToDay * 365, function () {
                return PlatformType::all()
                    ->pluck('slug')
                    ->toArray();
            });
        }
    }
}
