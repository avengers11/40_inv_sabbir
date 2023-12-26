<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('01_user_account', function (Blueprint $table) {
            $table->id();
            // acc data
            $table->string('fName')->default('fName');
            $table->string('lName')->default('lName');
            $table->string('userName')->default('userName');
            $table->string('mobileNumber')->default('mobileNumber');
            $table->string('email')->default('email');
            $table->string('password')->default('password');
            $table->string('csrf')->default('csrf');
            $table->string('picture')->default('');
            // account details
            $table->string('totalAmount')->default('00');
            $table->string('todaysAmount')->default('00');
            $table->string('bonusAmount')->default('00');
            $table->string('refreshDay')->default('00');
            $table->string('nextWithdraw')->default('00');
            $table->string('thisMonth')->nullable();
            // gen
            $table->string('invite')->nullable();
            $table->string('gen1st')->nullable();
            $table->string('gen2nd')->nullable();
            $table->string('gen3rd')->nullable();
            $table->string('gen4th')->nullable();
            $table->string('gen5th')->nullable();
            // st
            $table->string('vipBase')->default('VIP0');
            $table->string('uniqeID')->default('default');
            $table->string('accSt')->default('active');
            $table->string('online_time')->default('00');
            $table->string('task')->default('0');
            // total
            $table->string('referCommission')->default('00');
            $table->string('totalDeposit')->default('00');
            $table->string('totalWithdraw')->default('00');
            $table->string('totalTeamRevenue')->default('00');
            $table->string('totalTaskIncome')->default('00');
            // addresh
            $table->string('village_word')->default('unknown');
            $table->string('city')->default('CANADA');
            $table->string('postcode')->default('0000');
            $table->string('country')->default('USA');
            // income
            $table->string('todayIncome')->default('00');
            $table->string('easterdayIncome')->default('00');
            $table->string('todayRaferIncome')->default('00');
            $table->string('easterdayRaferIncome')->default('00');
            $table->string('todaysRechargeIncome')->default('00');
            $table->string('easterdayRechargeIncome')->default('00');
            // account settings
            // bdt
            $table->string('acc_bdt_method')->default('00');
            $table->string('acc_bdt_number')->default('00');
            $table->string('acc_bdt_name')->default('00');
            // usdt
            $table->string('acc_usdt_method')->default('00');
            $table->string('acc_usdt_address')->default('00');
            $table->string('acc_usdt_name')->default('00');

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
        Schema::dropIfExists('users');
    }
}
