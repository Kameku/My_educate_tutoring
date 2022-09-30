<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Enquiry;

class commentsEnquiry extends Model
{
    use HasFactory;
    protected $table = "comments_enquiry";

    protected $fillable = [

        'description',
        'creator',
        'comment',
        'enquiry_id',
        'users_avatar',
    ];

    public function enquiry(){
        return $this->belongsTo(Enquiry::class);
    }
}
