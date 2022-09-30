<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            
            $table->id();
            $table->string('type');
            $table->string('tutor');
            $table->string('student');

            $table->bigInteger('timezone_id')->unsigned();
            $table->bigInteger('day_id')->unsigned();
            $table->bigInteger('room_id')->unsigned();

            $table->timestamps();

            $table->foreign('timezone_id')->references('id')->on('timezones');
            $table->foreign('day_id')->references('id')->on('days');
            $table->foreign('room_id')->references('id')->on('rooms');
            



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
