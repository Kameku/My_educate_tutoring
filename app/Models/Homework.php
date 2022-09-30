<?php

namespace App\Models;
use App\Models\Atten;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;

    protected $fillable = [
        'homework_name',
        'answer_homework',
        'tutor_name',
        'student_name',
        'delivery',
        'observations',
        'atten_id',
    ];

    public function atten(){
        return $this->belongsTo(Atten::class);
    }



}
