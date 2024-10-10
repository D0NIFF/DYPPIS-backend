<?php

namespace App\Http\Controllers\Api\V1\ProductService;

use App\Contracts\RestfulControllerInterface;
use App\Http\Controllers\Api\V1\ErrorController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductService\ProductHelperController;

use App\Http\Requests\ProductService\StorePlatformRequest;
use App\Http\Resources\V1\ProductService\PlatformCollection;
use App\Http\Resources\V1\ProductService\PlatformResource;
use App\Models\ProductService\Platform;

use Illuminate\Http\Request;

class PlatformApiController extends Controller
{
    /**
     *  [GET] - Return platforms
     *
     *  @param Request $request
     *  @return PlatformCollection
     */
    public function index(Request $request) : PlatformCollection
    {
        $products = Platform::paginate((int)$request->get('perPage', 30), ['*'], 'page', (int)$request->get('page', 1));
        return new PlatformCollection($products);
    }


    /**
     *  [GET] - Show the platform by id
     *
     *  @param Request $request
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
     *  [POST] - Create the platform
     *
     *  @param StorePlatformRequest $request
     *  @return mixed
     */
    public function store(StorePlatformRequest $request) : mixed
    {
//        $request->validate([
//            'title' => 'required',
//        ]);

        if(\Auth::check() && \Auth::user()->role_id >= 3)
        {
            return response()
                ->json(['message' => 'test'], 201);
        }
        else
        {
            return response()
                ->json([
                    'success' => false,
                ]);
        }
        //return null;
    }

    /**
     *  [PATCH] - Update the platform
     *
     *  @param string $id
     *  @return mixed
     */
    public function update(string $id) : mixed
    {
        return null;
    }


    /**
     *  [DELETE] - Delete the platform
     *
     *  @param string $id
     *  @return mixed
     */
    public function destroy(string $id) : mixed
    {
        return null;
    }
}
