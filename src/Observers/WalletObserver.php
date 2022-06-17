<?php

namespace YemeniOpenSource\LaravelWallet\Observers;

use YemeniOpenSource\LaravelWallet\Models\Wallet;
use YemeniOpenSource\LaravelWallet\Jobs\RecalculateWalletBalance;
use YemeniOpenSource\LaravelWallet\Services\WalletService;

class WalletObserver
{
    public function saved(Wallet $wallet)
    {
        if (
            $wallet->isDirty('balance')
            && WalletService::autoRecalculationActive()
        ) {
            RecalculateWalletBalance::dispatch($wallet);
        }
    }
}
