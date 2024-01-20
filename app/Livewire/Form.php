<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Form extends Component
{
    use WithPagination;
    // props
    public $name = '';
    public $email = '';
    public $password = '';
    // end props
    public function createNewUser()
    {
        // validation rules
        $this->validate([
            'name' => 'required|string|min:5|max:20'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        // reset values
        $this->reset([
            'name',
            'email',
            'password'
        ]);
        
        // flash session

        session()->flash('success');
    }
    public function render()
    {
        $numberOfUsers = count( User::all());
        $users = User::paginate(2);
        return view('livewire.form',[
            'numberOfUsers' => $numberOfUsers,
            'users' => $users
        ]);
    }
}
