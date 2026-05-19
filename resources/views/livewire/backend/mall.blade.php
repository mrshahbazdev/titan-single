<div>
   <div>
   	<link rel="stylesheet" type="text/css" href="{{ asset('backend/css/vendors/dropzone.css') }}">
   	 <script src="{{ asset('backend/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('backend/js/dropzone/dropzone-script.js') }}"></script>
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
                    <h4>All Products list</h4>
                    <br>
                    <button wire:click='addNewModal' class="btn btn-primary">Add New <i class="fa fa-plus"></i></button>
                  </div>
                  
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive custom-scrollbar">
                        <table class="table table-hover">
                          <thead class="table-dark">
                            <tr>
                              <th scope="col">Product Name</th>
                              <th scope="col">Price</th>
                              <th scope="col">Add Time</th>
                              <th scope="col">Update Time</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          	@if($products)
                          		@foreach($products as $product)
		                            <tr>
		                              <td>{{ $product->productName }}</td>
		                              <td>{{ $product->productPrice }}</td>
		                              <td>{{ $product->created_at }}</td>
		                              <td>{{ $product->updated_at }}</td>
		                              
		                              <td><button class="btn btn-default" title="Edit" wire:click="edit({{ $product->id }})" style="margin: 2px;"><i class="fa fa-edit"></i></button><button class="btn btn-default" title="delete" wire:click="pdelete({{ $product->id }})" style="margin: 2px;"><i class="fa fa-trash"></i></button></td>
		                              
		                            </tr>
		                        @endforeach
                            @endif
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                 {{ $products->links() }}
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
@if($editProductModel)
        <div class="modal fade show" id="exampleModallogin" tabindex="-1" role="dialog" aria-labelledby="exampleModallogin" aria-modal="true" style="display: block;">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content dark-sign-up">
		    	<div class="modal-header">
                            <h4 class="modal-title" id="myExtraLargeModal">Edit Product</h4>
                            <button class="btn-close py-0" type="button" wire:click="editModelClose" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="update">
					            <div class="col-md-12">
					              <label class="form-label" for="Product Name">Product Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="productName" placeholder="Product Name">
					              @error('productName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Product Price">Product Price</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="productPrice" placeholder="Product Price">
					              @error('productPrice')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <livewire:dropzone
						            wire:model="productImage"
						            :rules="['mimes:png,jpeg,jpg']"
						            :multiple="false" />
					              @error('productImage')<span style="color: red;">{{ $message }}</span>@enderror
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
                            <h4 class="modal-title" id="myExtraLargeModal">Add New Product</h4>
                            <button class="btn-close py-0" type="button" wire:click="addcloseModal" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
					      <div class="modal-body social-profile text-start">
					        <div class="modal-toggle-wrapper">
					          <p> Fill in your information below to continue.</p>
					          <form class="row g-3" wire:submit.prevent="addNew">
					            <div class="col-md-12">
					              <label class="form-label" for="Product Name">Product Name</label>
					              <input class="form-control" id="inputEmailEnter" type="text" wire:model="productName" placeholder="Product Name">
					              @error('productName')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <label class="form-label" for="Product Price">Product Price</label>
					              <input class="form-control" id="inputEmailEnter" type="number" wire:model="productPrice" placeholder="Product Price">
					              @error('productPrice')<span style="color: red;">{{ $message }}</span>@enderror
					            </div>
					            <div class="col-md-12">
					              <livewire:dropzone
						            wire:model="productImage"
						            :rules="['image','mimes:png,jpeg,jpg']"
						            :multiple="false" />
					              @error('productImage')<span style="color: red;">{{ $message }}</span>@enderror
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
