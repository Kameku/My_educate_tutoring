<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:administrator.users.index')->only('index');
        $this->middleware('can:administrator.users.edit')->only('edit', 'update');
        
    }
    
    public function index()
    {
        //
        
        // $from = User::all()->random(1);
        // $from = $from->get('id');
        // dd ($from);

        return view('user_admin.index');
    }

    
    public function edit(User $user)
    {
        
        $roles = Role::all();

        return view('user_admin.edit', compact('user', 'roles'));
    }
    
    

    
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('administrator.users.edit', $user)->with('update', 'Updated successfully.');
    }

   
}
