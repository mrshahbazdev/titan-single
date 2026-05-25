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
                    <h4>Recharge Requests @if($userRecord) {{ $userRecord }} @else {{ 'All Users' }} @endif</h4>
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
                              <th scope="col">TID</th>
                              <th scope="col">Method</th>
                              <th scope="col">Amount</th>
                              <th scope="col">Screenshot</th>
                              <th scope="col">Status</th>
                              <th scope="col">Operation</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($members)
                          		@foreach($members as $key => $member)
	                            <tr>
	                              <td>{{ $usernames[$member->user_id] ?? 'N/A' }}</td>
	                              <td>{{ $member->tid }}</td>
	                              <td>{{ $member->method }}</td>
	                              <td>{{ $member->amount }}</td>
	                              <td>
	                              	@if($member->screenshot)
	                              		<a href="{{ asset($member->screenshot) }}" target="_blank">
	                              			<img src="{{ asset($member->screenshot) }}" alt="Screenshot" style="max-width: 80px; max-height: 60px; border-radius: 4px; cursor: pointer;">
	                              		</a>
	                              	@else
	                              		<span class="text-muted">No screenshot</span>
	                              	@endif
	                              </td>
	                              <td>
	                              	@if($member->status==1)
	                              		<span class="badge bg-warning text-dark">Pending</span>
	                              	@elseif($member->status == 2)
	                              		<span class="badge bg-success">Approved</span>
	                              	@else
	                              		<span class="badge bg-danger">Declined</span>
	                              	@endif
	                              </td>
	                              <td>
	                              	@if($member->status == 1)
	                              		<button class="btn btn-success btn-sm" wire:click="approval({{ $member->id }})" style="margin: 2px;">Approve</button>
	                              		<button class="btn btn-danger btn-sm" wire:click="decline({{ $member->id }})" style="margin: 2px;">Decline</button>
	                              	@elseif($member->status == 2)
	                              		<span class="text-success"><i class="fa fa-check-circle"></i> Approved</span>
	                              	@else
	                              		<span class="text-danger"><i class="fa fa-times-circle"></i> Declined</span>
	                              	@endif
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
                 {{ $members->links() }}
              </div>
		</div>
	</div>
</div>
</div>
