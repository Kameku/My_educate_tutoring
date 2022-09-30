<?php

namespace App\Http\Controllers;

// use App\Employe;
use App\Models\Library;
use App\Models\Student;
use App\Models\AssignTutor;
use App\Models\User;
use Illuminate\Http\Request;


class AssignTutorController extends Controller
{
    public function index()
    {
       
        $subjects = Library::all();
        $assigns = AssignTutor::all();
        $employessTutors = User::role('tutor')->get();

        //Trae todos los estudiantes
        $students = Student::all();
        //Recorre los estudiantes para traer el enrolment de cada uno atraves de su relacion 
        foreach ($students as $student){
             $students = $student->enrolment;
        }
        //crea una colecion de enrolments en base al foreach anterior
        $studentEnrolments = $students->all();
        $studentEnrolments = $studentEnrolments->where('status','=', 'Active');


        return view('assign.index')->with([
            'students' => $studentEnrolments,
            'employessTutors' => $employessTutors,
            'subjects' => $subjects,
            'assigns'  => $assigns,     
            
            ]);
    }

    public function edit(Request $request){

        $rules = [
            'tutor_name' => 'required',
            'student_name' => 'required',
            'subject' => 'required',
        ];

        session()->flash('success', 'The tutor was assigned correctly');
        request()->validate($rules);

        $assign = AssignTutor::find($request->assign_id);

        $assign->tutor_name = $request->tutor_name;
        $assign->save();

        // return $assign;
        session()->flash('success', 'The tutor was assigned correctly');
        return redirect()->back();






    }

    public function store(Request $request){

        $rules = [
            'tutor_name' => 'required',
            'student_name' => 'required',
            'subject' => 'required',
        ];

        request()->validate($rules);

        // return $request;

        AssignTutor::create($request->all());
        session()->flash('success', 'The tutor was assigned correctly');
        return redirect()->back();

    }

    public function destroy( AssignTutor $assign)
    {
        $assign->delete();
        session()->flash('error', 'Assignment Tutor was successfully removed');
        return redirect()->back();
    }
}