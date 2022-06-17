<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPolymorphicRelationToTransactionsTable extends Migration
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
            $table->string('reference_type')->nullable()->after('wallet_id');
        });
        Schema::table($prefix . 'transactions', function (Blueprint $table) use ($prefix) {
            $table->unsignedBigInteger('reference_id')->nullable()->after('wallet_id');
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

        Schema::table($prefix . 'transactions', function (Blueprint $table) {
            $table->dropColumn(['reference_type']);
        });
        Schema::table($prefix . 'transactions', function (Blueprint $table) {
            $table->dropColumn(['reference_id']);
        });
    }
}
