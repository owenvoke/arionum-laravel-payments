<?php

namespace pxgamer\ArionumLaravel\Facades;

use Illuminate\Support\Facades\Facade;
use pxgamer\Arionum\Transaction;

/**
 * Class Arionum
 *
 * @method static string getAddress(string $publicKey)
 * @method static string getBase58(string $data)
 * @method static string getBalance(string $address)
 * @method static string getPendingBalance(string $address)
 * @method static \stdClass[] getTransactions(string $address)
 * @method static \stdClass getTransaction(string $transactionId)
 * @method static string getPublicKey(string $address)
 * @method static \stdClass generateAccount()
 * @method static \stdClass getCurrentBlock()
 * @method static \stdClass getBlock(int $height)
 * @method static array getBlockTransactions(string $blockId)
 * @method static string getNodeVersion()
 * @method static string sendTransaction(Transaction $transaction)
 * @method static int getMempoolSize()
 * @method static int getRandomNumber(int $height, int $minimum, int $maximum, string $seed = null)
 * @method static array getMasternodes()
 * @method static string getAlias(string $address)
 * @method static string getNodeAddress()
 *
 * @see \pxgamer\Arionum\Arionum
 */
class Arionum extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'arionum';
    }
}
