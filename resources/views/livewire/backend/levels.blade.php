<div>
    <div>


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

function handleLevelImage(input, previewId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            @this.set('imgBase64', e.target.result);
            var preview = document.getElementById(previewId || 'levelImgPreview');
            if (preview) {
                preview.innerHTML = '<img src="' + e.target.result + '" style="max-width:150px;max-height:150px;border-radius:8px;margin-top:5px;">';
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js" referrerpolicy="origin"></script>
<div class="page-body">
 	<div class="container-fluid basic_table">
   		<div class="col-sm-12"> 
                <div class="card">
                  <div class="card-header">
                    <h4>All Levels	</h4>
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
                              <th scope="col">Commission ratio	</th>
                              <!-- <th scope="col">Minimum balance	</th> -->
                              <th scope="col">User Daily Tasks	</th>
							  <th scope="col">Minimum Referral Users	</th>
							  <th scope="col">Minimum Balance Limit	</th>
                              <!-- <th scope="col">Number of withdrawals	</th> -->
                              <!-- <th scope="col">Minimum amount of withdrawals	</th> -->
                              <!-- <th scope="col">Maximum amount of withdrawals	</th> -->
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($leveled)
                          		@foreach($leveled as $level)
		                            <tr>
		                              <td>{{ $level->levelName }}</td>
		                              <td>{{ $level->commissionRate }}</td>
		                              <!-- <td>{{ $level->minimumBalanceLimit }}</td> -->
		                              <td>{{ $level->orderReciveLimit }}</td>
									  <td>{{ $level->ordersGrabbed }}</td>
									  <td>{{ $level->minimumBalanceLimit }}</td>
		                              <!-- <td>{{ $level->withdrawLimit }}</td> -->
		                              <!-- <td>{{ $level->minimumWithdrawLimit }}</td> -->
		                              <!-- <td>{{ $level->maxWithdrawLimit }}</td> -->
		                              
		                              <td>
		                              	<button class="btn btn-default" title="Edit" wire:click="edit({{ $level->id }})" style="margin: 2px;"><i class="fa fa-edit"></i></button>
		                              	<button class="btn btn-danger" title="Edit" wire:click="delete({{ $level->id }})" style="margin: 2px;"><i class="fa fa-trash"></i></button>
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
                            <h4 class="modal-title" id="myExtraLargeModal">Edit Level</h4>
                            <button class="btn-close py-0" type="button" wire:click="addModelClose" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="add">
					            <div class="col-md-12">
					              <label class="form-label" for="Level name">Level name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="name" placeholder="Level name">
					              @error('name')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Commission percentage">Commission percentage</label>
					              <input class="form-control" step="0.01" id="inputEmailEnter" type="number" wire:model="commissionRate" placeholder="Commission percentages">
					              @error('commissionRate')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Daily Tasks">Daily Tasks</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="orderReciveLimit" placeholder="Daily Tasks">
					              @error('orderReciveLimit')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Level Number">Level Number</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="level" placeholder="Level Number">
					              @error('level')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
								<div class="col-md-12">
					              <label class="form-label" for="Minimum Referral Users">Minimum Referral Users</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="ordersGrabbed" placeholder="Minimum Referral Users">
					              @error('ordersGrabbed')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
								<div class="col-md-12">
					              <label class="form-label" for="Minimum Balance Limit">Minimum Balance Limit</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="minimumBalanceLimit" placeholder="Minimum Balance Limit">
					              @error('minimumBalanceLimit')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					        	<div class="col-md-12">
					              <label class="form-label">Level Image</label>
					              <input class="form-control" type="file" accept=".png,.jpeg,.jpg" onchange="handleLevelImage(this, 'levelImgPreview')">
					              <div id="levelImgPreview" class="mt-2"></div>
					              @error('imgBase64')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					           

					            <div class="col-12">
					              <button class="btn btn-primary" type="submit">Update</button>
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
                            <h4 class="modal-title" id="myExtraLargeModal">Edit Level</h4>
                            <button class="btn-close py-0" type="button" wire:click="editModelClose" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="update">
					            <div class="col-md-12">
					              <label class="form-label" for="Level name">Level name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="name" placeholder="Level name">
					              @error('name')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Commission percentage">Commission percentage</label>
					              <input class="form-control" step="0.01" id="inputEmailEnter" type="number" wire:model="commissionRate" placeholder="Commission percentages">
					              @error('commissionRate')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Daily Tasks">Daily Tasks</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="orderReciveLimit" placeholder="Daily Tasks">
					              @error('orderReciveLimit')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Level Number">Level Number</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="level" placeholder="Level Number">
					              @error('level')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					        
								<div class="col-md-12">
					              <label class="form-label" for="Minimum Referral Users">Minimum Referral Users</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="ordersGrabbed" placeholder="Minimum Referral Users">
					              @error('ordersGrabbed')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
								<div class="col-md-12">
					              <label class="form-label" for="Minimum Balance Limit">Minimum Balance Limit</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="minimumBalanceLimit" placeholder="Minimum Balance Limit">
					              @error('minimumBalanceLimit')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label">Level Image</label>
					              <input class="form-control" type="file" accept=".png,.jpeg,.jpg" onchange="handleLevelImage(this, 'editLevelImgPreview')">
					              <div id="editLevelImgPreview" class="mt-2"></div>
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
