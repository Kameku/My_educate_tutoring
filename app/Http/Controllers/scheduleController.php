<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\event;
use App\Models\Student;
use App\Models\User;
use App\Models\timezone;
use Barryvdh\Reflection\DocBlock\Type\Collection;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class scheduleController extends Controller
{
    public function index()
    {

        $students = Student::all();
        $tutors = User::role('tutor')->get();

        return view('schedule.index')->with([
            'students' => $students,
            'tutors' => $tutors,
        ]);
    }

    public function store(Request $request)
    {

        $rules = [
            'type' => 'required',
            'tutor' => 'required',
            // 'student' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
            'day_id' => 'required',
            'room_id' => 'required'
        ];
        
        request()->validate($rules);

        $timeZoneCompleted = $request->time_start." - ".$request->time_end;
        $timeZoneCoincide = timezone::where('timezone', $timeZoneCompleted)->first();

        $tutorId = $request->tutor;
        $tutorUser = User::where('id', $tutorId)->first();

        // return $tutorUser;

        function hexadecimalARgb($hexadecimal)
            {
                list($r, $g, $b) = sscanf($hexadecimal, "#%02x%02x%02x");
                return [$r, $g, $b];
            };
        
        $colorHexadecimal = $tutorUser->color;
        $rgb = hexadecimalARgb($colorHexadecimal);
        $colorRGB = collect($rgb)->implode(',');
 

        if ($timeZoneCoincide != "" ) {

            $eventvalidate = event::where('day_id', $request->day_id)
            ->where('timezone_id', $timeZoneCoincide->id)
            ->where('room_id', $request->room_id)
            ->count();
            
            
           

            if ($eventvalidate === 0) {
                event::create([
    
                    'type' => $request->type,
                    'tutor' => $tutorUser->name . ' ' . $tutorUser->last_name,
                    'color' => $colorRGB,
                    'student' => $request->student,
                    'timezone_id' => $timeZoneCoincide->id,
                    'day_id' => $request->day_id,
                    'room_id' => $request->room_id,
    
                ]);
    
                session()->flash('success', 'Schedule Created Successfully');
                return redirect()->back();
            } else {
                session()->flash('error', 'Schedule Not Available');
                return redirect()->back();
            }
            
        }else{

            timezone::create([
                'timezone' => $timeZoneCompleted
            ]);

            $timeZoneLasted = timezone::all()->last();

            event::create([
    
                'type' => $request->type,
                'tutor' => $tutorUser->name . ' ' . $tutorUser->last_name,
                'color' => $colorRGB,
                'student' => $request->student,
                'timezone_id' => $timeZoneLasted->id,
                'day_id' => $request->day_id,
                'room_id' => $request->room_id,

            ]);

            session()->flash('success', 'Schedule Created Successfully');
            return redirect()->back();

        }        
    }

    public function destroy(Request $request)
    {

        $schedule = event::where('id', $request->id)->first();

        // return $schedule;

        $schedule->delete();
        session()->flash('error', 'Schedule removed successfully');
        return redirect()->back();

        // return $request;

        // return 'funcion de eliminar aplicada';
    }

    public function destroyTime(Request $request)
    {
        try 
            {
                $timezone = timezone::where('id', $request->id)->first();
                $timezone->delete();
                session()->flash('error', 'Time removed successfully');
                return redirect()->back();
            } 
        catch (\Exception $e) 
            {
                if($e->getCode()=="23000")
                session()->flash('error', 'Impossible to delete the time, in scheduled times, you must delete the scheduled times first.');
                return redirect()->back();
            }
    }

    public function classSummary()
    {   

        $events = event::all();      
        $classSummary = collect();

        $classTotal = event::where('type', 'Class')->count();
        $workMeetingTotal = event::where('type', 'Work Meeting')->count();

        foreach($events as $event){

            $tutor = $event->tutor;
            $type = $event->type;
            $classCount = event::where('tutor', $tutor)
                                ->where('type', 'Class')
                                ->count();

            $workCount = event::where('tutor', $tutor)
                                ->where('type', 'Work Meeting')
                                ->count();

            $validateTutor = $classSummary->contains('tutor', $tutor);
            if ($validateTutor === false and $type === 'Class') {

                $classSummary->push([
                    'tutor' => $tutor,
                    'color' => $event->color,
                    'type' => $type, 
                    'amount' => $classCount,
                    'workMeeting' => $workCount
                ]);

            }
        };


        $classSummaryForStudents = collect();

        foreach($events as $event){

            $student = $event->student;
            $validateStudent = $classSummaryForStudents->contains('student', $student);
            if ($validateStudent === false and $type === 'Class') {

                $classSummaryForStudents->push([
                    'student' => $student,
                ]);
            }
        };

        return view('schedule.classSummary')->with([
            'events' => $events,
            'classSummary' => json_decode($classSummary),
            'classTotal' => $classTotal,
            'workMeetingTotal' => $workMeetingTotal,
            'classSummaryForStudents' => $classSummaryForStudents->count()
        ]);
    }
}
