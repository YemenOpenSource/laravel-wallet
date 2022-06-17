<?php

namespace YemeniOpenSource\LaravelWallet\Traits;

use YemeniOpenSource\LaravelWallet\Models\Transaction;
use YemeniOpenSource\LaravelWallet\Models\Wallet;

trait HasWallet
{
    /**
     * Retrieve the balance of this user's wallet
     */
    public function getBalanceAttribute()
    {
        return $this->wallet->refresh()->balance;
    }

    /**
     * Retrieve the wallet of this user
     */
    public function wallet()
    {
        return $this->morphOne(Wallet::class, 'owner')->withDefault();
    }

    /**
     * Retrieve all transactions of this user
     */
    public function walletTransactions()
    {
        return $this->hasManyThrough(
            Transaction::class,
            Wallet::class,
            'owner_id',
            'wallet_id'
        )->whereHas('wallet', function ($query) {
            $query->whereNull('deleted_at');
        })->latest();
    }

}
