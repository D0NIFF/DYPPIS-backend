<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductService\PlatformCollection;
use App\Http\Resources\ProductService\PlatformResource;
use App\Models\ProductService\Platform;
use App\Models\ProductService\PlatformType;
use App\Utils\UuidHelper;
use Illuminate\Http\Request;

class PlatformApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return PlatformCollection
     */
    public function index(Request $request, string $id)
    {
        $platformType = PlatformType::query();

        if(UuidHelper::isUuid($id))
            $platformType->where('id', $id);
        else
            $platformType->where('slug', $id);

        try {
            $platformType = $platformType->firstOrFail();

            $perPage = $request->get('perPage', 10); // Количество записей на страницу
            $platforms = Platform::with(['image', 'banner'])
                ->where('type_id', $platformType->id)
                ->paginate($perPage);
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
//        $perPage = $request->get('perPage', 10); // Количество записей на страницу
//        $platforms = Platform::with(['image', 'banner'])
//            ->paginate($perPage);
//        return new PlatformCollection($platforms);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
     * Display the specified resource.
     *
     *  @param string $platformTypeId
     *  @param string $id
     *  @return PlatformResource
     *  @throws NotFoundException
     */
    public function show(string $id): PlatformResource
    {
        $platform = Platform::with(['image', 'banner']);

        if (UuidHelper::isUuid($id))
            $platform->where('id', $id);
        else
            $platform->where('slug', $id);

        try {
            $platform = $platform->firstOrFail();
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Platform $platform)
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform)
    {
        $platform->delete();
        return response()->noContent();
    }
}
