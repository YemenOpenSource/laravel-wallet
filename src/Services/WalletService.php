<?php

namespace YemeniOpenSource\LaravelWallet\Services;

class WalletService
{
    public function addingTransactionTypes()
    {
        return config('wallet.adding_transaction_types', []);
    }

    public function subtractingTransactionTypes()
    {
        return config('wallet.subtracting_transaction_types', []);
    }

    public function autoRecalculationActive()
    {
        return config('auto_recalculate_balance', false);
    }
}
