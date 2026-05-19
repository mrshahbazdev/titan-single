<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use App\Models\Memberlevel;
use App\Models\Todayreward;
use App\Models\Rechargelist;
use App\Models\Userbankinfo;
use Livewire\WithPagination;
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;




class Agent extends Component
{
    use WithPagination;
    public $search;
    public $sph;
    protected $queryString = ['search'];
    public $addnewmodel = false;
    public $user;

    public $username;
    public $ph;
    public $balance;
    public $topUp;
    public $takeTodayOrders;
    public $todaycommission;
    public $credibility;
    public $status;
    public $level;
    public $frozenAmout;
    public $grabOrder; 
    public $orderStatus = false;
    public $withdrawalStatus = false;
    public $memberAgent;
    public $inviteCode;
    public $qrImage;
    public $myCode;
    public $payPassword;
    public $password;
    public $avalibleDailyOrders;
    public $inviteCodeCheck =  false;
    public $addeditmodel;
    public $memberId;
    public $successMessage;
    public $optionClose = false;
    public $debitModel = false;
    public $bankinfoModel = false;
    public $debitCondition = '1';
    public $taskStatus  = 1;
    public $name;
    public $bankName;
    public $cardNumber;
    public $phoneNumber;
    public $resetModel = false;
    public $memberlevels;

   protected $rulee = [
            'username' => 'required|regex:/^\S*$/u',
            'inviteCode' => 'required',
            'balance' => 'required|numeric',
            'ph' => 'required|numeric',
            'debitCondition' => 'required|numeric',
            'name' => 'required',
            'bankName' => 'required',
            'cardNumber' => 'required',
            'phoneNumber' => 'required',
    ];
    protected $rules = [
        'username' => 'required|unique:members|regex:/^\S*$/u',
        'inviteCode' => 'required',
        'balance' => 'required|numeric',
        'ph' => 'required|numeric',
        'password' => 'required',
        'payPassword' => 'required',
        'orderStatus' => 'boolean',
        'withdrawalStatus' => 'boolean',

        
    ];
    protected $messages = [
        'username.regex' => 'The username must not contain spaces.',
        'username.required' => 'Please Enter Username',
        'inviteCode.required' => 'Please Enter Ref Code',
        'balance.required' => 'Please Enter Balance Amout',
        'ph.required' => 'Please Enter Phone Number',
        'password.required' => 'Please Enter Password',
        'payPassword.required' => 'Please Enter Payment Password',

        'name.required' => 'Please enter your name',
        'bankName.required' => 'Please enter bank name',
        'cardNumber.required' => 'Please enter card number',
        'phoneNumber.required' => 'Please enter phone number',
    ];
    protected $paginationTheme = 'bootstrap';
    public function mount()
    {

        $this->user = Auth::user();
        
    }
    public function resetoders($id)
    {
        $this->optionClose = false;
        $this->resetModel = true;
        $this->memberId = $id;
    }
    public function resetnow()
    {
        $id = $this->memberId;
        $todayreward = Todayreward::where('userId', $id);
        if ($todayreward) {
            $todayreward->delete();
        }
        $this->resetModel = false;
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Reset Successfully',
                    'icon' => 'success',
                ]);
    }
    public function resetclose()
    {
        $this->resetModel = false;
    }
    public function bankopenModal($id)
    {
        $this->resetValidation();
        $this->memberId = $id;
        $bank = Userbankinfo::where('userId', $id)->first();
        $this->bankinfoModel = true;
        $this->optionClose = false;
        if ($bank) { 
            
            $this->name = $bank->name;
            $this->bankName = $bank->bankName;
            $this->cardNumber = $bank->cardNumber;
            $this->phoneNumber = $bank->phoneNumber;
        }else{
            $this->name = '';
            $this->bankName = '';
            $this->cardNumber = '';
            $this->phoneNumber = '';
        }
    }
    public function bankupdate()
    { 

        $id = $this->memberId;
        //$this->validate();
        $fieldsToValidate = ['name', 'bankName', 'cardNumber','phoneNumber'];
        $this->validateMultiple($fieldsToValidate);
        $bank = Userbankinfo::where('userId', $id)->first();
        if ($bank) {
          $data = array(
                    "name" => $this->name,
                    "bankName" => $this->bankName,
                    "cardNumber" => $this->cardNumber,
                    "phoneNumber" => $this->phoneNumber,
                );
            $bank->update($data);
            $this->bankinfoModel = false;
            $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Bank Detail Updated Successfully',
                    'icon' => 'success',
                ]);
        }else{
            $add = new Userbankinfo();
            $add->userId = $id;
            $add->name = $this->name;
            $add->bankName = $this->bankName;
            $add->cardNumber = $this->cardNumber;
            $add->phoneNumber = $this->phoneNumber;
            $add->save();
            $this->bankinfoModel = false;
            $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Bank Detail Add Successfully',
                    'icon' => 'success',
                ]);
        }
    }
    public function bankinfoModelClose()
    {
        $this->bankinfoModel = false;
    }
    public function AddNewMember()
    {
        $li = $this->level ? $this->level : 1;
       
        $this->validate();
        $this->myCode = UserService::generateUniqueUsername();
        $CodeCheck = Member::where('myCode', $this->inviteCode)->first();
        $getLevelInfo = Memberlevel::where('level', $li)->first();
        if (!$CodeCheck) {
            $this->inviteCodeCheck = true;
        }else{
            $this->inviteCodeCheck = false;
            $newMember = new Member();
            $newMember->username = $this->username;
            $newMember->ph = $this->ph;
            $newMember->balance = $this->balance;
            $newMember->topUp = $this->topUp = 0;
            $newMember->avalibleDailyOrders = $getLevelInfo->orderReciveLimit;
            $newMember->takeTodayOrders = $this->takeTodayOrders = 0;
            $newMember->todaycommission = $this->todaycommission = 0;
            $newMember->credibility = $this->credibility = 100;
            $newMember->status = $this->status = 1;
            $newMember->memberLevel = $li;
            $newMember->frozenAmout = $this->frozenAmout =0;
            $newMember->grabOrder = $this->grabOrder = 0;
            $newMember->frozenAmout = $this->frozenAmout = 0;
            $newMember->grabOrder = $this->grabOrder =0;
            $newMember->orderStatus = $this->orderStatus ? 1 : 0;
            $newMember->withdrawalStatus = $this->withdrawalStatus ? 1 : 0;
            $newMember->memberAgent = $this->memberAgent = 1;
            $newMember->inviteCode = $this->inviteCode;
            $newMember->qrImage = $this->qrImage;
            $newMember->myCode = $this->myCode;
            $newMember->paymentPassword = md5($this->payPassword);
            $newMember->password = md5($this->password);
            $newMember->withdrawalStatus = $this->withdrawalStatus ? 1 : 0;
            $newMember->taskStatus = $this->taskStatus;
            $newMember->save();
            $this->newUserFormRest();
            $this->addcloseModal();
            $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'New Member Insert Successfully',
                    'icon' => 'success',
                ]);
        }
    }
    public function statusChange($id, $isChecked)
    {   
            $statusUpdate = Member::findOrFail($id);
            $data = array();
            if ($isChecked) {
                $data['status'] = 1;
                $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'User Status Enable',
                    'icon' => 'success',
                ]);
            } else {
                $data['status'] = 0;
                $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'User Status Disable',
                    'icon' => 'success',
                ]);$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'User Status Disable',
                    'icon' => 'success',
                ]);
            }
            
            $statusUpdate->update($data);
            
    }
    public function optionOpen($id)
    {
        $this->memberId = $id;
        $member = Member::findOrFail($id);
        $this->username = $member->username;
        $this->optionClose = true;
    }
    public function debitopenModal($id)
    {
        $this->newUserFormRest();
        $this->memberId = $id;
        $member = Member::findOrFail($id);
        $this->username = $member->username;
        $this->optionClose = false;
        $this->debitModel = true;
        
    }
    public function debitUpdated($id)
    {
        $fieldsToValidate = ['balance','debitCondition'];
        $this->validateMultiple($fieldsToValidate);
        $recharge = new Rechargelist();


        $member = Member::findOrFail($id);
        $lastBalance = $member->balance;
        if ($this->debitCondition == '1') {
            $newBalance = $lastBalance + $this->balance;
            $bs = $this->balance;
            $data['balance'] = $newBalance;
        }else{
            $bs = '-'.$this->balance;
            $newBalance = $lastBalance - $this->balance;
            $data['balance'] = $newBalance;
        }
        $member->update($data);
        $recharge->userId = $id; 
        $recharge->orderAmout = $bs;
        $recharge->username = $this->username;
        $recharge->save();

        $this->debitcloseModal();
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Balance Updated',
                    'icon' => 'success',
                ]);
    }
    public function editMember($id)
    {
        $this->memberlevels = Memberlevel::all();
        $this->optionClose = false;
        $this->addEditModal();
        $member = Member::findOrFail($id);
        $this->username = $member->username;
        $this->inviteCode = $member->inviteCode;
        $this->balance = $member->balance;
        $this->ph = $member->ph;
        $this->level = $member ? $member->memberLevel : null;
        //dd($this->level);
        $this->memberId = $id;
        $this->orderStatus = $member->orderStatus;
        $this->withdrawalStatus = $member->withdrawalStatus;
    }
    

    public function updates($id)
    {
        $memberUpdate = Member::findOrFail($id);
        $fieldsToValidate = ['username', 'inviteCode', 'balance'];
        $this->validateMultiple($fieldsToValidate);
        $CodeCheck = Member::where('myCode', $this->inviteCode)->first();
        if (!$CodeCheck) {
            $this->inviteCodeCheck = true;
        }else{
            $this->inviteCodeCheck = false;
            $data = [
                'balance' => $this->balance,
                'ph' => $this->ph,
                'inviteCode' => $this->inviteCode,
                'withdrawalStatus' => $this->withdrawalStatus,
                'orderStatus' => $this->orderStatus,
                'memberLevel' => $this->level,
            ];
            if ($this->password) {
                $data['password'] = md5($this->password);
            }
            if ($this->payPassword) {
                $data['paymentPassword'] = md5($this->payPassword);
            }

            $memberUpdate->update($data);
            $this->newUserFormRest();
            $this->EditcloseModal();
            $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Member Updated Successfully',
                    'icon' => 'success',
                ]);
        }
    }
    
    public function render()
    {

        $query = Member::where('memberAgent', '1')->orderBy('id', 'desc');

        if ($this->search) {
            
            $query->where('username', 'like', '%' . $this->search . '%'); // Adjust 'name' to the column you want to search
        }
        if ($this->sph) {
            
            $query->where('ph', 'like', '%' . $this->sph. '%'); // Adjust 'name' to the column you want to search
        }
        $members = $query->paginate(10);
        $memberlevels = Memberlevel::all();

        $dailyLimit = Memberlevel::whereIn('level', $members->pluck('memberLevel')->toArray())->pluck('orderReciveLimit','level');
        $usernames = Member::whereIn('myCode', $members->pluck('inviteCode')->toArray())->pluck('username', 'myCode');
        $totalActions = Todayreward::whereIn('userId', $members->pluck('id')->toArray())->pluck('userId');
        $currentDate = Carbon::today();
        $todayActions = Todayreward::whereIn('userId', $members->pluck('id')->toArray())->whereDate('created_at', $currentDate)->pluck('userId');

        $todayCommission = Todayreward::whereIn('userId', $members->pluck('id'))->whereDate('created_at', $currentDate)->get(['userId', 'reward']);
        
        return view('livewire.backend.agent',compact('members','memberlevels','usernames','dailyLimit','totalActions','todayActions','todayCommission'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    
    public function debitcloseModal()
    {
        $this->debitModel = false;
        $this->newUserFormRest();
    }
    
    public function addEditModal()
    {
        $this->addeditmodel = true;
    }

    public function EditcloseModal()
    {
        $this->addeditmodel = false;
        $this->newUserFormRest();
    }
    public function addNewModal()
    {
        $this->addnewmodel = true;
    }

    public function addcloseModal()
    {
        $this->addnewmodel = false;
        $this->newUserFormRest();
    }
    public function optionsClose()
    {
        $this->optionClose = false;
    }
    public function optionsOpen()
    {
        $this->optionClose = true;
    }

    public function newUserFormRest()
    {
        $this->username='';
        $this->inviteCode='';
        $this->balance = '';
        $this->ph = '';
        $this->password = '';
        $this->payPassword = '';
    }
    public function validateMultiple(array $fields)
    {
        
        foreach ($fields as $field) {
            $this->validateOnly($field, $this->rulee);
        }
    }
}
