<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attens', function (Blueprint $table) {
            $table->id();
            $table->string('date_created');
            $table->string('time');
            $table->string('term');
            $table->string('lesson');
            $table->string('student_name');
            $table->string('subject_name')->nullable();
            $table->string('concept_name')->nullable();
            $table->string('conceptDetail')->nullable();
            $table->string('learningActivity')->nullable();
            $table->string('tutor_name');
            $table->string('tutor_evaluation')->nullable();
            $table->string('student_self')->nullable();
            $table->string('student_attendance');
            $table->string('homework_completed');
            $table->string('weekly_lesson');
            $table->string('homework_assignment');
            $table->string('email_school');
            $table->string('comment', 700)->nullable();
            $table->string('commentPrivate', 700)->nullable();
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
        Schema::dropIfExists('attens');
    }
}
