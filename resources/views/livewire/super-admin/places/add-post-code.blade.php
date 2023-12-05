<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row m-2 ">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('postcode.postcode') }}</h4>




                    <div class="col-sm-3  ml-auto">
                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                            placeholder="Search..">
                    </div>
                    <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"
                       data-target="#addmodal">{{ __('postcode.add') }}</button>
                    @include('modals.countryaddpostcode')

                </div>



                <div class="table-responsive">
                    <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid"
                        aria-describedby="default-ordering_info">
                        <thead>
                            <tr role="row">
                                <th class="text-center">{{ __('postcode.s.no') }}</th>

                                <th class="text-center">{{ __('postcode.country') }}</th>
                                <th class="text-center">{{ __('postcode.zone') }}</th>
                                <th class="text-center">{{ __('postcode.city') }}</th>
                                <th class="text-center">{{ __('postcode.postcode') }}</th>

                                </th>


                                <th class="text-center">{{ __('postcode.status') }}</th>

                                <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0"
                                    colspan="1" style="width: 90px;"
                                    aria-label="Action: activate to sort column ascending">{{ __('postcode.action') }}
                                </th>

                                {{--  <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending" >{{ __('postcode.terminate') }}</th> --}}
                            </tr>
                        </thead>
                        @if (count($postcode) > 0)
                            <tbody>
                                @foreach ($postcode as $key => $postcodes)
                                    <tr role="row">
                                        <td class="text-center">{{ $postcode->firstitem() + $key }}</td>

                                        <td class="text-center">{{ $postcodes->Country->name }}</td>
                                        <td class="text-center">{{ $postcodes->zone->name }}</td>
                                        <td class="text-center">{{ $postcodes->city->name }}</td>

                                        <td class="text-center">{{ $postcodes->code }}</td>

                                        <td class="text-center">
                                            <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                for="{{ $postcodes->id }}">
                                                <input type="checkbox" {{ $postcodes->status == '1' ? 'checked' : '' }}
                                                    wire:click="updateStatus($event.target.checked,'{{ $postcodes->id }}')"
                                                    id="{{ $postcodes->id }}">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>


                                        <td class="text-center">
                                            <svg data-target="#editmodal"
                                            wire:click.prevent="edit('{{ $postcodes->id }}')" data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                            {{-- <button data-target="#editmodal"
                                                wire:click.prevent="edit('{{ $postcodes->id }}')" data-toggle="modal"
                                                class="btn btn-primary btn-sm  ">{{ __('postcode.edit') }}</button> --}}
                                        </td>
                                        @include('modals.postcode')
                                        {{--  <td><button  data-target="#deletemodal" data-toggle="modal"  wire:click.prevent="deleteId('{{ $postcodes->id }}')"class="btn btn-danger btn-sm ">{{__('postcode.delete')}}</button></td>
                           </tr>  @include('modals.deletepostcode') --}}

                                    </tr>
                                @endforeach

                            </tbody>
                        @else
                            <tbody>
                            <tr>
                                        <td colspan="7">
                                            <center>
                                                <h6 >Postcode  Not Found</h6>
                                            </center>
                                        </td>
                                    </tr>
                            </tbody>

                        @endif


                    </table>

                </div>

            </div>
            {{ $postcode->links('vendor.livewire.bootstrap') }}
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
