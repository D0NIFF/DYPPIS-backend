<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductService\ProductCollection;
use App\Models\ProductService\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $id = null, string $categoryId = null)
    {
        //$product = Product::with(['category'])->findOrFail($id);
        if($id != null && $categoryId != null)
        {
            $products = Product::with(['platform', 'category', 'images'])
                ->where('platform_id', $id)
                ->where('category_id', $categoryId)
                ->paginate($request->get('perPage', 30));
        }
        else {
            $products = Product::with(['platform', 'category', 'delivery', 'images'])
                ->paginate($request->get('perPage', 30));

            return new ProductCollection($products);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
