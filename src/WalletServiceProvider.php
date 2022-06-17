<?php

namespace YemeniOpenSource\LaravelWallet;

use Illuminate\Support\ServiceProvider;
use YemeniOpenSource\LaravelWallet\Models\Transaction;
use YemeniOpenSource\LaravelWallet\Models\Wallet;
use YemeniOpenSource\LaravelWallet\Observers\TransactionObserver;
use YemeniOpenSource\LaravelWallet\Observers\WalletObserver;
use YemeniOpenSource\LaravelWallet\Services\WalletService;

class WalletServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('wallet.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations/' => database_path('migrations/'),
            ], 'migrations');
        }

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        (Wallet::class)::observe(WalletObserver::class);
        (Transaction::class)::observe(TransactionObserver::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'wallet');

        $this->app->singleton('wallet', function () {
            return new WalletService;
        });
    }
}
