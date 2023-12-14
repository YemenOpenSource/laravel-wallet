<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateWalletTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = config('wallet.prefix');

        Schema::table($prefix . 'transactions', function (Blueprint $table) use ($prefix) {
            $table->integer('origin_id')->unsigned()->nullable();
            $table->foreign('origin_id')->references('id')->on($prefix . 'transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $prefix = config('wallet.prefix');

        if (DB::getDriverName() !== 'sqlite') {
            Schema::table($prefix . 'transactions', function (Blueprint $table) {
                $table->dropForeign(['origin_id']);
            });
        }

        Schema::table($prefix . 'transactions', function (Blueprint $table) {
            $table->dropColumn(['origin_id']);
        });

    }
}
