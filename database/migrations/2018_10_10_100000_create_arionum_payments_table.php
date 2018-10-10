<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateArionumPaymentsTable
 */
class CreateArionumPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arionum_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('order_id')->nullable()->default(null);
            $table->string('address');
            $table->boolean('paid')->default(false);
            $table->float('value')->default(0);
            $table->float('received')->default(0);
            $table->string('transaction_id')->nullable();
            $table->integer('confirmations')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arionum_payments');
    }
}
