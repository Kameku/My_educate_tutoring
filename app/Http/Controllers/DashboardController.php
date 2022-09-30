<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\event;
use App\Models\Employe;
use App\Models\Enrolment;
use App\Models\Notice;
use App\Models\task;
use App\Models\AssignTutor;
use App\Models\Atten;
use App\Models\Enquiry;
use App\Models\father;
use App\Models\Preenrolment;
use App\Models\enquiryPage;

class DashboardController extends Controller
{
    public function index(){

        // $date  = Carbon::now()->Format('l');
        // $year  = Carbon::now()->Format('d  F  Y');

        // $roleAuth = Auth::user()->roles->first()->name;
        // $userAuth = Auth::user()->id;
        // $userAuthName = Auth::user()->name;
        // $tasks = task::all();
        // $mytasks = $tasks->where('from','=',$userAuthName);
        // $mytasksAsig = $tasks->where('sing_to','=',$userAuthName);
        // $employesTotal = Employe::all();


        $totalEnrolment = collect(Enrolment::where('status', 'Active')->get())->count();


        return view('dashboard.index')->with([
            'totalEnrolment' => $totalEnrolment,
            // 'enrolments' => $enrolments,
        ]);

        

        // return view('dashboard.index', compact('date', 'year'));
    }
   
}
