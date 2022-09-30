<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignature extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

      //relacion muchos a muchos User con asignatures
      public function users(){

        return $this->belongsToMany(User::class);
        
    }
}
