<?php

namespace App\Models;

use Dotenv\Repository\Adapter\GuardedWriter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preenrolment extends Model
{
    use HasFactory;

    protected $guarded = ['id']; 
    
}
