{{-- edit city modal --}}


<div wire:ignore.self class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('city.editcity') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
                  <div class="form-row mb-4">
                  <div class="col">
                    <label>{{ __('city.cityname') }}</label>
                  <input type="text" class="form-control" wire:model.defer="edit_name" placeholder="Name" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()">
                  @error('edit_name') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>

                  <div class="col">
                    <label>{{ __('city.citycode') }}</label>
                  <input type="text" class="form-control" wire:model.defer="edit_code" placeholder="code" style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()">
                  @error('edit_code') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                  </div>
                  <div class="form-row mb-4">
                  <div class="col  ">
                    <label>{{ __('city.country') }}</label>
                    <select wire:model="edit_countryid" class="form-control" wire:change="zones_list($event.target.value)">
                        <option value="">{{__('city.selectcountry')}}</option>
                        @foreach($country as $countrys)
                        <option value="{{$countrys->id }}">
                            {{$countrys->name}}</option>
                        @endforeach
                    </select>
                    @error('edit_countryid') <span class="text-danger error">{{ $message }}</span> @enderror
                  </div>
            
          
                <div class="col ">
                    <label>{{ __('city.zone') }}</label>
                    <select wire:model="edit_zoneid" class="form-control">
                        <option value="">{{__('city.selectzone')}}</option>
                        @if($zone)
                        @foreach($zone as $zones)
                        <option value="{{$zones->id }}">
                            {{$zones->name}}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('edit_zoneid') <span class="text-danger error">{{ $message }}</span> @enderror

                </div>
                 
</div>

      </div>
           
            <div class="modal-footer">
               
                <button class="btn" id="editmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('city.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="submit()">{{__('city.update')}}</button>
            </div>
        </div>
    </div>
</div>