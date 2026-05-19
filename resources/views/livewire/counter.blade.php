<div>
@if($insert)
<form wire:submit.prevent="save">
  <div class="form-group">
  	
    <label for="exampleFormControlInput1">Post Title</label>
    <input type="tile" wire:model='text' class="form-control" id="exampleFormControlInput1"  placeholder="Enter Post Title">
    @error('text') <span style="color: red;">{{ $message }}</span> @enderror
  </div>
  
    <div class="form-group">
    	
    <label for="exampleFormControlTextarea1">Post Descripation</label>
    <textarea class="form-control" wire:model="descripation" id="exampleFormControlTextarea1" rows="3"></textarea>
    @error('descripation') <span style="color: red;">{{ $message }}</span> @enderror
  </div>
  <br>
  <input type="submit" class="btn btn-success" value="save">
</form>
@endif
@if($newposts)
<br>
<button wire:click="newPost" class="btn btn-success">New Post</button>
<br>
@endif
@if($updated)
<form wire:submit.prevent="update({{ $postId; }})">
  <div class="form-group">
  	
    <label for="exampleFormControlInput1">Post Title</label>
    <input type="tile" wire:model='text' class="form-control" id="exampleFormControlInput1" value="{{ $text }}" placeholder="Enter Post Title">
    @error('text') <span style="color: red;">{{ $message }}</span> @enderror
  </div>
  
    <div class="form-group">
    	
    <label for="exampleFormControlTextarea1">Post Descripation</label>
    <textarea class="form-control" wire:model="descripation" id="exampleFormControlTextarea1" rows="3"></textarea>
    @error('descripation') <span style="color: red;">{{ $message }}</span> @enderror
  </div>
  <br>
  <input type="submit" class="btn btn-success" value="Update"> 
  <input type="button" class="btn btn-danger" value="Cancle" wire:click="cancle"> 
</form>
@endif
<br>
@foreach ($posts as $post)
<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">{{ $post->title; }}</h5>
    <p class="card-text">{{ $post->descripation; }}</p>
    <a href="#" wire:click="edit({{ $post->id; }})">Edit</a>
    <a href="#" wire:click="deleted({{ $post->id; }})">Deleted</a>
  </div>
</div>
<br>
@endforeach 
{{ $posts->links() }}
</div>