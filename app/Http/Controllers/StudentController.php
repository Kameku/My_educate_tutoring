<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Enrolment;
use App\Models\father;
use App\AssignTutor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\VarDumper\Cloner\Stub;
use App\Helpers\Helper;

class StudentController extends Controller
{
    public function index(){

        // $students = Student::all();

        //Trae todos los estudiantes
        $students = Student::all();
        //Recorre los estudiantes para traer el enrolment de cada uno atraves de su relacion 
        foreach ($students as $student){
             $students = $student->enrolment;
        }
        //crea una colecion de enrolments en base al foreach anterior
        $studentEnrolments = $students->all();
        //Crea la consulta de eloquen para traer solo ciertos archivos de esa relacion.
        $studentEnrolments = $studentEnrolments->where('status', 'Active');

        return view('students.index')->with([

            'students' => $studentEnrolments,

        ]);
    }
    

    public function store(Request $request)
    {
        $enrolment = Enrolment::find($request->enrolment_id);
        $searchParent = User::where('email' ,'=', $enrolment->parent_email)->get();

        if($searchParent->count() > 0){
            
            $father = $searchParent->first()->id;
            $userS = new User();
            $userS->code_id = Helper::IDGenerator(new User, 'code_id', 3, 'ST');
            $userS->name = $enrolment->first_name;
            $userS->last_name = $enrolment->last_name;
            $userS->email = $userS->code_id.'@myeducatetutoring.com';
            $userS->password = bcrypt($userS->code_id);
            $userS->profile_photo = 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name='.$enrolment->first_name;
            $userS->save();
            $userS->assignRole('Student');
            
            $student = new Student();
            $student->user_id = $userS->id;
            $student->enrolment_id = $request->enrolment_id;
            $student->save();

            $parent = new father();
            $parent->user_id = $father;
            $parent->student_id = $student->id;
            $parent->save();
            
            $enrolment = Enrolment::find($request->enrolment_id);
            $enrolment->status = 'Active';
            $enrolment->save();

            session()->flash('success', 'The student has been activated successfully');
            return redirect()->back();

        }else{

            $user = new User();
            $user->code_id = Helper::IDGenerator(new User, 'code_id', 3, 'PT');
            $user->name = $enrolment->parent_name;
            $user->email = $enrolment->parent_email;
            $user->password = bcrypt($user->code_id);
            $user->profile_photo = 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name='.$enrolment->parent_name;
            $user->save();
            $user->assignRole('Parent');

            $userS = new User();
            $userS->code_id = Helper::IDGenerator(new User, 'code_id', 3, 'ST');
            $userS->name = $enrolment->first_name;
            $userS->last_name = $enrolment->last_name;
            $userS->email = $userS->code_id.'@myeducatetutoring.com';
            $userS->password = bcrypt($userS->code_id);
            $userS->profile_photo = 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name='.$enrolment->first_name;
            $userS->save();
            $userS->assignRole('Student');
            
            $student = new Student();
            $student->user_id = $userS->id;
            $student->enrolment_id = $request->enrolment_id;
            $student->save();

            $parent = new father();
            $parent->user_id = $user->id;
            $parent->student_id = $student->id;
            $parent->save();

            $enrolment = Enrolment::find($request->enrolment_id);
            $enrolment->status = 'Active';
            $enrolment->save();

            session()->flash('success', 'The student has been activated successfully');
            return redirect()->back();

        }
    }

    public function profile(){

        $userAuth = Auth::user()->name;
        $father = father::where('parent_name','=', $userAuth)->first();
        $enrolment = $father->enrolment;

        $age = Carbon::parse($enrolment->date_of_birth)->age; 

        // return $enrolment;

        return view('students.profile')->with([
            'enrolment' => $enrolment,
            'age' => $age,
        ]);
    }

    public function disable(Student $student, $id){

        $student= Student::where('id' ,'=',$id)->first();

        $student->user->update([ 
            'password' => bcrypt('0987654321')
        ]);

        $enrolment = Enrolment::find($student->enrolment_id);
        $enrolment->status = 'Disable';
        $enrolment->save();

        

        session()->flash('success', 'The student has been disable successfully');
        // return $student->enrolment;

        return redirect()->back(); 
        
        // Connor.Thompson@myeducatetutoring.com
        // tutoring.Thompson

    }


    public function former(){

        //Trae todos los estudiantes
        $students = Student::all();
        //Recorre los estudiantes para traer el enrolment de cada uno atraves de su relacion 
        foreach ($students as $student){
             $students = $student->enrolment;
        }
        //crea una colecion de enrolments en base al foreach anterior
        $studentEnrolments = $students->all();
        //Crea la consulta de eloquen para traer solo ciertos archivos de esa relacion.
        $studentEnrolments = $studentEnrolments->where('status', 'Disable');

        return view('students.former')->with([
            'formers' => $studentEnrolments,
        ]);
    }

    public function reactivate($id){

        $enrolment = Enrolment::where('id', $id)->first();

        $enrolment->student->user->update([ 
            'password' => bcrypt('tutoring.'.$enrolment->last_name)
        ]);;

        $enrolment = Enrolment::find($id);
        $enrolment->status = 'Active';
        $enrolment->save();

        session()->flash('success', 'The student has been reactivate successfully');
        return redirect()->back(); 
        
    }

    public function list(){

        //Trae todos los estudiantes
        $students = Student::all();
        //Recorre los estudiantes para traer el enrolment de cada uno atraves de su relacion 
        foreach ($students as $student){
             $students = $student->enrolment;
        }
        //crea una colecion de enrolments en base al foreach anterior
        $studentEnrolments = $students->all();
        $studentEnrolments = $studentEnrolments->where('status','!=', 'Inactive');

        return view('students.list')->with([
            'students' => $studentEnrolments,
        ]);
    }
}
