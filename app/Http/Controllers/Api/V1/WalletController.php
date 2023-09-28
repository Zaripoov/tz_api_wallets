<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Wallet\WalletCreateRequest;
use App\Services\WalletService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WalletController extends ApiController
{
    public WalletService $walletService;

    public function __construct(WalletService $walletService)
    {
       $this->walletService = $walletService;
    }

    public function create(WalletCreateRequest $request): JsonResponse
    {
        return $this->responseSuccess($this->walletService->createWallet($request));
    }

    public function list(): JsonResponse
    {
        return $this->responseSuccess($this->walletService->listWallet());
    }

}
