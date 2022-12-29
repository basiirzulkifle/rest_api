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
        Schema::create('link_user_achievement', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->foreign('user_id', 'user_id_fk_7650519')->references('user_id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('achievement_id');
            $table->foreign('achievement_id', 'achievement_id_fk_7650518')->references('achievement_id')->on('achievement')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('link_user_achievement');
    }
};
