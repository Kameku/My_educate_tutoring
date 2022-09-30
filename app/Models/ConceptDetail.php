<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'concept_detail_name',
        'concept_id',
    ];

    public function concept(){
        return $this->belongsTo(Concept::class);
    }

    public function Learnings()
    {
        return $this->hasMany(Learning::class);
    }
}
