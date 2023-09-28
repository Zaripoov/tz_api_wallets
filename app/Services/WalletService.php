<?php

namespace App\Services;

use App\Http\Requests\Wallet\WalletCreateRequest;
use App\Http\Resources\WalletCreateResource;
use App\Http\Resources\WalletViewResource;
use App\Repositories\WalletRepository;

class WalletService
{
    public function createWallet(WalletCreateRequest $request): array
    {
        return (new WalletCreateResource(WalletRepository::create(currency: $request->getCurrency())))
            ->toArray($request);
    }

    public function listWallet(): array
    {
        foreach (WalletRepository::list() as $value){
            $result[] = (new WalletViewResource($value))
                ->toArray($value);
        }

        return $result ?? [];
    }
}
