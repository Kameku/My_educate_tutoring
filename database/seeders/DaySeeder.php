<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    
    public function run()
    {
        $days = [
            ['day_name' => 'Monday'],
            ['day_name' => 'Tuesday'],
            ['day_name' => 'Wednesday'],
            ['day_name' => 'Thursday'],
            ['day_name' => 'Friday'],
            ['day_name' => 'Saturday'],
        ];

        foreach ($days as $day) {
            Day::create(
                $day
            );
        }
    }
}
