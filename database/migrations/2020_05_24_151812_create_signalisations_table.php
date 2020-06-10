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
            $table->string('desc');
            $table->string('localisation');
            $table->string('photo');
            $table->string('lieu');
            $table->string('nature');
            $table->string('cause');
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
