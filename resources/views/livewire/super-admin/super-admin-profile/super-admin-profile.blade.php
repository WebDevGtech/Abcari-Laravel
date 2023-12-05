<div>
<div class="layout-px-spacing" wire:init="onload()">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                        <div class="widget-content widget-content-area br-6 ">
                      <form>
                        <div class="row ml-2 modal-header ">
                <h4 class="modal-title" id="exampleModalLabel">{{ __('superadminprofile.superadminprofile')}}</h4>
              
               

                </div> 
             
<div class="form-row mb-4">
        <div class="col-sm-4">
          <label>{{__('superadminprofile.name')}}</label>
          <input type="text" class="form-control"  wire:model="name" placeholder="Name">
          @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-4">
          <label>{{__('superadminprofile.email')}}</label>
          <input type="text" class="form-control"  wire:model="email" placeholder="email@mail.com">
          @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-row mb-4">
        <div class="col-sm-4">
          <label>{{__('superadminprofile.newpassword')}}</label>
          <input type="password" class="form-control"  wire:model="new_password" placeholder="********" decrypt>
          @error('new_password') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-4">
          <label>{{__('superadminprofile.confirmpasssword')}}</label>
          <input type="password" class="form-control"  wire:model="confirm_password" placeholder="********" decrypt>
          @error('confirm_password') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
                    </div>

                  <div class="modal-body">
                  <div class="form-row mb-4">
                    <div class="col-sm-2">
                                   

                                        <div class="upload mt-4 pr-md-4" >
                                                                <input type="file" id="input-file-max-fs" wire:model="profile_image" class="dropify" data-default-file="images/img/200x200.jpg" data-max-file-size="2M" />
                                                                @error('profile_image')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
               

                                                            </div>
                                                            <div class="col mt-4 mr-8" >
                                                            <button type="button" class="btn btn-primary" wire:click="submitForm()">{{ __('superadminprofile.save')}}</button></div>
                    </div>
                
    
        </div>
       
                   
                  
                  </div> 
                  </div> 
                  </div> 
                  </div> 
                  </div> 
                  </div> 
