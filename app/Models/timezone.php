<?php

namespace App\Models;
use App\Models\event;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timezone extends Model
{
    use HasFactory;

    protected $fillable =[
        'timezone',
    ];

    public function events(){
        return $this->hasMany(event::class);
    }
}
