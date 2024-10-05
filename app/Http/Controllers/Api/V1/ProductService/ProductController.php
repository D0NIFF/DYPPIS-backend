<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Http\Controllers\Controller;
use App\Contracts\RestfulControllerInterface;
use App\Http\Resources\V1\ProductService\ProductCollection;
use App\Http\Resources\V1\ProductService\ProductResource;
use App\Models\ProductService\Product;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller implements RestfulControllerInterface
{

    /**
     *  [GET] - Return products
     *
     *  @param Request $request
     *  @return ProductCollection
     */
    public function index(Request $request) : ProductCollection
    {
        $products = Product::paginate($request->get('perPage', 30), ['*'], 'page', $request->get('page', 1));
        return new ProductCollection($products);
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
            $resource = Product::where('id', $id)->firstOrFail();
        }
        catch (\Exception $e) {
            return new JsonResponse(
                data: [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'error' => 'Not found',
                    ],
                status: Response::HTTP_NOT_FOUND
            );
        }

        return new ProductResource($resource);
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
