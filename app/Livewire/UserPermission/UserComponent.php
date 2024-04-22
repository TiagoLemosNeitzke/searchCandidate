<?php

namespace App\Livewire\UserPermission;

use App\Models\Permission;
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

    public $availablePermissions = [];
    public $selectedPermissions = [];

    public function mount(): void
    {
        $this->availablePermissions = Permission::all();
    }
    public function create():void
    {
        $this->reset('name','email','userId','selectedPermissions');

        $this->openModal();
    }

    public function store():void
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('password'),
        ]);
        foreach ($this->selectedPermissions as $permissionId) {
            $permission = Permission::where('permission',$permissionId)->first();
            if ($permission) {
                $user->givePermissionTo($permission->permission);
            }
        }
        session()->flash('success', 'User created successfully.');

        $this->reset('name','email','selectedPermissions');
        $this->closeModal();
    }

    public function edit($id): void
    {
        $user = User::findOrFail($id);
        $this->userId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->selectedPermissions = $user->getAllPermissions()->pluck('permission')->toArray();
        $this->openModal();
    }

    public function update(): void
    {
        if ($this->userId) {
            $user = User::findOrFail($this->userId);

            //  Remove all user permission
            $user->revokeAllPermissions();

            // Assigns the newly selected permissions
            foreach ($this->selectedPermissions as $permissionId) {

                $permission = Permission::where('permission',$permissionId)->first();
                if ($permission) {
                    $user->givePermissionTo($permission->permission);
                }
            }

            $user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            session()->flash('success', 'O usuário foi atualizado com sucesso.');
            $this->closeModal();
            $this->reset('name', 'email', 'userId','selectedPermissions');
        }
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
