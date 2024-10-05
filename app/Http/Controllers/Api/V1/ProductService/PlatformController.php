<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Contracts\RestfulControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductService\PlatformCollection;
use App\Http\Resources\V1\ProductService\PlatformResource;
use App\Http\Resources\V1\ProductService\ProductCategoryResource;
use App\Http\Resources\V1\ProductService\ProductCollection;
use App\Models\ProductService\Platform;
use App\Models\ProductService\Product;
use App\Models\ProductService\ProductCategory;
use Illuminate\Http\Request;

class PlatformController extends Controller implements RestfulControllerInterface
{
    /**
     *  [GET] - Return platforms
     *
     *  @param Request $request
     *  @return ProductCollection
     */
    public function index(Request $request) : mixed
    {
        $products = Platform::paginate((int)$request->get('perPage', 30), ['*'], 'page', (int)$request->get('page', 1));
        return new PlatformCollection($products);
    }


    /**
     *  [GET] - Show the product by id
     *
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
        catch (\Exception $e) {
            return response()
                ->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'error' => 'Not found',
                ], 404);
        }
        return new PlatformResource($resource);
    }


    /**
     *  [POST] - Create the product
     *
     *  @param Request $request
     *  @return Product
     */
    public function store(Request $request) : Product
    {
        return new Product();
    }

    /**
     *  [PATCH] - Update the product
     *
     *  @param string $id
     *  @return Product
     */
    public function update(string $id) : Product
    {

    }


    /**
     *  [DELETE] - Delete the product
     *
     *  @param string $id
     *  @return void
     */
    public function destroy(string $id) : Mixed
    {

    }
}
