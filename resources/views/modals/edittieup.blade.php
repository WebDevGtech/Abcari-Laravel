{{-- edit tieupmodal --}}

<div wire:ignore.self class="modal fade bd-example show" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">{{__('bartieup.editbartieup')}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-row mb-4">
                <div class="col">
                    <label>{{__('bartieup.name')}}</label>
                    <input type="text"  wire:model="edit_name" placeholder="name" class="form-control" >
                  @error('edit_name')
                      <span class='error text-danger'>{{ $message }}</span>
                  @enderror
                </div>
                <div class="col">
                    <label>{{__('bartieup.arabicname')}}</label>
                    <input type="text" wire:model="edit_arabic_name"placeholder="Arabic Name" class="form-control" >
                    @error('edit_arabic_name')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror
                </div>
            </div>

                <div class="form-row mb-4">
                <div class="col">
                    <label>{{__('bartieup.details')}}</label>
                    <input type="text" wire:model="edit_details"placeholder="Details" class="form-control" >
                    @error('edit_details')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror
                </div>

                <div class="col-6">
                    <label>{{__('bartieup.image')}}</label>
                    <input type="file"  wire:model="edit_image" placeholder="Image" class="form-control" >
                    @error('edit_image')
                    <span class='error text-danger'>{{ $message }}</span>
                @enderror

                {{-- <label></label></br> --}}
    {{-- <img src="{{ Storage::url($edit_image); }}"  width="200" height="100" /> --}}

</div>
</div>
</div>
          <div class="modal-footer">

              <button class="btn" id="edittieupclose" data-dismiss="modal"><i class="flaticon-cancel-12"></i> {{__('bartieup.discard')}}</button>
              <button type="button" wire:click="submit" class="btn btn-primary">{{__('bartieup.update')}}</button>
          </div>


  </div>
</div>
