<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Enrolment;
use App\Models\School;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\CommentsEnrolment;
use App\Employe;
use App\event;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\ComposerScripts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnrolmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('create','store');
    }
  
    public function index()
    {
        $enrolments = Enrolment::all();
        $enquirys = Enquiry::all();
        return view('enrolment.index')->with([
            'enquirys' => $enquirys,
            'enrolments' => $enrolments,
        ]);
        
    }
   
    public function create(Enquiry $enquiry)
    {
        return view('enrolment.create')->with([
            'enquiry' => $enquiry,
        ]);
    }

    public function store(Request $request)
    {
       
        $ruleStudent =[
            'first_name' => 'required',
            'last_name' => 'required',
            'adress' => 'required',
            'suburb' => 'required',
            'post_code' => 'required',
            'date_of_birth' => 'required',
            'language_home' => 'required',
            'gender' => 'required',
            'delivered' => 'required',
            'subjet' => 'required',
        ];

        request()->validate($ruleStudent);

        $enrolment = Enrolment::create(request()->all());

        if(!empty($request->interventions_attachmen_e1)){
            $reportE1 = $request->file('interventions_attachmen_e1')->store($request->parent_email, 'reports');
            $enrolment -> update([
                'interventions_attachmen_e1' => $reportE1,
                ]);
            };
    
        if(!empty($request->interventions_attachmen_e2)){
            $reportE2 = $request->file('interventions_attachmen_e2')->store($request->parent_email, 'reports');
            $enrolment -> update([
                'interventions_attachmen_e2' => $reportE2,
                ]);
            };
            
        if(!empty($request->interventions_attachmen_e3)){
            $reportE3 = $request->file('interventions_attachmen_e3')->store($request->parent_email, 'reports');
            $enrolment -> update([
                'interventions_attachmen_e3' => $reportE3,
                ]);
            }; 
        return view('welcome');
    }

    public function show(Enrolment $enrolment, CommentsEnrolment $commentsEnrolment)
    {

        $comments = CommentsEnrolment::where('enrolment_id', $enrolment->id )->orderBy('created_at','DESC')->get(); 
        $comentEmpty = json_decode($comments, true);

        $schools = School::all();
        $enquiry = $enrolment->enquiry;
        $today = Carbon::now();
        $age = Carbon::parse($enrolment->date_of_birth)->age; 
        return view('enrolment.show')->with([
            'enrolments' => $enrolment,
            'enquiry' => $enquiry,
            'schools' => $schools,
            'today' => $today,
            'age' => $age,
            'comments' => $comments,
            'comentEmpty' => $comentEmpty
        ]);
    }

    public function update(Enrolment $enrolment)
    {
        $enrolment->enquiry->update(request()->all());
        $enrolment->update(request()->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        
        try {
            $enrollment = Enrolment::find($id);
            $enrollment->delete();
            session()->flash('success', 'Enrollment removed successfully');
            return redirect()->back();

        } catch (Exception $e) {
            // dd($e->getMessage());
            session()->flash('error', 'Enrollment cannot be deleted because there is already an active student');
            return redirect()->back();
        }
    }

    public function commentStore(Enrolment $enrolment)
    {
        $comments = CommentsEnrolment::create(request()->all());

        return redirect()->back();
        

    }

}
