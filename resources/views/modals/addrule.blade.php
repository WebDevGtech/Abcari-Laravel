{{-- add superadmin Rule modal --}}


<div wire:ignore.self class="modal fade" id="addrule" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('rule.addrule')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
                  <div class="form-row mb-4">
                  <div class="col">
                  <label>{{__('rule.rule')  }}</label>
                  <input type="text" class="form-control" wire:model="name" placeholder="Name">
                  @error('name') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                  <div class="col">
                  <label>{{__('rule.image')  }}</label>
                  <input type="file" class="form-control" wire:model="image" placeholder="image">
                  @error('image') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                 
                  </div>
                  <div class="form-row mb-4">
                  <div class="col">
                  <label>{{__('rule.description')  }}</label>
                  <textarea type="text" class="form-control" wire:model="description" placeholder="Description"> </textarea>
                  @error('description') <span class="error text-danger"> {{ $message}}</span> @enderror 
                  </div>   
                 
                
       </div>


            </div>
            <div class="modal-footer">
                
                <button class="btn" id="addmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('rule.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="submit">{{__('rule.save')}}</button>
            </div>
        </div>
    </div>
</div>

<!-- _____edit____ -->

<div wire:ignore.self class="modal fade" id="editrule" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('rule.editrule')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
                  <div class="form-row mb-4">
                  <div class="col">
                  <label>{{__('rule.rule')  }}</label>
                  <input type="text" class="form-control" wire:model="edit_name" placeholder="Name">
                  @error('edit_name') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>
                  <div class="col">
                  <label>{{__('rule.image')  }}</label>
                  <input type="file" class="form-control" wire:model="edit_image" placeholder="image">
                  @error('edit_image') <span class="error text-danger">{{ $message}}</span> @enderror 
                  
                </div>
                 
                 
                  </div>
                  <div class="form-row mb-4">
                 
                <div class="col">
                  <label>{{__('rule.description')  }}</label>
                  <textarea type="text" class="form-control" wire:model="edit_description" placeholder="Description"></textarea>
                  @error('edit_description') <span class="error text-danger">{{ $message}}</span> @enderror 
                  </div>      
                
       </div>


            </div>
            <div class="modal-footer">
                
                <button class="btn" id="editmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('rule.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="editform">{{__('rule.save')}}</button>
            </div>
        </div>
    </div>
</div>


