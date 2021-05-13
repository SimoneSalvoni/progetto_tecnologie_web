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
            $table->id()->primary();
            $table->string('emailutente');
            $table->bigInteger('idevento');
            $table->string('nomeevento');
            $table->integer('numerobiglietti');
            $table->float('costototale');
            $table->date('data');
            $table->foreign('emailutente')->references('email')->on('users');
            $table->foreign('idevento')->references('id')->on('events');
            $table->foreign('nomeevento')->references('nome')->on('evento');
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
