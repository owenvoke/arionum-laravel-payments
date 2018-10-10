<?php

namespace pxgamer\ArionumLaravel\Listeners;

use pxgamer\ArionumLaravel\Events\PaymentConfirmed as PaymentConfirmedEvent;

/**
 * Class PaymentConfirmed
 */
class PaymentConfirmed
{
    /**
     * Handle the event.
     *
     * @param PaymentConfirmedEvent $event
     * @return mixed|void
     */
    public function handle(PaymentConfirmedEvent $event)
    {
        app('log')->info('Payment confirmed: '.$event->confirmedPayment->address);
    }
}
