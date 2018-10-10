<?php

namespace pxgamer\ArionumLaravel\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Account
 *
 * @property int    $id
 * @property string $address
 * @property string $public_key
 * @property string $private_key
 */
class Account extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'address',
        'public_key',
        'private_key',
    ];

    /**
     * @var string
     */
    protected $table = 'arionum_accounts';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function getPayments(): HasOne
    {
        return $this->hasOne(Payment::class, 'address', 'address');
    }

    /**
     * @return array
     */
    public function getTransactions(): array
    {
        return app('arionum')->getTransactions($this->address);
    }
}
