<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    
    public function run()
    {
       

       
        //student
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'ST'),
            'name' => 'Student',
            'last_name' => 'Student',
            'email' => 'student@test.test',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Student',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ])->assignRole('student');

        // parent 
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'PT'),
            'name' => 'Parent',
            'last_name' => 'Parent',
            'email' => 'parent@test.test',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Parent',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),

        ])->assignRole('parent');

        //superadmin Michael
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Michael',
            'last_name' => 'Angel',
            'email' => 'kameku01@gmail.com',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Michael',
            'password' => bcrypt('Santi.20@'),
            'remember_token' => Str::random(10),

        ])->assignRole('superadmin');

        // //superadmin Naomi
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Naomi',
            'last_name' => 'Wright',
            'email' => 'naomi@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Naomi',
            'password' => bcrypt('Marl3y.0218'),
            'remember_token' => Str::random(10),
        ])->assignRole('superadmin');

        // //Ivan-admin-tutor
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Ivan',
            'last_name' => 'Botero',
            'email' => 'ivan@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Ivan',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['admin', 'tutor']);

        //  //Ellie-admin
         User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Ellie',
            'last_name' => 'Connor',
            'email' => 'ellie@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Ellie',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['admin', 'tutor']);

        // //Neve-admin
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Neve',
            'last_name' => 'Mitchell',
            'email' => 'neve@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Neve',
            'password' => bcrypt('12345678!'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['admin', 'tutor']);

        // //Alex-admin
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Alex',
            'last_name' => 'Geeves',
            'email' => 'alex@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=alex',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole('admin');    

        // //Laree-tutor
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Laree',
            'last_name' => 'Thorsby',
            'email' => 'laree@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Laree',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole('tutor');

        // //Libeth-admin
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Libeth',
            'last_name' => 'Castellanos',
            'email' => 'libeth@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Libeth',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole('admin');

        // //Rosemary-tutor
        User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Rosemary',
            'last_name' => 'Beswick',
            'email' => 'rosemary@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Rosemary',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole('tutor');

        //  //Heather-admin
         User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Heather',
            'last_name' => 'Excell',
            'email' => 'heather@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Heather',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['admin','tutor']);
        
        //  //Yina peng
         User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Yina',
            'last_name' => 'Peng',
            'email' => 'yina@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Yina',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['tutor']);

        //  //Juno Galang
         User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Juno',
            'last_name' => 'Galang',
            'email' => 'juno@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=Juno',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['tutor']);

        //  //Campbell Jepson
         User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Campbell',
            'last_name' => 'Jepson',
            'email' => 'campbell@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=campbell',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['tutor']);

        // Marie Claire O'Malley
         User::create([
            'code_id' => Helper::IDGenerator(new User, 'code_id', 3, 'AT'),
            'name' => 'Marie Claire',
            'last_name' => "O'Malley",
            'email' => 'marieclaire@educatetutoring.com.au',
            'email_verified_at' => now(),
            'profile_photo' => 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name=marieclaire',
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            
        ])->assignRole(['tutor']);
        
    }
}
