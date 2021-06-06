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
            $table->increments('id');
            $table->string('nomeutente');
            $table->unsignedInteger('idevento');
            $table->string('nomeevento');
            $table->integer('numerobiglietti');
            $table->float('costototale');
            $table->date('data');
            $table->foreign('nomeutente')->references('nomeutente')->on('users')->onDelete('cascade')->onUpdate('cascade');
            //Non sono così sicuro della chiave esterna con evento perchè la relazione è "0 a uno"
            $table->foreign('idevento')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
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
