<div>
    <div class="layout-px-spacing">
        <div class="row mt-2 " id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                <div class="widget-content widget-content-area br-6 ">
                    <form>
                        <div class="row ml-2 modal-header ">
                            <h4 class="modal-title" id="exampleModalLabel">{{ __('addproduct.addproduct') }}</h4>


                        </div>

                        <div class="modal-body">


                            <div class="form-row mb-4">
                                <div class="col">
                                    <label>{{ __('addproduct.productname') }}</label>
                                    <input type="text" class="form-control" wire:model="name"
                                        placeholder="Product Name">
                                    @error('name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>{{ __('addproduct.arabicname') }}</label>
                                    <input type="text" class="form-control" wire:model="arabic_name"
                                        placeholder="Arabic Name">
                                    @error('arabic_name')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label>{{ __('addproduct.image') }}</label>
                                    <input type="file" class="form-control" wire:model="image"
                                        placeholder="Product Image">
                                    @error('image')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-row mb-4">

                                <div class="col-sm-4">
                                    <label>{{ __('addproduct.category') }}</label>
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




                                <div class="col-sm-4">
                                    <label>{{ __('addproduct.service') }}</label>
                                    <select class="form-control" wire:model="service">
                                        <option selected>{{ __('addproduct.selectservice') }}</option>

                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="col-sm-4">
                                    <label>{{ __('addproduct.brand') }}</label>
                                    <select class="form-control" wire:model="brand">
                                        <option selected>{{ __('addproduct.selectbrand') }}</option>

                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>







                            <div class="form-row mb-5">
                                <div class="col-sm-4">
                                    <label>Tax</label>
                                    <select class="form-control" wire:model="tax_id">
                                        <option selected>Select Tax</option>
                                        @foreach ($taxs as $tax)
                                            <option value="{{ $tax->id }}">{{ $tax->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tax_id')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-4">

                                    <label>{{ __('addproduct.happyhour') }}</label>
                                    <label class="new-control new-checkbox checkbox-success form-control" for="happy"
                                        style="height: 45px; margin-bottom: 4; margin-right: 5">

                                        <input type="checkbox" wire:model="happy_hour" class="new-control-input"
                                            id="happy" value="1">

                                        <span class="new-control-indicator"></span>{{ __('addproduct.happyhour') }}
                                    </label>

                                </div>
                                <div class="col-sm-4">
                                    <label>{{ __('addproduct.thumbnailimage') }}</label>
                                    <input type="file" class="form-control" wire:model="thumbnail_image"
                                        placeholder="Product Image">
                                    @error('thumbnail_image')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="col-sm-2">
                                    <label>{{ __('addproduct.value') }}</label>
                                    <input type="text" class="form-control" wire:model="value.0" placeholder="value">
                                    @error('value.0')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                    <label>{{ __('addproduct.units') }}</label>
                                    <select class="form-control" wire:model="variation_type.0">
                                        <option>{{ __('addproduct.selectunit') }}</option>
                                        @foreach ($variationtypes as $variationtype)
                                            <option value="{{ $variationtype->id }}">{{ $variationtype->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('variation_type.0')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                    <label>{{ __('addproduct.price') }}</label>
                                    <input type="text" class="form-control" wire:model="price.0" placeholder="Price">
                                    @error('price.0')
                                        <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if ($happy_hour == 1)
                                    <div class="col-sm-2">
                                        <label>{{ __('addproduct.ishappyhourprice') }}</label>
                                        <input type="text" class="form-control" wire:model="is_happy_hour.0"
                                            placeholder="happyhour Price">
                                        @error('is_happy_hour.0')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                                <div class="col-sm-1 ">
                                    <label>{{ __('addproduct.add') }}</label>
                                    <button class="btn  btn-success btn-sm mt-1"
                                        wire:click.prevent="addDiv({{ $i }})"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg>
                                        </svg></button>

                                </div>

                            </div>

                            <!-- * -->

                            @foreach ($inputs as $key => $value)
                                <div class="form-row mb-4">

                                    <div class="col-sm-2">
                                        <input type="text" class="form-control"
                                            wire:model="value.{{ $key + 1 }}" placeholder="Value">
                                        @error('value.' . $key + 1)
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control" wire:model="variation_type.{{ $key + 1 }}">
                                            <option>{{ __('addproduct.selectunit') }}</option>
                                            @foreach ($variationtypes as $variationtype)
                                                <option value="{{ $variationtype->id }}">{{ $variationtype->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('variation_type.' . $key + 1)
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control"
                                            wire:model="price.{{ $key + 1 }}" placeholder="Price">
                                        @error('price.' . $key + 1)
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    @if ($happy_hour == 1)
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control"
                                                wire:model="is_happy_hour.{{ $key + 1 }}"
                                                placeholder="happyhour Price">
                                            @error('is_happy_hour.' . $key + 1)
                                                <span class="error text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    @endif
                                    @if ($i > 0)
                                        <div class="col-sm-2">
                                            <button class="btn btn-danger btn-sm mt-1"
                                                wire:click.prevent="remove({{ $key + 1 }})"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-dash-circle"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                    <path
                                                        d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                </svg></button>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            <div class="row ">
                                <div class="col-sm-11"></div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-primary"
                                        wire:click="submitForm()">{{ __('addproduct.save') }}</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>


                <!-- * -->
            </div>
        </div>
    </div>

</div>
</div>

<script>
    window.addEventListener('modalClose', event => {

        $('#addCloseproduct').click()
    })
</script>
