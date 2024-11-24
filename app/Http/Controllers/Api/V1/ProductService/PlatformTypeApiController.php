<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductService\PlatformTypeCollection;
use App\Http\Resources\ProductService\PlatformTypeResource;
use App\Models\ProductService\PlatformType;
use App\Utils\UuidHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PlatformTypeApiController extends Controller
{
    private static int $secondsToDay = 86400;

    /**
     *  Return platform types
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) : mixed
    {
        $field = $request->get('field');
        /** TODO: Remove cache forget after testing */
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

    /**
     *  Return platform type
     *
     *  @param string $id
     *  @return mixed
     *  @throws NotFoundException
     */
    public function show(string $id) : mixed
    {
        /** TODO: Remove cache forget after testing */

        $platformType = PlatformType::query();

        if(UuidHelper::isUuid($id) === true)
            $platformType->where('id', $id);
        else
            $platformType->where('slug', $id);

        try {
            $platformType = $platformType->firstOrFail();

            Cache::forget('platform-types-' . $id);
            return Cache::remember('platform-types-' . $id, self::$secondsToDay * 365, function () use ($platformType) {
                return new PlatformTypeResource($platformType);
            });
        }
        catch (\Exception $exception)
        {
            throw new NotFoundException('Platform Not Found', 404);
        }
    }
}
