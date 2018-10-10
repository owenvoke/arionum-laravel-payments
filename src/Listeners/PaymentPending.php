<?php

namespace pxgamer\ArionumLaravel\Listeners;

use pxgamer\ArionumLaravel\Events\PaymentPending as PaymentPendingEvent;

/**
 * Class PaymentPending
 */
class PaymentPending
{
    /**
     * Handle the event.
     *
     * @param PaymentPendingEvent $event
     * @return mixed|void
     */
    public function handle(PaymentPendingEvent $event)
    {
        app('log')->debug('Payment pending: '.$event->pendingPayment->address);
    }
}
