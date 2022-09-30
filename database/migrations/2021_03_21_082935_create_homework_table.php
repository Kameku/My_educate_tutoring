<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homework', function (Blueprint $table) {
            $table->id();
            $table->string('homework_name');
            $table->string('answer_homework')->nullable();
            $table->string('tutor_name');
            $table->string('student_name');
            $table->string('delivery');
            $table->string('observations');


            $table->bigInteger('atten_id')->unsigned()->nullable();
            $table->foreign('atten_id')->references('id')->on('attens');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homework');
    }
}
