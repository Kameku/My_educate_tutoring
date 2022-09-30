<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {

            $table->id();
            $table->string('term1start',20)->nullable();
            $table->string('term1end',20)->nullable();
            $table->string('term2start',20)->nullable();
            $table->string('term2end',20)->nullable();
            $table->string('term3start',20)->nullable();
            $table->string('term3end',20)->nullable();
            $table->string('term4start',20)->nullable();
            $table->string('term4end',20)->nullable();

            $table->string('springStart',20)->nullable();
            $table->string('springEnd',20)->nullable();
            $table->string('summerStart',20)->nullable();
            $table->string('summerEnd',20)->nullable();
            $table->string('autumnStart',20)->nullable();
            $table->string('autumnEnd',20)->nullable();
            $table->string('winterStart',20)->nullable();
            $table->string('winterEnd',20)->nullable();

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
        Schema::dropIfExists('terms');
    }
}
