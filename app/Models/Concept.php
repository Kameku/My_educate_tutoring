<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    use HasFactory;
    protected $fillable = [
        'concept_name',
        'library_id',
    ];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function conceptsDetails()
    {
        return $this->hasMany(ConceptDetail::class);
    }
}
