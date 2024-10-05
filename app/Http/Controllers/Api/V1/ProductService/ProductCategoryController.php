<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Contracts\RestfulControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductService\ProductCategoryCollection;

use App\Http\Resources\V1\ProductService\ProductCategoryResource;
use App\Models\ProductService\ProductCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller implements RestfulControllerInterface
{
    /**
     *  [GET] - Return categories
     *
     *  @param Request $request
     *  @return ProductCategoryCollection
     */
    public function index(Request $request) : ProductCategoryCollection
    {
        $resource = ProductCategory::paginate($request->get('perPage', 30), ['*'], 'page', $request->get('page', 1));
        return new ProductCategoryCollection($resource);
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
                $resource = ProductCategory::where('id', $id)->firstOrFail();
            else
                $resource = ProductCategory::where('slug', $id)->firstOrFail();
        }
        catch (\Exception $e) {
            return response()
                ->json([
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'error' => 'Not found',
                ], 404);
        }
        return new ProductCategoryResource($resource);
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
