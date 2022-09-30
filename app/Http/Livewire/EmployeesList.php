<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class EmployeesList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function updatingSearch(){
        $this->resetPage();

    }
    public function render()
    {
            // this query performs a filter by roles with id greater than two
            $employees = User::WhereHas('roles', function($query){
                            $query->where('id', '>', 2);
                        })
                        // this query allows the search from the previous filter by name, last name and email
                        ->where(function($query) {
                            $query->where('name', 'LIKE','%'.$this->search. '%')
                                  ->orWhere('last_name', 'LIKE', '%' .$this->search. '%')
                                  ->orWhere('email', 'LIKE', '%' .  $this->search .'%');
                        })
                        // ->orderByDesc('arrived_at')
                        // ->latest()
                        ->paginate(8);

        return view('livewire.employees-list', compact('employees'));
    }
}
