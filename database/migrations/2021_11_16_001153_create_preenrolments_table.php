<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreenrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preenrolments', function (Blueprint $table) {
            $table->id();
            
            $table->string('first_name');
            $table->string('last_name');
            $table->string('school_year');
            $table->string('school_name');
            $table->string('date_of_birth');
            
            $table->string('parent_name');
            $table->string('parent_mobile');
            $table->string('parent_email');
            $table->string('questions', 1200)->nullable();

            $table->string('check')->nullable();
            
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
        Schema::dropIfExists('preenrolments');
    }
}
