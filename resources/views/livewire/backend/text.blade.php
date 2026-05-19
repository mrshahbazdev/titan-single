<div>
   <div>
   <!-- Place the first <script> tag in your HTML's <head> -->


	<script>
	document.addEventListener('livewire:initialized', () => {
    Livewire.on('swal', (event) => {
        const data = event
        swal.fire({
        	icon:data[0]['icon'],
        	title:data[0]['title'],
        	text:data[0]['text'],
        	timer: 3000,
            showConfirmButton: false
        })
    });

});

</script>
<script src="https://cdn.tiny.cloud/1/olfqesi07bh67szt3jimy9rq5oulj7q9tw13hzekiyk8ummq/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<div class="page-body">
 	<div class="container-fluid basic_table">
   		<div class="col-sm-12"> 
                <div class="card">
                  <div class="card-header">
                    <h4>All Pages	</h4>
                    <br>
                    <button wire:click='addNewModal' class="btn btn-primary">Add New <i class="fa fa-plus"></i></button>
                  </div>
                  
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table table-hover">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($texts)
                          		@foreach($texts as $text)
		                            <tr>
		                              <td>{{ $text->TextName }}</td>
		                              
		                              <td><button class="btn btn-default" title="Edit" wire:click="edit({{ $text->id }})" style="margin: 2px;"><i class="fa fa-edit"></i></button></td>
		                              
		                            </tr>
		                        @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
		</div>
	</div>
</div>




@if($editProductModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Edit</h4>
                            <button class="btn-close py-0" type="button" wire:click="editModelClose" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="update">
					            <div class="col-md-12">
					              <label class="form-label" for="Title">Title</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="TextName" placeholder="Title">
					              @error('TextName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					        	
					           <div class="col-md-12">
					              <label class="form-label" for="pageName">Page Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="pageName" placeholder="Enter Page Name">
					              @error('pageName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					               <div class="mb-2" wire:ignore>
								     <label class="block font-medium text-sm text-gray-700" for="page-text-editor">Enter Your Text</label>
								     <textarea class="page_text form-input rounded-md shadow-sm mt-1 block w-full " id="page_text"
								            name="TextContent" rows="20"
								            wire:model.debounce.9999999ms="TextContent"
								            wire:key="TextContent"
								            x-data
								            x-ref="TextContent"
								            x-init="
								                    tinymce.init({
								                         path_absolute: '/',
								                         selector: 'textarea.page_text',
								                         plugins: [
								                              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
								                               'searchreplace wordcount visualblocks visualchars code fullscreen ',
								                               'insertdatetime media nonbreaking save table directionality',
								                               'emoticons template paste textpattern  imagetools help  '
								                                ],
								                                 toolbar: 'insertfile undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | help ',
								                                 relative_urls: false,
								                                 remove_script_host : false,
								                                 document_base_url: '{{config('app.url')}}/',
								                                 language: 'eng',
								                                 setup: function (editor) {
								                                         editor.on('init change', function () {
								                                                   editor.save();
								                                           });
								                                editor.on('change', function (e) {
								                                         @this.set('TextContent', editor.getContent());
								                                 });
								                                  },
								                                  });
								                                 ">
								        </textarea>
								</div>
					              @error('TextContent')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-12">
					              <button class="btn btn-primary addoks"id="addoks"  type="submit">Update</button>
					              <button class="btn btn-danger" wire:click="editModelClose" type="button" data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
					            </div>
					          </form>
					        </div>
					      </div>
		    </div>
		  </div>
</div>
        @endif
        @if($newProductModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Add New Page</h4>
                            <button class="btn-close py-0" type="button" wire:click="addcloseModal" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="addNew">
					            <div class="col-md-12">
					              <label class="form-label" for="Title">Page Title</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="TextName" placeholder="Enter Title">
					              @error('TextName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					        	<div class="col-md-12">
					              <label class="form-label" for="pageName">Page Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="pageName" placeholder="Enter Page Name">
					              @error('pageName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					           <div class="col-md-12">
					               <div class="mb-2" wire:ignore>
								     <label class="block font-medium text-sm text-gray-700" for="page-text-editor">Enter Your Text</label>
								     <textarea class="page_text form-input rounded-md shadow-sm mt-1 block w-full " id="page_text"
								            name="TextContent" rows="20"
								            wire:model.debounce.9999999ms="TextContent"
								            wire:key="TextContent"
								            x-data
								            x-ref="TextContent"
								            x-init="
								                    tinymce.init({
								                         path_absolute: '/',
								                         selector: 'textarea.page_text',
								                         plugins: [
								                              'advlist autolink lists link image charmap print preview hr anchor pagebreak',
								                               'searchreplace wordcount visualblocks visualchars code fullscreen ',
								                               'insertdatetime media nonbreaking save table directionality',
								                               'emoticons template paste textpattern  imagetools help  '
								                                ],
								                                 toolbar: 'insertfile undo redo | styleselect | bold italic forecolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | help ',
								                                 relative_urls: false,
								                                 remove_script_host : false,
								                                 document_base_url: '{{config('app.url')}}/',
								                                 language: 'eng',
								                                 setup: function (editor) {
								                                         editor.on('init change', function () {
								                                                   editor.save();
								                                           });
								                                editor.on('change', function (e) {
								                                         @this.set('TextContent', editor.getContent());
								                                 });
								                                  },
								                                  });
								                                 ">
								        </textarea>
								</div>
					              @error('TextContent')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-12">
					              <button class="btn btn-primary" type="submit">Add New</button>
					              <button class="btn btn-danger" wire:click="addcloseModal()" type="button" data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
					            </div>
					          </form>
					        </div>
					      </div>
		    </div>
		  </div>
</div>
        @endif

</div>
