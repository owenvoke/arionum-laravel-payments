<?php

namespace pxgamer\ArionumLaravel\Events;

use Illuminate\Queue\SerializesModels;
use pxgamer\ArionumLaravel\Models\Payment;

/**
 * Class UnconfirmedPaymentEvent
 */
class UnconfirmedPaymentEvent
{
    use SerializesModels;

    /**
     * @var Payment
     */
    public $unconfirmedPayment;

    /**
     * UnconfirmedPaymentEvent constructor.
     * @param Payment $unconfirmedPayment
     */
    public function __construct(Payment $unconfirmedPayment)
    {
        $this->unconfirmedPayment = $unconfirmedPayment;
    }
}
