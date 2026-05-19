<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Services\UserService;
use App\Models\announcement;

class Addannouncements extends Component
{
	public $user;
	public $message;
	public $userRecord = false;
    public $resetModel = false;
    public $addProductModel = false;
    public $postId;
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	public function mount()
    {
		$this->user = Auth::user(); 
    }
    
    public function add(){
        $this->validate([
           'message' =>'required',
        ]);
        $announcement = new announcement();
        $announcement->message = $this->message;
        $announcement->save();
        $this->message = '';
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Announcement Added Successfully',
                    'icon' =>'success',
                ]);
        $this->addProductModel = false;
    }
    public function render()
    {	
    	$query = announcement::orderBy('id', 'desc');
    	
        $messages = $query->paginate(15);
        return view('livewire.backend.announcement',compact('messages'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    public function addNewModal()
    {
    	$this->addProductModel = true;
    	$this->message= '<p>Special Offer! Get <strong>20% off</strong> on all products. Limited time only!</p>
      <a href="#" class="cta-button">Shop Now <i class="fas fa-arrow-right"></i></a>';
    }
    public function resetclose()
    {
    	$this->resetModel = false;
    }
    public function delete($id)
	{
		$this->postId = $id;
		$this->resetModel = true;
	}
    public function addModelClose()
    {
    	$this->addProductModel = false;
    }
	public function resetnow()
	{
		$id = $this->postId;
        $roleDelete = announcement::where('id', $id);
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
}
