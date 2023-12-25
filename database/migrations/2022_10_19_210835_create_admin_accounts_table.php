<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('00_admin_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('logo.png');
            $table->string('title')->default('Best Income Site Ever');
            $table->string('admin_name')->default('Admin');
            $table->string('admin_username')->default('1');
            $table->string('admin_password')->default('1');
            $table->string('withdraw_charge')->default('10');
            $table->string('task_commission')->nullable();
            $table->string('refer_bonuse')->nullable();
            $table->string('refer_bonuse_info')->nullable();
            // contact
            $table->string('teligram_link')->nullable();
            $table->string('teligram_channel')->nullable();
            $table->string('telegram_agent')->nullable();
            $table->string('facebook_agent')->nullable();
            $table->string('whatsApp_agent')->nullable();

            // payment info deposit
            $table->string('bkash_number')->nullable();
            $table->string('nagad_number')->nullable();
            $table->string('rocket_number')->nullable();
            $table->string('usdt_address')->nullable();
            // payment info withdraw
            $table->string('withdraw_bkash_number')->nullable();
            $table->string('withdraw_nagad_number')->nullable();
            $table->string('withdraw_rocket_number')->nullable();
            $table->string('withdraw_usdt_address')->nullable();
            // min &max withdraw & deposit
            $table->string('minWithdraw')->default('5');
            $table->string('maxWithdraw')->default('10000');
            $table->string('minDeposit')->default('5');
            $table->string('maxDeposit')->default('10000');
            $table->string('nextWIthdraw')->default('00');
            $table->string('withdrawWithOutDeposi')->default('no');
            $table->string('offer_balance')->default('2');
            // recharge commission
            $table->string('depositGen1st')->default('5');
            $table->string('depositGen2nd')->default('4');
            $table->string('depositGen3rd')->default('3');
            $table->string('depositGen4th')->default('2');
            $table->string('depositGen5th')->default('1');
            // task gen
            $table->string('taskGen1st')->default('10');
            $table->string('taskGen2nd')->default('5');
            $table->string('taskGen3rd')->default('3');
            $table->string('taskGen4th')->default('2');
            $table->string('taskGen5th')->default('1');
            // notification
            $table->string('home_notification')->default('00');
            $table->text('company_info')->nullable();
            $table->string('withdraw_info')->default('withdraw_info');
            $table->string('deposit_info')->default('deposit_info');
            $table->string('task_info')->default('task_info');
            $table->string('dollar_rate')->default('100');

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
        Schema::dropIfExists('admin_accounts');
    }
}
