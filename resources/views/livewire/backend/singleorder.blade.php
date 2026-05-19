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
<div class="page-body">
 	<div class="container-fluid basic_table">
   		<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Current user:- <b>{{ $username }}</b></h4>
                  </div>
                  <div>
                    <div class="card-block row">
                      <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive custom-scrollbar">
                          <table class="table table-bordered">
                            <tbody>
                              <tr>
                                <td>Current Balance</td>
                                <td>
                                  <div class="col-md-12">
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="balance" disabled="disabled">
					            </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Current number of orders made</td>
                                <td>
                                  <div class="col-md-12">
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="allorders" disabled="disabled">
					            </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Orders received today</td>
                                <td>
                                  <div class="col-md-12">
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="todayorder" disabled="disabled">
					            </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Maximum orders received by level</td>
                                <td>
                                  <div class="col-md-12">
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="orderByLevel" disabled="disabled">
					            </div>
                                </td>
                              </tr>
                              
                              
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             <div class="col-sm-12"> 
                <div class="card">
                  
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table">
                          <thead class="table-dark">
                            <tr>
                              <th >Order	</th>
                              <th >Price</th>
                              <th >Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($singleOrders)
                          		@foreach($singleOrders as $singleOrder)
                            <tr>
                              <td >{{ $singleOrder->continuous }}</td>
                              <td>{{ $productPrices[$singleOrder->productId] }}</td>
                              <td>
                              	
								<button class="btn btn-danger" wire:click="delete({{ $singleOrder->id}},{{ $allorders }})"  title="Delete"  ><i class="fa fa-trash"></i></button>
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
              <div class="col-sm-12	"> 
              
                <div class="card">
                
                  <div class="card-header">
                    <h4>All Products List</h4>
                  </div>
                  <div class="container mt-5">
					  <div class="row justify-content-center">
					    <div class="col-md-6">
					      <div class="input-group mb-3">
					        <input type="text" wire:model.live="search" class="form-control" placeholder="Search With Price Enter Highest Value" aria-label="Search 1" aria-describedby="search1">
					        
					      </div>
					    </div>
					    
					  </div>
					</div>
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Product Name</th>
                              <th scope="col">Product Price</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                            @if($articles)
                            	@foreach($articles as $article)
		                            <tr>
		                              <td>{{ $article->productName }}</td>
		                              <td>{{ $article->productPrice }}</td>
		                              <td><button class="btn btn-default" wire:click="setOder({{ $article->id}},{{ $allorders }})"><i class="fa fa-edit"></i></button></td>
		                            </tr>
		                        @endforeach
                            @endif
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  @if($articles->hasMorePages())
					        <button class="btn btn-primary" wire:click.prevent="loadMore">Load more products</button>
					    @endif
                </div>
                
              </div>
	</div>
</div>
<!-- add new model -->
        @if($addnewmodel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Add Order</h4>
                            <button class="btn-close py-0" type="button" wire:click="addcloseModal" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
		      <div class="modal-body social-profile text-start">
		        <div class="modal-toggle-wrapper">
		          <p> Fill in your information below to continue.</p>
		          <form class="row g-3" wire:submit.prevent="AddNewOder">
		            <div class="col-md-12">
		              <label class="form-label" for="Username">Enter continuous orders number</label>
		              <input class="form-control" id="inputEmailEnter" type="number" required="" wire:model="continuous" placeholder="Enter continuous orders number">
		              @error('username')<span style="color: red;">{{ $message }}</span>@enderror
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

        <!-- add new model end-->
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

</div>
