<!-- __addbanner__ -->
<div wire:ignore.self class="modal fade  bd-example show" id="addbanner" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('banner.addbanner') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row mb-4">
                        <div class="col">
                            <label>{{ __('banner.bannername') }}</label>
                            <input type="text" class="form-control" wire:model.defer="banner_name"
                                placeholder="Banner Name">
                            @error('banner_name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ __('banner.image') }}</label>
                            <input type="file" class="form-control" wire:model="image" placeholder="Image">
                            @error('image')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label>{{ __('banner.category') }}</label>
                            <select class="form-control tagging" wire:model="category">
                                <option selected="">{{ __('banner.selectcategory') }}</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('category')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col">
                            <label>{{ __('banner.position') }}</label>
                            <select class="form-control tagging" wire:model.defer="position">
                                <option value="">{{ __('banner.selectposition') }}</option>
                                <option value="top">{{ __('banner.top') }}</option>
                                <option value="bottom">{{ __('banner.bottom') }}</option>


                            </select>
                            @error('position')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" id="addClosebanner" data-dismiss="modal"><i
                            class="flaticon-cancel-12"></i>{{ __('banner.discard') }}</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="submitForm()">{{ __('banner.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ___edit__ -->


<div wire:ignore.self class="modal fade " id="editmodal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('banner.editbanner') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-row mb-4">
                        <div class="col">
                            <label>{{ __('banner.bannername') }}</label>
                            <input type="text" class="form-control" wire:model="edit_banner_name"
                                placeholder="Banner Name">
                            @error('edit_banner_name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ __('banner.position') }}</label>
                            <select class="form-control tagging" wire:model="edit_position">
                                <option value="">{{ __('banner.selectposition') }}</option>
                                <option value="top">{{ __('banner.top') }}</option>
                                <option value="bottom">{{ __('banner.bottom') }}</option>


                            </select>
                            @error('edit_position')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>




                    </div>
                    <div class="form-row mb-4">
                        <div class="col">
                            <label>{{ __('banner.category') }}</label>
                            <select class="form-control tagging" wire:model="edit_category">
                                <option value="">{{ __('banner.selectcategory') }}</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            @error('edit_category')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="col">
                            <label>{{ __('banner.image') }}</label>
                            <input type="file" class="form-control" wire:model="edit_image" placeholder="Image">
                            @error('edit_image')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <img src="{{ Storage::url($edit_image) }}" width="200" height="100" /> --}}
                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn" id="editClosemodal" data-dismiss="modal"><i
                            class="flaticon-cancel-12"></i>{{ __('banner.discard') }}</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="editForm">{{ __('banner.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- __delete__ -->

<div wire:ignore.self class="modal fade" id="deletebanner" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('banner.deletebanner') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p>{{ __('banner.wanttodelete') }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" id="deleteClosebanner" data-dismiss="modal"><i
                            class="flaticon-cancel-12"></i>{{ __('banner.discard') }}</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="deleteForm()">{{ __('banner.delete') }}</button>
                </div>
        </div>
    </div>
</div>


<!-- __view banner__ -->

<div wire:ignore.self class="modal fade" id="viewbanner" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('banner.view') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-sm-4 p-3">
                        <label> {{ __('banner.bannerimage') }}</label>
                        <h2> <img src="{{ $edit_image }}" width="180" height="100"></h2>
                    </div>

                    <div class="col-sm-4 p-3">
                        <label> {{ __('banner.category') }}</label>
                        <h2> <img src="{{ $edit_image }}" width="180" height="100"></h2>
                    </div>

                    <div class="col">
                        <label class="form-control">{{ __('banner.position') }}<label>
                                <label>{{}}</label>
                    </div>


                </div>
        </div>
    </div>
</div>
