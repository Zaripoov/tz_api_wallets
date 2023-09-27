<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

class PingController extends ApiController
{
    public function ping(): JsonResponse
    {
        return $this->responseSuccess(['ping']);
    }

}
