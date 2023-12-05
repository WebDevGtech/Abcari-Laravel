<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title " id="exampleModalLabel">{{ __('taxtype.taxtype') }}</h4>




                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search Tax..">
                        </div>

                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"
                            data-target="#addtax">{{ __('taxtype.add') }}</button>


                    </div>

                    @include('modals.addtaxtype')
                    @include('modals.edittaxtype')

                    <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid"
                        aria-describedby="default-ordering_info">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('taxtype.s.no') }}</th>
                                <th class="text-center">{{ __('taxtype.taxname') }}</th>
                                {{--  <th class="text-center">{{__('taxtype.countryname')}}</th> --}}

                                <th class="text-center">{{ __('taxtype.taxrate') }}</th>
                                <th class="text-center">{{ __('taxtype.status') }} </th>
                                <th class="text-center">{{ __('taxtype.action') }}</th>
                            </tr>
                        </thead>
                        @if (count($taxtypes) > 0)
                            <tbody>
                                @foreach ($taxtypes as $taxtype)
                                    <tr>
                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                        <td class="text-center">{{ $taxtype->name }}</td>
                                        {{-- <td class="text-center">{{$taxtype->country->name}}</td> --}}

                                        <td class="text-center">{{ $taxtype->tax_rate }}</td>
                                        <td class="text-center">


                                            <label class="switch s-icons s-outline s-outline-primary   mr-2 mt-3"
                                                for="{{ $taxtype->id }}">
                                                <input type="checkbox" {{ $taxtype->status == 1 ? 'checked' : '' }}
                                                    wire:click="updateStatus($event.target.checked,'{{ $taxtype->id }}')"
                                                    id="{{ $taxtype->id }}">
                                                <span class="slider round"></span>
                                            </label>



                                        </td>
                                        <td class="text-center">
                                            <svg data-target="#edittax" wire:click="editId({{ $taxtype->id }})"
                                                data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-edit-2">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                </path>
                                            </svg>
                                            {{-- <button data-target="#edittax" wire:click="editId({{ $taxtype->id }})"
                                                data-toggle="modal"
                                                class="btn btn-primary btn-sm  mb-2 ">{{ __('taxtype.edit') }}</button> --}}
                                        </td>

                                    </tr>
                                @endforeach
                        @else

                                <tr>

                                    <td colspan="5">
                                            <center>{{ __('taxtype.norecordfound') }}</center>

                                    </td>

                                </tr>

                        @endif
                    </tbody>

                    </table>
                    @if (count($taxtypes) > 0)
                        {{ $taxtypes->links('vendor.livewire.bootstrap') }}
                    @endif

                </div>

            </div>

        </div>

    </div>


</div>


<script>
    window.addEventListener('modalClose', event => {

        $('#addmodalClose').click()
    })
    window.addEventListener('modalClose', event => {

        $('#editmodalClose').click()
    })
    window.addEventListener('modalClose', event => {

        $('#deleteClosetax').click()
    })
</script>
