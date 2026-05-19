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
                    <h4>All Roles	</h4>
                    <br>
                    <button wire:click='addNewModal' class="btn btn-primary">Add New <i class="fa fa-plus"></i></button>
                  </div>
                  
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table table-hover">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Role Name	</th>
                              <th scope="col">Creation Time		</th>
                              <th scope="col">Action	</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($roles)
                          		@foreach($roles as $role)
		                            <tr>
		                              <td>{{ $role->id }}</td>
		                              <td>{{ $role->roleName }}</td>
		                              <td>{{ $role->created_at }}</td>
		                              
		                              <td><button class="btn btn-default" title="Edit" wire:click="edit({{ $role->id }})" style="margin: 2px;"><i class="fa fa-edit"></i></button>
										<button class="btn btn-default" title="Delete" wire:click="delete({{ $role->id }})" style="margin: 2px;"><i class="fa fa-trash"></i></button>
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
		        <h5 class="modal-title" id="exampleModalLiveLabel">Reset Orders</h5>
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
					              <label class="form-label" for="Role Name">Role Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="roleName" placeholder="Role Name">
					              @error('roleName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <h6>Menu permissions</h6>
					        	<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Front Page</label>
								<input class="form-check-input" wire:model="frontPage" type="checkbox" role="switch" id="flexSwitchCheckDefaulat" @if($frontPage==1){{ 'checked' }} @endif>
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">System Management</label>
								<input class="form-check-input" wire:model="systemManagement" type="checkbox" role="switch" id="flexSwitchCheckDefaudlt" @if($systemManagement==1){{ 'checked' }} @endif>
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Shopping Mall Management	</label>
								<input class="form-check-input" wire:model="shoppingMallManagement" type="checkbox" role="switch" id="flexSwitchCfheckDefault" @if($shoppingMallManagement==1){{ 'checked' }} @endif>
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Member Management	</label>
								<input class="form-check-input" wire:model="memberManagement" type="checkbox" role="switch" id="flexSwitchCheckDwefault" @if($memberManagement==1){{ 'checked' }} @endif>
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Transaction Management</label>
								<input class="form-check-input" wire:model="transactionManagement" type="checkbox" role="switch" @if($transactionManagement==1){{ 'checked' }} @endif id="flexSwigtchCheckDefault">
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
        @if($newProductModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Add New Role</h4>
                            <button class="btn-close py-0" type="button" wire:click="addcloseModal" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="addNew">
					            <div class="col-md-12">
					              <label class="form-label" for="Role Name">Role Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="roleName" placeholder="Role Name">
					              @error('roleName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <h6>Menu permissions</h6>
					        	<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Front Page</label>
								<input class="form-check-input" wire:model="frontPage" type="checkbox" role="switch" id="flexSwitchCheckDefaulat">
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">System Management</label>
								<input class="form-check-input" wire:model="systemManagement" type="checkbox" role="switch" id="flexSwitchCheckDefaudlt">
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Shopping Mall Management	</label>
								<input class="form-check-input" wire:model="shoppingMallManagement" type="checkbox" role="switch" id="flexSwitchCfheckDefault">
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Member Management	</label>
								<input class="form-check-input" wire:model="memberManagement" type="checkbox" role="switch" id="flexSwitchCheckDwefault">
								</div>
								<div class="form-check form-switch">
								  <label class="form-check-label" for="flexSwitchCheckDefault">Transaction Management</label>
								<input class="form-check-input" wire:model="transactionManagement" type="checkbox" role="switch" id="flexSwigtchCheckDefault">
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
