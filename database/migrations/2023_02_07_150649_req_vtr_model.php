<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReqVtrModel extends Migration
{
    public function up()
    {
        Schema::create('request_vtr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rank', 10);
            $table->string('name', 255);
            $table->string('mission', 255);
            $table->dateTime('date_part');
            $table->string('destiny', 255);
            $table->string('contact', 255);
            $table->integer('qtd_mil');
            $table->text('obs')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_vtr');

    }
}
