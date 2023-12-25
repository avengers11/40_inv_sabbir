<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('03_user_recharges', function (Blueprint $table) {
            $table->id();
            $table->text('number') -> nullable();
            $table->text('amount') -> nullable();
            $table->text('userID') -> nullable();
            $table->text('orderID') -> nullable();
            $table->text('method') -> nullable();
            $table->text('tranx') -> nullable();
            $table->text('type') -> nullable();
            $table->text('st') -> nullable();
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
        Schema::dropIfExists('user_recharges');
    }
}
