<?php

namespace App\Http\Controllers;

use App\Models\AssignTutor;
use App\Models\Atten;
use App\Models\Enrolment;
use App\Models\Library;
use App\Models\Concept;
use App\Models\ConceptDetail;
use App\Models\Learning;
use App\Models\LearningPlan;
use App\Models\Student;
use App\Models\Employe;
use App\Models\Homework;
use App\Http\Requests\CreateAttenRequest;
use App\Models\Term;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use PDF;

class AttenController extends Controller
{
    use HasRoles;

    public function index()
    {

        if(Auth::user() === null){
            return view('auth.login');
        }

        $userAuth = Auth::user();
        $userAuthName = Auth::user()->name.' '.Auth::user()->last_name;
        $userAuthEmail = Auth::user()->email;
        $roleAuthcant = Auth::user()->roles->count();
        $roleUser = $userAuth->roles->first()->name;
        $attenStudent = "";

        
        if ($roleUser === 'student'){
            $attenStudent = Atten::where('student_name', $userAuthName)->get();
        }

        if( $roleUser === 'parent'){

            $enrolmentStudent = Enrolment::where('parent_email', $userAuthEmail)->first();
            $nameStudent = $enrolmentStudent->first_name.' '.$enrolmentStudent->last_name;
            $attenStudent = Atten::where('student_name', $nameStudent)->get();

        }


        
        
        if($roleAuthcant == 1){

            $roleAuth = $userAuth->roles->first()->name;

            // return $roleAuth;
            if($roleAuth != 'Tutor'){
                $attens= Atten::all();
            }else{
                $aten = Atten::all();
                $attens= $aten->where('tutor_name','=', $userAuthName);
            }

        }else{

            $roleAuth = $userAuth->roles->first()->name;
            // // return $roleAuth;
            if($roleAuth == 'superadmin' ){
                $attens= Atten::all();
            }else{
                
                $roleAttendance = $userAuth->hasRole('Attendance');
                // $roleAttendance = $userAuth->roles->firstWhere('name', 'Attendance');
                // dd ($roleAttendance);
                if($roleAttendance === true){
                    $attens= Atten::all();
                }else{
                    $roleAuthTutor = $userAuth->roles->firstWhere('name', 'Tutor');
                    if($roleAuthTutor->name == 'Tutor'){
                        $aten = Atten::all();
                        $attens= $aten->where('tutor_name','=', $userAuthName);
                    }

                }
            }
        }
        
        $subjects = Library::all();
        $students = AssignTutor::where('tutor_name', '=', $userAuthName )->get();
        // $today = Carbon::now()->format('d/m/Y');
        $today = Carbon::now()->format('Y/m/d');
        $hour = Carbon::now()->format('h:i a');

        $termDates = Term::where('id', 1)->first();

        
        $term1start = Carbon::create($termDates->term1start) ;
        $term1end = Carbon::create($termDates->term1end) ;
        
        $term2start = Carbon::create($termDates->term2start) ;
        $term2end = Carbon::create($termDates->term2end) ;
        
        $term3start = Carbon::create($termDates->term3start)->addHour();
        $term3end = Carbon::create($termDates->term3end)->addDay() ;
        // $term3end = $termDates->term3end ;
        
        $term4start = Carbon::create($termDates->term4start);
        $term4end = Carbon::create($termDates->term4end);

        $springStart = Carbon::create($termDates->springStart);
        $springEnd = Carbon::create($termDates->springEnd);

        $summerStart = Carbon::create($termDates->summerStart);
        $summerEnd = Carbon::create($termDates->summerEnd);

        $autumnStart = Carbon::create($termDates->autumnStart);
        $autumnEnd = Carbon::create($termDates->autumnEnd);

        $winterStart = Carbon::create($termDates->winterStart);
        $winterEnd = Carbon::create($termDates->winterEnd);
        
        $isTerm1 = Carbon::now()->between($term1start , $term1end);
        $isTerm2 = Carbon::now()->between($term2start , $term2end);
        $isTerm3 = Carbon::now()->between($term3start , $term3end);
        $isTerm4 = Carbon::now()->between($term4start , $term4end);

        $isSpring = Carbon::now()->between($springStart , $springEnd);
        $isSummer = Carbon::now()->between($summerStart , $summerEnd);
        $isAutumn = Carbon::now()->between($autumnStart , $autumnEnd);
        $isWinter = Carbon::now()->between($winterStart , $winterEnd);
        
        // dd($term3end);
        

        $term = 'N/A';

        if($isTerm1 === true ){
            $term = '1';
        }
        if($isTerm2 === true ){
            $term = '2';
        }
        if($isTerm3 === true ){
            $term = '3';
        }
        if($isTerm4 === true ){
            $term = '4';
        }
        if($isSpring === true ){
            $term = 'Spring';
        }
        if($isSummer === true ){
            $term = 'Summer';
        }
        if($isAutumn === true ){
            $term = 'Autumn';
        }
        if($isWinter === true ){
            $term = 'Winter';
        }

      
        return view('atten.index')->with([
            'today' => $today,
            'hour' => $hour,
            'students' => $students,
            'attens' => $attens,
            'subjects' =>$subjects,
            // 'employesTotal' => Employe::all(),
            'term' => $term,
            'attenStudent' => $attenStudent,
            // 'attenParent' =>$attenParent
        ]);
    }

    
    public function store(CreateAttenRequest $request)
    {
        
        Atten::create($request->all());
    
        session()->flash('success', 'Attendance was created successfully');
        return redirect()->back();

    }

   
    public function show(Atten $atten)
    {

        if(Auth::user() === null){
            return view('auth.login');
        }
 
        $library = Library::all();
        $concepts = Concept::all();
        $conceptDetails = ConceptDetail::all();
        $learnings = learning::all();
        $attenSubjects = json_decode($atten->subject_name, true);
        $attenConcept = json_decode($atten->concept_name, true);
        $attenDetail = json_decode($atten->conceptDetail, true);
        $attenlearning = json_decode($atten->learningActivity, true);
        $addLearningPlans = LearningPlan::where('atten_id', $atten->id)->get();

        return view('atten.show')->with([
            'atten' => $atten,
            'subjects' => $library,
            'concepts' => $concepts,
            'conceptDetails' => $conceptDetails,
            'learnings' => $learnings,
            'attenSubjects' => $attenSubjects,
            'attenConcept' => $attenConcept,
            'attenDetail' => $attenDetail,
            'attenlearning' => $attenlearning,
            'addLearningPlans' => collect($addLearningPlans),
            
        ]);
    }

    public function update(Atten $atten, Request $request)
    {

        if ($request->subject_name == ""){
            $atten->update(request()->all());
        }else{

            $rules=[
                'subject_name'      =>['required'],
                'concept_name'      =>['required'],
                'conceptDetail'     =>['required'],
                'learningActivity'  =>['required'],
            ];

            request()->validate($rules);

            $atten->update([
    
                'subject_name' => Library::where('id', $request->subject_name)->first()->name_sub,
                'concept_name' => Concept::where('id', $request->concept_name)->first()->concept_name,
                'conceptDetail' => ConceptDetail::where('id', $request->conceptDetail)->first()->concept_detail_name,
                'learningActivity' => learning::where('id', $request->learningActivity)->first()->learning_name,
                'tutor_evaluation' => $request->tutor_evaluation,
                'student_self' => $request->student_self,
    
            ]);
        }
        session()->flash('success', 'Attendance was update successfully');
        return redirect()->back();

    }

    public function destroy(Request $request, $id){

        LearningPlan::where('atten_id', $id)->delete();
        Homework::where('atten_id', $id)->delete();

        $atten = Atten::whereId($id)->firstOrFail();
        $atten->delete();
        session()->flash('error', 'Attendance was successfully removed');
        return redirect()->back();

    }

    public function history( Atten $atten ){

        $attendanceHistory = Atten::where('student_name', $atten->student_name)->get();

        return view('atten.history')->with([
            'attendanceHistory' => $attendanceHistory
        ]);

    }

    public function pdf( Atten $atten){
        
        $attendanceHistory = Atten::where('student_name', $atten->student_name)->get();

        // $pdf = PDF::loadView('atten.history',[ 'attendanceHistory'=> $attendanceHistory ]);
        // $pdf = pdf::loadView('atten.history', $attendanceHistory);
        // return $pdf->download('atten.pdf');

        // $data = 'hola Mundo';
        // $pdf = PDF::loadView('pdf.invoice', $data);
        // return $pdf->download('invoice.pdf');

        // $users = User::all();
        // view()->share('atten.history',$attendanceHistory);
        $pdf = PDF::loadView('atten.download', compact('attendanceHistory'))
            ->setPaper('a4')
            ->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('Attendance history '.$atten->student_name.'.pdf');
        
        // $pdf = PDF::make('dompdf.wrapper');
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }

}
