<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->index();
            $table->string('descrizione', 2000);
            $table->string('programma', 1000)->default('')->nullable();
            $table->longText('urlluogo');
            $table->string('regione');
            $table->string('provincia');
            $table->string('indirizzo');
            $table->string('numciv');
            $table->string('città');
            $table->string('data');
            $table->string('orario');
            $table->string('immagine');
            $table->float('costo');
            $table->integer('sconto')->nullable();
            $table->integer('giornisconto')->nullable();
            $table->integer('bigliettivenduti')->default(0);
            $table->integer('bigliettitotali')->default(0);
            $table->float('incassototale')->default(0);
            $table->integer('parteciperò')->default(0);
            $table->string('comeraggiungerci', 1000)->default('')->nullable();
            $table->string('nomeorganizzatore');
            $table->foreign('nomeorganizzatore')->references('organizzazione')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
