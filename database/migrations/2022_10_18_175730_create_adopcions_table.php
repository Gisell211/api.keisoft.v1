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
        Schema::create('adopcions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('especie_id');
            $table->unsignedBigInteger('fundacion_id');
           
            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');

             $table->foreign('especie_id')
            ->references('id')->on('especies')
            ->onDelete('cascade');
       

             $table->foreign('fundacion_id')
            ->references('id')->on('fundacions')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adopcions');
    }
};
