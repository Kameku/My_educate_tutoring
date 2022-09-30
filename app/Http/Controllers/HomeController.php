<?php

namespace App\Http\Controllers;


use App\Models\Notice;
use App\Models\User;
use App\Models\Enrolment;
use App\Models\Preenrolment;
use App\Models\enquiryPage;
use App\Models\Enquiry;
use Carbon\Carbon;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {

        $employeesTutor = User::role('tutor')->count();
        $news = Notice::all();
        // $newsStudent = Notice::where('studen_notice', 'Yes')->get();
        // return $newsStudent;

        $date  = Carbon::now()->Format('l');
        $year  = Carbon::now()->Format('d  F  Y');
        $inspire =Inspiring::quote();

        $mytasks = Auth::user()->tasks;

        $totalEnrolment = collect(Enrolment::where('status', 'Active')->get())->count();

        $preenrol = Preenrolment::latest()->take(5)->get();
        $enquiryPage = enquiryPage::latest()->take(5)->get();
        $enrolmentLast = Enrolment::latest()->take(5)->get();
        $enquiryLast = Enquiry::latest()->take(5)->get();
        // $classTotal = collect(event::where('typeEvent', '=', 'class')->get())->count();


        return view('dashboard.index')->with([
            'totalEnrolment' => $totalEnrolment,
            'employeesTutor' => $employeesTutor,
            'news' => $news,
            'date' => $date,
            'year' => $year,
            'inspire' => $inspire,
            'mytasks' => $mytasks,
            // 'classTotal' => $classTotal,
            'preenrolment' => $preenrol,
            'enquiryPage' => $enquiryPage,
            'enrolmentLast' => $enrolmentLast,
            'enquiryLast' => $enquiryLast,


            // 'enrolments' => $enrolments,
        ]);

        // return view('dashboard.index', compact('employeesTutor', 'news', 'date', 'year', 'inspire', 'mytasks' ));
    }
}
