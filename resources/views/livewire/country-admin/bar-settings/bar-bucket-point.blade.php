<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('barbucketreward.barbucketreward') }}</h4>




                        <div class="col-sm-3  ml-auto">
                            {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1" data-toggle="modal" wire:click="reseted"
                            data-target="#addmodal">{{ __('barbucketreward.add') }}</button>

                        @include('modals.addbarbucketpoint')

                    </div>



                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">

                                    <th class="text-center"> {{ __('barbucketreward.bucketrewardname') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.bucketname') }}
                                    </th>
                                    <th class="text-center">{{ __('barbucketreward.points') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.amount') }}</th>
                                    <th class="text-center">{{ __('barbucketreward.status') }}</th>


                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('barbucketreward.action') }}</th>
                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('barbucketreward.terminate') }}</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bucketpoint as $bucketpoints)
                                    <tr role="row">


                                        <td class="text-center">{{ $bucketpoints->name }}</td>
                                        <td class="text-center">{{ $bucketpoints->rewardpoint->name }}</td>
                                        <td class="text-center">{{ $bucketpoints->point }}</td>
                                        <td class="text-center">{{ $bucketpoints->amount }}</td>

                                        <td class="text-center">
                                            <label class="switch s-icons s-outline s-outline-primary mr-2"
                                                for="{{ $bucketpoints->id }}">
                                                <input type="checkbox" {{ $bucketpoints->status == '1' ? 'checked' : '' }}
                                                    wire:click="updateStatus($event.target.checked,'{{ $bucketpoints->id }}')"class="custom-control-input"
                                                    id="{{ $bucketpoints->id }}">
                                                <span class="slider round"></span>
                                            </label>


                                        </td>

                                        <td>
                                            <button data-target="#editmodal"
                                                wire:click.prevent="edit('{{ $bucketpoints->id }}')"data-toggle="modal"
                                                class="btn btn-primary btn-sm ">{{ __('barbucketreward.edit') }}</button>
                                        </td>

                                        <td> <button wire:click.prevent="deleteId('{{ $bucketpoints->id }}')"
                                                class="btn btn-danger btn-sm ">{{ __('barbucketreward.delete') }}</button>
                                        </td>



                                    </tr>
                                @endforeach


                            </tbody>







                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
