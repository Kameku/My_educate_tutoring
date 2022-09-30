<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Term;

class TermController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:TermDates');
    }

    public function index(){

        $term = Term::where('id', 1)->first();

        // return $term;

        return view('term.index')->with([
             
            'term' => $term
            
            ]);
    }


    public function store(Request $resquest){

        $term = Term::where('id', 1)->first();

        $term->update($resquest->all());

        session()->flash('success', 'Term dates was save successfully');
        return redirect()->back();
    }
}
