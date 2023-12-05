<div>
  <div class="layout-px-spacing" wire:init="onload()">
    <div class="row mt-2 " id="cancel-row">
      <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
        <div class="widget-content widget-content-area br-6 ">
          <form>
            <div class="row ml-2 ">
              <ul>
                <h4 class="modal-title" id="exampleModalLabel">{{ __('barprofile.barprofile')}}</h4>
              </ul>

            </div>
            <div class="form-row mb-4">
              <div class="col-sm-4">
                <label>{{__('barprofile.name')}}</label>
                <input type="text" class="form-control" wire:model="name" placeholder="Name">
                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
              </div>
              <div class="col-sm-4">
                <label>{{__('barprofile.email')}}</label>
                <input type="text" class="form-control" wire:model="email" placeholder="email@mail.com">
                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
              </div>
              <div class="col">

                <div class="mb-3">
                  <label class="form-label">{{__('barprofile.bannerimage1')}}</label>
                  <input type="file" class="form-control" wire:model="banner_image_1">
                  <div wire:loading wire:target="banner_image_1">Uploading...</div>
                  @error('banner_image_1')
                  <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                  {{-- <label>{{__('barprofile.banneroldimage1')}}</label> --}}
                  <div>
                    {{-- <img src="{{ Storage::url($bars->banner_image_1); }}" width="200" height="100" /> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row mb-4">
              <div class="col-sm-4">
                <label>{{__('barprofile.newpassword')}}</label>
                <input type="password" class="form-control" wire:model="new_password" placeholder="********" decrypt>
                @error('new_password') <span class="error text-danger">{{ $message }}</span> @enderror
              </div>
              <div class="col-sm-4">
                <label>{{__('barprofile.confirmpasssword')}}</label>
                <input type="password" class="form-control" wire:model="confirm_password" placeholder="********" decrypt>
                @error('confirm_password') <span class="error text-danger">{{ $message }}</span> @enderror
              </div>
              <div class="col">

                <div class="mb-3">
                  <label class="form-label">{{__('barprofile.bannerimage2')}}</label>
                  <input type="file" class="form-control" wire:model="banner_image_2">
                  <div wire:loading wire:target="banner_image_2">Uploading...</div>
                  @error('banner_image_2')
                  <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                  {{-- <label>{{__('barprofile.banneroldimage2')}}</label> --}}
                  <div>
                    {{-- <img src="{{ Storage::url($bars->banner_image_2); }}" width="200" height="100" /> --}}
                  </div>
                </div>
              </div>
            </div>



            <div class="form-row mb-4">
              <div class="col-sm-4">



                <label>{{__('barprofile.barimage')}}</label>
                <input type="file" wire:model="bar_image" class="form-control" />
                @error('bar_image')
                <span class='error text-danger'>{{ $message }}</span>
                @enderror
                {{-- <label>{{__('barprofile.baroldimage')}}</label> --}}
                <div>
                  {{-- <img src="{{ Storage::url($bars->image); }}" width="200" height="100" /> --}}
                </div>
              </div>

              <div class="col-sm-4">



                <label>{{__('barprofile.profileimage')}}</label>
                <input type="file" class="form-control" wire:model="profile_image" class="dropify" />
                @error('profile_image')
                <span class='error text-danger'>{{ $message }}</span>
                @enderror
                {{-- <label>{{__('barprofile.profileoldimage')}}</label> --}}
                <div>

                  {{-- <img src="{{ Storage::url($profiles->profile_photo_path); }}" width="200" height="100" /> --}}
                </div>
              </div>
              <div class="col">

                <div class="mb-3">
                  <label class="form-label">{{__('barprofile.bannerimage3')}}</label>
                  <input type="file" class="form-control" wire:model="banner_image_3">
                  <div wire:loading wire:target="banner_image_3">Uploading...</div>
                  @error('banner_image_3')
                  <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                  {{-- <label>{{__('barprofile.banneroldimage3')}}</label> --}}
                  <div>
                    {{-- <img src="{{ Storage::url($bars->banner_image_3); }}" width="200" height="100" /> --}}
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row mb-4">



            </div>

            <div class="form-row mb-4">
              <div class="col">
                <label>{{__('barprofile.about')}}</label>
                <textarea class="form-control" wire:model="description" placeholder="Description"></textarea>

                @error('description')
                <span class='error text-danger'>{{ $message }}</span>
                @enderror
              </div>

            </div>
            <div class="row">
              <div class="col-sm-1">
                <button type="button" class="btn btn-primary" wire:click="submitForm()">{{ __('barprofile.save')}}</button>
              </div>
            </div>


        </div>
      </div>
    </div>
  </div>
  <div class="layout-px-spacing" wire:init="onload()">
    <div class="row mt-2 " id="cancel-row">
      <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
        <div class="widget-content widget-content-area br-6 ">
          <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">

                <img src="{{ Storage::url($bars->banner_image_1); }}" class="d-block w-100" src="assets/img/600x300.jpg" alt="First slide" />
              </div>
              <div class="carousel-item">
                <img src="{{ Storage::url($bars->banner_image_2); }}" class="d-block w-100" src="assets/img/600x300.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img src="{{ Storage::url($bars->banner_image_3); }}" class="d-block w-100" src="assets/img/600x300.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>