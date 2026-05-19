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

</script>
<div class="page-body">
 	<div class="container-fluid basic_table">
   		<div class="col-sm-12"> 
                <div class="card">
                  <div class="card-header">
                    <h4>Withdraw Records @if($userRecord) {{ $userRecord }} @else {{ 'All Users' }} @endif</h4>
                  </div>
                  <div class="container mt-5">
					  <div class="row justify-content-center">
					    <div class="col-md-12">
					      <div class="input-group mb-3">
					        <input type="text" wire:model.live="search" class="form-control" placeholder="Search username" aria-label="Search 1" aria-describedby="search1">
					        
					      </div>
					    </div>
					  </div>
					</div>
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table table-hover">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Username</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Order amount</th>
                              <th scope="col">Name</th>
                              <th scope="col">Bank Card Number</th>
                              <th scope="col">Bank Name	</th>
                              <th scope="col">Time</th>
                              <th scope="col">Operation</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($members)
                          		@foreach($members as $member)
		                            <tr>
		                              <td>{{ $member->username }}</td>
		                              <td>{{ $member->mobile }}</td>
		                              <td>{{ $member->orderAmount }}</td>
		                              <td>{{ $member->name }}</td>
		                              <td>{{ $member->bankCard }}</td>
		                              <td>{{ $member->bankName }}</td>
		                              <td>{{ $member->created_at }}</td>
		                              <td>
		                              	@if($member->oprate==1)
		                              		{{ 'Pending' }}
		                              	@elseif($member->oprate == 2)
		                              		{{ 'Approved' }}
		                              	@else
		                              		{{ 'Decline' }}
		                              	@endif
		                              </td>
		                              <td><button class="btn btn-success" wire:click="approval({{ $member->id }})" style="margin: 2px;">Approval</button><button class="btn btn-danger" wire:click="decline({{ $member->id }})" style="margin: 2px;">Decline</button></td>
		                              
		                            </tr>
		                        @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                 {{ $members->links() }}
              </div>
		</div>
	</div>
</div>
</div>
