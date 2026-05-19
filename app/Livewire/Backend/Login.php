<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Hash;
use App\Models\SystemUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Login extends Component
{
	public $username;
	public $password;

	protected $rules = [
        'username' => 'required',
        'password' => 'required',
    ];
    protected $messages = [
        'username.required' => 'Please Enter Your User Name',
        'password.required' => 'Please Enter Your Password'
    ];
	public function authenticate()
	{
		 $this->validate();
		 $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];
        if (\Auth::attempt($credentials)) {
            session()->flash('message','login');
            return redirect()->intended('member');
        } else {
            // Authentication failed...
            session()->flash('error', 'Please Enter Right Username and Password');
            //session()->regenerate();
        }
	}
	public function logout(Request $request	)
    {
        //Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function render()
    {
        return view('livewire.backend.login');
    }


}
