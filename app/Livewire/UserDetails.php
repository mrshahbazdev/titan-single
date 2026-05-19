<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetails extends Component
{
	public $user;
	public function mount()
	{
		$this->user = Auth::user();
	}
    public function render()
    {
        return view('livewire.user-details');
    }
}
