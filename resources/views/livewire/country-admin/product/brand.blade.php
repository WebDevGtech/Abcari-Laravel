<div>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">Brand</h4>
                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search..">
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal" data-target="#addbrand">Add
                        </button>
                        @include('modals.add-brand')
                    </div>
                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">{{ __('addbrand.s.no') }}</th>
                                    <th class="text-center">{{ __('addbrand.name') }} </th>
                                    <th class="text-center">{{ __('addbrand.image') }} </th>
                                    <th class="text-center">{{ __('addbrand.recommend') }}</th>
                                    <th class="text-center">{{ __('addbrand.prefered') }}</th>
                                    <th class="text-center">{{ __('addbrand.status') }}</th>
                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        Action</th>
                                </tr>
                            </thead>
                            @if (count($brands) > 0)
                                <tbody>
                                    @foreach ($brands as $key => $brand)
                                        <tr role="row">
                                            <td class="text-center">{{ $loop->index+1 }}</td>
                                            <td class="text-center">{{ $brand->name}}</td>
                                            <td class="text-center"><img src="{{ Storage::url($brand->image) }}"
                                                    width="100" height="50" /></td>
                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2"
                                                   >
                                                    <input type="checkbox" {{ $brand->recommendeds == '1' ? 'checked' : '' }}
                                                        wire:click="recommend($event.target.checked,'{{ $brand->id }}')"
                                                       >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2"
                                                    >
                                                    <input type="checkbox" {{ $brand->preferred == '1' ? 'checked' : '' }}
                                                        wire:click="prefered($event.target.checked,'{{ $brand->id }}')"
                                                       >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2"
                                                    >
                                                    <input type="checkbox" {{ $brand->status == '1' ? 'checked' : '' }}
                                                        wire:click="updateStatus($event.target.checked,'{{ $brand->id }}')"
                                                       >
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <svg data-target="#editbrand"
                                                    wire:click.prevent="edit('{{ $brand->id }}')"
                                                    data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-edit-2">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                    </path>
                                                </svg>
                                                {{-- <button data-target="#editbrand"
                                                    wire:click.prevent="edit('{{ $brand->id }}')"
                                                    data-toggle="modal"
                                                    class="btn btn-primary btn-sm ">{{ __('addbrand.edit') }}</button> --}}
                                            </td>
                                            @include('modals.edit-brand')
                                            {{-- @include('modals.editcountryservice') --}}
                                            {{--   <td> <button  data-target="#deletebarservice"  data-toggle="modal"    wire:click.prevent="deleteId('{{ $services->id  }}')" class="btn btn-danger btn-sm ">{{ __('barservice.delete') }}</button></td>
                                            @include('modals.deletebarservice') --}}
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="5"><center>Brand Not Found</center></td>
                                    </tr>
                                    @endif
                                </tbody>
                        </table>
                    </div>
                       {{$brands->links('vendor.livewire.bootstrap')}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('modalClose', event => {
        $('#editclose').click();
    })
    window.addEventListener('modalClose', event => {
        $('#addclose').click();
    })
</script>
