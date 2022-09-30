<?php

namespace Database\Seeders;

use App\Models\ConceptDetail;
use Illuminate\Database\Seeder;

class ConceptDetailSeeder extends Seeder
{
    
    public function run()
    {
        $conceptsDetails = [
            ['concept_detail_name' => 'Chemistry', 'concept_id' => 1],
            ['concept_detail_name' => 'English', 'concept_id' => 2],
            ['concept_detail_name' => 'Essay Writing', 'concept_id' => 3],
            ['concept_detail_name' => 'Exam Preparation', 'concept_id' => 4],
            ['concept_detail_name' => 'Mathematics', 'concept_id' => 5],
            ['concept_detail_name' => 'Physics', 'concept_id' => 6],
        ];

        foreach ($conceptsDetails as $conceptDetail) {
            
            ConceptDetail::create(
                $conceptDetail
            );
        }
    }
}
