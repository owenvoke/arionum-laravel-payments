<?php

namespace pxgamer\ArionumLaravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Arionum
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
