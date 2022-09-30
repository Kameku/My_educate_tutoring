<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserAdminIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function updatingSearch(){
        $this->resetPage();

    }

    public function render()
    {

        $users = User::where('name', 'LIKE', '%' .  $this->search .'%')
                    ->orWhere('email', 'LIKE', '%' .  $this->search .'%')
                    ->orWhere('last_name', 'LIKE', '%' .  $this->search .'%')
                    ->paginate(10);


        return view('livewire.user-admin-index', compact('users'));
    }
}
