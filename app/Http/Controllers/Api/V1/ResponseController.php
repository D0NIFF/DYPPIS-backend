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

    public static function successCreated(array $data = [], int $code = Response::HTTP_CREATED) : JsonResponse
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

    public static function successDeleted(int $code = Response::HTTP_NO_CONTENT) : JsonResponse
    {
        return new \Illuminate\Http\JsonResponse(
            data: [
                'code' => $code,
                'status' => 'success',
                'message' => 'Resource deleted successfully.',
            ],
            status: $code
        );
    }

    public static function successUpdated(array $data = [], int $code = Response::HTTP_OK) : JsonResponse
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
