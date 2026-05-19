<?php
namespace App\Livewire\Backend;

use Livewire\Component;  // Import the Livewire Component
use Illuminate\Support\Facades\Auth;
// models payment_methods
use App\Models\TrialPeriod;
// validation for form
use Livewire\WithValidation;


class Trailperiod extends Component
{
	public $editProductModel = false;
    public $resetModel = false;
    public $addProductModel = false;
	public $days;
    public $id;
    public $user;
    public $tasks;
    public $per_level;
    public $referral_amount;
	protected $rules = [
            'days' => 'required',
            'tasks' => 'required',
            'referral_amount'=> 'required',
            'per_level' => 'required',
    ];
    protected $messages = [
    		'days.required' => 'Please Enter Trail Period Days',
            'tasks.required' => 'Please Enter Per Day Tasks',
            'referral_amount'=> 'Please Enter Referral Amount',
            'per_level' => 'Please Enter Per Level Amount',
    ];
	public function mount()
    {
		$this->user = Auth::user();
    }
    // validation for form data and insert data into database table payment_methods
   
    public function render()
    {
    	$query = TrialPeriod::orderBy('id', 'desc');
    	$bankinfo = $query->paginate(15);
        return view('livewire.backend.trailperiod',compact('bankinfo'))->layout('components.layouts.admin',['user' => $this->user]);
    }

    public function edit($id){
        $this->editProductModel = true;
        $bank = TrialPeriod::where('id', $id)->first();
        $this->days = $bank->days;
        $this->tasks = $bank->tasks;
        $this->per_level = $bank->per_level;
        $this->referral_amount = $bank->referral_amount;
        $this->id = $id;

    }
    
    public function update(){
        $this->validate();
        $payment_methods = TrialPeriod::find($this->id);
        $payment_methods->days = $this->days;
        $payment_methods->tasks = $this->tasks;
        $payment_methods->per_level = $this->per_level;
        $payment_methods->referral_amount = $this->referral_amount;
        $payment_methods->save();
        $this->reset(['days']);
        $this->editProductModel = false;
    }
  public function editModelClose(){
        $this->editProductModel = false;
  } 
}
