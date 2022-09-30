<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_plans', function (Blueprint $table) {
            $table->id();

            $table->string('subject_name')->nullable();
            $table->string('concept_name')->nullable();
            $table->string('conceptDetail')->nullable();
            $table->string('learningActivity')->nullable();
            $table->bigInteger('atten_id')->unsigned();
            $table->timestamps();

            $table->foreign('atten_id')->references('id')->on('attens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learning_plans');
    }
}
