<div wire:ignore.self  class="modal fade" id="addpush" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('pushnotification.addpush')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="form-row mb-4">
        <div class="col">
            <label>{{__('pushnotification.title')}}</label>
          <input type="text" class="form-control" wire:model="title" placeholder="Title">
          @error('title') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
        <label>{{__('pushnotification.type')}}</label>
        <select class="form-control" wire:model="type">
            <option value="">{{__('pushnotification.selecttype')}}</option>
           
            <option value="1">{{__('pushnotification.news')}}</option>
            <option value="2">{{__('pushnotification.promotional')}}</option>
            <option value="3">{{__('pushnotification.app')}}</option>
      
          </select>
          @error('type') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
       
        </div>
        <div class="form-row mb-4">
        <div class="col">
        <label>{{__('pushnotification.image')}}</label>
        <input type="file" class="form-control" name="file" wire:model="image" placeholder="Image Url">
        @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
       
    </div>
    <div class="form-row mb-4">
    <div class="col">
    <label>{{__('pushnotification.body')}}</label>
        <textarea type="text-area" class="form-control" wire:model="body" placeholder="Body"></textarea>
        @error('body') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
   
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="addClosepush" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('pushnotification.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="submitForm()">{{__('pushnotification.save')}}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>