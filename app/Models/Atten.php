<?php

namespace App\Models;
use App\Models\Homework;
use App\Models\LearningPlan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Atten extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'date_created',
        'time',
        'term',
        'lesson',
        'student_name',
        'subject_name',
        'concept_name',
        'conceptDetail',
        'learningActivity',
        'tutor_name',
        'tutor_evaluation',
        'student_self',
        'student_attendance',
        'homework_completed',
        'weekly_lesson',
        'homework_assignment',
        'email_school',
        'comment',
        'commentPrivate',
        'notesAttendance'
    ];

    public function homeworks(){
        return $this->hasMany(Homework::class);
    }

    public function learningPlans(){
        return $this->hasMany(LearningPlan::class);
    }



}
