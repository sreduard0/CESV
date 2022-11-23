<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drivers extends Migration
{

    public function up()
    {
        Schema::create('driver', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pg', 8);
            $table->string('name', 255);
            $table->string('cat', 6);
            $table->string('cnh', 255);
            $table->string('idt_mil', 255);
            $table->date('val_cnh');
            $table->string('contact', 255);
            $table->string('full_name', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }
    public function down()
    {
        Schema::dropIfExists('driver');
    }
}
