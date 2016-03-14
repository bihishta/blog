<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('from_user')->unsigned();
            $table->foreign('from_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('to_user')->unsigned();
            $table->foreign('to_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')->references('id')->on('albums')->onDelete('cascade');
            $table->integer('image_id')->unsigned();
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
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
        Schema::drop('shared');
    }
}
