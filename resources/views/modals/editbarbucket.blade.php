{{-- edit bar bucket modal --}}

<div wire:ignore.self class="modal fade bd-example show" id="editbarbucket" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">{{__('barbucket.editbarbucket')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-row mb-4">
                <div class="col">
                    <label>{{ __('barbucket.bucketname') }}</label>
                    <input type="text"  wire:model="edit_name" placeholder="Name" class="form-control" >
                  @error('edit_name')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
          
                <div class="col">
                    <label>{{ __('barbucket.barbucketarabic') }}</label>
                    <input type="text"  wire:model="edit_arabicname" placeholder="Arabic Name" class="form-control" >
                  @error('edit_arabicname')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
            </div>
         
                
          <div class="modal-footer">
          
              <button class="btn" id="editmodalClose"  data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{ __('barbucket.discard') }}</button>
              <button type="button" wire:click="submit" class="btn btn-primary">{{ __('barbucket.update') }}</button>
          </div>
      </div>
    </div>
  </div>
</div>