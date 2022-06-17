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
        $wallet = Wallet::factory()->make();

        $this->assertNotNull($wallet->balance);
    }
}
