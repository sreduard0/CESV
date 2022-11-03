<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Missions extends Migration
{

    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_mission',3);
            $table->string('mission_name',255);
            $table->string('destiny',255);
            $table->string('class',10);
            $table->integer('vtr');
            $table->string('doc',255);
            $table->string('origin',255);
            $table->integer('status');
            $table->string('pg_mot',6);
            $table->string('name_mot',255);
            $table->string('pg_seg',6);
            $table->string('name_seg',255);
            $table->datetime('prev_date_part');
            $table->datetime('prev_date_chgd');
            $table->string('contact',13);
            $table->text('obs')->nullable();
            $table->datetime('finish_mission');
            $table->integer('od_ini')->nullable();
            $table->integer('od_fin')->nullable();
            $table->integer('cons_gas')->nullable();
            $table->integer('cons_diesel')->nullable();
            $table->integer('peso')->nullable();
            $table->integer('vol')->nullable();
            $table->integer('alteration')->nullable();
            $table->text('obs_alteration')->nullable();
            $table->string('email_relat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
