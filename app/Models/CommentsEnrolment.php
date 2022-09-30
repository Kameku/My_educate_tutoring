<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Enrolment;

class CommentsEnrolment extends Model
{
    use HasFactory;

    protected $fillable = [

        'description',
        'creator',
        'comment',
        'enrolment_id',
        'users_avatar',
    ];

    public function enrolment(){
        return $this->belongsTo(Enrolment::class);
    }
}
