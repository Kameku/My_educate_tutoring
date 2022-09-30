<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:notice.create')->only('index', 'store', 'delete');
       
        
    }
   
    public function index()
    {
        
        $news = Notice::all();

        return view('notice.index', compact('news'));
    }

   
   
    public function store(Request $request)
    {
        $request->validate([
            'studen_notice' => 'required',
            'creator' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,webp,png|max:1024'
        ]);
       
        $url = Storage::put('notices', $request->file('image'));
        

        Notice::create([
          'creator' => $request->input('creator'),
          'image' => $url,
          'studen_notice' => $request->input('studen_notice'),
        ]);
        

        return redirect()->back()->with('created', 'The ad was successfully created');

    }

   
    public function destroy(Notice $notice)
    {
        Storage::delete($notice->image);
        $notice->delete();
        return redirect()->back()->with('deleted', 'The ad was successfully removed');
    }
}
