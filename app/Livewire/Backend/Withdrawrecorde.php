<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Services\UserService;
use App\Models\Withdrawlist;
use App\Models\Member;

class Withdrawrecorde extends Component
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
    public function approval($id)
    {
    	$member = Withdrawlist::findOrFail($id);
    	$data = array();
    	$data['oprate'] = 2;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Request Approved',
                    'icon' => 'success',
                ]);
    	$member->update($data);
    }

    public function decline($id)
    {
    	$member = Withdrawlist::findOrFail($id);
        
        $orderAmount = $member->orderAmount;
        $lastStatus = $member->oprate;
        if($lastStatus == 3){
            $this->dispatch('swal',[
                    'title' => 'Error!',
                    'text' => 'Request Already Decline',
                    'icon' => 'error',
                ]);
        }else{
        $userId = $member->userId;
        $memberLast = Member::findOrFail($userId);
        $lastBalance = $memberLast->balance;
        $newBalance = $lastBalance + $orderAmount;
        $datad['balance'] = $newBalance;
        $memberLast->update($datad);

    	$data = array();
    	$data['oprate'] = 3;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Request Decline',
                    'icon' => 'success',
                ]);
    	$member->update($data);
        }
    }
    public function render()
    {	
    	$query = Withdrawlist::orderBy('id', 'desc');
    	
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
        return view('livewire.backend.withdrawrecorde',compact('members'))->layout('components.layouts.admin',['user' => $this->user]);
    }
}
