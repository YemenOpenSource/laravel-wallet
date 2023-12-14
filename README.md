[![Stand With Palestine](https://raw.githubusercontent.com/TheBSD/StandWithPalestine/main/banner-no-action.svg)](https://TheBSD.github.io/StandWithPalestine/)

![Laravel Wallet](./images/yos-laravel-wallet.svg)

<div style="text-align: center;">

[![Laravel Unit Test](https://github.com/Yemeni-Open-Source/laravel-wallet/actions/workflows/laravel-unit-test.yml/badge.svg)](https://github.com/Yemeni-Open-Source/laravel-wallet/actions/workflows/laravel-unit-test.yml)
![Packagist Downloads](https://img.shields.io/packagist/dt/Yemeni-Open-Source/laravel-wallet?color=blue&label=Downloads&logo=packagist&logoColor=white)
![Packagist Version](https://img.shields.io/packagist/v/Yemeni-Open-Source/laravel-wallet?color=green&label=Version&logo=laravel&logoColor=white)
![GitHub](https://img.shields.io/github/license/Yemeni-Open-Source/laravel-wallet?logo=Open%20Source%20Initiative&label=License&logoColor=white&color=blueviolet)
[![StandWithPalestine](https://raw.githubusercontent.com/TheBSD/StandWithPalestine/main/badges/StandWithPalestine.svg)](https://github.com/TheBSD/StandWithPalestine/blob/main/docs/README.md)


</div>

# Laravel Wallet

Laravel wallet is a package with expressive pronounced syntax that provide top-notch development covering deposits, withdrawals, transactions and balances all quite simply.

## Requirments

This package is tested with Laravel v8 it my not work on Laravel v7 or v6 or v5

|Software|Version|
|-|-|
| php | ^7.3 &#124; ^8.0 &#124; ^8.1 &#124; ^8.2 |
| Composer | ^2.3 |
| Laravel | ^8.0 &#124; ^9.0 &#124; ^10.0 |

## Installation

Install the package by using composer:

```sh
composer require yemenopensource/laravel-wallet
```

## Configure Your Needs

You can scape this step if you want to use default configuration, but you can publish wallet configuration by running:

```sh
php artisan vendor:publish --provider="YemeniOpenSource\LaravelWallet\WalletServiceProvider" --tag=config
```

This will merge the ```config/wallet.php``` config file to your root ```config``` directory. You are free to modify it before migrating the database.

## Database Migrations

After that install the wallet tables

```sh
php artisan migrate
```

If you want to add your customization, publish the migrations:

```sh
php artisan vendor:publish --provider="YemeniOpenSource\LaravelWallet\WalletServiceProvider" --tag=migrations
```

Laravel will use the publish migrations at ```database/migrations```.

## Setup

Add the ```HasWallet``` trait to any model which you want to add the wallet functionality of it, for example ```User``` model.

```php
use YemeniOpenSource\LaravelWallet\Traits\HasWallet;

class User extends Model
{
    use HasWallet;

    //...
}
```

## Basic Usage

You can create wallet and transactions for your ```User``` model as an example mentioned above.

```php

// The wallet balance initially will be [0]
$user = User::first();
$user->wallet->balance; // 0

// This will add to the wallet balance as passed amount.
$user->wallet->deposit(643.646);
$user->wallet->balance; // 643.6460

// This will subtract from the wallet balance as passed amount.
$user->wallet->withdraw(168.545);
$user->wallet->balance; // 475.1010

// It will throw [UnacceptedTransactionException] exception if passed amount greater wallet balance 
$user->wallet->withdraw(500);
$user->wallet->balance; // UnacceptedTransactionException

// If you want to force withdraw, use [forceWithdraw]
$user->wallet->forceWithdraw(500);
$user->wallet->balance; // -24.8990
```

## Advanced Usage

You can easily add meta information to the transactions to suit your needs. For example:

```php
$user = User::first();
$user->wallet->deposit(100, ['currency' => 'USD', 'bank' => 'TEST BANK']);
$user->wallet->withdraw(64, ['currency' => 'USD', 'description' => 'Purchase of Item #101']);
$user->wallet->withdraw(64, ['currency' => 'USD', 'transfer' => 'Western union tracking number #101']);
```

## Credits

[Digital money vector created by fullvector - www.freepik.com](https://www.freepik.com/vectors/digital-money)

## Credits

The MIT License (MIT). Please see [MIT license](LICENSE) File for more information.
