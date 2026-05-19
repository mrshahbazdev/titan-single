 <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
             
              <div><a class="logo" href="#"><img class="img-fluid for-dark" src="/assets/uploads/img/new_logo.png" alt="looginpage"><img class="img-fluid for-light" src="/assets/uploads/img/new_logo.png" alt="looginpage" style="width:200px;"></a></div>
              @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <ul>
                          <li>{{ session('error') }}</li>
                        </ul>
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <ul>
                          <li>{{ session('message') }}</li>
                        </ul>
                    </div>
                @endif
              <div class="login-main"> 
                <form class="theme-form" wire:submit.prevent='authenticate'>
                  <h4>Sign in to account </h4>
                  <p>Enter your email & password to login</p>
                  <div class="form-group">
                    <label class="col-form-label">User Name</label>
                    <input class="form-control" type="text"  placeholder="user name" wire:model="username">
                    @error('username')<span style="color: red;">{{ $message }} </span> @enderror
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Password </label>
                    <div class="form-input position-relative">
                      <input class="form-control" type="password"  placeholder="*********" wire:model="password">
                      <div class="show-hide"> <span class="show"></span></div>
                    </div>
                    @error('password')<span style="color: red;">{{ $message }} </span> @enderror
                  </div>
                  <div class="form-group mb-0">
                    
                    <div class="text-end mt-3">
                      <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                    </div>
                  </div>
                  
                  
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  