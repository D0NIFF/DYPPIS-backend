<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductService\ProductCategoryAllCollection;
use App\Http\Resources\ProductService\ProductCategoryCollection;
use App\Models\ProductService\Platform;
use App\Models\ProductService\ProductCategory;
use App\Utils\UuidHelper;
use Illuminate\Http\Request;

class ProductCategoryApiController extends Controller
{
    /**
     *  Display a listing of the resource.
     *
     *  @param Request $request
     *  @param string|null $id
     *  @return ProductCategoryAllCollection|ProductCategoryCollection
     */
    public function index(Request $request, string $id = null): ProductCategoryAllCollection|ProductCategoryCollection
    {
        if($id)
        {
            $field = 'slug';
            if(UuidHelper::isUuid($id))
                $field = 'id';

            $platform = Platform::where($field, $id)
                ->firstOrFail();

            $productCategories = $platform->categories;
            return new ProductCategoryCollection($productCategories);
        }
        else
        {
            $productCategories = ProductCategory::paginate($request->get('perPage', 15));
            return new ProductCategoryAllCollection($productCategories);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
