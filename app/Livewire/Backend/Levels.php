<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\Memberlevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Carbon\Carbon;
use App\Models\product;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as FileSystem;

class Levels extends Component
{
	public $editProductModel = false;
	public $addProductModel = false;
	public $resetModel = false;
	public $user;
	public $commissionRate;
	public $name;
	public $orderReciveLimit;
	public $level;
	public $postId;
	public $ordersGrabbed;
	public $minimumBalanceLimit;
	public array $img = [];
	public $imageName;
	public $memberlevels;
	protected $rules = [
            'name' => 'required',
            'commissionRate' => 'required',
            'orderReciveLimit' => 'required',
            'img' => 'required',
            'level' => 'required|unique:memberlevels',
			'ordersGrabbed' => 'required',
			'minimumBalanceLimit' => 'required',
    ];
    protected $messages = [
    		'name.required' => 'Please Enter Level Name',
    		'commissionRate.required' => 'Please Enter commission Rate Per Order',
    		'orderReciveLimit.required' => 'Please Enter Daily Order Limit',
    		'level.required' => 'Please Enter Level Number',
    		'level.unique' => 'This Level Number Already Enter',
    		'img.required' => 'Please Upload Level Image',
			'ordersGrabbed.required' => 'Please Enter Minimum Referral Users Required',
			'minimumBalanceLimit.required' => 'Please Enter Minimum Balance Limit',
    ];
	public function mount()
    {
		$this->user = Auth::user();
		$this->memberlevels = Memberlevel::all();
		
    }
    public function addNewModal()
    {
    	$this->resets();
    	$this->addProductModel = true;
    }
    public function add()
    {
    	$this->validate();
    	$photo = $this->img[0];
        //Storage::putFile('productImage', new File($photo['path']));
        $file = new File($photo['path']);
        $filename = uniqid() . '.' . $file->extension();
        
		// Get the public directory path
		$publicPath = public_path('backend/level');

		// Ensure the directory exists; if not, create it
		if (!FileSystem::exists($publicPath)) {
		    FileSystem::makeDirectory($publicPath, 0755, true, true);
		}

		// Move the file to the public directory
		$file->move($publicPath, $filename);

		
			 
    	$post = new Memberlevel();
    	$post->name = $this->name;
    	$post->ordersGrabbed = $this->ordersGrabbed;
    	$post->commissionRate = $this->commissionRate;
    	$post->commissionPercentageOrder = 0;
    	$post->minimumBalanceLimit = $this->minimumBalanceLimit;
    	$post->orderReciveLimit = $this->orderReciveLimit;
    	$post->withdrawLimit = 0;
    	$post->minimumWithdrawLimit = 0;
    	$post->maxWithdrawLimit = 0;
    	$post->withdrawFee = 0;
    	$post->level = $this->level;
    	$post->img = $filename;
    	$post->save();
    	$this->addProductModel = false;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Product Added Successfully',
                    'icon' => 'success',
                ]);
    }
    public function edit($id)
    {
    	$this->postId = $id;
    	$post = Memberlevel::where('id',$id)->first();
    	$this->editProductModel = true;
    	$this->name = $post->name;
    	$this->commissionRate = $post->commissionRate;
    	$this->orderReciveLimit = $post->orderReciveLimit;
    	$this->level = $post->level;
		$this->ordersGrabbed = $post->ordersGrabbed;
		$this->minimumBalanceLimit = $post->minimumBalanceLimit;
		
    }
    public function update()
    {
    	$update = Memberlevel::where('id',$this->postId)->first();
    	$data = array(
    		'name' => $this->name,
    		'commissionRate' => $this->commissionRate,
    		'orderReciveLimit' => $this->orderReciveLimit,
    		'level' => $this->level,
			'ordersGrabbed' => $this->ordersGrabbed,
			'minimumBalanceLimit' => $this->minimumBalanceLimit,
    	);
    	$update->update($data);
    	$this->editProductModel = false;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Product Added Successfully',
                    'icon' => 'success',
                ]);
    }
    public function delete($id)
    {
    	$this->resetModel = true;
    	$this->postId = $id;
    	$post = Memberlevel::where('id',$id)->first();
    	$this->imageName = $post->img;
    	
    }
    public function resetnow()
    {
    	$id = $this->postId;
        $productDelete = Memberlevel::where('id', $id);
        if ($productDelete) {
            $productDelete->delete();
        }
        $this->resetModel = false;
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Reset Successfully',
                    'icon' => 'success',
                ]);
       $f = public_path('backend/level/' .  $this->imageName);
			if (FileSystem::exists($f)) {
				FileSystem::delete($f);
			}
    }
    public function resets()
    {
    	$this->name = '';
    	$this->commissionRate = '';
    	$this->orderReciveLimit = '';
    	$this->level = '';
    	$this->img = [];
    }
    public function render()
    {
    	$query = Memberlevel::orderBy('id', 'asc');
    	$leveled = $query->paginate(15);
        return view('livewire.backend.levels',compact('leveled'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    public function resetclose()
    {
    	$this->resetModel = false;
    }
    public function addModelClose()
    {
    	$this->addProductModel = false;
    }
    public function editModelClose()
    {
    	$this->editProductModel = false;
    }
}
