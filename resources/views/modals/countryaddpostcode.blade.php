<!-- __country add postcode__ -->
<div wire:ignore.self class="modal fade " id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('postcode.addpostcode') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
<div class="form-row mb-4">

<div class="col ">
    <label>{{ __('postcode.country') }}</label>
    <select wire:model="countryid" class="form-control" wire:change="zones_list($event.target.value)">
        <option value="">Select country</option>
        @foreach($country as $countrys)
        <option value="{{$countrys->id }}">
            {{$countrys->name}}</option>
        @endforeach
    </select>
    @error('countryid') <span class="text-danger error">{{ $message }}</span> @enderror

</div>
<div class="col ">
    <label>{{ __('postcode.zone') }}</label>
    <select wire:model="zoneid" class="form-control" wire:change="city_list($event.target.value)">
        <option value="">Select  zone</option>
        @if($zone)
        @foreach($zone as $zones)
        <option value="{{$zones->id }}">
            {{$zones->name}}</option>
        @endforeach
        @endif
    </select>
    @error('zoneid') <span class="text-danger error">{{ $message }}</span> @enderror

</div>
</div>
<div class="form-row mb-4">


<div class="col">
    <label>{{ __('postcode.city') }}</label>
    <select wire:model="cityid" class="form-control">
        <option value="">Select  City</option>
        @if($city)
        @foreach($city as $citys)
        <option value="{{$citys->id }}">
            {{$citys->name}}</option>
        @endforeach
        @endif
    </select>
    @error('cityid') <span class="text-danger error">{{ $message }}</span> @enderror

</div>
<div class="col">
    <label>{{ __('postcode.postcode') }}</label>
<input type="text" class="form-control" wire:model="code" placeholder="postcode"  style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()" >
@error('code') <span class="error text-danger">{{ $message}}</span> @enderror 
</div>

            </div>
            <div class="modal-footer">
               
                <button class="btn" id="addmodalClose" data-dismiss="modal"  ><i class="flaticon-cancel-12"></i>{{__('category.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="saveup">{{ __('postcode.save') }}</button>
            </div>
        </div>
    </div>
</div>