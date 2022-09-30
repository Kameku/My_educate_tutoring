<?php

namespace Database\Seeders;

use App\Models\Concept;
use Illuminate\Database\Seeder;

class ConceptSeeder extends Seeder
{
    
    public function run()
    {
        $concepts = [
            ['concept_name' => 'Chemistry', 'library_id' => 1],
            ['concept_name' => 'English', 'library_id' => 2],
            ['concept_name' => 'Essay Writing', 'library_id' => 3],
            ['concept_name' => 'Exam Preparation', 'library_id' => 4],
            ['concept_name' => 'Mathematics', 'library_id' => 5],
            ['concept_name' => 'Physics', 'library_id' => 6],
        ];

        foreach ($concepts as $concept) {
            
            Concept::create(
                $concept
            );
        }
    }
}
