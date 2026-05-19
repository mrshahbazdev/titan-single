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
                  <!-- header -->
                    <div class="card-header">
                        <h5>Trail Period Time & Tasks</h5> 
                    </div>
                  
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table table-hover">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">ID	</th>
                              <th scope="col">Days	</th>
                              <th scope="col">Daily Tasks</th>
                              <th scope="col">Per Level</th>
                              <th scope="col">Referral Amount</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($bankinfo)
                          		@foreach($bankinfo as $bank)
		                            <tr>
		                              <td>{{ $bank->id }}</td>
		                              <td>{{ $bank->days }}</td>
                                      <td>{{ $bank->tasks }}</td>
                                      <td>{{ $bank->per_level }}
                                      <td>{{ $bank->referral_amount }}
		                              <td>
		                              	<button class="btn btn-default" title="Edit" wire:click="edit({{ $bank->id }})" style="margin: 2px;"><i class="fa fa-edit"></i></button>
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
@if($editProductModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Edit Trail Period</h4>
                            <button class="btn-close py-0" type="button" wire:click="editModelClose" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="update">
					            <div class="col-md-12">
					              <label class="form-label" for="Trail Days">Trial Days</label>
					              <input class="form-control" id="inputEmailEnter" type="number" min="1" max="365" wire:model="days" placeholder="Trail Days">
					              @error('days')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					           <!-- tasks -->
                                <div class="col-md-12">
                                    <label class="form-label" for="tasks">Daily Tasks</label>
                                    <input class="form-control" id="tasks" wire:model="tasks" type="number" placeholder="Tasks Per Day">
                                    @error('tasks')<span style="color: red;">{{ $message }}</span>@enderror
                                </div>
                                <!-- tasks -->
                                <div class="col-md-12">
                                    <label class="form-label" for="tasks">Per Level</label>
                                    <input class="form-control" id="tasks" wire:model="per_level" type="number" step="0.01" placeholder="Enter Per reduce amount">
                                    @error('per_level')<span style="color: red;">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" for="Referral Amount">Referral Amount</label>
                                    <input class="form-control" id="tasks" wire:model="referral_amount" type="number" placeholder="Referral Amount">
                                    @error('referral_amount')<span style="color: red;">{{ $message }}</span>@enderror
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
