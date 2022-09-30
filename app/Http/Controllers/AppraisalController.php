<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// use Spatie\Permission\Models\Role;

class AppraisalController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:appraisal.index')->only('index');
        $this->middleware('can:appraisal.show')->only('show', 'store');
        $this->middleware('can:appraisal.delete')->only('destroy');
        
    }


    public function index(User $user){
        // listar todos los usuarios excepto los usuarios con roles de nombre ['parent', 'student', 'dissabled']
        $employees = User::whereNotIn('name', ['parent', 'student', 'dissabled'])->get();

        return view('appraisals.index', compact('employees','user'));
        
    }

    public function show(User $user){
        $appraisals = Appraisal::where('employe_id', $user->id)->latest()->get();
      
      return view('appraisals.show', compact('user', 'appraisals'));
    }

    public function store(Request $request){
        $request->validate([
            'appraisals' => 'required|file|max:10240',
            'creator_name' => 'required',
            'assigned' => 'required',
            'delivery_date' => 'required',
            'observations' => 'required'
        ]);
        

        
            $file = $request->file('appraisals');
            $rutaFile = Storage::put('appraisals/'.$request->assigned.$request->employe_id, $file );
            
            // return $file->getClientMimeType();

            Appraisal::create([
                'appraisal_name' => $rutaFile,
                
                'creator_name' => $request->creator_name,
                'employe_id' => $request->employe_id,
                'assigned' => $request->assigned,
                'delivery_date' => $request->delivery_date,
                'observations' => $request->observations,
                'mime' => $file->getClientMimeType(),
            ]);
            
        return redirect()->back()->with('created', 'Created successfully.');
    }

    public function update(Request $request, Appraisal $appraisal ){
        $request->validate([
            'appraisal_answer' => 'required|file|max:10240'
        ]);

        $file = $request->file('appraisal_answer');
        $rutaFile = Storage::put('appraisals/'.$appraisal->assigned.$appraisal->employe_id.'/answer', $file );
        $appraisal->update([
            'appraisal_answer' => $rutaFile,
            'status' => 'Completed'
        ]);


        return redirect()->back()->with('updated', 'Updated successfully, appraisal completed');

    }

    public function destroy(Appraisal $appraisal){

        Storage::delete($appraisal->appraisal_name);
        $appraisal->delete();

        return redirect()->back()->with('deleted', 'Deleted successfully.');
    }

    

    public function download(Appraisal $appraisal){
        // if(!$this->downloadFile(app_path().$appraisal->appraisal_name)){
        //     return redirect()->back();
        // }
        // $file_path = public_path($appraisal->appraisal_name);
        // $file_path = Storage::disk('public')->put($appraisal->appraisal_name, 'Contents');
        // $file_path = Storage::put($appraisal->appraisal_name);
        
        // return response()->download($file_path);
        // return Storage::download($appraisal->appraisal_name);
        // $file = $appraisal->appraisal_name;
        // return Storage::download($file_path);
        // $headers = ['Content-Type: image/jpeg'];
        // return response()->download($appraisal->appraisal_name);

        $headers = [
            'Content Type' => $appraisal->mime

        ];
        return Storage::download($appraisal->appraisal_name, $appraisal->appraisal_name, $headers);
        // if (file_exists($file)) {
        //     return \Response::download($file, 'plugin.jpg', $headers);
        // } else {
        //     echo('File not found.');
        // }

        
    }

    public function myappraisal(User $user){

        $appraisals = Appraisal::where('employe_id', $user->id)->latest()->get();

        return view('appraisals.myappraisal', compact('user', 'appraisals'));
    }

    

   


    
}
