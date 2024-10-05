<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Contracts\RestfulControllerInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductService\ProductCollection;
use App\Models\ProductService\Product;
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
        $products = Product::all();
        return new ProductCollection($products);
    }


    /**
     *  [GET] - Show the product by id
     *
     *  @param string $slug
     *  @return void
     */
    public function show(string $slug) : Mixed
    {
        $products = Product::all();
        return new ProductCollection($products);
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
