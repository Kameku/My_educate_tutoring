<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    
    public function run()
    {
        $data = [
            ['name_school' => 'Albuera St Primary School'],
            ['name_school' => 'Bellerive Primary School'],
            ['name_school' => 'Blackmans Bay Primary School'],
            ['name_school' => 'Brighton Primary School'],
            ['name_school' => 'Calvin Christian School'],
            ['name_school' => 'Campbell Street Primary School'],
            ['name_school' => 'Channel Christian School'],
            ['name_school' => 'Bruce Maynard'],
            ['name_school' => 'Corpus Christi Catholic School'],
            ['name_school' => 'Cygnet Primary School'],
            ['name_school' => 'Howrah Primary Schoolville Primary'],
            ['name_school' => 'Elizabeth College'],
            ['name_school' => 'Fahan School'],
            ['name_school' => 'MHobart College'],
            ['name_school' => 'Kingston Primary School'],
            ['name_school' => 'Lansdowne Crescent Primary School'],
            ['name_school' => 'Lindisfarne Primary School'],
            ['name_school' => 'Margate Primary School'],
            ['name_school' => 'Montague Bay Primary School'],
            ['name_school' => 'Mount Carmel College'],
            ['name_school' => 'Mt Nelson Primary School'],
            ['name_school' => 'Mt Stuart Primary School'],
            ['name_school' => 'North Lindisfarne Primary School'],
            ['name_school' => 'Princess Street Primary School'],
            ['name_school' => 'Richmond Primary School'],
            ['name_school' => 'Risdon Vale Primary School'],
            ['name_school' => 'Rose Bay High School'],
            ['name_school' => 'Sacred Heart Catholic School (Geeveston)'],
            ['name_school' => 'Sacred Heart College (New Town)'],
            ['name_school' => 'Schoolwarra Primary School'],
            ['name_school' => 'Sandy Bay Infants School'],
            ['name_school' => 'Snug Primary School'],
            ['name_school' => 'South Hobart Primary'],
            ['name_school' => 'Southern Christian College'],
            ['name_school' => 'St Aloysius Catholic College'],
            ['name_school' => 'St Johns Catholic School'],
            ['name_school' => 'St Marys Catholic College'],
            ['name_school' => 'St Michaels Collegiate'],
            ['name_school' => 'Taroona Primary School'],
            ['name_school' => 'Tarremah Steiner School'],
            ['name_school' => 'Waimea Heights Primary School'],
            ['name_school' => 'Windermere Primary School'],
        ];  

        foreach ($data as $school) {
            School::create(
                $school
            );
        }
    }
}
