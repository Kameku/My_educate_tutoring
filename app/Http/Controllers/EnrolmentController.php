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

        $enrolment = $request->all();

        if($request->hasFile('interventions_attachmen_e1')){
            
            $enrolment['interventions_attachmen_e1'] = time() . '_' . $request->file('interventions_attachmen_e1')->getClientOriginalName();
            $request->file('interventions_attachmen_e1')->storeAs('reports/'.$request->parent_email, $enrolment['interventions_attachmen_e1']);

        }
        if($request->hasFile('interventions_attachmen_e2')){
        
            $enrolment['interventions_attachmen_e2'] = time() . '_' . $request->file('interventions_attachmen_e2')->getClientOriginalName();
            $request->file('interventions_attachmen_e2')->storeAs('reports/'.$request->parent_email, $enrolment['interventions_attachmen_e2']);

        }
        if($request->hasFile('interventions_attachmen_e3')){
            
            $enrolment['interventions_attachmen_e3'] = time() . '_' . $request->file('interventions_attachmen_e3')->getClientOriginalName();
            $request->file('interventions_attachmen_e3')->storeAs('reports/'.$request->parent_email, $enrolment['interventions_attachmen_e3']);

        }

        Enrolment::create($enrolment);
        
        // return view('welcome')->withSuccess('Your enrollment has been received.  A member of our team will be in touch with you very soon.');
        return redirect()->route('welcome')->withSuccess('Your enrollment has been received.  A member of our team will be in touch with you very soon.');


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
