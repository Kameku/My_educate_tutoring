<?php

namespace Database\Seeders;

use App\Models\Learning;
use Illuminate\Database\Seeder;

class LearningSeeder extends Seeder
{
    
    public function run()
    {
        $LearningActivitys = [
            ['learning_name' => 'Chemistry', 'concept_detail_id' => 1],
            ['learning_name' => 'English', 'concept_detail_id' => 2],
            ['learning_name' => 'Essay Writing', 'concept_detail_id' => 3],
            ['learning_name' => 'Exam Preparation', 'concept_detail_id' => 4],
            ['learning_name' => 'Mathematics', 'concept_detail_id' => 5],
            ['learning_name' => 'Physics', 'concept_detail_id' => 6],
        ];

        foreach ($LearningActivitys as $LearningActivity) {
            
            Learning::create(
                $LearningActivity
            );
        }

    }
}
