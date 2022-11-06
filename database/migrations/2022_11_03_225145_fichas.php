<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Fichas extends Migration
{

    public function up()
    {
        Schema::create('fichas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nr_ficha',6);
            $table->string('pg_mot',6);
            $table->string('name_mot',255);
            $table->string('pg_seg',6)->nullable();
            $table->string('name_seg',255)->nullable();
            $table->string('nat_of_serv',255);
            $table->string('in_order',255);
            $table->integer('status');
            $table->integer('id_vtr');
            $table->integer('id_mission')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('fichas');
    }
}
