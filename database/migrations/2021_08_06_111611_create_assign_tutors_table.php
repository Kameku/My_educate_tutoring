<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_tutors', function (Blueprint $table) {
            $table->id();
            $table->string('tutor_name');
            $table->string('student_name');
            $table->string('subject');
            $table->timestamps();

            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students');

            // $table->bigInteger('subject_id')->unsigned()->nullable();
            // $table->foreign('subject_id')->references('id')->on('libraries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_tutors');
    }
}
