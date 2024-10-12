<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseController extends Controller
{
    //
    public function index()
    {

    }

    public static function success(array $data = [], int $code = 200) : JsonResponse
    {
        return new \Illuminate\Http\JsonResponse(
            data: [
                'code' => $code,
                'status' => 'success',
                'message' => 'Resource saved successfully.',
                'data' => $data,
            ],
            status: $code
        );
    }


}
