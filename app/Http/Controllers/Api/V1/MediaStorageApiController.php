<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductService\StoreMediaStorageRequest;
use App\Models\MediaStorage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaStorageApiController extends Controller
{
    use HasUuids;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     *  Store a newly created resource in storage.
     *
     *  @param StoreMediaStorageRequest $request
     */
    public function store(StoreMediaStorageRequest $request)
    {
        $fileInfo = [
            'id' => Str::uuid()->toString(),
            'file_name' => time() . "_" . $request->file('image')->getClientOriginalName(),
            'file_type' => $request->file('image')->getMimeType(),
            'file_size' => $request->file('image')->getSize(),
            'category_id' => $request->category_id,
            'created_at' => now(),
        ];

        /* Image category */
        $category = \DB::table('media_storage_categories')
            ->where('id', $request->category_id)
            ->first();

        $filePath = public_path() . $category->path;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move($filePath, $fileInfo["file_name"]);
        }

        \DB::table('media_storage')->insert($fileInfo);

        return response()
            ->json([
                'code' => 201,
                'status' => 'success',
                'message' => 'Product media storage successfully created.',
                'data' => $fileInfo
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
