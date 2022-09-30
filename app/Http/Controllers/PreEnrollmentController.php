<?php

namespace App\Http\Controllers;

use App\Models\Preenrolment;
use App\Models\CommentsPreenrolment;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PreEnrollmentController extends Controller
{
    //

    public function index(){

        return view('preenrollment.index');
    } 



    public function store(Request $request){

        $rules=[
            'first_name'      =>['required'],
            'last_name'      =>['required'],
            'school_year'      =>['required'],
            'school_name'      =>['required'],
            'date_of_birth'      =>['required'],
            'parent_name'      =>['required'],
            'parent_mobile'      =>['required'],
            'parent_email'      =>['required'],
            'questions'      =>['required'],
        ];

        $request->validate($rules);

        $enrolment = Preenrolment::create($request->all());
        $enrolment->check = 'Not reviewed';
        $enrolment->save();

        
        // 
        Session::flash('alert-success','Success, the Enquiry has been created successfully.');
        // Session::flash('alert-danger', 'danger');
        // Session::flash('alert-warning', 'warning');
        // Session::flash('alert-success', 'success');
        // Session::flash('alert-info', 'info');
        return redirect()->route('preenrollment.list');
        
    }



    public function list(Preenrolment $preenrolment){

        // $preenrolments = Preenrolment::all();
        $preenrolments = Preenrolment::orderBy('id', 'DESC')->get();

   
       
        return view('preenrollment.list', compact('preenrolments'));
    }

    public function show(Preenrolment $preenrolment){
 
        $commentsPreenrolment =  CommentsPreenrolment::where('preenrolment_id', $preenrolment->id)->get();
        $comentEmpty = json_decode($commentsPreenrolment, true);

        // $avatar = User::where('name', $commentsPreenrolment)

        // return $commentsPreenrolment;

        return view('preenrollment.show')->with([
            'preenrolment' => $preenrolment,
            'commenPreenrolment' => $commentsPreenrolment,
            'comentEmpty' => $comentEmpty
        ]);

    }

    public function update(Request $request, Preenrolment $preenrolment){
        $preenrolment->first_name = $request->first_name;
        $preenrolment->last_name = $request->last_name;
        $preenrolment->school_year = $request->school_year;
        $preenrolment->school_name = $request->school_name;
        $preenrolment->date_of_birth = $request->date_of_birth;
        $preenrolment->parent_name = $request->parent_name;
        $preenrolment->parent_mobile = $request->parent_mobile;
        $preenrolment->parent_email = $request->parent_email;
        $preenrolment->questions = $request->questions;

        $preenrolment->save();

        Session::flash('alert-info','Success, the Enquiry has been updated successfully.');
        return redirect()->route('preenrollment.list');
            
    }

    public function destroy(Preenrolment $preenrolment){
        $preenrolment->delete();

        Session::flash('alert-danger','Success, the Enquiry been deleted successfully.');
        return redirect()->route('preenrollment.list');

    }

    public function alldestroy(Preenrolment $preenrolment){

        // Preenrolment::truncate(); // borra los id empieza de 1

        Preenrolment::whereNotNull('id')->delete();

        Session::flash('alert-danger','Success, the Enquiry has been all deleted successfully.');
        return redirect()->route('preenrollment.list');
    }


    public function commentsStore(Request $request){


        $commentsPreenrolment = CommentsPreenrolment::create($request->all());
        $commentsPreenrolment->save();
        

        
        // 
        Session::flash('alert-success','Success, the Comments has been created successfully.');
        // Session::flash('alert-danger', 'danger');
        // Session::flash('alert-warning', 'warning');
        // Session::flash('alert-success', 'success');
        // Session::flash('alert-info', 'info');
        return redirect()->back();
        // return $request;


    }

    public function check( $id ){

        $pre = Preenrolment::where('id', $id)->first();

        $pre->update([
            'check' => 'Reviewed'
        ]);

        return redirect()->back();
    }



    

}