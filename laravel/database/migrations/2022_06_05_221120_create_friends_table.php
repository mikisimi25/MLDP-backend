<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friends', function (Blueprint $table) {
            $table->integer('user_requested_id')->unsigned();
            $table->integer('user_reciever_id')->unsigned();
            $table->boolean('accepted')->default(false);
            $table->timestamps();

            $table->primary(['user_requested_id', 'user_reciever_id']);
            $table->foreign('user_requested_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_reciever_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
};
