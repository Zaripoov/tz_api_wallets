<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Wallet
 *
 * @property int $id
 * @property string $currency
 * @property string $public_key
 * @property string $private_key
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Wallet newModelQuery()
 * @method static Builder|Wallet newQuery()
 * @method static Builder|Wallet query()
 * @method static Builder|Wallet whereCreatedAt($value)
 * @method static Builder|Wallet whereCurrency($value)
 * @method static Builder|Wallet whereId($value)
 * @method static Builder|Wallet wherePrivateKey($value)
 * @method static Builder|Wallet wherePublicKey($value)
 * @method static Builder|Wallet whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Wallet extends Model
{
    use HasFactory;
}
