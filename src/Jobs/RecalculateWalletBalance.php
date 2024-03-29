<?php

namespace YemeniOpenSource\LaravelWallet\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use YemeniOpenSource\LaravelWallet\Models\Wallet;

class RecalculateWalletBalance implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $wallet;

    const CACHE_PREFIX = 'recalculate:wallet:';


    /**
     * Create a new job instance.
     *
     * @param  Wallet  $wallet
     * @return void
     */
    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->wallet->actualBalance(true);
    }

    public function getCacheKey($name = null)
    {
        return $this->buildCacheKey($this->wallet, $name);
    }

    public static function buildCacheKey(Wallet $wallet, $name = null)
    {
        $base = static::CACHE_PREFIX;
        $base .= $wallet ? $wallet->id : '';
        return $base .= $name ? ':' . $name : '';
    }
}
