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
            $table->string('emailutente');
            $table->unsignedBigInteger('idevento');
            $table->primary(['emailutente','idevento']);
            $table->foreign('emailutente')->references('email')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
