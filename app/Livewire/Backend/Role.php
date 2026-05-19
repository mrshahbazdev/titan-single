<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\AddRole;


class Role extends Component
{
	public $user;
	public $editProductModel;
	public $newProductModel;
	public $roleName;
	public $frontPage;
	public $systemManagement;
	public $shoppingMallManagement;
	public $memberManagement;
	public $transactionManagement;
	public $postId;
	public $resetModel = false;
	protected $rules = [
        'roleName' => 'required|unique:addroles',
    	];
    protected $messages = [
    		'roleName.required' => 'Please Enter Role Name',
    		'roleName.unique' => 'Please User Other Name',
    	];
	public function mount()
	{
	 	$this->user =  Auth::user();
	}
	public function edit($id)
	{
		$this->postId = $id;
		$edit = AddRole::where('id', $id)->first();
		$this->roleName = $edit->roleName;
		$this->frontPage = $edit->frontPage;
		$this->systemManagement = $edit->systemManagement;
		$this->shoppingMallManagement = $edit->shoppingMallManagement;
		$this->memberManagement = $edit->memberManagement;
		$this->transactionManagement = $edit->transactionManagement;
		$this->editProductModel = true;
	}
	public function addNew()
	{
		$this->validate();
		$roledata = new AddRole();
		$roledata->roleName = $this->roleName;
		$roledata->frontPage = $this->frontPage? 1 : 0;
		$roledata->systemManagement = $this->systemManagement? 1 : 0;
		$roledata->shoppingMallManagement = $this->shoppingMallManagement? 1 : 0;
		$roledata->memberManagement = $this->memberManagement? 1 : 0;
		$roledata->transactionManagement = $this->transactionManagement? 1 : 0;
		$roledata->save();
		$this->newProductModel = false;
		$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'New Role Insert Successfully',
                    'icon' => 'success',
                ]);
	}
	public function update()
	{
		$id = $this->postId;
		$update = AddRole::where('id', $id)->first();
		$data = array(
			'frontPage' => $this->frontPage? 1 : 0,
			'systemManagement' => $this->systemManagement? 1 : 0,
			'shoppingMallManagement' => $this->shoppingMallManagement? 1 : 0,
			'memberManagement' => $this->memberManagement? 1 : 0,
			'transactionManagement' => $this->transactionManagement? 1 : 0,
		);
		$update->update($data);
		$this->editProductModel = false;
		$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Role updated Successfully',
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
        $roleDelete = AddRole::where('id', $id);
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
    	$query = AddRole::orderBy('id', 'desc');
    	$roles = $query->paginate(15);
        return view('livewire.backend.role',compact('roles'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    public function addNewModal()
    {
    	$this->newProductModel = true;
    	$this->roleName= '';
    	$this->frontPage = '';
    	$this->systemManagement = '';
    	$this->shoppingMallManagement = '';
    	$this->memberManagement = '';
    	$this->transactionManagement = '';
    }
    public function addcloseModal()
    {
    	$this->newProductModel = false;
    }
    public function editModelClose()
    {
    	$this->editProductModel = false;
    }
    public function resetclose()
    {
    	$this->resetModel = false;
    }
    public function validateMultiple(array $fields)
    {
        
        foreach ($fields as $field) {
            $this->validateOnly($field, $this->rulee);
        }
    }
}
