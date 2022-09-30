<?php

namespace App\Models;

use App\Atten;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_name',
        'concept_name',
        'conceptDetail',
        'learningActivity',
        'atten_id'
    ];
    
    // protected $fillable = [
    //     'subject_name' => 'array',
    //     'concept_name' => 'array',
    //     'conceptDetail' => 'array',
    //     'learningActivity' => 'array',
    //     'atten_id'
    // ];

    public function atten(){
        return $this->belongsTo(Atten::class);
    }
}


