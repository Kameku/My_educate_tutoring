<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable =[
        'nameRoom',
    ];

    public function events(){
        return $this->hasMany(event::class);
    }
}
