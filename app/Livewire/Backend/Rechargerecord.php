<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Services\UserService;
use App\Models\Rechargelist;


class Rechargerecord extends Component
{
	public $user;
	public $username;
	public $search;
	public $userRecord = false;
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	
    public function mount()
    {
		$this->user = Auth::user();
        $this->username = request()->query('username', '');
    }
    public function render()
    {
    	$query = RechargeList::orderBy('id', 'desc');
    	
        if ($this->search) {
         	$this->username = false;
            $this->userRecord = $this->search;
            $query->where('username', 'like', '%' . $this->search . '%'); 
        }
        if ($this->username) {
			$this->userRecord = $this->username;
            $query->where('username', 'like', '%' . $this->username . '%'); 
        }
        
        $members = $query->paginate(15);
        return view('livewire.backend.rechargerecord',compact('members'))->layout('components.layouts.admin',['user' => $this->user]);
    }
}
