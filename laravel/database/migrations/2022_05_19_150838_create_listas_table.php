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
        Schema::create('listas', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('')->nullable();
            $table->string('description')->default('');
            $table->boolean('public')->default(false);
            $table->string('username')->unsigned();
            $table->integer('user_list_count');
            $table->string('contentId')->default("[]");
            $table->boolean('visible')->default(true);
            $table->timestamps();

            $table->foreign('username')->references('username')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listas');
    }
};
