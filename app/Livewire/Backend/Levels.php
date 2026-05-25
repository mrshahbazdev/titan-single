<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use App\Models\MemberLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Carbon\Carbon;
use App\Models\product;
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
	public $imgBase64 = '';
	public $imageName;
	public $memberlevels;
	protected $rules = [
            'name' => 'required',
            'commissionRate' => 'required',
            'orderReciveLimit' => 'required',
            'imgBase64' => 'required',
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
    		'imgBase64.required' => 'Please Upload Level Image',
			'ordersGrabbed.required' => 'Please Enter Minimum Referral Users Required',
			'minimumBalanceLimit.required' => 'Please Enter Minimum Balance Limit',
    ];
	public function mount()
    {
		$this->user = Auth::user();
		$this->memberlevels = MemberLevel::all();
		
    }
    public function addNewModal()
    {
    	$this->resets();
    	$this->addProductModel = true;
    }
    public function add()
    {
    	$this->validate();

		// Decode base64 image
		$imageData = $this->imgBase64;
		$imageInfo = explode(',', $imageData);
		$decodedImage = base64_decode($imageInfo[1]);

		// Determine extension from mime type
		$extension = 'png';
		if (strpos($imageInfo[0], 'jpeg') !== false || strpos($imageInfo[0], 'jpg') !== false) {
		    $extension = 'jpg';
		}

		$filename = uniqid() . '.' . $extension;
		$publicPath = public_path('backend/level');

		if (!FileSystem::exists($publicPath)) {
		    FileSystem::makeDirectory($publicPath, 0755, true, true);
		}

		file_put_contents($publicPath . '/' . $filename, $decodedImage);

		
			 
    	$post = new MemberLevel();
    	$post->levelName = $this->name;
    	$post->ordersGrabbed = $this->ordersGrabbed;
    	$post->commissionRate = $this->commissionRate;
    	$post->price = $this->minimumBalanceLimit;
    	$post->orderReciveLimit = $this->orderReciveLimit;
    	$post->level = $this->level;
    	$post->levelImage = $filename;
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
    	$post = MemberLevel::where('id',$id)->first();
    	$this->editProductModel = true;
    	$this->name = $post->levelName;
    	$this->commissionRate = $post->commissionRate;
    	$this->orderReciveLimit = $post->orderReciveLimit;
    	$this->level = $post->level;
		$this->ordersGrabbed = $post->ordersGrabbed;
		$this->minimumBalanceLimit = $post->price;
		$this->imgBase64 = '';
    }
    public function update()
    {
    	$update = MemberLevel::where('id',$this->postId)->first();
    	$data = array(
    		'levelName' => $this->name,
    		'commissionRate' => $this->commissionRate,
    		'orderReciveLimit' => $this->orderReciveLimit,
    		'level' => $this->level,
			'ordersGrabbed' => $this->ordersGrabbed,
			'price' => $this->minimumBalanceLimit,
    	);

    	if ($this->imgBase64) {
    		$imageData = $this->imgBase64;
    		$imageInfo = explode(',', $imageData);
    		$decodedImage = base64_decode($imageInfo[1]);

    		$extension = 'png';
    		if (strpos($imageInfo[0], 'jpeg') !== false || strpos($imageInfo[0], 'jpg') !== false) {
    		    $extension = 'jpg';
    		}

    		$filename = uniqid() . '.' . $extension;
    		$publicPath = public_path('backend/level');

    		if (!FileSystem::exists($publicPath)) {
    		    FileSystem::makeDirectory($publicPath, 0755, true, true);
    		}

    		file_put_contents($publicPath . '/' . $filename, $decodedImage);

    		if ($update->levelImage && FileSystem::exists(public_path('backend/level/' . $update->levelImage))) {
    		    FileSystem::delete(public_path('backend/level/' . $update->levelImage));
    		}

    		$data['levelImage'] = $filename;
    	}

    	$update->update($data);
    	$this->editProductModel = false;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Level Updated Successfully',
                    'icon' => 'success',
                ]);
    }
    public function delete($id)
    {
    	$this->resetModel = true;
    	$this->postId = $id;
    	$post = MemberLevel::where('id',$id)->first();
    	$this->imageName = $post->levelImage;
    	
    }
    public function resetnow()
    {
    	$id = $this->postId;
        $productDelete = MemberLevel::where('id', $id);
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
    	$this->imgBase64 = '';
    }
    public function render()
    {
    	$query = MemberLevel::orderBy('id', 'asc');
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
