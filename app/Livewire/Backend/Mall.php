<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Support\Facades\File as FileSystem;



class Mall extends Component
{
	use WithPagination;

	public $newProductModel = false;
	public $editProductModel = false;
	public $resetModel= false;
	public $user;
	public $productPrice;
	public $productName;
	public $postId;
	public $productImageBase64 = '';
	public $imageName;
	protected $paginationTheme = 'bootstrap';
	protected $rulee = [
    		'productName' => 'required',
            'productPrice' => 'required|numeric',
    ];
	protected $rules = [
            'productName' => 'required',
            'productPrice' => 'required|numeric',
            'productImageBase64' => 'required',
    ];
    protected $messages = [
    		'productName.required' => 'Please Enter Product Name',
    		'productPrice.required' => 'Please Enter Product Price',
    		'productPrice.numeric' => 'Please Enter Product Price is Number',
    ];	
    
	public function mount()
    {

        $this->user = Auth::user();
    }
    public function edit($id)
    {	
    	$this->resetValidation();
    	$this->postId = $id;
    	$post = Product::where('id',$id)->first();
    	$this->editProductModel =  true;
    	$this->productName = $post->productName;
    	$this->productPrice = $post->productPrice;
    	$this->imageName = $post->productImage;
    }
    public function update()
    {
    	
    	$fieldsToValidate = ['productPrice', 'productName'];
        $this->validateMultiple($fieldsToValidate);
        $pordut = Product::where('id',$this->postId)->first();
        if($this->productImageBase64){
        	$imageInfo = explode(',', $this->productImageBase64);
        	$decodedImage = base64_decode($imageInfo[1]);
        	$extension = 'png';
        	if (strpos($imageInfo[0], 'jpeg') !== false || strpos($imageInfo[0], 'jpg') !== false) {
        	    $extension = 'jpg';
        	}
        	$filename = uniqid() . '.' . $extension;
        	$publicPath = public_path('backend/productImage');
        	if (!FileSystem::exists($publicPath)) {
		    	FileSystem::makeDirectory($publicPath, 0755, true, true);
			}
			file_put_contents($publicPath . '/' . $filename, $decodedImage);
			$data = array(
				'productName' => $this->productName,
				'productPrice' => $this->productPrice,
				'productImage' => $filename,
			);
			$pordut->update($data);
			$this->editProductModel =  false;
			$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Product Updated Successfully',
                    'icon' => 'success',
                ]);
			$f = public_path('backend/productImage/' .  $this->imageName);
			if (FileSystem::exists($f)) {
				FileSystem::delete($f);
			}
			$this->productName = '';
			$this->productPrice = '';
			$this->productImageBase64 = '';
        }else{
        	$data = array(
				'productName' => $this->productName,
				'productPrice' => $this->productPrice,
			);
			$pordut->update($data);
			$this->editProductModel =  false;
			$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Product Updated Successfully',
                    'icon' => 'success',
                ]);
			$this->productName = '';
			$this->productPrice = '';
			$this->productImageBase64 = '';
        }
    }
    public function pdelete($id)
    {
    	$this->postId = $id;
    	$post = Product::where('id',$id)->first();
    	$this->imageName = $post->productImage;
    	$this->resetModel = true;

    }
    public function resetnow()
    {
        $id = $this->postId;
        $productDelete = Product::where('id', $id);
        if ($productDelete) {
            $productDelete->delete();
        }
        $this->resetModel = false;
        $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Reset Successfully',
                    'icon' => 'success',
                ]);
       $f = public_path('../backend/productImage/' .  $this->imageName);
			if (FileSystem::exists($f)) {
				FileSystem::delete($f);
			}
    }
    public function addNew()
    {

    	$this->validate();

    	// Decode base64 image
    	$imageInfo = explode(',', $this->productImageBase64);
    	$decodedImage = base64_decode($imageInfo[1]);
    	$extension = 'png';
    	if (strpos($imageInfo[0], 'jpeg') !== false || strpos($imageInfo[0], 'jpg') !== false) {
    	    $extension = 'jpg';
    	}
    	$filename = uniqid() . '.' . $extension;

		$publicPath = public_path('backend/productImage');

		if (!FileSystem::exists($publicPath)) {
		    FileSystem::makeDirectory($publicPath, 0755, true, true);
		}

		file_put_contents($publicPath . '/' . $filename, $decodedImage);
		$data = new Product();
		$data->productImage = $filename;
		$data->productName = $this->productName;
		$data->productPrice = $this->productPrice;
		$data->save();
		$this->newProductModel = false;
		$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Product Added Successfully',
                    'icon' => 'success',
                ]);
		$this->productImage = [];
		$this->productName = '';
		$this->productPrice = '';

    }
    public function render()
    {
    	$query = Product::orderBy('id', 'desc');
    	$products = $query->paginate(15);
        return view('livewire.backend.mall',compact('products'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    public function addNewModal()
    {
    	$this->newProductModel = true;
    	$this->productName = '';
    	$this->productPrice = '';
    }
    public function addcloseModal()
    {
    	$this->newProductModel = false;
    }
    public function editModelClose()
    {
    	$this->editProductModel = false;
    }
    public function validateMultiple(array $fields)
    {
        
        foreach ($fields as $field) {
            $this->validateOnly($field, $this->rulee);
        }
    }
}
