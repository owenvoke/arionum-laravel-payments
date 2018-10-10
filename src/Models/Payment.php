<?php

namespace pxgamer\ArionumLaravel\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class Payment
 *
 * @property int      $id
 * @property int      $user_id
 * @property int|null $order_id
 * @property string   $address
 * @property bool     $paid
 * @property float    $value
 * @property float    $received
 * @property string   $transaction_id
 * @property int      $confirmations
 * @property Carbon   $created_at
 * @property Carbon   $updated_at
 */
class Payment extends Model
{
    /**
     * @var string
     */
    protected $table = 'arionum_payments';

    /**
     * @param Builder|void $query
     * @return Builder
     */
    public function scopePaid($query)
    {
        return $query->where('paid', true);
    }

    /**
     * @param Builder|void $query
     * @return Builder
     */
    public function scopeUnpaid($query)
    {
        return $query->whereNull('transaction_id');
    }

    /**
     * @param Builder|void $query
     * @return Builder
     */
    public function scopeUnconfirmed($query)
    {
        return $query
            ->whereNotNull('transaction_id')
            ->where('paid', false);
    }
}
