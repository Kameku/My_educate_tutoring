<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class commentsEnquiry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_enquiry', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('creator')->nullable();
            $table->string('comment', 700)->nullable();
            
            $table->bigInteger('enquiry_id')->unsigned();
            $table->string('users_avatar')->nullable();


            $table->timestamps();


            $table->foreign('enquiry_id')->references('id')->on('enquirys');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_enquiry');
    }
}
