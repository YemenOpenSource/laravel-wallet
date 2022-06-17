<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = config('wallet.prefix');

        if (!Schema::hasTable($prefix . 'transactions')) {
            Schema::create($prefix . 'transactions', function (Blueprint $table) use ($prefix) {
                $table->increments('id');
                $table->unsignedBigInteger('wallet_id');
                $table->decimal('amount', 12, 4)->comment('dollar.cents');
                $table->string('hash', 60)->comment('unique for each transaction');
                $table->enum('type', [config('wallet.adding_transaction_types'), config('wallet.subtracting_transaction_types')])->comment('deposite, withdraw or any configured type');
                $table->json('meta')->nullable()->comment('any description');
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('wallet_id')->references('id')->on($prefix . 'wallets')->onDelete('cascade');
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

        Schema::dropIfExists($prefix . 'transactions');
    }
}
