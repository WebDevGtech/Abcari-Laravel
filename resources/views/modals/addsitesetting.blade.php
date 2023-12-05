{{-- add Site Setting modal --}}


<div wire:ignore.self class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('sitesetting.addsitesetting') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
                  <div class="form-row mb-4">
                  <div class="col">
                  <label>{{ __('sitesetting.name') }}</label>
                  <input type="text" class="form-control" wire:model="name" placeholder="Name">
                  @error('name') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>

                  <div class="col">
                    <label>{{ __('sitesetting.key') }}</label>
                  <input type="text" class="form-control" wire:model="key" placeholder="Key">
                  @error('key') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                  </div>
                  <div class="form-row mb-4">
                  <div class="col">
                    <label>{{ __('sitesetting.value') }}</label>
                    <input type="number" class="form-control" wire:model="value" placeholder="Value">
                    @error('value') <span class="error text-danger">{{ $message}}</span> @enderror 
                    </div>
                    
                   

</div>


            </div>
            <div class="modal-footer">
                
                <button class="btn" id="addmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('sitesetting.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="submit">{{__('sitesetting.save')}}</button>
            </div>
        </div>
    </div>
</div>