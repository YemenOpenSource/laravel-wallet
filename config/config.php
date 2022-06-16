<?php
use YemeniOpenSource\LaravelWallet\Models\Wallet;
use YemeniOpenSource\LaravelWallet\Models\Transaction;

return [
    /**
     * Change this if you need to modify the default Wallet Model name.
     */
    'wallet_model' => Wallet::class,

    /**
     * Change this if you need to modify the default Transaction Model name.
     */
    'transaction_model' => Transaction::class,

    /**
     * Transaction types that are added from the wallet balance.
     * All amounts will be converted to a positive value
     */
    'adding_transaction_types' => ['deposit', 'refund'],

    /**
     * Transaction types that are subtracted from the wallet balance.
     * All amounts will be converted to a negative value
     */
    'subtracting_transaction_types' => ['withdraw', 'payout'],
];
