<div>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('viewproduct.viewproduct') }}</h4>
                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search Product..">
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"><a
                                href="{{ route('add-product') }}">{{ __('viewproduct.addproduct') }}</a></button>
                    </div>
                    @include('modals.view-product')
                   @include('modals.product-view') 

                    <table id="zero-config alter_pagination" class="table table-bordered table-hover table-condensed"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('viewproduct.s.no') }}</th>
                                <th class="text-center">{{ __('viewproduct.name') }}</th>
                                <th class="text-center">{{ __('viewproduct.image') }}</th>
                                <th class="text-center">{{ __('viewproduct.pricevariation') }}</th>
                                <th class="text-center">{{ __('viewproduct.preferred') }}</th>
                                <th class="text-center">{{ __('viewproduct.recommended') }}</th>
                                <th class="text-center">{{ __('viewproduct.status') }}</th>
                                <th class="no-content">{{ __('viewproduct.action') }}</th>
                            </tr>
                        </thead>
                        @if ($products)
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $product->name }}</td>

                                        <td class="text-center"> <img src="{{ Storage::url($product->image) }}"
                                                width="100" height="50" /></td>


                                        <td class="text-center">
                                            <div>
                                                @foreach ($product->productvariations as $value)
                                                    {{ $value->value }} -
                                                    {{ auth::user()->countryname->currency_name }} {{ $value->price }}
                                                    </br>
                                                @endforeach
                                            </div>
                                        </td>



                                        <td class="text-center">

                                            <label class="switch s-success  mr-2 mt-3" for="{{ $product->name }}">
                                                <input type="checkbox" {{ $product->preferred == 1 ? 'checked' : '' }}
                                                    wire:click="updatePreferred($event.target.checked,'{{ $product->id }}')"
                                                    id="{{ $product->name }}">
                                                <span class="slider round"></span>
                                            </label>


                                        </td>
                                        <td class="text-center">

                                            <label class="switch s-success  mr-2 mt-3" for="{{ $product->image }}">
                                                <input type="checkbox"
                                                    {{ $product->recommendeds == 1 ? 'checked' : '' }}
                                                    wire:click="updateRecommended($event.target.checked,'{{ $product->id }}')"
                                                    id="{{ $product->image }}">
                                                <span class="slider round"></span>
                                            </label>


                                        </td>
                                        <td class="text-center">

                                            <label class="switch s-success  mr-2 mt-3" for="{{ $product->id }}">
                                                <input type="checkbox" {{ $product->status == 1 ? 'checked' : '' }}
                                                    wire:click="updateStatus($event.target.checked,'{{ $product->id }}')"
                                                    id="{{ $product->id }}">
                                                <span class="slider round"></span>
                                            </label>


                                        </td>
                                        <td class="text-center"> <a href="" data-toggle="modal"
                                                data-target="#editproduct" wire:click="editForm({{ $product->id }})"
                                                data-placement="top" title="Edit"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg></a>
                                            {{--  <a href="" data-toggle="modal" data-placement="top" data-target="#deleteproduct"  title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> --}}

                                            <a class="icon-container bs-tooltip" href=""
                                                wire:click="viewId({{ $product->id }})"
                                                title="view"data-toggle="modal" data-target="#viewproduct">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg><span class="icon-name"> </span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @endif
                        {{-- <tfoot>
                            <tr>
                                <th class="text-center">{{ __('viewproduct.s.no') }}</th>
                                <th class="text-center">{{ __('viewproduct.name') }}</th>

                                <th class="text-center">{{ __('viewproduct.image') }}</th>
                                <th class="text-center">{{ __('viewproduct.pricevariation') }}</th>
                                <th class="text-center">{{ __('viewproduct.preferred') }}</th>
                                <th class="text-center">{{ __('viewproduct.recommended') }}</th>
                                <th class="text-center">{{ __('viewproduct.status') }}</th>
                                <th class="no-content">{{ __('viewproduct.action') }}</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                    @if ($products)
                        {{ $products->links('vendor.livewire.bootstrap') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('modalClose', event => {

        $('#editCloseproduct').click()
    })
</script>
