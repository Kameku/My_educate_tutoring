<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Traits\CreatedUpdatedBy;

class Task extends Model
{
    use HasFactory;
    // use CreatedUpdatedBy;
    protected $guarded = ['id'];
    
    // Uno a muchos (inverso)  con usuarios/ Pertenece a 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
