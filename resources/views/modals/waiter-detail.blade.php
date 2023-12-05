<div wire:ignore.self  class="modal fade" id="addwaiter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('waiter-detail.addwaiter')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="form-row mb-4">
        <div class="col">
        <label> {{__('waiterdetail.waitername')}}</label>
          <input type="text" class="form-control" wire:model="name" placeholder="Waiter Name">
          @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
        <label> {{__('waiterdetail.phonenumber')}}</label>
          <input type="text" class="form-control" wire:model="phone_number" placeholder="Phone number" maxlength="10">
          @error('phone_number') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        </div>
        </div>
        <div class="modal-footer">
                                                    <button class="btn" id="addClosewaiter" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('waiter-detail.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="submitForm()">{{__('waiter-detail.save')}}</button>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                
<!-- ___edit__ -->
<div wire:ignore.self  class="modal fade" id="editwaiter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('waiter-detail.editwaiter')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="form-row mb-4">
        <div class="col">
        <label> {{__('waiterdetail.waitername')}}</label>
          <input type="text" class="form-control" wire:model="edit_name" placeholder="Waiter Name">
          @error('edit_name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
        <label> {{__('waiterdetail.phonenumber')}}</label>
          <input type="number" class="form-control" wire:model="edit_phone_number" placeholder="Phone number">
          @error('edit_phone_number') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        </div>
        </div>
        <div class="modal-footer">
                                                    <button class="btn" id="editClosewaiter" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('waiter-detail.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="editForm()">{{__('waiter-detail.update')}}</button>
                                                </div>
                                                </div>
                                                </div>
                                                </div>

<!-- ____delete__ -->
<div wire:ignore.self  class="modal fade" id="deletewaiter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('waiter-detail.deletewaiter')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="form-row mb-4">
        <div class="col">
         <p>{{__('waiter-detail.wantetodelete')}}</p>
        </div>
        </div>
        </div>
        <div class="modal-footer">
                                                    <button class="btn" id="deleteClosewaiter" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('waiter-detail.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="deleteForm()">{{__('waiter-detail.delete')}}</button>
                                                </div>
                                                </div>
                                                </div>
                                                </div>