<!-- __edit postcode__ -->
<div wire:ignore.self class="modal fade " id="editmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('postcode.editpostcode') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
<div class="form-row mb-4">

<div class="col">
    <label>{{ __('postcode.country') }}</label>
    <select wire:model="edit_countryid" class="form-control" wire:change="zones_list($event.target.value)">
        <option value="">{{__('postcode.selectcountry')}}</option>
      
        @foreach($country as $countrys)
        <option value="{{$countrys->id }}">
            {{$countrys->name}}</option>
        @endforeach
      
    </select>
    @error('edit_countryid') <span class="text-danger error">{{ $message }}</span> @enderror

</div>
<div class="col-6 ">
    <label>{{ __('postcode.zone') }}</label>
    <select wire:model="edit_zoneid" class="form-control" wire:change="city_list($event.target.value)">
        <option value="">{{__('postcode.selectzone')}}</option>
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
<div class="form-row mb-4">


<div class="col-6">
    <label>{{ __('postcode.city') }}</label>
    <select wire:model="edit_cityid" class="form-control">
        <option value="">{{__('postcode.selectcity')}}</option>
        @if($city)
        @foreach($city as $citys)
        <option value="{{$citys->id }}">
            {{$citys->name}}</option>
        @endforeach
        @endif
    </select>
    @error('edit_cityid') <span class="text-danger error">{{ $message }}</span> @enderror

</div>
<div class="col">
    <label>{{ __('postcode.postcode') }}</label>
<input type="text" class="form-control" wire:model="edit_postcoded" placeholder="postcode"  style="text-transform:uppercase" oninput="this.value = this.value.toUpperCase()">
@error('edit_postcoded') <span class="error text-danger">{{ $message}}</span> @enderror 
</div>

            </div>
            <div class="modal-footer">
               
                <button class="btn" id="editmodalClose" data-dismiss="modal"  ><i class="flaticon-cancel-12"></i>{{__('category.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="submit">{{ __('postcode.update') }}</button>
            </div>
        </div>
    </div>a
</div>