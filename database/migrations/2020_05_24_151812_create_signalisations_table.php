<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignalisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signalisations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('desc')->nullable();
            $table->string('localisation')->nullable();
            $table->string('lieu')->nullable();
            $table->string('nature')->nullable();
            $table->string('cause')->nullable();
            $table->boolean('intervention');
            $table->boolean('etat');
            $table->unsignedInteger('nbr_signe')->nullable();
            $table->unsignedInteger('nbr_comment')->nullable();
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
        Schema::dropIfExists('signalisations');
    }
}
