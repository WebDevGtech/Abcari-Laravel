<div>
    <div>
        <div>
            <div class="layout-px-spacing">

                <div class="row layout-top-spacing" id="cancel-row">

                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <div class="row m-2 ">
                                <h4 class="modal-title" id="exampleModalLabel">{{ __('rule.rule') }}</h4>




                                <div class="col-sm-3  ml-auto">
                                    <input id="search-text" type="search" class="form-control mb-1 mr-5"
                                        wire:model="search" placeholder="Search..">
                                </div>
                                <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"
                                    data-target="#addrule">{{ __('rule.add') }}</button>
                                @include('modals.addrule')

                            </div>



                            <div class="table-responsive">
                                <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                                    role="grid" aria-describedby="default-ordering_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="text-center">{{ __('rule.s.no') }}</th>
                                            <th class="text-center">{{ __('rule.name') }}</th>

                                            </th>
                                            <th class="text-center">{{ __('rule.image') }}</th>

                                            </th>
                                            <th class="text-center">{{ __('rule.description') }}</th>
                                            <th class="text-center">{{ __('rule.status') }}</th>

                                            <th class="text-center  " tabindex="0" aria-controls="default-ordering"
                                                rowspan="0" colspan="1" style="width: 90px;"
                                                aria-label="Action: activate to sort column ascending">
                                                {{ __('rule.action') }}</th>


                                        </tr>
                                    </thead>
                                    @if (count($rules) > 0)

                                        <tbody>
                                            @foreach ($rules as $key => $rule)
                                                <tr role="row">
                                                    <td class="text-center">{{ $rules->firstitem() + $key }}</td>

                                                    <td class="text-center">{{ $rule->name }}</td>
                                                    <td class="text-center"><img src="{{ Storage::url($rule->image) }}"
                                                            width="100" height="50" /></td>
                                                    <td class="text-center">{{ $rule->description }}</td>
                                                    <td class="text-center">
                                                        <label
                                                            class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                            for="{{ $rule->id }}">
                                                            <input type="checkbox"
                                                                {{ $rule->status == '1' ? 'checked' : '' }}
                                                                wire:click="updateStatus($event.target.checked,'{{ $rule->id }}')"
                                                                id="{{ $rule->id }}">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </td>


                                                    <td class="text-center">
                                                        <svg data-target="#editrule"
                                                        wire:click="editId({{ $rule->id }})" data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-edit-2">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                        {{-- <button data-target="#editrule"
                                                            wire:click="editId({{ $rule->id }})"data-toggle="modal"
                                                            class="btn btn-primary btn-sm   ">{{ __('rule.edit') }}</button> --}}
                                                    </td>


                                                </tr>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @else
                                        <tbody>
                                        <tr>
                                    <td colspan="6">
                                            <center>
                                                <h6 >Rule Not Found</h6>
                                            </center>
                                        </td>
                                        </tr>
                                        </tbody>

                                    @endif
                                    <tbody>

                                    </tbody>



                                </table>

                            </div>
                            {{ $rules->links('vendor.livewire.bootstrap') }}
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

        </div>
