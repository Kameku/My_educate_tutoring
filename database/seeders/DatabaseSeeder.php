<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        
        Storage::deleteDirectory('img');
        Storage::deleteDirectory('documents');
        Storage::deleteDirectory('appraisals');

        Storage::deleteDirectory('notices');
        Storage::makeDirectory('notices');

        // $this->call(NoticeSeeder::class);
        $this->call(AsignatureSeeder::class);
        $this->call(LibrarySeeder::class);
        $this->call(ConceptSeeder::class);
        $this->call(ConceptDetailSeeder::class);
        $this->call(LearningSeeder::class);
        $this->call(DaySeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(RoleSeeder::class);
        
        $this->call(UserSeeder::class);

        // $this->call(TaskSeeder::class);

        


        

    }
}
