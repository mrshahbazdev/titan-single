<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use App\Services\UserService;
use App\Models\rechargerequest;
use App\Models\Member;
use App\Models\Rechargelist;
use App\Models\user_trial;

class Rechargerequested extends Component
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
    	$member = rechargerequest::findOrFail($id);
        $rechargelist = new Rechargelist();
        // get user_id from member
        $userId = $member->user_id;
        // get username from member where id = $userId
        $username = Member::where('id', $userId)->first()->username;
        // get balance from member where id = $userId
        $balance = Member::where('id', $userId)->first()->balance;
        // update member balance 
        $newBalance = $balance + $member->amount;
        Member::where('id', $userId)->update(['balance' => $newBalance]);
       
        // insert data in Rechargelist
        $rechargelist->userId = $userId;
        $rechargelist->username = $username;
        $rechargelist->orderAmout = $member->amount;
        $rechargelist->save();
        // update user_trials payment_status where user_id = $userId
        // user_trial::where('user_id', $userId)->update(['payment_status' => 'paid']);

    	$data = array();
    	$data['status'] = 2;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Request Approved',
                    'icon' => 'success',
                ]);
    	$member->update($data);
    }

    public function decline($id)
    {
    	$member = rechargerequest::findOrFail($id);
        
        $lastStatus = $member->status;
    	$data = array();
    	$data['status'] = 0;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Request Decline',
                    'icon' => 'success',
                ]);
    	$member->update($data);
        
    }
    public function render()
    {	
    	$query = rechargerequest::orderBy('id', 'desc');
    	$query->where('status', 1);
        if ($this->search) {
         	$this->username = false;
            $this->userRecord = $this->search;
            $query->where('username', 'like', '%' . $this->search . '%'); 
        }
        if ($this->username) {
			$this->userRecord = $this->username;
            $query->where('username', 'like', '%' . $this->username . '%'); 
        }
        $usernames = Member::whereIn('id', $query->pluck('user_id')->toArray())->pluck('username');
        $members = $query->paginate(15);
        return view('livewire.backend.rechargerequest',compact('members','usernames'))->layout('components.layouts.admin',['user' => $this->user]);
    }
}
