<div wire:ignore.self class="modal fade" id="editproduct" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('viewproduct.editproduct') }}</h5>
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
                            <label>{{ __('viewproduct.productname') }}</label>
                            <input type="text" class="form-control" wire:model="name" placeholder="Product Name">
                            @error('name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ __('viewproduct.arabicname') }}</label>
                            <input type="text" class="form-control" wire:model="arabic_name"
                                placeholder="Arabic Name">
                            @error('arabic_name')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col">
                            <label>{{ __('viewproduct.category') }}</label>
                            <select class="form-control" wire:model="category">
                                <option selected>{{ __('addproduct.selectcategory') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-row mb-4">


                        <div class="col">
                            <label>{{ __('viewproduct.happyhour') }}</label><br>
                            <label class="new-control new-checkbox checkbox-success form-control" for="happy"
                                style="height: 40px; width:150px; margin-bottom: 5; margin-right: 5">

                                <input type="checkbox" wire:model="happy_hour" class="new-control-input" id="happy" value="1">

                                <span class="new-control-indicator"></span>{{ __('addproduct.happyhour') }}
                            </label>

                        </div>
                        <div class="col">
                            <label>{{ __('viewproduct.image') }}</label>
                            <input type="file" class="form-control" wire:model="image" placeholder="Product Image">
                            @error('image')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col">
                            <label>{{ __('viewproduct.thumbnailimage') }}</label>
                            <input type="file" class="form-control" wire:model="thumbnail_image"
                                placeholder="Product Image">
                            @error('thumbnail_image')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                    </div>



                    <div class="form-row mb-4">

                        {{-- <div class="col-sm-1 ">
                            <label>{{ __('viewproduct.add') }}</label>
                            <button class="btn  btn-success btn-sm mt-1"
                                wire:click.prevent="addDiv({{ $i }})"> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                                </svg></button>
                        </div> --}}
                    </div>
                    <!-- * -->
                    @foreach ($inputs as $key => $value)
                        <div class="form-row mb-4">

                            <div class="col-sm-2">
                                <label>{{ __('viewproduct.value') }}</label>
                                <input type="text" class="form-control" wire:model="value.{{ $key }}"

                                    placeholder="Value">
                                    <input type="hidden" wire:model="product_variation_id.{{ $key }}" >
                                @error('value.' . $key)
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label>{{ __('viewproduct.units') }}</label>
                                <select class="form-control" wire:model="variation_type.{{ $key }}">
                                    <option>{{ __('addproduct.selectunit') }}</option>
                                    @foreach ($variationtypes as $variationtype)
                                        <option value="{{ $variationtype->id }}">{{ $variationtype->value }}</option>
                                    @endforeach
                                </select>
                                @error('variation_type.' . $key)
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-3">
                                <label>{{ __('viewproduct.price') }}</label>
                                <input type="text" class="form-control" wire:model="price.{{ $key }}"
                                    placeholder="Price">
                                @error('price.' . $key)
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($happy_hour == 1)
                                <div class="col-sm-3">
                                    <label>{{ __('viewproduct.ishappyhourprice') }}</label>
                                    <input type="text" class="form-control"
                                        wire:model="is_happy_hour.{{ $key }}" placeholder="Happyhour Price">
                                    @error('is_happy_hour.' . $key)
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                            @if ($key > 0)
                                <div class="col-sm-1 mt-1">
                                    <label> {{ __('viewproduct.remove')}}</label>
                                    <button class="btn btn-danger btn-sm "
                                        wire:click.prevent="remove({{$key}})"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg></button>
                                </div>
                                @else
                                <div class="col-sm-1 ">
                                    <label>{{ __('viewproduct.add')}}</label>
                                    <button class="btn  btn-success btn-sm mt-1"
                                        wire:click.prevent="addDiv({{$i}})"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                        </button>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button class="btn" id="editCloseproduct" data-dismiss="modal"><i
                            class="flaticon-cancel-12"></i>{{ __('viewproduct.discard') }}</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="edit">{{ __('viewproduct.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
