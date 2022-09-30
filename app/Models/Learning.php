<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Learning extends Model
{
    use HasFactory;
    protected $fillable = [
        'learning_name',
        'concept_detail_id',
    ];

    public function concept_detail(){
        return $this->belongsTo(ConceptDetail::class);
    }
}
