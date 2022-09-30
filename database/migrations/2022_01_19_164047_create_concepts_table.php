<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConceptsTable extends Migration
{
   
    public function up()
    {
        Schema::create('concepts', function (Blueprint $table) {
            $table->id();
            $table->string('concept_name');
            $table->bigInteger('library_id')->unsigned()->nullable();
            $table->timestamps();
            
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('concepts');
    }
}
