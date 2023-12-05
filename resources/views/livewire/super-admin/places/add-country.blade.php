<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('country.country') }}</h4>




                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search..">
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"
                            data-target="#addcountry">{{ __('country.add') }}</button>
                        @include('modals.addcountry')

                    </div>



                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center"> {{ __('country.s.no') }}</th>
                                    <th class="text-center"> {{ __('country.countryname') }}</th>

                                    </th>


                                    <th class="text-center">{{ __('country.countrycode') }}</th>
                                    <th class="text-center">{{ __('country.phonecode') }}</th>
                                    <th class="text-center">{{ __('country.currency-name') }}</th>
                                    <th class="text-center">{{ __('country.status') }}</th>


                                    <th class="text-center  " tabindex="0" aria-controls="default-ordering"
                                        rowspan="0" colspan="1" style="width: 90px;"
                                        aria-label="Action: activate to sort column ascending">
                                        {{ __('country.action') }}</th>

                                    {{--    <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending" >{{ __('country.terminate') }}</th> --}}
                                </tr>
                            </thead>
                            @if (count($countries) > 0)
                                <tbody>

                                    @foreach ($countries as $key => $country)
                                        <tr role="row">
                                            <td class="text-center">{{ $countries->firstitem() + $key }}</td>
                                            <td class="text-center">{{ $country->name }}</td>
                                            <td class="text-center">{{ $country->code }}</td>
                                            <td class="text-center">{{ $country->phonecode }}
                                            </td>
                                            <td class="text-center">{{ $country->currency_name }}</td>
                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                    for="{{ $country->id }}">
                                                    <input type="checkbox" {{ $country->status == '1' ? 'checked' : '' }}
                                                        wire:click="updateStatus($event.target.checked,'{{ $country->id }}')"
                                                        id="{{ $country->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <svg data-target="#editcountry"
                                                wire:click.prevent="edit('{{ $country->id }}')"data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>

                                                {{-- <button data-target="#editcountry"
                                                    wire:click.prevent="edit('{{ $country->id }}')"data-toggle="modal"
                                                    class="btn btn-primary btn-sm  ">{{ __('country.edit') }}</button> --}}
                                            </td>
                                            @include('modals.editcountry')
                                            {{--   <td><button  data-target="#deletecountry" data-toggle="modal" wire:click.prevent="deleteId('{{ $country->id }}')"class="btn btn-danger btn-sm ">{{ __('country.delete') }}</button></td>
                           @include('modals.deletecountry') --}}
                                    @endforeach
                                    </tr>


                                </tbody>
                            @else
                                <tbody>
                                <tr>
                                        <td colspan="7">
                                            <center>
                                                <h6 >Country  Not Found</h6>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>

                            @endif



                        </table>

                    </div>
                    {{ $countries->links('vendor.livewire.bootstrap') }}
                </div>


            </div>

        </div>
    </div>

</div>

<script>
    window.addEventListener('modalClose', event => {
        $('#addcountryModalclose').click();
    })
    window.addEventListener('modalClose', event => {
        $('#editcountryModalclose').click();
    })

    window.addEventListener('modalClose', event => {
        $('#deletecountryModalclose').click();
    })
    //    window.addEventListener('error', event => {
    //      $('#').click()
    //    })
</script>
