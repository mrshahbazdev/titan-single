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
<script src="https://cdn.tiny.cloud/1/npx8gmi42fypd2z1vcxn4o5a9eok6zy5s3l963nhp79oj8y4/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<div class="page-body">
 	<div class="container-fluid basic_table">
   		<div class="col-sm-12"> 
                <div class="card">
                  <div class="card-header">
                    <h4>All Banks Information	</h4>
                    <br>
                    <button wire:click='addNewModal' class="btn btn-primary">Add New <i class="fa fa-plus"></i></button>
                  </div>
                  
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table table-hover">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Bank Name	</th>
                              <th scope="col">Account Number	</th>
                              <th scope="col">Account Holder Name	</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($bankinfo)
                          		@foreach($bankinfo as $bank)
		                            <tr>
		                              <td>{{ $bank->bank_name }}</td>
		                              <td>{{ $bank->account_number }}</td>
		                              <td>{{ $bank->account_title }}</td>
		                              
		                              <td>
		                              	<button class="btn btn-default" title="Edit" wire:click="edit({{ $bank->id }})" style="margin: 2px;"><i class="fa fa-edit"></i></button>
		                              	<button class="btn btn-danger" title="Edit" wire:click="delete({{ $bank->id }})" style="margin: 2px;"><i class="fa fa-trash"></i></button>
		                              </td>
		                              
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
@if($resetModel)
        <!-- Order Rest Model -->
        <div class="modal fade show" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel" aria-modal="true" role="dialog" style="display: block; padding-right: 17px;">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLiveLabel">Rest Orders</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click='resetclose'>
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>Make Sure! After Click on Reset We do not recover data</p>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" wire:click='resetclose' data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" wire:click='resetnow'>Reset</button>
		      </div>
		    </div>
		  </div>
		</div>
        <!-- Order Rest Model End -->
        @endif
@if($addProductModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Add Bank Account</h4>
                            <button class="btn-close py-0" type="button" wire:click="addModelClose" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="insertData">
					            <div class="col-md-12">
					              <label class="form-label" for="Bank name">Bank Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="bankname" placeholder="Bank name">
					              @error('bankname')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Bank Account Number">Bank Account Number</label>
					              <input class="form-control" step="0.01" id="inputEmailEnter" type="text" wire:model="bankaccountnumber" placeholder="Bank Account Number">
					              @error('bankaccountnumber')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Account Holder Name"> Account Holder Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="accountHolderName" placeholder="Account Holder Name">
					              @error('accountHolderName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            
					           

					            <div class="col-12">
					              <button class="btn btn-primary" type="submit">Save</button>
					              <button class="btn btn-danger" wire:click="addModelClose" type="button" data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
					            </div>
					          </form>
					        </div>
					      </div>
		    </div>
		  </div>
</div>
        @endif
@if($editProductModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Edit Bank Account</h4>
                            <button class="btn-close py-0" type="button" wire:click="editModelClose" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="update">
					            <div class="col-md-12">
					              <label class="form-label" for="Bank name">Bank Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="bankname" placeholder="Bank name">
					              @error('bankname')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Bank Account Number">Bank Account Number</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="bankaccountnumber" placeholder="Bank Account Number">
					              @error('bankaccountnumber')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Account Holder Name">Account Holder Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="accountHolderName" placeholder="Account Holder Name">
					              @error('accountHolderName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					           

					            <div class="col-12">
					              <button class="btn btn-primary" type="submit">Update</button>
					              <button class="btn btn-danger" wire:click="editModelClose" type="button" data-bs-dismiss="modal" style="position:absolute; right:10px;">Close </button>
					            </div>
					          </form>
					        </div>
					      </div>
		    </div>
		  </div>
</div>
        @endif
</div>
