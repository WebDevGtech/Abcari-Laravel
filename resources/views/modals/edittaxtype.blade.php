{{-- edit Country Taxtype modal --}}


<div wire:ignore.self class="modal fade" id="edittax" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('taxtype.edittaxtype')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
                  <div class="form-row mb-4">
                  <div class="col">
                  <label>{{__('taxtype.taxname')  }}</label>
                  <input type="text" class="form-control" wire:model="edit_name" placeholder="Name">
                  @error('edit_name') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                  <div class="col ">
                    <label>{{ __('taxtype.country') }}</label>
                    <select wire:model="edit_country_id" class="form-control">
                        <option value="">{{__('taxtype.selectcountry')}}</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id }}">
                            {{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('edit_country_id') <span class="text-danger error">{{ $message }}</span> @enderror

                </div> 
                 
                  </div>
                  <div class="form-row mb-4">
                  <div class="col-sm-6">
                  <label>{{__('taxtype.taxrate')  }}</label>
                  <input type="text" class="form-control" wire:model="edit_taxrate" placeholder="Tax Rate">
                  @error('edit_taxrate') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>   
                  <div  class="col-sm-6">
                    <label>Service</label>
                    <select wire:model="edit_service_id" class="form-control">
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
                
                <button class="btn" id="editmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('taxtype.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="editForm">{{__('taxtype.update')}}</button>
            </div>
        </div>
    </div>
</div>