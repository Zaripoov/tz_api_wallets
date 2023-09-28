<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Wallet\WalletCreateRequest;
use App\Services\WalletService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class WalletController extends ApiController
{
    public WalletService $walletService;

    public function __construct(WalletService $walletService)
    {
       $this->walletService = $walletService;
    }

    /**
     * @OA\Post(
     * path="/create",
     * operationId="Wallet create",
     * tags={"Wallet"},
     * summary="Wallet create",
     * description="Wallet create",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"currency"},
     *               @OA\Property(property="currency", type="text", description="Currency"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *            response=201,
     *            description="Успешно",
     *            @OA\JsonContent()
     *         ),
     * )
     */
    public function create(WalletCreateRequest $request): JsonResponse
    {
        return $this->responseSuccess(data: $this->walletService->createWallet($request), status: Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     * path="/list",
     * operationId="Wallet list",
     * tags={"Wallet"},
     * summary="Wallet list",
     * description="Wallet list",
     *      @OA\Response(
     *          response=200,
     *          description="Успешно",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function list(): JsonResponse
    {
        return $this->responseSuccess($this->walletService->listWallet());
    }

}
