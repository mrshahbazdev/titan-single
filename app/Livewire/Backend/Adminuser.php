<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SystemUser;
use App\Models\AddRole;

class Adminuser extends Component
{
	public $user;
	public $resetModel;
	public $editProductModel;
	public $newProductModel = false;
    public $roles;
    public $selectedRole;
    public $password;
    public $username;
    public $postId;

    protected $rules = [
        'username' => 'required|unique:systemusers|regex:/^\S*$/u',
        'password' => 'required',
        'selectedRole' => 'required',
    ];
    protected $messages = [
        'username.regex' => 'The username must not contain spaces.',
        'username.unique' => 'The username already use',
        'username.required' => 'Please Enter Username',
        'password.required' => 'Please Enter Your Password',
        'selectedRole.required' => 'Please Selet user Role'
    ];
	public function mount()
    {
		$this->user = Auth::user();
        $this->roles = addrole::all();
        $this->selectedRole = $this->roles->first()->roleName ?? null; 
    }
    public function addNew()
    {
        $this->validate();
        $sysuser = new systemuser();
        $sysuser->username = $this->username;
        $sysuser->role = $this->selectedRole;
        $sysuser->password = Hash::make($this->password);
        $sysuser->save();
        $this->newProductModel = false;
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'New User Insert Successfully',
                    'icon' => 'success',
            ]);
        
    }
    public function edit($id)
    {
       $this->postId = $id;
       $editUser = systemuser::where('id', $id)->first();
       $this->username = $editUser->username;
       $this->selectedRole = $editUser->role;
       $this->editProductModel = true;
    }
    public function update()
    {
        $data = array(
            'role' => $this->selectedRole
        );
        $updated  = systemuser::where('id', $this->postId)->first();
        if ($this->password) {
            $data['password'] = Hash::make($this->password);
        }
        $updated->update($data);
        $this->editProductModel = false;
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Edit User Insert Successfully',
                    'icon' => 'success',
            ]);
    }
    public function delete($id)
    {
        $this->postId = $id;
        $this->resetModel = true;
    }
    public function resetnow()
    {
        $id = $this->postId;
        $roleDelete = systemuser::where('id', $id);
        if ($roleDelete) {
            $roleDelete->delete();
        }
        $this->resetModel = false;
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Reset Successfully',
                    'icon' => 'success',
                ]);
    }
    public function render()
    {
    	$query = systemuser::orderBy('id', 'desc');
    	$users = $query->paginate(15);
        $usernames = addrole::whereIn('roleName', $users->pluck('role')->toArray())->pluck('roleName','roleName');
        return view('livewire.backend.adminuser',compact('users','usernames'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    public function resetclose()
    {
        $this->resetModel = false;
    }
    public function addcloseModal()
    {
    	$this->newProductModel = false; 
    }
    public function addNewModal()
    {
    	$this->newProductModel = true;
    }
    public function editcloseModal()
    {
        $this->editProductModel = false;
    }
}
