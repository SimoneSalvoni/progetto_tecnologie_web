<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Participations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeutente');
            $table->unsignedInteger('idevento');
            $table->unique(['nomeutente', 'idevento']);
            $table->foreign('nomeutente')->references('nomeutente')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idevento')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participations');
    }
}
