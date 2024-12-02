<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\BadRequestException;
use App\Exceptions\NotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaStorageRequest;
use App\Http\Resources\MediaStorage\MediaStorageResource;
use App\Models\MediaStorage\MediaStorage;
use App\Models\MediaStorage\MediaStorageCategory;
use App\Utils\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaStorageController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     *  @return void
     */
    public function index() : void
    {
        // Void
    }

    /**
     *  Store a newly created resource in storage.
     *
     *  @param StoreMediaStorageRequest $request
     *  @return JsonResponse
     *  @throws BadRequestException
     */
    public function store(StoreMediaStorageRequest $request): JsonResponse
    {
        $category = MediaStorageCategory::findOrFail($request->category_id);
        $file = $request->file('file');
        $fileInfo = [
            'id' => Str::uuid(),
            'file_name' => Str::uuid() . '.' . $file->getClientOriginalExtension(),
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'category_id' => $category->id,
            'created_at' => now(),
        ];

        try {
            Storage::disk('public')->putFileAs($category->path, $file, $fileInfo['file_name']);
            MediaStorage::insert($fileInfo);
            return ApiResponse::created($fileInfo);
        }
        catch (\Exception $e) {
            $errorInfo = [
                'details' => $e->getMessage(),
                'code' => $e->getCode(),
            ];
            throw new BadRequestException($errorInfo);
        }


    }

    /**
     *  Display the specified resource.
     *
     *  @param string $id
     *  @return MediaStorageResource
     *  @throws NotFoundException
     */
    public function show(string $id) : MediaStorageResource
    {
        try {
            return new MediaStorageResource(
                MediaStorage::with('category')
                    ->findOrFail($id)
            );
        } catch (\Exception $e) {
            throw new NotFoundException();
        }
    }

    /**
     *  Update the specified resource in storage.
     *
     *  @param Request $request
     *  @return void
     */
    public function update(Request $request)
    {
        /*
        $request->validate([
            'file' => 'file',
            'category_id' => 'required|uuid|exists:media_storage_categories,id'
        ]);

        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete($mediaStorage->category->path . '/' . $mediaStorage->file_name);

            $category = MediaStorageCategory::findOrFail($request->category_id);
            $file = $request->file('file');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $fileSize = $file->getSize();
            $fileType = $file->getMimeType();

            $file->storeAs($category->path, $fileName);

            $mediaStorage->update([
                'file_name' => $fileName,
                'file_type' => $fileType,
                'file_size' => $fileSize,
                'category_id' => $category->id
            ]);
        } else {
            $mediaStorage->update($request->only(['category_id']));
        }

        return new MediaStorageResource($mediaStorage);

        */
    }

    /**
     *  Remove the specified resource from storage.
     *
     *  @param string $id
     *  @return JsonResponse
     */
    public function destroy(string $id): JsonResponse
    {
        $fileInfo = MediaStorage::where('id', $id)
            ->first(['file_name', 'category_id']);
        $categoryPath = MediaStorageCategory::where('id', $fileInfo->category_id)
            ->pluck('path')
            ->first();
        Storage::disk('public')->delete($categoryPath . '/' . $fileInfo->file_name);
        MediaStorage::destroy($id);

        return ApiResponse::deleted();
    }
}
