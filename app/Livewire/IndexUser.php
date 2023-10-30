<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Locked;
use Livewire\Component;

class IndexUser extends Component
{

    #[Locked]
    public $role;

    public $search;

    public function render()
    {
        return view('livewire.index-user', [
            'users' => User::role($this->role)->where('username', 'like', '%'.$this->search.'%')->get(),
        ]);
    }
}
