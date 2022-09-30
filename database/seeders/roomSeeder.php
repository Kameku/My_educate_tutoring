<?php

namespace Database\Seeders;

use App\Models\room;
use Illuminate\Database\Seeder;

class roomSeeder extends Seeder
{
    public function run()
    {
        $rooms = [
            ['nameRoom' => 'Alicia Rd T1'],
            ['nameRoom' => 'Alicia Rd T2'],
            ['nameRoom' => 'Alicia Rd T3'],
            ['nameRoom' => 'Magnet Court M1'],
            ['nameRoom' => 'Magnet Court M2'],
            ['nameRoom' => 'Magnet Court M3'],
            ['nameRoom' => 'Magnet Court M4'],
            ['nameRoom' => 'Magnet Court M5'],
          
            
        ];

        foreach ($rooms as $room) {
            room::create(
                $room
            );
        }
    }
}
