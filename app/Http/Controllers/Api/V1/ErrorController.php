<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ErrorController extends Controller
{
    public function index(string $message = "", \Exception $exception = null) : JsonResponse
    {
        return new JsonResponse(
            data: [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'error' => $message,
            ],
            status: Response::HTTP_NOT_FOUND
        );
    }

    /**
     *  Return json response that resource not found
     *
     *  @param \Exception $exception
     *  @return JsonResponse
     */
    public static function notFound(\Exception $exception) : JsonResponse
    {
        return new JsonResponse(
            data: [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'error' => 'Not found',
            ],
            status: Response::HTTP_NOT_FOUND
        );
    }


    /**
     *  Return json response that bad request
     *
     *  @param \Exception $exception
     *  @return JsonResponse
     */
    public static function badRequest(\Exception $exception) : JsonResponse
    {
        return new JsonResponse(
            data: [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'error' => 'Bad Request',
            ],
            status: Response::HTTP_BAD_REQUEST
        );
    }


    public static function unauthorized(\Exception $exception = null) : JsonResponse
    {
        return new JsonResponse(
            data: [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'error' => 'User not authorized',
            ],
            status: Response::HTTP_UNAUTHORIZED
        );
    }
}
