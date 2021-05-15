<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Purchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('emailutente');
            $table->bigInteger('idevento')->unsigned();
            $table->string('nomeevento');
            $table->integer('numerobiglietti');
            $table->float('costototale');
            $table->date('data');
            $table->foreign('emailutente')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idevento')->references('id')->on('events')->onUpdate('cascade');
            $table->foreign('nomeevento')->references('nome')->on('events')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
