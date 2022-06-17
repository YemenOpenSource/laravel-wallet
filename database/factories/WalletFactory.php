<?php

namespace YemeniOpenSource\LaravelWallet\Database\Factories;

use YemeniOpenSource\LaravelWallet\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class WalletFactory extends Factory
{
    protected $model = Wallet::class;

    public function definition()
    {
        return [
            'balance' => mt_rand(11, 999999) / 1000,
        ];
    }
}

