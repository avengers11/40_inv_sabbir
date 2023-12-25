<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('02_user_packages', function (Blueprint $table) {
            $table->id();
            $table->string('img') -> default('default.png');
            $table->string('pk_name') -> default('VIP0');
            $table->string('task') -> default('00');
            $table->string('commission') -> default('100');
            $table->string('amount') -> default('5');
            $table->string('expired_date') -> default('0.2');
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
        Schema::dropIfExists('user_packages');
    }
}
