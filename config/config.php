<?php
use YemeniOpenSource\LaravelWallet\Models\Wallet;
use YemeniOpenSource\LaravelWallet\Models\Transaction;

return [
    /*
    |--------------------------------------------------------------------------
    | Prefix
    |--------------------------------------------------------------------------
    |
    | This value is the prefix value of your wallet tables. This value should
    | changed before migrating the database. Laravel Wallet models uses this 
    | prefix.
    |
    */
    'prefix' => 'lw_',

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
