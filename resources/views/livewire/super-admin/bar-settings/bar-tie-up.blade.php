<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('bartieup.bartieup') }}</h4>




                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search..">
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"
                            data-target="#addmodal">{{ __('bartieup.add') }}</button>
                        @include('modals.addTieup')


                    </div>
                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">{{ __('bartieup.s.no') }}</th>
                                    <th class="text-center">{{ __('bartieup.name') }}</th>
                                    <th class="text-center">{{ __('bartieup.details') }}</th>
                                    <th class="text-center">{{ __('bartieup.image') }}
                                    </th>
                                    <th class="text-center">{{ __('bartieup.status') }}</th>


                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('bartieup.action') }}</th>
                                    {{--    <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{ __('bartieup.terminate') }}</th> --}}


                                </tr>
                            </thead>
                            @if (count($tieup) > 0)
                                <tbody>

                                    @foreach ($tieup as $key => $tieups)
                                        <tr role="row">
                                            <td class="text-center">{{ $tieup->firstitem() + $key }}</td>
                                            <td class="text-center">{{ $tieups->name }}</td>
                                            <td class="text-center">{{ $tieups->details }}</td>
                                            <td class="text-center"><img src="{{ Storage::url($tieups->image) }}"
                                                    width="100" height="50" /></td>

                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                    for="{{ $tieups->id }}">
                                                    <input type="checkbox"
                                                        {{ $tieups->status == '1' ? 'checked' : '' }}
                                                        wire:click="updateStatus($event.target.checked,'{{ $tieups->id }}')"class="custom-control-input"
                                                        id="{{ $tieups->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <svg data-target="#editmodal" wire:click.prevent="edit('{{ $tieups->id }}')"
                                                data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                {{-- <button data-target="#editmodal"
                                                    wire:click.prevent="edit('{{ $tieups->id }}')"
                                                    data-toggle="modal"
                                                    class="btn btn-primary btn-sm  ">{{ __('bartieup.edit') }}</button> --}}
                                            </td>
                                            @include('modals.edittieup')
                                            {{--  <td>
                            <button  data-toggle="modal" data-target="#deletemodal" wire:click.prevent="deleteId('{{ $tieups->id  }}')" class="btn btn-danger btn-sm  ">{{ __('bartieup.delete') }}</button></td> @include('modals.deletetieup') --}}
                                        </tr>

                                        </tr>
                                    @endforeach



                                </tbody>
                            @else
                                <tbody>
                                    <td colspan="7">
                                        <center>
                                            <h6>{{ __('bartieup.norecordfound') }}</h6>
                                        </center>
                                    </td>
                                </tbody>

                            @endif
                        </table>
                    </div>
                    {{ $tieup->links('vendor.livewire.bootstrap') }}
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
        $('#edittieupclose').click();
    })

    window.addEventListener('modalClose', event => {
        $('#deletemodalClose').click();
    })
</script>
