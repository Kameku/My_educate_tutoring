<?php

use Carbon\Traits\Timestamp;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquirysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquirys', function (Blueprint $table) {
            $table->id();
            $table->string("first_name");
            $table->string("last_name");
            $table->string("home_phone")->nullable();
            $table->string("adress");
            $table->string("suburb");
            $table->string("post_code");
            $table->string("date_of_birth");
            $table->string("language_home");
            $table->string("parent_name");
            $table->string("parent_mobile");
            $table->string("parent_email");
            $table->string("parent_adress")->nullable();
            $table->string("questions", 1200)->nullable();
            $table->string("status")->default('disable');
            $table->timestamps();

            
            $table->date("ep1_date")->default(date('Y-m-d'));
            $table->string("ep1_state")->default('Complete');

            $table->date("ep2_date")->default(date('Y-m-d'));
            $table->string("ep2_state")->default('Complete');

            $table->date("ep3_date")->nullable();
            $table->string("ep3_state")->default('Pending');

            $table->date("ep4_date")->default(date('Y-m-d'));
            $table->string("ep4_state")->default('Complete');

            $table->date("ep5_date")->nullable();
            $table->string("ep5_state")->default('Pending');

            $table->date("ep6_date")->nullable();
            $table->string("ep6_state")->default('Pending');

            $table->date("ep7_date")->nullable();
            $table->string("ep7_state")->default('Pending');

            $table->date("ep8_date")->nullable();
            $table->string("ep8_state")->default('Pending');

            $table->date("ep9_date")->nullable();
            $table->string("ep9_state")->default('Pending');

            $table->date("ep10_date")->nullable();
            $table->string("ep10_state")->default('Pending');

            $table->date("ep11_date")->nullable();
            $table->string("ep11_state")->default('Pending');

            $table->date("ep12_date")->nullable();
            $table->string("ep12_state")->default('Pending');

            $table->date("ep13_date")->nullable();
            $table->string("ep13_state")->default('Pending');

            $table->date("ep14_date")->nullable();
            $table->string("ep14_state")->default('Pending');
            
            $table->string("enrolment_process")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enquirys');
    }
}
