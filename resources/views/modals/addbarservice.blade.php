{{-- add service modal --}}


<div wire:ignore.self class="modal fade" id="addbarservice" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('barservice.addbarservice')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
                  <div class="form-row mb-4">
                  <div class="col">
                  <label>{{__('barservice.barservicename')  }}</label>
                  <input type="text" class="form-control" wire:model="name" placeholder="Name">
                  @error('name') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                  <div class="col">
                  <label>{{__('barservice.barservicearabic')  }}</label>
                  <input type="text" class="form-control" wire:model="arabic_name" placeholder="Arabic Name">
                  @error('arabic_name') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                  </div>
                  <div class="form-row mb-4">
                  <div class="col">
                    <label>{{ __('barservice.image') }}</label>
                  <input type="file" class="form-control" wire:model="image" placeholder="Image">
                  @error('image') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
              {{--   <div class="col ">
                    <label>{{ __('barservice.tax') }}</label>
                    <select wire:model="tax_id" class="form-control">
                        <option value="">{{__('barservice.selecttax')}}</option>
                        @foreach($taxtypes as $taxtype)
                        <option value="{{$taxtype->id }}">
                            {{$taxtype->name}}</option>
                        @endforeach
                    </select>
                    @error('tax_id') <span class="text-danger error">{{ $message }}</span> @enderror

                </div>  --}}
                
       </div>


            </div>
            <div class="modal-footer">
                
                <button class="btn" id="addmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('barservice.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="save()">{{__('barservice.save')}}</button>
            </div>
        </div>
    </div>
</div>