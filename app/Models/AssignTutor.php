<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignTutor extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tutor_name',
        'student_name',
        'subject',
        'student_id',
    ];

    




}
