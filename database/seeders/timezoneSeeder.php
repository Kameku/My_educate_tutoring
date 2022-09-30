<?php

namespace Database\Seeders;

use App\Models\timezone;
use Illuminate\Database\Seeder;

class timezoneSeeder extends Seeder
{
    
    public function run()
    {
        $timezones = [
            ['timezone' => '06:30 - 07:30'],
            ['timezone' => '07:31 - 08:30'],
            ['timezone' => '08:31 - 09:30'],
            ['timezone' => '09:31 - 10:30'],
            ['timezone' => '10:31 - 11:30'],
            ['timezone' => '11:31 - 12:30'],
            ['timezone' => '12:31 - 13:30'],
            ['timezone' => '13:31 - 14:30'],
            ['timezone' => '14:31 - 15:30'],
            ['timezone' => '15:31 - 16:30'],
            ['timezone' => '16:31 - 17:30'],
            ['timezone' => '17:31 - 18:30'],
            ['timezone' => '18:31 - 19:30'],
            
        ];

        foreach ($timezones as $timezone) {
            timezone::create(
                $timezone
            );
        }
    }
}