<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('sitesetting.sitesetting') }}</h4>




                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search..">
                        </div>
                        <button data-toggle="modal" data-target="#addmodal"
                            class="btn btn-outline-primary ml-1 mb-1">{{ __('sitesetting.add') }}</button>
                        @include('modals.addsitesetting')
                    </div>


                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">


                            <thead>
                                <tr role="row">
                                    <th class="text-center">{{ __('sitesetting.sno') }}</th>
                                    <th class="text-center">{{ __('sitesetting.name') }}</th>
                                    <th class="text-center">{{ __('sitesetting.key') }}
                                    </th>
                                    <th class="text-center">{{ __('sitesetting.value') }}
                                    </th>

                                    <th class="text-center">{{ __('sitesetting.status') }}</th>

                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('sitesetting.action') }}</th>

                                    {{--   <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('sitesetting.terminate')}}</th> --}}
                                </tr>
                            </thead>
                            @if (count($sites) > 0)
                                <tbody>
                                    @foreach ($sites as $key => $site)
                                        <tr role="row">
                                            <td class="text-center">{{ $sites->firstitem() + $key }}</td>
                                            <td class="text-center">{{ $site->name }}</td>
                                            <td class="text-center">{{ $site->key }}</td>
                                            <td class="text-center">{{ $site->value }}</td>


                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                    for="{{ $site->id }}">
                                                    <input type="checkbox" {{ $site->status == 1 ? 'checked' : '' }}
                                                        wire:click="updateChange($event.target.checked,'{{ $site->id }}')"class="custom-control-input"
                                                        id="{{ $site->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <svg data-target="#editmodal"
                                                wire:click.prevent="editId('{{ $site->id }}')"
                                                data-toggle="modal"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                {{-- <button data-target="#editmodal"
                                                    wire:click.prevent="editId('{{ $site->id }}')"
                                                    data-toggle="modal"
                                                    class="btn btn-primary btn-sm ">{{ __('sitesetting.edit') }}</button> --}}
                                            </td>
                                            @include('modals.editsitesetting')
                                            {{-- <td><button  data-target="#delete-country-admin"  data-toggle="modal" wire:click.prevent="deleteId('{{ $site->id }}')" class="btn btn-danger btn-sm ">{{__('sitesetting.delete')}}</button></td> --}}

                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td class="text-center m-3">
                                            <div class="row p-4">
                                                <h6>{{ __('sitesetting.no-record-found') }}</h6>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            @endif


                            {{--      @endif  --}}








                        </table>

                    </div>
                    {{ $sites->links('vendor.livewire.bootstrap') }}
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
