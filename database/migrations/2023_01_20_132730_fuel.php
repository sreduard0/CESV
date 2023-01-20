<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fuel extends Migration
{

    public function up()
    {
        Schema::create('fuel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_vtr');
            $table->string('id_ficha', 255);
            $table->string('id_mission', 3);
            $table->string('ebplaca', 255);
            $table->integer('ton');
            $table->integer('vol');
            $table->integer('status');
            $table->text('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('viatura');

    }
}
