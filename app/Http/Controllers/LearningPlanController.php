<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use App\Models\ConceptDetail;
use App\Models\LearningPlan;
use App\Models\Learning;
use App\Models\Library;
use Illuminate\Http\Request;

class LearningPlanController extends Controller
{
   
    
    public function store(Request $request)
    {
        // return $request;
        
        $rules = [
            'subject_name' => 'required',
            'concept_name' => 'required',
            'conceptDetail' => 'required',
            'learningActivity' => 'required',
            // 'atten_id' => ['required', 'min:0'],
        ];
        request()->validate($rules);
        
        $plan = new LearningPlan();
        $plan->subject_name =  Library::where('id', $request->subject_name)->first()->name_sub;
        $plan->concept_name = Concept::where('id', $request->concept_name)->first()->concept_name;
        $plan->conceptDetail = ConceptDetail::where('id', $request->conceptDetail)->first()->concept_detail_name;
        $plan->learningActivity = learning::where('id', $request->learningActivity)->first()->learning_name;
        $plan->atten_id = $request->atten_id;
        $plan->save();

        // return $request;
        session()->flash('success', 'Learning plan was created successfully');
        return redirect()->back();
    }

    public function destroy($id){

        $learAdd = LearningPlan::whereId($id)->firstOrFail();
        $learAdd->delete();

        session()->flash('error', 'Concept was successfully removed');
        return redirect()->back();


    }
  

    

  
}
