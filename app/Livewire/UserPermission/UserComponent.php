<?php

namespace App\Livewire\UserPermission;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    public $userId;
    public $isOpen = 0;

    #[Rule('required|min:3')]
    public $name;

    #[Rule('required|string|email|unique:users,email')]
    public $email;

    public function create():void
    {
        $this->reset('name','email','userId');

        $this->openModal();
    }

    public function store():void
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);
        session()->flash('success', 'User created successfully.');

        $this->reset('name','email');
        $this->closeModal();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->title;
        $this->email = $user->body;
        $this->openModal();
    }
    public function openModal():void
    {
        $this->isOpen = true;
        $this->resetValidation();
    }
    public function closeModal():void
    {
        $this->isOpen = false;
    }

    public function render():view
    {
        return view('livewire.user-permission.user-component',[
            'users' => User::paginate(5)
        ]);
    }
}
