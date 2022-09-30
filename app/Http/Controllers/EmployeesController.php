<?php

namespace App\Http\Controllers;

use App\Models\Asignature;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Helpers\Helper;
use App\Models\Enrolment;

class EmployeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:employees.index')->only('index');
        $this->middleware('can:employees.create')->only('create', 'store');
        $this->middleware('can:employees.edit')->only('edit', 'update');
        // $this->middleware('can:administrator.roles.destroy')->only('destroy');
        
    }
    
    public function index(){

        $roles = Role::where('id', '>', 4)->get();
        
        

    return view('employees.index', compact('roles'));
    }
   

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'name' => 'required',
           'last_name' => 'required',
           'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $employee = new User;
        $employee->code_id = Helper::IDGenerator(new User, 'code_id', 3, 'AS');
        $employee->name = $request->input('name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->password = Hash::make($request->input('password'));
        $employee->profile_photo = 'https://ui-avatars.com/api/?background=random&rounded=true&format=svg&name='.$request->input('name').'-'.$request->input('last_name');
        $employee->email_verified_at = now();
        $employee->remember_token = Str::random(10);
        $employee->save();
        
        $employee->assignRole([$request->input('roles')]);

        return redirect()->route('employees.index')->with('create', 'Created successfully.');
       

    }

    public function show(User $user){

        $nameCompleted = $user->name.' '.$user->last_name;

        $enrolment = Enrolment::where('first_name', $user->name )
                                ->where('last_name', $user->last_name)
                                ->first();
        
        $enrolmentForParent = Enrolment::where('parent_email' , $user->email )->first();

        // return $enrolmentForParent;

        //filtro para contar campos null de la tabla employes
        $countItems = collect($user)->except(
            'id','created_at','updated_at','user_id',
            'emergency_name2','emergency_relationship2','emergency_number2',
            'emergency_name3','emergency_relationship3','emergency_number3',
            'emergency_name4','emergency_relationship4','emergency_number4',
        );
        $filter = $countItems->filter(function($value){
            return $value != null;
        });

        $nullEmploye = $filter->count();


         //filtro para contar campos null de la tabla employes con la relacion de employes details
        $countItems = collect($user)->except(
            'id','created_at','updated_at',
        );

        $filter = $countItems->filter(function($value){
            return $value != null;
        });

        $nullEmployeDetails = $filter->count();

        $totalNullPorcent = round(($nullEmploye + $nullEmployeDetails) * (1.35)); // Formular para el porcentaje de llenado del perfil, 
        
       $age = Carbon::parse($user->date_of_birth)->age; 

    //    return $age;


      return view('employees.show', compact('user', 'countItems', 'filter', 'nullEmploye', 'countItems', 'nullEmployeDetails', 'totalNullPorcent', 'age', 'enrolment', 'enrolmentForParent'));

    }

    public function edit(User $user){

    $subjects = Asignature::all();
    $age = Carbon::parse($user->date_of_birth)->age; 

        $employesAdmin = User::role(['tutor', 'admin', 'financial'])->get();
       
    return view('employees.edit', compact('user', 'subjects', 'age', 'employesAdmin'));
    }


    public function update(Request $request, User $user){

        $user->update(request()->except('subjects'));
        
        if ($request->subjects) {
            # code...
            $user->asignatures()->sync($request->subjects);
        }

        if ($request->file('profile_photo')) {
            # code...
            $url = Storage::put('img/profile', $request->file('profile_photo'));
            $url = env('APP_URL').'/'.$url;

            $user->update([
                'profile_photo' => $url
            ]);

        }
         // $file = Storage::disk('documents/'.$user->name.'_'.$user->name)->get('cv_resumen');

            // return $file;

        if ($request->file('cv_resumen')) {
            $url = Storage::put('documents/'.$user->name.'_'.$user->last_name, $request->file('cv_resumen'));
            

            $user->update([
                'cv_resumen' => $url
            ]);
        }

        if ($request->file('statement_practice')) {
            $url = Storage::put('documents/'.$user->name.'_'.$user->last_name, $request->file('statement_practice'));
            

            $user->update([
                'statement_practice' => $url
            ]);
        }

        if ($request->file('qualification')) {
            $url = Storage::put('documents/'.$user->name.'_'.$user->last_name, $request->file('qualification'));
            

            $user->update([
                'qualification' => $url
            ]);
        }

        if ($request->file('teacher_registration')) {
            $url = Storage::put('documents/'.$user->name.'_'.$user->last_name, $request->file('teacher_registration'));
            

            $user->update([
                'teacher_registration' => $url
            ]);
        }

        if ($request->file('registration_people')) {
            $url = Storage::put('documents/'.$user->name.'_'.$user->last_name, $request->file('registration_people'));
           

            $user->update([
                'registration_people' => $url
            ]);
        }

        if ($request->file('ata_acreditation')) {
            $url = Storage::put('documents/'.$user->name.'_'.$user->last_name, $request->file('ata_acreditation'));
            

            $user->update([
                'ata_acreditation' => $url
            ]);
        }

        if ($request->file('subject_specialized')) {
            $url = Storage::put('documents/'.$user->name.'_'.$user->last_name, $request->file('subject_specialized'));
            

            $user->update([
                'subject_specialized' => $url
            ]);
        }


        
        return redirect()->route('employees.edit', compact('user'))->with('updated', 'Updated successfully.');


        
    }

    public function deactivate(User $user){

        $olds_roles = $user->getRoleNames();
        $user->update([
            'olds_roles' => $olds_roles
        ]);

       $user->syncRoles(['dissabled']);
       
        return redirect()->route('employees.show', compact('user'))->with('dissabled', 'Dissabled successfully.');

    }

    public function activate(User $user){

        $olds_roles = $user->olds_roles;
        $olds_roles = json_decode($olds_roles);
        // return $olds_roles;

        $user->syncRoles($olds_roles);
        
       
        return redirect()->route('employees.show', compact('user'))->with('activate', 'Activate successfully.');

    }

    public function destroy(User $user)
    {  
        
       
        $user->delete(); 
        return redirect()->route('employees.index', compact('user'))->with('delete', 'Delete successfully.');
       
    }


    

}
