<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Library;
use App\Models\Subject;
use App\Models\Concept;


class ConceptController extends Controller
{
    
    public function store(Request $request)
    {
        $rules = [
            'concept_name' => ['required'],
        ];

        request()->validate($rules);

        Concept::create($request->all());
    
        session()->flash('success', 'Concept was created successfully');
        return redirect()->back();
    }

    public function show(Concept $concept)
    {
        // return $concept;

        $library = $concept->library;
        $details = $concept->conceptsDetails;

        return view('library.concept',[
            'subject' => $library,
            'concept' => $concept,
            'details' => $details
        ]);
    
    }

    public function update(Concept $concept , Request $request)
    {
      
        $concept->update([
            'concept_name' => $request->concept_name
        ]);
        session()->flash('success', 'Updated successfully');
        return redirect()->back();
    }

    public function destroy(Request $request, $id){

        $concept = Concept::whereId($id)->firstOrFail();
        $concept->delete();
        session()->flash('error', 'Concept was successfully removed');
        return redirect()->back();

    }

}
