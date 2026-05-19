<?php
namespace App\Livewire\Backend;

use Livewire\Component;  // Import the Livewire Component
use Illuminate\Support\Facades\Auth;
// models payment_methods
use App\Models\PaymentMethod;
// validation for form
use Livewire\WithValidation;


class Bank extends Component
{
	public $editProductModel = false;
    public $resetModel = false;
    public $addProductModel = false;
	public $user;
    public $bankname;
    public $bankaccountnumber;
    public $accountHolderName;
    public $id;
	protected $rules = [
            'bankname' => 'required',
            'bankaccountnumber' => 'required',
            'accountHolderName' => 'required',
    ];
    protected $messages = [
    		'bankname.required' => 'Please Enter Bank Name',
    		'bankaccountnumber.required' => 'Please Enter Bank Account Number',
    		'accountHolderName.required' => 'Please Enter Account Holder Name',
    ];
	public function mount()
    {
		$this->user = Auth::user();
    }
    // validation for form data and insert data into database table payment_methods
   
    public function render()
    {
    	$query = PaymentMethod::orderBy('id', 'desc');
    	$bankinfo = $query->paginate(15);
        return view('livewire.backend.bank',compact('bankinfo'))->layout('components.layouts.admin',['user' => $this->user]);
    }

    // insert data into database table payment_methods 
    public function insertData(){
        $this->validate();
    	$payment_methods = new PaymentMethod();
    	$payment_methods->name = $this->bankname;
    	$payment_methods->account_number = $this->bankaccountnumber;
    	$payment_methods->account_name = $this->accountHolderName;
    	$payment_methods->save();
    	$this->reset(['bankname','bankaccountnumber','accountHolderName']);
    	$this->addProductModel = false;
    }
    public function edit($id){
        $this->editProductModel = true;
        $bank = PaymentMethod::where('id', $id)->first();
        $this->bankname = $bank->name;
        $this->bankaccountnumber = $bank->account_number;
        $this->accountHolderName = $bank->account_name;
        $this->id = $id;

    }
    public function delete($id){
        
        PaymentMethod::where('id', $id)->delete();
        $this->reset(['bankname','bankaccountnumber','accountHolderName']);
        $this->editProductModel = false;
    }
    public function update(){
        $this->validate();
        $payment_methods = PaymentMethod::find($this->id);
        $payment_methods->name = $this->bankname;
        $payment_methods->account_number = $this->bankaccountnumber;
        $payment_methods->account_name = $this->accountHolderName;
        $payment_methods->save();
        $this->reset(['bankname','bankaccountnumber','accountHolderName']);
        $this->editProductModel = false;
    }
    public function updateData(){
    }
   public function addModelClose(){
        $this->addProductModel = false;
   }
   public function addNewModal(){
        $this->addProductModel = true;

  } 
  public function editModelClose(){
        $this->editProductModel = false;
  } 
}
