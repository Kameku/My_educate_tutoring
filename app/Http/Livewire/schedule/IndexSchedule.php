<?php

namespace App\Http\Livewire\schedule;

use App\Models\event;
use App\Models\timezone;
use Livewire\Component;

class IndexSchedule extends Component
{
    public $day = 1;
    

    public function render()
    {
        $events = event::where('day_id', $this->day)
                        // ->orderByDesc($)
                        ->get();

        $timezones = timezone::all();
        $timezones = $timezones->sortBy('timezone');

                            
       
        return view('livewire.schedule.index-schedule', compact('events','timezones'));       
    }
}
