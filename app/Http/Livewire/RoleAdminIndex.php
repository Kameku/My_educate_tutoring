<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class RoleAdminIndex extends Component
{

    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage();

    }
    public function render()
    {

        $roles = Role::where('name', 'LIKE', '%' .  $this->search .'%')
                    ->orWhere('description', 'LIKE', '%' .  $this->search .'%')
                    ->simplePaginate(10);

        return view('livewire.role-admin-index', compact('roles'));
    }
}
