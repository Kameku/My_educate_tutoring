<?php

namespace Database\Seeders;

use App\Models\Library;
use Illuminate\Database\Seeder;

class LibrarySeeder extends Seeder
{
    
    public function run()
    {
        $librarys = [
            ['name_sub' => 'Chemistry'],
            ['name_sub' => 'English'],
            ['name_sub' => 'Essay Writing'],
            ['name_sub' => 'Exam Preparation'],
            ['name_sub' => 'Mathematics'],
            ['name_sub' => 'Physics'],
        ];

        foreach ($librarys as $library) {
            
            Library::create(
                $library
            );
        }
    }
}
