<?php

namespace App\Models;

use App\Models\timezone;
use App\Models\day;
use App\Models\room;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;

    protected $fillable =[
        'type',
        'tutor',
        'color',
        'student',
        'timezone_id',
        'day_id',
        'room_id'

    ];

    public  function timezone(){
        return $this->belongsTo(timezone::class);
    }

    public  function day(){
        return $this->belongsTo(day::class);
    }

    public  function room(){
        return $this->belongsTo(room::class);
    }
}
