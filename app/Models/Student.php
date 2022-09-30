<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Enrolment;
use App\Models\User;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'user_id',
        'enrolment_id',
        'father_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function enrolment()
    {
        return $this->belongsTo(Enrolment::class);
    }

    public function father()
    {
        return $this->belongsTo(father::class);
    }


    
}
