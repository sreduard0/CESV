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
            $table->integer('id_ficha');
            $table->integer('id_mission');
            $table->integer('id_mot');
            $table->integer('qnt_released')->nullable();
            $table->integer('status');
            $table->integer('od');
            $table->string('destiny', 255);
            $table->string('request_by', 255);
            $table->string('autorized_by', 255)->nullable();
            $table->string('code_auth', 255)->nullable();
            $table->text('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fuel');

    }
}
