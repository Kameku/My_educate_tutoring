<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnrolmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolments', function (Blueprint $table) {
            $table->id();
            
            // student information
            $table->string("first_name");
            $table->string("last_name");
            $table->string("home_phone")->nullable();
            $table->string("adress");
            $table->string("suburb");
            $table->string("post_code");
            $table->string("date_of_birth");
            $table->string("language_home");
            $table->string("gender")->default('Not available');
            $table->string("delivered")->default('Not available');
            $table->string("subjet")->default('Not available');
            $table->string("package")->default('Not available');
            $table->string("type_package")->nullable();
            $table->string("know", 355)->nullable();
            // parent information
            $table->string("parent_name");
            $table->string("parent_iam")->default('Not available');
            $table->string("parent_email");
            $table->string("parent_mobile");
            $table->string("parent_adress")->nullable();
            
            // schooling information
            $table->string("school", 355)->nullable()->default('Not available');
            $table->string("grade")->nullable()->default('Not available');
            $table->string("teacher_name")->nullable()->default('Not available');
            $table->string("teacher_contact")->nullable()->default('Not available');
            $table->string("teacher_mobile")->nullable()->default('Not available');
            
            // sin case of emergency
            $table->string("emergency_name")->default('Not available');
            $table->string("emergency_relation")->default('Not available');
            $table->string("emergency_mobile")->default('Not available');
            $table->string("emergency_phone")->nullable()->default('Not available');
            
            // interventions del e1 - e7
            $table->string("interventions_e1")->default('Not available');
            $table->string("interventions_attachmen_e1", 355)->nullable()->default('Not available');
            $table->string("interventions_e2")->default('Not available');
            $table->string("interventions_attachmen_e2", 355)->nullable()->default('Not available');
            $table->string("interventions_e3")->default('Not available');
            $table->string("interventions_attachmen_e3", 355)->nullable()->default('Not available');
            $table->string("interventions_e4")->default('Not available');
            $table->string("interventions_details_e4", 355)->nullable()->default('Not available');
            $table->string("interventions_e5")->default('Not available');
            
            $table->string("interventions_e10")->default('Not available');

            $table->string("interventions_e6")->default('Not available');
            $table->string("interventions_details_e6", 355)->nullable()->default('Not available');
            $table->string("interventions_e7")->default('Not available');
            
            // generals 
            $table->string("payment")->default('Not available');
            $table->string("about")->default('Not available');
            $table->string("notes", 355)->nullable()->default('Not available');
            $table->string("terms")->default('Not available');
            $table->string("status")->default('Inactive');
            
            
            
            $table->timestamps();
            
            $table->bigInteger('enquiry_id')->unsigned()->nullable();
            $table->foreign('enquiry_id')
                    ->references('id')
                    ->on('enquirys')
                    ->onDelete('cascade');
            
            
            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enrolments', function (Blueprint $table) {
            //
        });
    }
}
