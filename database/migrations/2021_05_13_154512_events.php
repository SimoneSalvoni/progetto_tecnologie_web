<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Events extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->index();
            $table->string('descrizione');
            $table->string('luogo');
            $table->string('urlluogo');
            //AGGIUNTA DI UN CAMPO REGIONE PER SEMPLIFICARE LA RICERCA
            $table->string('regione');
            // Metto come formato della data string almeno non si hanno problemi con mese e anno
            $table->string('data');
            $table->string('immagine');
            $table->float('costo');
            $table->integer('sconto')->nullable();
            $table->integer('giornisconto')->nullable();
            $table->integer('bigliettivenduti')->default(0);
            $table->integer('bigliettitotali')->default(0);
            $table->float('incassototale')->default(0);
            $table->integer('parteciperò')->default(0);
            //CAPIRE COME TRATTARE IL NOME ORGANIZZAZIONE
            $table->string('nomeorganizzazione');
            $table->string('emailorganizzatore');
            $table->foreign('emailorganizzatore')->references("email")->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('events');
    }

}
