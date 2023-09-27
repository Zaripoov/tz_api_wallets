<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class ApiController extends Controller
{
    public function responseSuccess(?array $data = []): JsonResponse
    {
        return response()->json([
            'state' => 0,
            'data' => $data
        ]);
    }

    public function responseErrorMessage(string $message): JsonResponse
    {
        return $this->responseError([
            'message' => $message,
        ]);
    }

    public function responseServerError(): JsonResponse
    {
        return $this->responseErrorMessage(message: 'Server error.');
    }


    public function responseError(array $data = []): JsonResponse
    {
        $data['state'] = 1;

        return response()->json(
            $data,
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    public function responseErrorServer(?string $error = null): JsonResponse
    {
        return response()->json([
            'message' => __('Server error.'),
            'code' => 500,
            'error' => app()->isLocal() ? $error : null,
        ], 500);
    }
}
