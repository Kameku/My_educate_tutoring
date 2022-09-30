<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'learning_name' => ['required'],
        ];

        request()->validate($rules);

        learning::create($request->all());
    
        session()->flash('success', 'Concept was created successfully');
        return redirect()->back();
    }

    public function update(learning $learning , Request $request)
    {
        //  return $learning;
        $learning->update([
            'learning_name' => $request->learning_name
        ]);
        session()->flash('success', 'Updated successfully');
        return redirect()->back();
    }


    public function destroy(Request $request, $id){

        $learning = learning::whereId($id)->firstOrFail();
        $learning->delete();
        session()->flash('error', 'Concept was successfully removed');
        return redirect()->back();

    }
}
