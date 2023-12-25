<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedeemCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('13_redeem_codes', function (Blueprint $table) {
            $table->id();
            $table->string('amount') -> default('00');
            $table->string('redeem_code') -> nullable();
            $table->string('type') -> nullable();
            $table->string('st') -> default('st');
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
        Schema::dropIfExists('redeem_codes');
    }
}
