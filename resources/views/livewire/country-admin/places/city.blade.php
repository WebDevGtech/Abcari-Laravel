<div class="layout-px-spacing">

    <div class="row layout-top-spacing" id="cancel-row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row m-2 ">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('city.city') }}</h4>




                    <div class="col-sm-3  ml-auto">
                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                            placeholder="Search City..">
                    </div>
                    <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal" 
                        data-target="#addmodal">{{ __('city.add') }}</button>
                    @include('modals.addcity')

                </div>



                <div class="table-responsive">
                    <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid"
                        aria-describedby="default-ordering_info">
                        <thead>
                            <tr role="row">
                                <th class="text-center">{{ __('city.s.no') }}</th>
                                <th class="text-center">{{ __('city.cityname') }}</th>
                                <th class="text-center">{{ __('city.citycode') }}</th>
                                <th class="text-center">{{ __('city.country') }}</th>
                                <th class="text-center">{{ __('city.zone') }}</th>



                                </th>


                                <th class="text-center">{{ __('city.status') }}</th>

                                <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0"
                                    colspan="1" style="width: 59px;"
                                    aria-label="Action: activate to sort column ascending">{{ __('city.action') }}</th>

                                {{--    <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending">{{ __('city.terminate') }}</th> --}}
                            </tr>
                        </thead>

                        <tbody>
                            @if (count($city) > 0)
                                @foreach ($city as $key => $citys)
                                    <tr role="row">
                                        <td class="text-center">{{ $city->firstitem() + $key }}</td>
                                        <td class="text-center">{{ $citys->name }}</td>
                                        <td class="text-center">{{ $citys->code }}</td>
                                        <td class="text-center">{{ $citys->country->name }}</td>
                                        <td class="text-center">{{ $citys->zone->name }}</td>




                                        <td class="text-center">
                                            <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                for="{{ $citys->id }}">
                                                <input type="checkbox" {{ $citys->status == '1' ? 'checked' : '' }}
                                                    wire:click="updateStatus($event.target.checked,'{{ $citys->id }}')"
                                                    id="{{ $citys->id }}">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <svg data-target="#editmodal"
                                            wire:click.prevent="edit('{{ $citys->id }}')"data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg>
                                            {{-- <button data-target="#editmodal"
                                                wire:click.prevent="edit('{{ $citys->id }}')"data-toggle="modal"
                                                class="btn btn-primary btn-sm  ">
                                                {{ __('city.edit') }}

                                            </button> --}}
                                        </td>
                                        @include('modals.editcity')
                                        {{--   <td><button  wire:click.prevent="deleteId('{{ $citys->id }}')"class="btn btn-danger btn-sm warning confirm ">{{ __('city.delete') }}</button></td> --}}
                                    </tr>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7"><center>City Not Found</center></td>
                                </tr>
                            @endif
                        </tbody>





                    </table>

                </div>
                {{ $city->links('vendor.livewire.bootstrap') }}
            </div>

        </div>


    </div>
</div>

<script>
    window.addEventListener('modalClose', event => {

        $('#editmodalClose').click()
    })
    window.addEventListener('modalClose', event => {

        $('#addmodalClose').click()
    })
</script>
