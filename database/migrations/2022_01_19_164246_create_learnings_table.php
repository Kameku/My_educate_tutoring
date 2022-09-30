<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningsTable extends Migration
{
    
    public function up()
    {
        Schema::create('learnings', function (Blueprint $table) {
            $table->id();
            $table ->string('learning_name');
            $table->bigInteger('concept_detail_id')->unsigned()->nullable();
            $table->foreign('concept_detail_id')->references('id')->on('concept_details');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('learnings');
    }
}
