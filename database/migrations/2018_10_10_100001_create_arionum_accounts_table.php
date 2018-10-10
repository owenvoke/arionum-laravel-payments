<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateArionumAccountsTable
 */
class CreateArionumAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arionum_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->string('public_key');
            $table->string('private_key');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arionum_accounts');
    }
}
