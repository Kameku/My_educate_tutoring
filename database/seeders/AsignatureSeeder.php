<?php

namespace Database\Seeders;

use App\Models\Asignature;
use Illuminate\Database\Seeder;

class AsignatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $asignatures = [
            ['name' => 'Administrator'],
            ['name' => 'Human Resources'],
            ['name' => 'Chemistry'],
            ['name' => 'English'],
            ['name' => 'Essay Writing'],
            ['name' => 'Exam Preparation'],
            ['name' => 'Mathematics'],
            ['name' => 'Organisation and study skills'],
            ['name' => 'Physics'],
            ['name' => 'Marketing Management'],
            ['name' => 'Finance Management'],
            ['name' => 'Project Management'],
            ['name' => 'Operations Management'],
            ['name' => 'Strategic Business Management'],
        ];


        foreach ($asignatures as $asignature) {
            Asignature::create(
                $asignature
            );
        }
    }
}
