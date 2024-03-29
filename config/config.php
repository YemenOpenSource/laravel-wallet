<?php

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
    'prefix' => 'yos_lw_',

    /*
    |--------------------------------------------------------------------------
    | Added Transactions
    |--------------------------------------------------------------------------
    |
    | This value is for transaction types that are added from the wallet
    | balance. All amounts will be converted to a positive value.
    |
    */
    'adding_transaction_types' => ['deposit', 'refund', 'received'],

    /*
    |--------------------------------------------------------------------------
    | Added Transactions
    |--------------------------------------------------------------------------
    |
    | This value is for transaction types that are subtracted from the wallet
    | balance. All amounts will be converted to a negative value.
    |
    */
    'subtracting_transaction_types' => ['withdraw', 'payout'],

    /*
    |--------------------------------------------------------------------------
    | Activate automatic recalculation
    |--------------------------------------------------------------------------
    |
    | This value is to activate recalculation of the wallet balance job which
    | will recalculate the balance of the wallet from the transaction history
    | after wallet balance has changed to ensure correct value.
    |
    */
    'auto_recalculate_balance' => env('WALLET_AUTO_RECALCULATE_BALANCE', false),

    /*
    |--------------------------------------------------------------------------
    | Throwing Exception for Insufficient Balance
    |--------------------------------------------------------------------------
    |
    | This value is to disable exception handling when the request withdraw
    | amount is greater than current user balance on his wallet, if you
    | disabled the exception handling, the withdraw process will not proceeded
    | and the return will be false the balance will stay as is. default value
    | is false.
    |
    */
    'disable_insufficient_exception' => env('WALLET_DISABLE_INSUFFICIENT_EXCEPTION', false),
];
