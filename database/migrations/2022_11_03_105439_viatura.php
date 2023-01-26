<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Viatura extends Migration
{

    public function up()
    {
        Schema::create('viatura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nr_vtr');
            $table->string('mod_vtr', 255);
            $table->string('type_vtr', 3);
            $table->string('ebplaca', 255);
            $table->integer('ton');
            $table->integer('vol');
            $table->integer('status');
            $table->string('fuel', 255)->nullable();
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
