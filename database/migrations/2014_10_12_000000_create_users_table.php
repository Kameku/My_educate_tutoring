<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
   
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('code_id')->nullable();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('password');
            $table->string('olds_roles')->nullable();
            
            // $table->enum('status', [User::Active, User::Dissabled])->default(User::Active);

            $table->longText('bio')->nullable();
            // $table->string('subjects')->nullable();

            $table->string('starTime_monday',10)->nullable();
            $table->string('finalHour_monday',10)->nullable();
            $table->string('starTime_tuesday',10)->nullable();
            $table->string('finalHour_tuesday',10)->nullable();
            $table->string('starTime_wednesday',10)->nullable();
            $table->string('finalHour_wednesday',10)->nullable();
            $table->string('starTime_thursday',10)->nullable();
            $table->string('finalHour_thursday',10)->nullable();
            $table->string('starTime_friday',10)->nullable();
            $table->string('finalHour_friday',10)->nullable();
            $table->string('starTime_saturday',10)->nullable();
            $table->string('finalHour_saturday',10)->nullable();

            $table->string('starTime_monday1',10)->nullable();
            $table->string('finalHour_monday1',10)->nullable();
            $table->string('starTime_tuesday1',10)->nullable();
            $table->string('finalHour_tuesday1',10)->nullable();
            $table->string('starTime_wednesday1',10)->nullable();
            $table->string('finalHour_wednesday1',10)->nullable();
            $table->string('starTime_thursday1',10)->nullable();
            $table->string('finalHour_thursday1',10)->nullable();
            $table->string('starTime_friday1',10)->nullable();
            $table->string('finalHour_friday1',10)->nullable();
            $table->string('starTime_saturday1',10)->nullable();
            $table->string('finalHour_saturday1',10)->nullable();

            $table->string('starTime_monday_admin',10)->nullable();
            $table->string('finalHour_monday_admin',10)->nullable();
            $table->string('starTime_tuesday_admin',10)->nullable();
            $table->string('finalHour_tuesday_admin',10)->nullable();
            $table->string('starTime_wednesday_admin',10)->nullable();
            $table->string('finalHour_wednesday_admin',10)->nullable();
            $table->string('starTime_thursday_admin',10)->nullable();
            $table->string('finalHour_thursday_admin',10)->nullable();
            $table->string('starTime_friday_admin',10)->nullable();
            $table->string('finalHour_friday_admin',10)->nullable();
            $table->string('starTime_saturday_admin',10)->nullable();
            $table->string('finalHour_saturday_admin',10)->nullable();
            
            $table->string('date_of_birth')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('unit')->nullable();
            $table->string('street')->nullable();
            $table->string('streetName')->nullable();
            $table->string('suburb')->nullable();
            $table->string('postCode')->nullable();

            $table->string('tax')->nullable();
            $table->string('date_employment')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('employment_time')->nullable();
            $table->string('ordinary_work')->nullable();
            
            $table->string('emergency_name1')->nullable();
            $table->string('emergency_relationship1')->nullable();
            $table->string('emergency_number1')->nullable();
            
            $table->string('emergency_name2')->nullable();
            $table->string('emergency_relationship2')->nullable();
            $table->string('emergency_number2')->nullable();
            
            $table->string('emergency_name3')->nullable();
            $table->string('emergency_relationship3')->nullable();
            $table->string('emergency_number3')->nullable();
            
            $table->string('emergency_name4')->nullable();
            $table->string('emergency_relationship4')->nullable();
            $table->string('emergency_number4')->nullable();


            $table->string('bank')->nullable();
            $table->string('account_name')->nullable();
            $table->string('bsb')->nullable();
            $table->string('account_number')->nullable();
            $table->string('agreed_method_pay')->nullable();
            $table->string('agreed_period_pay')->nullable();
            $table->string('agreed_day_pay')->nullable();

            $table->string('position')->nullable();
            $table->string('AwardAgreement')->nullable();
            $table->string('level')->nullable();
            $table->string('year')->nullable();
            $table->string('Age')->nullable();
            $table->string('Wage')->nullable();
            $table->string('Fortnightly')->nullable();
            $table->string('Salary')->nullable();
            
            $table->string('separation')->nullable();
            $table->string('name_temployment')->nullable();
            $table->string('date_notice')->nullable();
            $table->string('date_working')->nullable();
            $table->string('method_termination')->nullable();
            $table->string('reason')->nullable();
            
            $table->string('cv_resumen')->nullable();
            $table->string('statement_practice')->nullable();
            $table->string('qualification')->nullable();
            $table->string('teacher_registration')->nullable();
            $table->string('registration_people')->nullable();
            $table->string('ata_acreditation')->nullable();
            $table->string('subject_specialized')->nullable();


            $table->rememberToken();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
