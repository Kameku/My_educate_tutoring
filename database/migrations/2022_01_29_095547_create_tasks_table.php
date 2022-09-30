<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('priority');
            $table->string('title');
            $table->longText('content');
            $table->string('group');
            $table->string('sing_to');
            $table->string('due_date');
            $table->string('status');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
