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
        Schema::create('propobject', function (Blueprint $table) {
            $table->bigIncrements('propobject_id');
            $table->string('object_name');
            $table->integer('object_value');
            $table->string('object_location');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_7650518')->references('user_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('propobject');
    }
};
