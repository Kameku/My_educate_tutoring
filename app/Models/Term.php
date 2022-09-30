<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'term1start',
        'term1end',
        'term2start',
        'term2end',
        'term3start',
        'term3end',
        'term4start',
        'term4end',
        'springStart',
        'springEnd',
        'summerStart',
        'summerEnd',
        'autumnStart',
        'autumnEnd',
        'winterStart',
        'winterEnd',
    ];


}
