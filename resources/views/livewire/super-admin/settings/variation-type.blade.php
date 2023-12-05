<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('variationtype.variationtype') }}</h4>




                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search Variation..">
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal" wire:click="reseted"
                            data-target="#addmodal">add</button>
                        @include('modals.addvariation')
                    </div>

                    @include('modals.editvariation')

                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">

                            <thead>
                                <tr role="row">
                                    <th class="text-center">{{ __('variationtype.s.no') }}</th>
                                    <th class="text-center">{{ __('variationtype.name') }}</th>
                                    <th class="text-center">{{ __('variationtype.displayname') }}</th>
                                    <th class="text-center">{{ __('variationtype.status') }}</th>
                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('variationtype.action') }}</th>

                                    {{--         <th class="text-center dt-no-sorting sorting " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">Terminate</th> --}}

                            </thead>
                            @if (count($variation) > 0)
                                <tbody>

                                    @foreach ($variation as $key => $variations)
                                        <tr role="row">
                                            <td class="text-center">{{ $variation->firstitem() + $key }}</td>
                                            <td class="text-center">{{ $variations->name }}</td>
                                            <td class="text-center">{{ $variations->value }}</td>


                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                    for="{{ $variations->id }}">
                                                    <input type="checkbox"
                                                        {{ $variations->status == '1' ? 'checked' : '' }}
                                                        wire:click="updateStatus($event.target.checked,'{{ $variations->id }}')"class="custom-control-input"
                                                        id="{{ $variations->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>



                                            <td>
                                                <svg data-target="#editmodal"
                                                    wire:click="edit('{{ $variations->id }}')"data-toggle="modal"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                {{-- <button data-target="#editmodal"
                                                    wire:click="edit('{{ $variations->id }}')"data-toggle="modal"
                                                    class="btn btn-primary btn-sm  ">{{ __('variationtype.edit') }}</button> --}}
                                            </td>

                                            {{--     <td><button  wire:click.prevent="deleteId('{{ $variations->id }}')"class="btn btn-danger btn-sm ">Delete</button></td> --}}
                                        </tr>

                                        </tr>
                                    @endforeach



                                </tbody>
                            @else
                                <tbody>
                                <tr>
                                    <td colspan="5">
                                            <center>
                                                <h6 >Units Not Found</h6>
                                            </center>
                                        </td>
                                        </tr>
                                </tbody>

                            @endif



                        </table>

                    </div>
                    {{ $variation->links('vendor.livewire.bootstrap') }}
                </div>

            </div>


        </div>
    </div>
</div>
<script>
    window.addEventListener('modalClose', event => {
        $('#addmodalClose').click();
    })
    window.addEventListener('modalClose', event => {
        $('#editmodalClose').click();
    })

    window.addEventListener('modalClose', event => {
        $('#deletemodalClose').click();
    })
</script>
