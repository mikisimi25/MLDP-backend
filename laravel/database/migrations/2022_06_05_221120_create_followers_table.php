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
        Schema::create('followers', function (Blueprint $table) {
            $table->bigInteger('user_requested_id')->unsigned();
            $table->bigInteger('user_reciever_id')->unsigned();
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
        Schema::dropIfExists('followers');
    }
};
