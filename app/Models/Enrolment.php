<?php

namespace App\Models;
use App\Models\Enquiry;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    protected $table = "enrolments";

    protected $fillable = [

        'first_name',
        'last_name',
        'home_phone',
        'adress',
        'suburb',
        'post_code',
        'date_of_birth',
        'language_home',
        'gender',
        'delivered',
        'subjet',
        'package',
        'type_package',
        'know',

        'parent_name',
        'parent_iam',
        'parent_email',
        'parent_mobile',
        'parent_adress',

        'school',
        'grade',
        'teacher_name',
        'teacher_contact',
        'teacher_mobile',

        'emergency_name',
        'emergency_relation',
        'emergency_mobile',
        'emergency_phone',

        'interventions_e1',
        'interventions_attachmen_e1',
        'interventions_e2',
        'interventions_attachmen_e2',
        'interventions_e3',
        'interventions_attachmen_e3',
        'interventions_e4',
        'interventions_details_e4',
        'interventions_e5',
        
        'interventions_e10',

        'interventions_e6',
        'interventions_details_e6',
        'interventions_e7',

        'payment',
        'about',
        'notes',
        'terms',
        'enquiry_id',

    ];

    public function enquiry(){
        return $this->belongsTo(Enquiry::class);
    }

    public function commentsEnrolments(){
        return $this->hasMany(CommentsEnrolment::class);
    }

    public function student(){
        return $this->hasOne(Student::class);
    }

    // public function father(){
    //     return $this->hasOne(father::class);
    // }
    
}
