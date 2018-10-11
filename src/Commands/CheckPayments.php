<?php

namespace pxgamer\ArionumLaravel\Commands;

use Illuminate\Console\Command;
use pxgamer\ArionumLaravel\Events\PaymentConfirmed;
use pxgamer\ArionumLaravel\Events\PaymentPending;
use pxgamer\ArionumLaravel\Facades\Arionum;
use pxgamer\ArionumLaravel\Models\Account;
use pxgamer\ArionumLaravel\Models\Payment;

/**
 * Class CheckPayments
 */
class CheckPayments extends Command
{
    /**
     * @var string
     */
    protected $signature = 'arionum:check-payments';

    /**
     * @var string
     */
    protected $description = 'Check for Arionum payments';

    /**
     * Handle the command.
     */
    public function handle()
    {
        $this->checkPayments();
    }

    /**
     * Check payments for all current accounts.
     */
    private function checkPayments()
    {
        $accounts = Account::all();

        foreach ($accounts as $account) {
            // Retrieve transactions from the node
            $transactions = Arionum::getTransactions($account->address);
            $transactions = array_filter($transactions, function ($transaction) {
                return $transaction->type === 'credit';
            });
            $transactions = array_values($transactions);

            $this->checkUnpaid($transactions);

            $this->checkPrepayments($transactions);
        }
    }

    /**
     * Check payments which have no transaction.
     * @param array $transactions
     */
    private function checkUnpaid(array $transactions)
    {
        $unpaidPayments = Payment::unpaid()->get();
        /** @var Payment $unpaidPayment */
        foreach ($unpaidPayments as $unpaidPayment) {
            /** @var \stdClass $transaction */
            foreach ($transactions as $transaction) {
                $unpaidPayment->transaction_id = $transaction->id;
                $unpaidPayment->received = $transaction->val;
                $unpaidPayment->save();

                event(new PaymentPending($unpaidPayment));
            }
        }
    }

    /**
     * Check payments which are paid, but do not have enough confirmations
     * @param array $transactions
     */
    private function checkPrepayments(array $transactions): void
    {
        $prepayments = Payment::unconfirmed()->get();
        /** @var Payment $prepayment */
        foreach ($prepayments as $prepayment) {
            $key = array_search($prepayment->transaction_id, array_column($transactions, 'id'));

            if ($key !== false) {
                $transaction = $transactions[$key];
                $prepayment->confirmations = $transaction->confirmations;

                if ($prepayment->confirmations <= config('arionum.confirmations')) {
                    event(new PaymentPending($prepayment));
                }

                // Confirm payment if there are enough confirmations
                if ($prepayment->confirmations >= config('arionum.confirmations')) {
                    $prepayment->paid = true;

                    event(new PaymentConfirmed($prepayment));
                }

                $prepayment->save();
            }
        }
    }
}
