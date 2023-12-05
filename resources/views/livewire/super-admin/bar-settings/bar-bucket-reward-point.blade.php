<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('barbucketreward.barbucketreward') }}</h4>




                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search..">
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal"
                            data-target="#addmodal">{{ __('barbucketreward.add') }}</button>

                        @include('modals.addbarbucketpoint')

                    </div>



                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">{{ __('barbucketreward.s.no') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.bucketrewardname') }}</th>

                                    <th class="text-center">{{ __('barbucketreward.addrewardpoints') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.addrewardamount') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.addredeempoints') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.addredeemamount') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.status') }}</th>


                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('barbucketreward.action') }}</th>
                                    {{-- <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('barbucketreward.terminate')}}</th> --}}


                                </tr>
                            </thead>
                            @if (count($bucketpoints) > 0)
                                <tbody>

                                    @foreach ($bucketpoints as $key => $bucketpoint)
                                        <tr role="row">

                                            <td class="text-center">{{ $bucketpoints->firstitem() + $key }}</td>

                                            <td class="text-center">{{ $bucketpoint->name }}</td>


                                            <td class="text-center">

                                                {{ $bucketpoint->pointreward->point }} </td>

                                            <td class="text-center"> {{ $bucketpoint->pointreward->amount }}
                                            </td>

                                            <td class="text-center">

                                                {{ $bucketpoint->pointredeem->point }} </td>

                                            <td class="text-center"> {{ $bucketpoint->pointredeem->amount }} </td>




                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                    for="{{ $bucketpoint->id }}">
                                                    <input type="checkbox"
                                                        {{ $bucketpoint->status == '1' ? 'checked' : '' }}
                                                        wire:click="updateStatus($event.target.checked,'{{ $bucketpoint->id }}')"class="custom-control-input"
                                                        id="{{ $bucketpoint->id }}">
                                                    <span class="slider round"></span>
                                                </label>


                                            </td>

                                            <td class="text-center">
                                                <svg data-target="#editmodal"
                                                wire:click.prevent="edit('{{ $bucketpoint->id }}')"
                                                data-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-edit-2">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg>
                                                {{-- <button data-target="#editmodal"
                                                    wire:click.prevent="edit('{{ $bucketpoint->id }}')"
                                                    data-toggle="modal"
                                                    class="btn btn-primary btn-sm ">{{ __('barbucketreward.edit') }}</button> --}}
                                            </td>

                                            {{--    <td> <button data-toggle="modal"   data-target="#deletemodal" wire:click.prevent="deleteId('{{ $bucketpoint->id  }}')" class="btn btn-danger btn-sm ">{{__('barbucketreward.delete')}}</button></td> --}}



                                        </tr>
                                    @endforeach

                                </tbody>
                            @else
                                <tbody>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-center m-3">

                                        <h6>{{ __('barbucketreward.norecordfound') }}</h6>

                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tbody>

                            @endif




                        </table>

                    </div>
                    {{ $bucketpoints->links('vendor.livewire.bootstrap') }}
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
