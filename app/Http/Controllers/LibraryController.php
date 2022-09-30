<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Subject;

class LibraryController extends Controller
{
    public function index()
    {
        $librarys = Library::all();

        return view('library.index',[
            'librarys' => $librarys,
            // 'active' => $active
        ]);

    }

    public function store(Request $request)
    {
        $rules = [
            'name_sub' => ['required'],
        ];

        request()->validate($rules);

        Library::create($request->all());
    
        session()->flash('success', 'Subject was created successfully');
        return redirect()->back();
    }

    public function update(Library $library , Request $request)
    {
      
        $library->update([
            'name_sub' => $request->name_sub
        ]);
        session()->flash('success', 'Updated successfully');
        return redirect()->back();
    }

    public function show(Library $library)
    {

        $concepts = $library->concepts;

        $librarys = Library::all();

        return view('library.show',[
            'librarys' => $librarys,
            'subject' => $library,
            'concepts' => $concepts
        ]);
    }

    public function destroy(Request $request, $id){

    

        $library = Library::whereId($id)->firstOrFail();
        $library->delete();
        session()->flash('error', 'Subject was successfully removed');
        return redirect('dashboard');


    }
}
