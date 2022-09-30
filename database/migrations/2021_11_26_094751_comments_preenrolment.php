<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommentsPreenrolment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_preenrolment', function (Blueprint $table) {

            $table->id();
            
            // $table->string('creator', 60)->nullable();
            $table->longText('comment')->nullable();
            $table->bigInteger('preenrolment_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('preenrolment_id')->references('id')->on('preenrolments')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_preenrolment');
    }
}
