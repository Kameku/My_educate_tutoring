<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preenrolment;
use App\Models\User;

class CommentsPreenrolment extends Model
{
    use HasFactory;

    protected $table = "comments_preenrolment";

    protected $fillable = [

        'user_id',
        'comment',
        'preenrolment_id',

    ];

    public function preenrolment(){
        return $this->belongsTo(Preenrolment::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
