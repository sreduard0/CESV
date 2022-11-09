<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RelGda extends Migration
{
    public function up()
    {
        Schema::create('rel_gda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_veicle');
            $table->string('pg_mot', 6)->nullable();
            $table->string('name_mot', 255);
            $table->string('pg_seg', 6)->nullable();
            $table->string('name_seg', 255)->nullable();
            $table->string('idt', 15);
            $table->string('mod_veicle', 255);
            $table->string('placaeb', 15);
            $table->integer('passengers')->nullable();
            $table->string('destiny', 255)->nullable();
            $table->text('obs');
            $table->string('om', 255)->nullable();
            $table->integer('od_ent')->nullable();
            $table->integer('od_sai')->nullable();
            $table->datetime('hour_ent');
            $table->datetime('hour_sai');
            $table->integer('id_ficha')->nullable();
            $table->integer('id_vtr')->nullable();
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rel_gda');

    }
}
