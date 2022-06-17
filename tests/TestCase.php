<?php

namespace YemeniOpenSource\LaravelWallet\Tests;

use YemeniOpenSource\LaravelWallet\WalletServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      WalletServiceProvider::class,
    ];
  }

  public function getEnvironmentSetUp($app)
  {
    // import the CreatePostsTable class from the migration
    include_once __DIR__ . '/../database/migrations/2021_10_16_043646_create_wallet_tables.php';

    // run the up() method of that migration class
    (new \CreateWalletTables)->up();
  }
}
