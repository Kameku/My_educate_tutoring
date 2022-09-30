<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{

    public function __construct()
    {
       
        $this->middleware('can:tasks.index')->only('index', 'store', 'update', 'delete');
        
    }

    public function index(){

        $mytasks = Auth::user()->tasks;
        $createdbyme = Task::where('from', '=', Auth::user()->name)->latest()->get();
        $employees = User::whereNotIn('name', ['student', 'parent', 'dissabled'])->pluck('name', 'id');

        return view('tasks.index', compact('mytasks', 'employees', 'createdbyme')); 
    }

    public function store(Request $request){
        

        $request->validate([
            'priority' => 'required',
            'title' => 'required',
            'content' => 'required',
            'group' => 'required',
            'sing_to' => 'required',
            'due_date' => 'required'
            
        ]);

        
        Task::create([
            'from' => Auth::user()->name,
            'priority' => $request->input('priority'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'group' => $request->input('group'),
            'sing_to' => $request->input('sing_to'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
            'user_id' => $request->input('sing_to')
          ]);


          return redirect()->back()->with('created', 'The task was successfully created.');
    }

    public function update(Request $request, Task $task){
        $task->update([
            'status' => $request->input('status'),
        ]);
    
        return redirect()->back()->with('updated', 'The task was successfully updated.');
    }

    public function destroy(Task $task){
        $task->delete();

        return redirect()->back()->with('deleted', 'The task was successfully deleted.');
    }
}
