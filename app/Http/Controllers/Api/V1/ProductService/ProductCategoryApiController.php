<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Http\Controllers\Controller;
use App\Models\ProductService\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id = null)
    {
        $productCategory = ProductCategory::query();

        if($id)
            $productCategory = $productCategory->where( $id);
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
