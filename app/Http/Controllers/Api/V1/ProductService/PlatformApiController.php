<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Contracts\RestfulControllerInterface;
use App\Http\Controllers\Api\V1\ErrorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductService\ProductHelperController;

use App\Http\Resources\V1\ProductService\PlatformCollection;
use App\Http\Resources\V1\ProductService\PlatformResource;
use App\Http\Resources\V1\ProductService\ProductCollection;
use App\Models\ProductService\Platform;

use Illuminate\Http\Request;

class PlatformApiController extends Controller implements RestfulControllerInterface
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
        catch (\Exception $exception) {
            return ErrorController::notFound($exception);
        }
        return new PlatformResource($resource);
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
