<?php

namespace App\Models;
use App\Models\Enrolment;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = "enquirys";

    protected $fillable = [

        'first_name',
        'last_name', 
        'home_phone',
        'adress',
        'suburb',
        'post_code',
        'date_of_birth',
        'language_home',
        'parent_name',
        'parent_mobile',
        'parent_email',
        'parent_adress',
        'questions',
        'status',  

        'ep1_date',
        'ep1_state',

        'ep2_date',
        'ep2_state',

        'ep3_date',
        'ep3_state',

        'ep4_date',
        'ep4_state',

        'ep5_date',
        'ep5_state',

        'ep6_date',
        'ep6_state',

        'ep7_date',
        'ep7_state',

        'ep8_date',
        'ep8_state',

        'ep9_date',
        'ep9_state',

        'ep10_date',
        'ep10_state',

        'ep11_date',
        'ep11_state',

        'ep12_date',
        'ep12_state',

        'ep13_date',
        'ep13_state',

        'ep14_date',
        'ep14_state',

        'enrolment_process',
    ];   
    
    public  function enrolment(){

        return $this->hasOne(Enrolment::class);

    }
}
