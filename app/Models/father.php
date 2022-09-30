<?php

namespace App\Models;
use App\Models\User;
// use App\Enrolment;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class father extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Students()
    {
        return $this->hasMany(Student::class);
    }
}
