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
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
                'error' => $message,
            ],
            status: Response::HTTP_NOT_FOUND
        );
    }

    /**
     *  Return json response that resource not found
     *
     *  @param \Exception $exception
     *  @param int $code
     *  @return JsonResponse
     */
    public static function notFound(\Exception $exception, int $code = Response::HTTP_NOT_FOUND) : JsonResponse
    {
        $errorMessage = 'Error code: ' . $exception->getCode() . '<br> Message: ' . $exception->getMessage();
        return new JsonResponse(
            data: [
                'code' => $code,
                'status' => 'fail',
                'message' => $errorMessage,
                'error' => 'Not found',
            ],
            status: $code
        );
    }


    /**
     *  Return json response that bad request
     *
     *  @param \Exception $exception
     *  @param int $code
     *  @return JsonResponse
     */
    public static function badRequest(\Exception $exception, int $code = Response::HTTP_BAD_REQUEST) : JsonResponse
    {
        $errorMessage = 'Error code: ' . $exception->getCode() . '<br> Message: ' . $exception->getMessage();
        return new JsonResponse(
            data: [
                'code' => $code,
                'status' => 'fail',
                'message' => $errorMessage,
                'error' => 'Bad Request',
            ],
            status: $code
        );
    }


    /**
     *  Return json response that user not authorized
     *
     *  @param \Exception|null $exception
     *  @param int $code
     *  @return JsonResponse
     */
    public static function unauthorized(\Exception $exception = null, int $code = Response::HTTP_UNAUTHORIZED) : JsonResponse
    {
        $errorMessage = 'Error code: ' . $exception->getCode() . '<br> Message: ' . $exception->getMessage();
        return new JsonResponse(
            data: [
                'code' => $code,
                'status' => 'fail',
                'message' => $errorMessage,
                'error' => 'User not authorized',
            ],
            status: $code
        );
    }
}
