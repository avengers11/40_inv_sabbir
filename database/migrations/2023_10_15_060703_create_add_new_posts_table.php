<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddNewPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('15_add_new_posts', function (Blueprint $table) {
            $table->id();
            $table->string("userID") -> nullable();
            $table->string("content") -> nullable();
            $table->string("style") -> nullable();
            $table->string("img") -> nullable();
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
        Schema::dropIfExists('add_new_posts');
    }
}
