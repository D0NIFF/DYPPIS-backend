<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductService\PlatformCollection;
use App\Http\Resources\ProductService\PlatformResource;
use App\Models\ProductService\Platform;
use App\Models\ProductService\PlatformType;
use App\Utils\ApiResponse;
use App\Utils\UuidHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PlatformApiController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     *  @param Request $request
     *  @param string $id
     *  @return PlatformCollection
     *  @throws NotFoundException
     */
    public function index(Request $request, string $id): PlatformCollection
    {
        $platformType = PlatformType::query();
        if(UuidHelper::isUuid($id))
            $platformType->where('id', $id);
        else
            $platformType->where('slug', $id);

        try {
            $platformType = $platformType->firstOrFail();
            $platforms = Platform::with(['image', 'banner'])
                ->where('type_id', $platformType->id)
                ->paginate($request->get('perPage', 10));
            return new PlatformCollection($platforms);
        }
        catch (\Exception $exception)
        {
            throw new NotFoundException([
                'messages' => 'Not Found',
                'code' => 1001,
                'details' => 'The requested platform type ID does not exist in the database.',
            ]);
        }
    }

    /**
     *  Store a newly created resource in storage.
     *
     *  @param Request $request
     *  @return Response|PlatformResource
     */
    public function store(Request $request): Response|PlatformResource
    {
        $request->validate([
            'slug' => 'required|string|unique:platforms,slug|max:100',
            'title' => 'required|string|max:150',
            'image_id' => 'nullable|uuid|exists:media_storage,id',
            'banner_id' => 'nullable|uuid|exists:media_storage,id',
            'type_id' => 'required|uuid|exists:platform_types,id',
        ]);

        $platform = Platform::create($request->all());
        return new PlatformResource($platform);
    }

    /**
     *  Display the specified resource.
     *
     *  @param string $id
     *  @return PlatformResource
     *  @throws NotFoundException
     */
    public function show(string $id): PlatformResource
    {
        $field = 'slug';
        if (UuidHelper::isUuid($id))
            $field = 'id';

        try {
            $platform = Platform::with(['image', 'banner', 'categories'])
                ->where($field, $id)
                ->first();
            return new PlatformResource($platform);
        }
        catch (\Exception $exception)
        {
            $errorInfo = [
                'details' => $exception->getMessage(),
                'code' => $exception->getCode(),
            ];
            throw new NotFoundException($errorInfo);
        }
    }

    /**
     *  Update the specified resource in storage.
     *
     *  @param Request $request
     *  @param Platform $platform
     *  @return PlatformResource
     */
    public function update(Request $request, Platform $platform) : PlatformResource
    {
        $request->validate([
            'slug' => 'required|string|unique:platforms,slug,' . $platform->id . '|max:100',
            'title' => 'required|string|max:150',
            'image_id' => 'nullable|uuid|exists:media_storage,id',
            'banner_id' => 'nullable|uuid|exists:media_storage,id',
            'type_id' => 'required|uuid|exists:platform_types,id',
        ]);

        $platform->update($request->all());
        return new PlatformResource($platform);
    }

    /**
     *  Remove the specified resource from storage.
     *
     *  @param string $id
     *  @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        Platform::destroy($id);
        return ApiResponse::deleted();
    }
}
