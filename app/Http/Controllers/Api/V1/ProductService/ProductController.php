<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Http\Controllers\Controller;
use App\Contracts\RestfulControllerInterface;
use App\Http\Resources\V1\ProductService\ProductCollection;
use App\Models\ProductService\Product;
use Illuminate\Http\Request;

class ProductController extends Controller implements RestfulControllerInterface
{

    /**
     *  [GET] - Return products
     *
     *  @param Request $request
     *  @return ProductCollection
     */
    public function index(Request $request) : mixed
    {
//        $result = Product::where('id', '=', '9d0c1834-2e8b-314f-aaae-7df0cafd9962')->first();
//        $result->seller = $result->getSeller();
//        return $result;

        $products = Product::all();
        return new ProductCollection($products);
    }


    /**
     *  [GET] - Show the product by id
     *
     *  @param string $id
     *  @return void
     */
    public function show(string $id) : Mixed
    {

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
