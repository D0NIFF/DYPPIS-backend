<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductService\StoreProductMediaStorageRequest;
use App\Models\ProductService\ProductMediaStorage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductMediaStorageApiController extends Controller
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
     *  @param StoreProductMediaStorageRequest $request
     */
    public function store(StoreProductMediaStorageRequest $request)
    {
        $fileInfo = [
            'id' => Str::uuid()->toString(),
            'file_name' => time() . "_" . $request->file('image')->getClientOriginalName(),
            'file_type' => $request->file('image')->getMimeType(),
            'file_size' => $request->file('image')->getSize(),
        ];

        $filePath = "";
        if($request->get('icon') == null || $request->get('icon') == false)
            $filePath = public_path() . config('app.path_images') . '/products/';
        else
            $filePath = public_path() . config('app.path_icons') . '/';


        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $file->move($filePath, $fileInfo["file_name"]);
        }

        ProductMediaStorage::insert($fileInfo);

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
