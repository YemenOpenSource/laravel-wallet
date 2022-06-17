<?php

namespace YemeniOpenSource\LaravelWallet\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \YemeniOpenSource\LaravelWallet\Models\Wallet
 */
class WalletFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wallet';
    }
}
