<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Concept;
use App\Models\ConceptDetail;
use App\learning;

class ConceptDetailController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'concept_detail_name' => ['required'],
        ];

        request()->validate($rules);

        ConceptDetail::create($request->all());
    
        session()->flash('success', 'Concept was created successfully');
        return redirect()->back();
    }

    public function show(ConceptDetail $conceptDetail ,$id)
    {
        $conceptdetail = ConceptDetail::whereId($id)->firstOrFail();    
        
        $library = $conceptdetail->concept->library;
        $concept = $conceptdetail->concept;
        $learnings = $conceptdetail->Learnings;

        // return $learnings;

        return view('library.learning',[
            'subject' => $library,
            'concept' => $concept,
            'conceptDetail' => $conceptdetail,
            'learnings' => $learnings
            
        ]);
    
    }

    public function update($id , Request $request)
    {
        $conceptdetail = ConceptDetail::whereId($id)->firstOrFail();    
        // return $conceptdetail;

        $conceptdetail->update([
            'concept_detail_name' => $request->concept_detail_name
        ]);
        session()->flash('success', 'Updated successfully');
        return redirect()->back();
    }

    public function destroy(Request $request, $id){

        $concept = ConceptDetail::whereId($id)->firstOrFail();
        $concept->delete();
        session()->flash('error', 'Concept was successfully removed');
        return redirect()->back();

    }
}
