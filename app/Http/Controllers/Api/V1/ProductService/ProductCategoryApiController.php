<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Contracts\RestfulControllerInterface;
use App\Http\Controllers\Api\V1\ErrorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductService\ProductHelperController;
use App\Http\Resources\V1\ProductService\ProductCategoryCollection;
use App\Http\Resources\V1\ProductService\ProductCategoryResource;
use App\Models\ProductService\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryApiController extends Controller implements RestfulControllerInterface
{
    /**
     *  [GET] - Return categories
     *
     *  @param Request $request
     *  @return ProductCategoryCollection
     */
    public function index(Request $request) : ProductCategoryCollection
    {
        $resource = ProductCategory::paginate((int)$request->get('perPage', 30), ['*'], 'page', (int)$request->get('page', 1));
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
        catch (\Exception $exception) {
            return ErrorController::notFound($exception);
        }
        return new ProductCategoryResource($resource);
    }


    /**
     *  [POST] - Create the product
     *
     *  @param Request $request
     *  @return mixed
     */
    public function store(Request $request) : mixed
    {
        return null;
    }

    /**
     *  [PATCH] - Update the product
     *
     *  @param string $id
     *  @return mixed
     */
    public function update(string $id) : mixed
    {
        return null;
    }


    /**
     *  [DELETE] - Delete the product
     *
     *  @param string $id
     *  @return mixed
     */
    public function destroy(string $id) : mixed
    {
        return null;
    }
}
