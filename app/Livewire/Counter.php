<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\post;
use Livewire\WithPagination;


class Counter extends Component
{
	use WithPagination;
	public $text;
	public $descripation;
	public $postId;
	public $updated = false;
	public $insert  = false;
	public $newposts = true;

	protected $paginationTheme = 'bootstrap';

	protected $rules = [
        'text' => 'required|min:6',
        'descripation' => 'required',
    ];
    protected $messages = [
        'text.required' => 'Please Enter Title',
        'text.min' => 'Minimum 6 Charcter Title',
        'descripation.required' => 'Please Fill Post descripation'
    ];
    public function newPost()
    {
    	$this->updated = false;
    	$this->insert = true;
    	$this->newposts  = false;

    }
	public function save()
	{
		$this->validate();
		$post = new post;
		$post->title = $this->text;
		$post->descripation = $this->descripation;
		$post->save();
		$this->text = '';
		$this->descripation = '';
		$this->insert  = false;
		$this->newposts  = true;
		
	}
	public function update($id)
	{
		$this->update = true;
		$this->validate();
		$post = new post;
		$post = post::findOrFail($id);
		$post->title = $this->text;
		$post->descripation = $this->descripation;
		$post->save();
		$this->updated = false;
		$this->postId = '';
		$this->text = '';
		$this->descripation = '';

	}
	public function cancle()
	{
		$this->updated = false;
		$this->newposts  = true;
		$this->postId = '';
		$this->text = '';
		$this->descripation = '';
	}
	public function edit($id)
	{
		$this->insert = false;
		$this->updated = true;
		$post = post::findOrFail($id);
		$this->text = $post->title;
		$this->descripation = $post->descripation;
		$this->postId = $post->id;
		$this->newposts  = false;
	}
	public function deleted($id)
	{ 
		$this->updated = false;
		$this->postId = '';
		$this->text = '';
		$this->descripation = '';
		$post = post::findOrFail($id);
		$post->delete();
		$this->newposts = true;
	}
    public function render()
    {
    	$posts = post::orderBy('id','desc')->paginate(3);
        return view('livewire.counter',compact('posts'));
    }
}
