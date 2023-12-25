<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskProductsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('06_task_products_histories', function (Blueprint $table) {
            $table->id();
            $table->string('rate') -> nullable();
            $table->string('ratings') -> nullable();
            $table->string('title') -> nullable();
            $table->string('price') -> nullable();
            $table->text('img') -> nullable();
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
        Schema::dropIfExists('task_products_histories');
    }
}
