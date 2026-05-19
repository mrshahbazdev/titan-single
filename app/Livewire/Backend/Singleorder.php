<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ContinuousOrder;
use App\Models\Member;
use App\Models\MemberLevel;
use App\Models\TodayReward;
use App\Models\Product;



class Singleorder extends Component
{
	public $user;
	public $uid;
	public $resetModel = false;
    public $addnewmodel = false;
	public $balance;
	public $orderByLevel;
	public $username;
	public $todayorder;
	public $allorders;
    public $perPage = 20;
    public $continuous;
    public $totalOrderYets;
    public $postId;
    public $deleteId;
    public $search;

	public function mount(Request $request)
    {
    	$this->uid = $request->query('uid');
    	if (empty($this->uid)) {
            return redirect('/member');
        }
        $query = Member::where('id', $this->uid)->first();
        $this->username = $query->username;
        $this->balance = $query->balance;
        $this->orderByLevel = MemberLevel::where('level', $query->memberLevel)->first()->orderReciveLimit;

        $currentDate = Carbon::today();
        $this->todayorder = TodayReward::where('userId', $query->id)->whereDate('created_at', $currentDate)->count();
        $this->allorders = TodayReward::where('userId', $query->id)->count();

        $this->user = Auth::user();
    }
    public function setOder($id,$totalOrderYet)
    {
        $this->addnewmodel= true;
        $this->postId = $id;
        $this->totalOrderYets = $totalOrderYet;
        $this->continuous = '';
    }
    public function AddNewOder()
    {
        $this->totalOrderYets;
        if ($this->continuous > $this->totalOrderYets) {
            $sets = new ContinuousOrder();
            $sets->userId = $this->uid;
            $sets->productId =  $this->postId;
            $sets->continuous = $this->continuous;
            $sets->status = 0; 
            $sets->save();
            $this->addnewmodel = false;
            $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Order set Successfully',
                    'icon' => 'success',
                ]);
        }else{
            $this->addnewmodel= false;
            $this->dispatch('swal',[
                    'title' => 'Error!',
                    'text' => 'Please Enter Value upper to totalOrderYet',
                    'icon' => 'error',
                ]);
            $this->addnewmodel= true;
        }
    }
    public function delete($id)
    {
        $this->deleteId = $id;
        $this->resetModel = true;

    }
    public function resetnow()
    {
        $id = $this->deleteId;
        $roleDelete = ContinuousOrder::where('id', $id);
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
        $query = Product::orderBy('id','desc');

        if ($this->search) {
            
            $query->where('productPrice', '<=', $this->search ); // Adjust 'name' to the column you want to search
        }
        
        //$members = $query->paginate(10);
        $singleOrders = ContinuousOrder::where('userId',$this->uid)->get();
        $articles = $query->paginate($this->perPage);
    	$productPrices = Product::whereIn('id', $singleOrders->pluck('productId')->toArray())->pluck('productPrice','id');
        return view('livewire.backend.singleorder',compact('singleOrders','productPrices','articles'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    public function resetclose()
    {
        $this->resetModel =false;
    }
    public function addcloseModal()
    {
        $this->addnewmodel = false;
    }
    public function loadMore()
    {
        $this->perPage += 20;
    }
}
