<?php

namespace YemeniOpenSource\LaravelWallet\Services;

class WalletService
{
    public static function addingTransactionTypes()
    {
        return config('wallet.adding_transaction_types', []);
    }

    public static function subtractingTransactionTypes()
    {
        return config('wallet.subtracting_transaction_types', []);
    }

    public static function autoRecalculationActive()
    {
        return config('auto_recalculate_balance', false);
    }
}
