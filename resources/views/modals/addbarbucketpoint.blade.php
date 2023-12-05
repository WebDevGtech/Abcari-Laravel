{{-- add bar bucket point modal --}}

<div wire:ignore.self class="modal fade bd-example show" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">{{ __('barbucketreward.addbarbucketreward') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-row mb-4">
             
            <div class="form-row mb-4">
                <div class="col">
                    <label>{{ __('barbucketreward.bucketname') }}</label>
                    <input type="text"  wire:model="name" placeholder="Name" class="form-control" >
                  @error('name')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
          
                <div class="col">
                    <label>{{ __('barbucketreward.bucketarabicname') }}</label>
                    <input type="text"  wire:model="arabicname" placeholder="Arabic Name" class="form-control" >
                  @error('arabicname')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
            </div>
            </div>
           
                <div class="form-row mb-4">
                    <div class="col">
                        <label>{{ __('barbucketreward.addrewardpoints') }}</label>
                        <input type="number"  wire:model="rewardpoint" placeholder="Point" class="form-control" >
                        @error('rewardpoint')
                        <span class='error text-danger'>{{ $message }}</span>
                    @enderror
                    </div>
                    
                   
              
                <div class="col">
                    <label>{{ __('barbucketreward.addrewardamount') }}</label>
                    <input type="number"  wire:model="rewardamount" placeholder="Amount" class="form-control" >
                    @error('rewardamount')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror
                </div>
                
          
           
           

          </div>

          <div class="form-row mb-4">
                    <div class="col">
                        <label>{{ __('barbucketreward.addredeempoints') }}</label>
                        <input type="number"  wire:model="redeempoint" placeholder="Point" class="form-control" >
                        @error('redeempoint')
                        <span class='error text-danger'>{{ $message }}</span>
                    @enderror
                    </div>
                    
                   
              
                <div class="col">
                    <label>{{ __('barbucketreward.addredeemamount') }}</label>
                    <input type="number"  wire:model="redeemamount" placeholder="Amount" class="form-control" >
                    @error('redeemamount')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror
                </div>
                
          
           
           

          </div>
          <div class="modal-footer">
           
              <button class="btn" id="addmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{ __('barbucketreward.discard') }}</button>
              <button type="button" wire:click.prevent="save()" class="btn btn-primary">{{ __('barbucketreward.save') }}</button>
          </div>
      </div>
    </div>
  </div>
</div>

{{-- <edit> --}}

    {{-- edit bar bucket point modal --}}

<div wire:ignore.self class="modal fade bd-example show" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">{{ __('barbucketreward.editbarnucketreward') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
          </div>
          <div class="modal-body">
          <div class="form-row mb-4">
                <div class="col">
                    <label>{{ __('barbucketreward.bucketname') }}</label>
                    <input type="text"  wire:model="edit_name" placeholder="Name" class="form-control" >
                  @error('edit_name')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
          
                <div class="col">
                    <label>{{ __('barbucketreward.bucketarabicname') }}</label>
                    <input type="text"  wire:model="edit_arabicname" placeholder="Arabic Name" class="form-control" >
                  @error('edit_arabicname')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
            </div>
               
            <div class="form-row mb-4">
                    <div class="col">
                        <label>{{ __('barbucketreward.addrewardpoints') }}</label>
                        <input type="number"  wire:model="edit_rewardpoint" placeholder="Point" class="form-control" >
                        @error('edit_rewardpoint')
                        <span class='error text-danger'>{{ $message }}</span>
                    @enderror
                    </div>
                    
                   
              
                <div class="col">
                    <label>{{ __('barbucketreward.addrewardamount') }}</label>
                    <input type="number"  wire:model="edit_rewardamount" placeholder="Amount" class="form-control" >
                    @error('edit_rewardamount')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror
                </div>
                
          
           
           

          </div>

          <div class="form-row mb-4">
                    <div class="col">
                        <label>{{ __('barbucketreward.addredeempoints') }}</label>
                        <input type="number"  wire:model="edit_redeempoint" placeholder="Point" class="form-control" >
                        @error('edit_redeempoint')
                        <span class='error text-danger'>{{ $message }}</span>
                    @enderror
                    </div>
                    
                   
              
                <div class="col">
                    <label>{{ __('barbucketreward.addredeemamount') }}</label>
                    <input type="number"  wire:model="edit_redeemamount" placeholder="Amount" class="form-control" >
                    @error('edit_redeemamount')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror
                </div>
                
          
           
           

          </div>
          </div>
          <div class="modal-footer">
           
              <button class="btn" id="editmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{ __('barbucketreward.discard') }}</button>
              <button type="button" wire:click="submit" class="btn btn-primary">{{ __('barbucketreward.update') }}</button>
          </div>
     
    </div>
  </div>
</div>


<!-- ____delete bar bucket point__ -->




<div wire:ignore.self class="modal fade bd-example show" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">{{ __('barbucketreward.deletebarnucketreward') }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
          </div>
          <div class="modal-body">
           
          
          <p >{{__('barbucketreward.are-you-want-delete')}} <a style="color:aqua"> </a>  </p>
                                               
           

          </div>
         
          <div class="modal-footer">
            
              <button class="btn" id="deletemodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{ __('barbucketreward.discard') }}</button>
              <button type="button" wire:click="delete" class="btn btn-danger">{{ __('barbucketreward.delete') }}</button>
          </div>
      </div>
    </div>
  </div>
