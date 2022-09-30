<?php

namespace App\Http\Livewire\schedule;

use App\Models\Student;
use App\Models\User;
use Livewire\Component;

class CreateEvent extends Component
{
    // public $open = true;

    // public $type, $tutor, $student, $timezone_id, $day_id, $room_id, $prueba;

    public function render()
    {

       $students = Student::all();
       $tutors = User::role('tutor')->get();

     
        return view('livewire.schedule.create-event')->with([

            'students' => $students,
            'tutors' => $tutors,

        ]);
    }
}
