<div>
<div class="page-body">
 	<div class="container-fluid basic_table">
   		<div class="col-sm-12"> 
                <div class="card">
                  <div class="card-header">
                    <h4>Recharge Records @if($userRecord) {{ $userRecord }} @else {{ 'All Users' }} @endif</h4>
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
                              <th scope="col">Order Amount</th>
                              <th scope="col">Time</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($members)
                          		@foreach($members as $member)
		                            <tr>
		                              <td>{{ $member->username }}</td>
		                              <td>{{ $member->orderAmout }}</td>
		                              <td>{{ $member->created_at }}</td>
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