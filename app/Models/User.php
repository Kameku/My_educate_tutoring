<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
//relacion con Spatie/permissions
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;



use App\Models\Student;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;
    // const Active = 1;
    // const Dissabled = 0;

    
    protected $guarded = ['id'];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getRouteKeyName()
    // {
    //     return 'name';
    // }

    

   

     //relacion muchos a muchos User con asignatures como Subject Asignaturas del tutor
     public function asignatures(){

        return $this->belongsToMany(Asignature::class);
        
    }

    public function father(){
        return $this->hasOne(father::class);
    }

    public function Student(){
        return $this->hasOne(Student::class);
    }

     // OneToMany  relacion uno a muchos User -> Task
     public function tasks()
     {
         return $this->hasMany(Task::class);
     }

     public function commnetsPreenrolment(){
        return $this->hasMany(CommentsPreenrolment::class);
    }

    
    
}
