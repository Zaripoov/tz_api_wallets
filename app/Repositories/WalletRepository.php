<?php

namespace App\Repositories;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use function React\Promise\all;

class WalletRepository
{
    public static function create(string $currency): Wallet
    {
        $wallet = new Wallet();
        $wallet->currency = 'eth';
        $wallet->public_key = Str::uuid();
        $wallet->private_key = Str::uuid(); // Замените 'YourPrivateKey' на фактический приватный ключ
        $wallet->save();

        return $wallet;
    }

    public static function list(): Collection|array
    {
        return Wallet::query()
            ->select(['id', 'public_key', 'currency'])
            ->orderByDesc('id')
            ->get();
    }

}
