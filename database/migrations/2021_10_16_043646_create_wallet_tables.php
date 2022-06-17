<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = config('wallet.prefix');

        if (!Schema::hasTable($prefix . 'wallets')) {
            Schema::create($prefix . 'wallets', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('owner_id')->nullable();
                $table->string('owner_type')->nullable();
                $table->decimal('balance', 12, 4)->default(0)->comment('dollar.cents');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prefix = config('wallet.prefix');

        Schema::dropIfExists($prefix . 'wallets');
    }
}
