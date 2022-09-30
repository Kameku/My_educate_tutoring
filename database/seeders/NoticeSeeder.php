<?php

namespace Database\Seeders;

use App\Models\Notice;
use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
{
    
    public function run()
    {
       Notice::factory(10)->create();
    }
}


