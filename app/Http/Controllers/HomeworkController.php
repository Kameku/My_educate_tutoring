<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Homework;
use App\Models\Student;
use App\Models\father;
use Illuminate\Support\Facades\Auth;

class HomeworkController extends Controller
{
    public function index(){

        $userAuth = Auth::user()->name;
        $userRole = Auth::user()->roles->first()->name;

        

        if ($userRole == 'admin' || $userRole == 'tutor' ) {
            $homeworks = Homework::where('tutor_name','=', $userAuth)->get();
        }

        if ($userRole == 'student' || $userRole == 'parent') {
            $homeworks = Homework::where('student_name','=', $userAuth)->get();
        }

        if ($userRole == 'parent') {
            $father = father::where('parent_name','=', $userAuth)->first();
            $enrolment = $father->enrolment->first_name.' '.$father->enrolment->last_name;
            $homeworks = Homework::where('student_name','=', $enrolment)->get();
            // return $enrolment;
        }

        return view('homeworks.index')->with([
            'homeworks' => $homeworks,
        ]);
    }
    public function store(Request $request)
    {
        $rules= [
            'delivery' => 'required',
            'observations' => 'required',
        ];
        request()->validate($rules);

        $max_size = (int)ini_get('upload_max_filesize') * 10240;
        $files = $request->file('homeworks');

        if ($request->hasFile('homeworks')){
            foreach ($files as $file){
                if (Storage::putFileAs('/public/homework/'.$request->student_name , $file, $file->getClientOriginalName() )){
                    
                    Homework::create([
                        'homework_name' => $file->getClientOriginalName(),
                        'tutor_name' => $request->tutor_name,
                        'student_name' => $request->student_name,
                        'delivery' => $request->delivery,
                        'observations' => $request->observations,
                        'atten_id' => $request->atten_id,
        
                    ]);
                }
            }
        }else{

            Homework::create([
                'homework_name' => 'Homework Without Attachment',
                'tutor_name' => $request->tutor_name,
                'student_name' => $request->student_name,
                'delivery' => $request->delivery,
                'observations' => $request->observations,
                'atten_id' => $request->atten_id,
            ]);
            session()->flash('success', 'Homework was created correctly but without any attachments');
            return redirect()->back();
        }
        
        session()->flash('success', 'Homework created successfully');
        return redirect()->back();

    }

    public function update(Request $request, $id){

        $homework = Homework::whereId($id)->firstOrFail();

        $max_size = (int)ini_get('upload_max_filesize') * 10240;
        $files = $request->file('aswerHomeworks');

        if ($request->hasFile('aswerHomeworks')){
            foreach ($files as $file){
                if (Storage::putFileAs('/public/homework/completed/'.$homework->student_name , $file, $file->getClientOriginalName() )){
    
                    $homework->update([
                        'answer_homework' => $file->getClientOriginalName(),
                    ]);
                }
            }
        }else{
            session()->flash('error', 'The Homework could not be created, You need to upload a file, please try again');
            return redirect()->back();
        }
        
        session()->flash('success', 'Homework created successfully');
        return redirect()->back();


    }


    public function destroy(Request $request, $id){

        $homework = Homework::whereId($id)->firstOrFail();
        unlink(public_path('storage/homework/'.$request->student_name.'/'.$homework->homework_name));
        $homework->delete();
        session()->flash('error', 'Homework successfully removed');
        return redirect()->back();
    }

}
