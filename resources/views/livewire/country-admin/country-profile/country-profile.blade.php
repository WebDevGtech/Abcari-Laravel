<div>
<div class="layout-px-spacing" wire:init="onload()">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                        <div class="widget-content widget-content-area br-6 ">
                      <form>
                        <div class="row ml-2 modal-header ">
                <h4 class="modal-title" id="exampleModalLabel">{{ __('countryprofile.countryadminprofile')}}</h4>
              
               

                </div> 
                <div class="form-row mb-4">
        <div class="col-sm-4">
          <label>{{__('countryprofile.name')}}</label>
          <input type="text" class="form-control"  wire:model="name" placeholder="Name">
          @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-4">
          <label>{{__('countryprofile.email')}}</label>
          <input type="text" class="form-control"  wire:model="email" placeholder="email@mail.com">
          @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        </div>
        <div class="form-row mb-4">
        <div class="col-sm-4">
          <label>{{__('countryprofile.newpassword')}}</label>
          <input type="password" class="form-control"  wire:model="new_password" placeholder="********" decrypt>
          @error('new_password') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col-sm-4">
          <label>{{__('countryprofile.confirmpasssword')}}</label>
          <input type="password" class="form-control"  wire:model="confirm_password" placeholder="********" decrypt>
          @error('validated') <span class="error text-danger">{{ $message }}</span> @enderror
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
                  <img src="{{ Storage::url($profiles->profile_photo_path); }}"  width="200" height="100" />
                                                            </div>

                    </div>
                    
        </div>
        <div class="col mt-4 mr-8" >
                     <button type="button" class="btn btn-primary" wire:click="submitForm()">Save</button></div>
    
                 
                  
                  </div> 
                  </div> 
                  </div> 
                  </div> 
                  </div> 
                  </div> 
