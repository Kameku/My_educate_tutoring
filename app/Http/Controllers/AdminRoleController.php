<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:administrator.roles.index')->only('index');
        $this->middleware('can:administrator.roles.create')->only('create', 'store');
        $this->middleware('can:administrator.roles.edit')->only('edit', 'update');
        $this->middleware('can:administrator.roles.destroy')->only('destroy');
        
    }
   
    public function index()
    {
        
        return view('roles_admin.index');
    }

    
    public function create()
    {
       
        $permissions = Permission::all();
        return view('roles_admin.create', compact('permissions'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

      $role = Role::create([
          'name' => $request->input('name'),
          'description' => $request->input('description'),
        ]);
     

       //asignamos permisos, accedemos al o¡bjeto rol y a la relacion permissions
       $role->permissions()->sync($request->permissions);

       return redirect()->route('administrator.roles.index', $role)->with('info', 'Role created successfully.');
    }

   
    

    
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        
        return view('roles_admin.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

      $role->update($request->all());
     

       //asignamos permisos, accedemos al objeto rol y a la relacion permissions
       $role->permissions()->sync($request->permissions);

       return redirect()->route('administrator.roles.index', $role)->with('info', "Role **$role->name successfully updated.");
    }

    
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('administrator.roles.index', $role)->with('delete', "Role **$role->name successfully deleted.");
    }
}
