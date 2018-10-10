<?php

namespace pxgamer\ArionumLaravel\Events;

use Illuminate\Queue\SerializesModels;
use pxgamer\ArionumLaravel\Models\Payment;

/**
 * Class PaymentPending
 */
class PaymentPending
{
    use SerializesModels;

    /**
     * @var Payment
     */
    public $pendingPayment;

    /**
     * PaymentPending constructor.
     * This is fired when the payment is still pending.
     *
     * @param Payment $pendingPayment
     */
    public function __construct(Payment $pendingPayment)
    {
        $this->pendingPayment = $pendingPayment;
    }
}
