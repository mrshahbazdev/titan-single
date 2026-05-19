<?php

namespace App\Livewire\Backend;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Textmanagement;
use App\Models\Bankinfo;
class Text extends Component
{
	public $editProductModel = false;
	public $newProductModel = false;
	public $TextContent;
	public $TextName;
	public $pageName;
	public $id;
	public $user;
    public $res = false;
	protected $rules = [
            'TextName' => 'required',
            'pageName' => 'required',
            'TextContent' => 'required',
    ];
    protected $messages = [
    		'TextName.required' => 'Please Enter Page Title',
    		'pageName.required' => 'Please Enter Page Name',
    		'TextContent.required' => 'Please Enter Page Details',
    ];
	public function mount()
    {
		$this->user = Auth::user();
    }
    public function edit($id)
    {
    	//$this->rest();
    	$page = Textmanagement::where('id', $id)->first();
    	$this->editProductModel = true;
    	$this->id = $id;
    	$this->pageName = $page->pageName;
    	$this->TextName = $page->TextName;
    	$this->TextContent = $page->TextContent;
    }
    public function update(){
        $id = $this->id;
        //$this->validate();
       $bank = Textmanagement::where('id', $id)->first();
        $this->res = true;
        if ($bank) {
          $data = array(
                    "TextName" => $this->TextName,
                    "pageName" => $this->pageName,
                    "TextContent" => $this->TextContent,
                );
            $bank->update($data);
            $this->bankinfoModel = false;
             
            
            $this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'Your Page Detail Updated Successfully',
                    'icon' => 'success',
                ]);
        
    }
    }
    public function render()
    {
    	$query = Textmanagement::orderBy('id', 'desc');
    	$texts = $query->paginate(15);
        return view('livewire.backend.text',compact('texts'))->layout('components.layouts.admin',['user' => $this->user]);
    }
    public function addNew()
    {
    	
    	$this->validate();
    	$page = new Textmanagement();
    	$page->TextContent = $this->TextContent;
    	$page->pageName = $this->pageName;
    	$page->TextName = $this->TextName;
    	$page->save();
    	$this->newProductModel = false;
    	$this->dispatch('swal',[
                    'title' => 'Success!',
                    'text' => 'New Page Insert Successfully',
                    'icon' => 'success',
                ]);
    	$this->rest();
    }
    public function addNewModal()
    {
    	$this->newProductModel = true;
    	$this->TextName = '';
    	$this->pageName = '';
    	$this->TextContent = '';
    }
    public function rest()
    {
        $this->TextName = '';
        $this->TextContent = '';
        $this->pageName = '';
    }
    public function editModelClose()
    {
    	$this->editProductModel = false;
    }
    public function addcloseModal()
    {
    	$this->newProductModel = false;
    }
}
