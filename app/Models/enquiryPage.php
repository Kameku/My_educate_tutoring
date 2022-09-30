<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enquiryPage extends Model
{
    use HasFactory;

    protected $table = "enquiry_page";

    protected $fillable = [
        'name',
        'email',
        'message',
        'status',
        'created_at',
        // 'details',
    ];
}
