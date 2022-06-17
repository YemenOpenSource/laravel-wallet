<?php

namespace YemeniOpenSource\LaravelWallet\Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use YemeniOpenSource\LaravelWallet\Tests\TestCase;
use YemeniOpenSource\LaravelWallet\Models\Wallet;

class WalletTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function a_wallet_has_a_owner_id()
    {
        $wallet = Wallet::factory()->make();

        $this->assertEquals($wallet->owner_id, 0);
    }
    
    /** @test */
    function a_wallet_has_a_owner_type()
    {
        $wallet = Wallet::factory()->make();

        $this->assertNull($wallet->owner_type);
    }
    
    /** @test */
    function a_wallet_has_a_balance()
    {
        $rand_balance = mt_rand(11, 999999) / 1000;
        $wallet = Wallet::factory()->make(['balance' => $rand_balance]);

        $this->assertEquals($rand_balance, $wallet->balance);
    }
    
    /** @test */
    function a_wallet_balance_is_positive()
    {
        $wallet = Wallet::factory()->make();

        $this->assertGreaterThanOrEqual(0, $wallet->balance);
    }
}
