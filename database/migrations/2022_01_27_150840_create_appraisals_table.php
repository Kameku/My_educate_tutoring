<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->id();
            $table->string('creator_name')->nullable();
            $table->string('assigned')->nullable();
            $table->string('appraisal_name')->nullable();
            $table->string('appraisal_answer')->nullable();
            $table->string('delivery_date')->nullable();
            $table->longText('observations')->nullable();
            $table->string('status')->nullable()->default('Pending');
            $table->string('employe_id')->nullable();

            $table->string('mime')->nullable();
            // $table->string('name_hash')->nullable();


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
        Schema::dropIfExists('appraisals');
    }
}
