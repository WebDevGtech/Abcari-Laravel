{{-- add Country Taxtype modal --}}
<div wire:ignore.self class="modal fade" id="addtax" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('taxtype.addtaxtype') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row mb-4">
                    <div class="col-sm-6">
                        <label>Tax name</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Name">
                      
                    </div>
                    <div class="col-sm-6">
                        <label>{{ __('taxtype.country') }}</label>
                        <select wire:model="country_id" class="form-control">
                            <option value="">{{ __('taxtype.selectcountry') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">
                                    {{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country_id')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label>{{ __('taxtype.taxrate') }}</label>
                        <input type="text" class="form-control" wire:model="taxrate" placeholder="Tax Rate">
                        @error('taxrate')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div  class="col-sm-6">
                    <label>Service</label>
                    <select wire:model="service_id" class="form-control">
                            <option value="">Select Service</option>
                            @foreach ($bar_services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->name }}</option>
                            @endforeach
                        </select> 
                        @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" id="addmodalClose" data-dismiss="modal"><i
                        class="flaticon-cancel-12"></i>{{ __('taxtype.discard') }}</button>
                <button type="button" class="btn btn-primary" wire:click="submit">{{ __('taxtype.save') }}</button>
            </div>
        </div>
    </div>
</div>
