<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Contracts\RestfulControllerInterface;
use App\Http\Controllers\Api\V1\ErrorController;
use App\Http\Controllers\Api\V1\ResponseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductService\ProductHelperController;

use App\Http\Requests\ProductService\StorePlatformRequest;
use App\Http\Requests\ProductService\StoreMediaStorageRequest;
use App\Http\Resources\V1\ProductService\PlatformCollection;
use App\Http\Resources\V1\ProductService\PlatformResource;
use App\Models\ProductService\Platform;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PlatformApiController extends Controller
{
    /**
     *  [GET] - Return platforms
     *
     *  @param Request $request
     *  @return PlatformCollection
     */
    public function index(Request $request) : PlatformCollection
    {
        $products = Platform::paginate((int)$request->get('perPage', 30), ['*'], 'page', (int)$request->get('page', 1));
        return new PlatformCollection($products);
    }


    /**
     *  [GET] - Show the platform by id
     *
     *  @param Request $request
     *  @param string $id
     *  @return mixed
     */
    public function show(Request $request, string $id) : mixed
    {
        try {
            $resource = null;
            if(ProductHelperController::isUuid($id))
                $resource = Platform::where('id', $id)->firstOrFail();
            else
                $resource = Platform::where('slug', $id)->firstOrFail();
        }
        catch (\Exception $exception) {
            return ErrorController::notFound($exception);
        }
        return new PlatformResource($resource);
    }


    /**
     *  [POST] - Create the platform
     *
     * @param StorePlatformRequest $request
     * @return mixed
     * @throws ConnectionException
     */
    public function store(StorePlatformRequest $request) : mixed
    {
        if(\Auth::check() && \Auth::user()->role_id >= 3)
        {
            /* Get files from the request */
            $image = $request->file('image');
            $banner = $request->file('banner');

            // Check files
            if (!$image || !$banner)
                return response()->json(
                    [
                        'message' => 'Image or banner file is missing'
                    ], 400);

            $storageCategoryIconId = \Cache::remember('storageCategoryIconId', 60 * 60 * 24 * 365, function() {
                return \DB::table('media_storage_categories')
                    ->where('slug', '=', 'icon')
                    ->pluck('id')
                    ->first();
            });

            $storageCategoryBannerId = \Cache::remember('storageCategoryBannerId', 60 * 60 * 24 * 365, function() {
                return \DB::table('media_storage_categories')
                    ->where('slug', '=', 'banner')
                    ->pluck('id')
                    ->first();
            });

            // Загружаем файлы на сервер через другой маршрут
            $imageResponse = Http::withToken($request->bearerToken())
                ->withHeader('Accept', 'application/json')
                ->attach('image', $image->get(), $image->getClientOriginalName())
                ->attach('category_id', $storageCategoryIconId)
                ->post(url('/api/v1/media-storage'));

            $bannerResponse = Http::withToken($request->bearerToken())
                ->withHeader('Accept', 'application/json')
                ->attach('image', $banner->get(), $image->getClientOriginalName())
                ->attach('category_id', $storageCategoryBannerId)
                ->post(url('/api/v1/media-storage'));

            // Проверяем успешность загрузки
            if ($imageResponse->successful() && $bannerResponse->successful())
            {
                // Обработка успешного ответа
                $imageData = $imageResponse->json();
                $bannerData = $bannerResponse->json();

                $platform = [
                    'id' => Str::uuid()->toString(),
                    'slug' => $request->slug,
                    'title' => $request->title,
                    'image_id' => $imageData['data']['id'],
                    'banner_id' => $bannerData['data']['id'],
                    'type_id' => $request->type_id,
                ];

                try {
                    Platform::insert($platform);
                    Log::info('Create a new platform {id} by {user_id}', ['id' => $platform['id'], 'user_id' => \Auth::id()]);
                    return ResponseController::success($platform, 201);
                }
                catch (\Exception $exception) {
                    return ErrorController::badRequest($exception);
                }

            }

            return response()->json([
                'image' => [
                    'message' => 'Failed to upload image',
                    'errors' => $imageResponse->json(),
                    'status' => $imageResponse->status(),
                    'body' => $imageResponse->body()
                ],
                'banner' => [
                    'message' => 'Failed to upload banner',
                    'errors' => $bannerResponse->json(),
                    'status' => $bannerResponse->status(),
                    'body' => $bannerResponse->body()
                ]
            ], $imageResponse->status());

        }

        return ErrorController::unauthorized();
    }

    /**
     *  [PATCH] - Update the platform
     *
     *  @param string $id
     *  @return mixed
     */
    public function update(string $id) : mixed
    {
        return null;
    }


    /**
     *  [DELETE] - Delete the platform
     *
     *  @param string $id
     *  @return mixed
     */
    public function destroy(string $id) : mixed
    {
        return null;
    }
}
