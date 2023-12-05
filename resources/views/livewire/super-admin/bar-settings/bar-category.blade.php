<div>
    <div>
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel">{{ __('barcategory.barcategory') }}</h4>
                            <div class="col-sm-3  ml-auto">
                                <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                    placeholder="Search..">
                            </div>
                            <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"
                                data-target="#addbarcategory">{{ __('barcategory.add') }}</button>
                            @include('modals.countryaddcategory')
                        </div>

                        @include('modals.countryeditcategory')
                        @include('modals.countrydeletecategory')
                        <div class="table-responsive">
                            <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                                role="grid" aria-describedby="default-ordering_info">
                                <thead>
                                    <tr role="row">
                                        <th class="text-center">{{ __('barcategory.s.no') }}</th>
                                        <th class="text-center">{{ __('barcategory.name') }}</th>
                                        <th class=" text-center">{{ __('barcategory.image') }}
                                        </th>

                                        <th class="text-center">{{ __('barcategory.status') }}</th>

                                        <th class="text-center  " tabindex="0" aria-controls="default-ordering"
                                            rowspan="0" colspan="1" style="width: 90px;"
                                            aria-label="Action: activate to sort column ascending">
                                            {{ __('barcategory.action') }}</th>
                                        {{--     <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending">{{__('barcategory.terminate')}}</th> --}}


                                    </tr>
                                </thead>
                                @if (count($category) > 0)
                                    <tbody>
                                        @foreach ($category as $key => $categorys)
                                            <tr role="row">
                                                <td class="text-center">{{ $category->firstitem() + $key }}</td>
                                                <td class="text-center">{{ $categorys->name }}</td>
                                                <td class="text-center"><img src="{{ Storage::url($categorys->image) }}"
                                                        width="100" height="50" /></td>

                                                <td class="text-center">
                                                    <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                        for="{{ $categorys->id }}">
                                                        <input type="checkbox"
                                                            {{ $categorys->status == '1' ? 'checked' : '' }}
                                                            wire:click="updateStatus($event.target.checked,'{{ $categorys->id }}')"
                                                            id="{{ $categorys->id }}">
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>


                                                <td class="text-center">
                                                    <svg data-target="#editbarcategory"
                                                    wire:click="edit({{ $categorys->id }})" data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-edit-2">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    {{-- <button data-target="#editbarcategory"
                                                        wire:click="edit({{ $categorys->id }})" data-toggle="modal"
                                                        class="btn btn-primary btn-sm  ">{{ __('barcategory.edit') }}</button> --}}
                                                </td>

                                                {{--   <td> <button data-toggle="modal" data-target="#deletebarcategory"  wire:click="deleteId({{ $categorys->id }})" class="btn btn-danger btn-sm  ">{{__('barcategory.delete')}}</button></td> --}}
                                            </tr>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                @else
                                    <tbody>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center m-3">

                                            <h6>{{ __('barcategory.norecordfound') }}</h6>

                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tbody>

                                @endif

                            </table>

                        </div>
                        {{ $category->links('vendor.livewire.bootstrap') }}

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
