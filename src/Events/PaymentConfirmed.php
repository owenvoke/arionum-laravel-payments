<?php

namespace pxgamer\ArionumLaravel\Events;

use Illuminate\Queue\SerializesModels;
use pxgamer\ArionumLaravel\Models\Payment;

/**
 * Class PaymentConfirmed
 */
class PaymentConfirmed
{
    use SerializesModels;

    /**
     * @var Payment
     */
    public $confirmedPayment;

    /**
     * PaymentConfirmed constructor.
     * This is fired when the number of confirmations on the blockchain meets the minimum confirmations in the config.
     *
     * @param Payment $confirmedPayment
     */
    public function __construct(Payment $confirmedPayment)
    {
        $this->confirmedPayment = $confirmedPayment;
    }
}
