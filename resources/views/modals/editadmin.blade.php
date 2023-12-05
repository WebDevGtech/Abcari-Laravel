{{-- edit country Admin modal --}}

<div wire:ignore.self class="modal fade bd-example show" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">{{__('country-admin.edit-country-admin')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-row mb-4">
                <div class="col">
                    <label>{{__('country-admin.name')}}</label>
                    <input type="text"  wire:model="name" placeholder="name" class="form-control" >
                  @error('name')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
                <div class="col">
                    <label>{{__('country-admin.email')}}</label>
                    <input type="email" wire:model="email"placeholder="email@mail.com" class="form-control" >
                    @error('email')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror
                       </div> </div>

            <div class="form-row mb-4">

              
                
                <div class="col-6 ">
                  <label>{{__('country-admin.country')}}</label>
                  <select wire:model="countryid" class="form-control">
                      <option value="">{{__('country-admin.select-country')}}</option>
                      @foreach($country as $countrys)
                      <option value="{{$countrys->id }}">
                          {{$countrys->name}}</option>
                      @endforeach
                  </select>
                  @error('countryid') <span class="text-danger error">{{ $message }}</span> @enderror
              
              </div>
             
            </div>
            </div>
          <div class="modal-footer">
            
              <button class="btn" id="editcountryadmin" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('country-admin.discard')}}</button>
              <button type="button" wire:click="submit" class="btn btn-primary">{{__('country-admin.update')}}</button>
          </div>
      
    </div>
  </div>
</div>