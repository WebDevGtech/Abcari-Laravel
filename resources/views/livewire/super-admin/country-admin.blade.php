<div>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('country-admin.country-admin') }}</h4>
                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search..">
                        </div>
                        <a href="{{ route('add-admin') }}" class="p-1" >
                            <button class="btn btn-outline-primary ml-1 mb-1">Add</button>

                        </a>
                    </div>
                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">{{ __('country-admin.s.no') }}</th>
                                    <th class="text-center">{{ __('country-admin.name') }}</th>
                                    <th class="text-center">{{ __('country-admin.email') }}
                                    </th>
                                    <th class="text-center">{{ __('country-admin.country') }}
                                    </th>

                                    <th class="text-center">{{ __('country-admin.status') }}</th>

                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('country-admin.action') }}</th>

                                    {{--   <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('country-admin.terminate')}}</th> --}}
                                </tr>
                            </thead>
                            @if (count($users) > 0)
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr role="row">
                                            <td class="text-center">{{ $users->firstitem() + $key }}</td>
                                            <td class="text-center">{{ $user->name }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->countryname->name }}</td>


                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                    for="{{ $user->id }}">
                                                    <input type="checkbox" {{ $user->status == 1 ? 'checked' : '' }}
                                                        wire:click="updateChange($event.target.checked,'{{ $user->id }}')"class="custom-control-input"
                                                        id="{{ $user->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <svg data-target="#editmodal" wire:click.prevent="edit('{{ $user->id }}')" data-toggle="modal" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                {{-- <button data-target="#editmodal"
                                                    wire:click.prevent="edit('{{ $user->id }}')"
                                                    data-toggle="modal"
                                                    class="btn btn-primary btn-sm ">{{ __('country-admin.edit') }}</button> --}}
                                            </td>
                                            @include('modals.editadmin')
                                            {{--  <td><button  data-target="#delete-country-admin"  data-toggle="modal" wire:click.prevent="deleteId('{{ $user->id }}')" class="btn btn-danger btn-sm ">{{__('country-admin.delete')}}</button></td>
                                              @include('modals.delete-country-admin') --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <tbody>
                                    <tr>
                                        <td colspan="6">
                                            <center>
                                                <h6 >Country Admin Not Found</h6>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                            @endif
                        </table>
                        {{ $users->links('vendor.livewire.bootstrap') }}
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
{{--

window.addEventListener('deleteadmin', event => {
 $('#').click()
})

window.addEventListener('onstatus', event => {
 $('#').click()
})

window.addEventListener('offstatus', event => {
 $('#').click()
})

window.addEventListener('update', event => {
 $('#').click()
})

--}}

<script>
    window.addEventListener('modalClose', event => {
        $('#deletecountryadmin').click()
    })
    window.addEventListener('modalClose', event => {
        $('#editcountryadmin').click()
    })
</script>
