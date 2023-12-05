{{-- edit service modal --}}
<div wire:ignore.self class="modal fade" id="editbrand" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('addbrand.editbrand') }}</h5>
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
                    <div class="col">
                        <label>{{ __('addbrand.brandname') }}</label>
                        <input type="text" class="form-control" wire:model.defer="edit_name" placeholder="Name">
                        @error('edit_name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- <div class="col">
                  <label>{{ __('addbrand.brandarabic') }}</label>
                  <input type="text" class="form-control" wire:model.defer="edit_arabic_name" placeholder="Name">
                  @error('edit_arabic_name') <span class="error text-danger">{{ $message}}</span> @enderror
                  </div> --}}
                    <div class="col">
                        <label>{{ __('addbrand.image') }}</label>
                        <input type="file" class="form-control" wire:model.defer="edit_image" placeholder="Image">
                        @error('edit_image')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                        {{-- <label></label></br>
                        <img src="{{ Storage::url($edit_image) }}" width="200" height="100" /> --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" id="editclose" data-dismiss="modal"><i
                        class="flaticon-cancel-12"></i>{{ __('addbrand.discard') }}</button>
                <button type="button" id="btnClosePopup"class="btn btn-primary mixin" wire:click="submit()">
                    {{ __('addbrand.update') }} </button>
            </div>
        </div>
    </div>
</div>
<script>
    $('.modal-footer .mixin').on('click', function() {
        const toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            padding: '2em',
            timerProgressBar: true,
        });
        toast({
            type: 'success',
            title: 'Updated Successfully',
        })
    })
</script>
