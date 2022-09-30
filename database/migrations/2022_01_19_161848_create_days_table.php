<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysTable extends Migration
{
    
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->string('day_name');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('days');
    }
}
