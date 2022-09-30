<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_sub',
    ];

    public function concepts()
    {
        return $this->hasMany(Concept::class);
    }
}
