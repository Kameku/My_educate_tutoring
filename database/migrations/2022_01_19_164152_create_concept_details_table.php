<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptDetailsTable extends Migration
{
    
    public function up()
    {
        Schema::create('concept_details', function (Blueprint $table) {
            
            $table->id();
            $table->string('concept_detail_name');
            $table->bigInteger('concept_id')->unsigned()->nullable();
            $table->foreign('concept_id')->references('id')->on('concepts');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('concept_details');
    }
}
