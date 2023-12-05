<div>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('viewbarRestaurant.viewbarRestaurant') }}
                        </h4>




                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search Restaurant..">
                        </div>
                        <button class="btn btn-outline-primary ml-1 mb-1"> <a
                                href="{{ route('add-bar-restaurant') }}">{{ __('viewbarRestaurant.toadd') }}</a>
                        </button>




                    </div>



                    <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center"> {{ __('viewbarRestaurant.s.no') }}</th>
                                    <th class="text-center"> {{ __('viewbarRestaurant.restaurantname') }}</th>
                                    <th class="text-center">{{ __('viewbarRestaurant.adminname') }} </th>
                                    <th class="text-center">{{ __('viewbarRestaurant.email') }}</th>


                                    <th class="text-center">{{ __('viewbarRestaurant.status') }}</th>


                                    <th class="text-center dt-no-sorting sorting" tabindex="0"
                                        aria-controls="default-ordering" rowspan="1" colspan="1"
                                        style="width: 59px;" aria-label="Action: activate to sort column ascending">
                                        {{ __('viewbarRestaurant.action') }}</th>
                                    {{--       <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">view</th> --}}

                                </tr>
                            </thead>

                            <tbody>
                                @if (count($restaurant) > 0)
                                    @foreach ($restaurant as $restaurants)
                                        <tr role="row">
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">{{ $restaurants->name }}</td>
                                            <td class="text-center">{{ $restaurants->user->name }}</td>
                                            <td class="text-center">{{ $restaurants->user->email }}</td>


                                            <td class="text-center">
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3"
                                                    for="{{ $restaurants->id }}">
                                                    <input type="checkbox"
                                                        {{ $restaurants->status == '1' ? 'checked' : '' }}
                                                        wire:click="updateStatus($event.target.checked,'{{ $restaurants->id }}')"class="custom-control-input"
                                                        id="{{ $restaurants->id }}">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                            <a href="{{route('edit-bar-restaurant',['id'=>$restaurants->id])}}"><svg 
                                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-edit-2">
                                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                                </path>
                                                    </svg>
                                                {{-- <button data-target="#editmodal"
                                                    wire:click.prevent="edit('{{ $restaurants->id }}')"data-toggle="modal"
                                                    class="btn btn-primary btn-sm ">{{ __('viewbarRestaurant.edit') }}</button> --}}
                                            </td>
                                            @include('modals.editbarrestaurant')
                                            <td>

                                                {{-- <button  data-target="#viewrestaurant"data-toggle="modal" wire:click="view('{{ $restaurants->id  }}')"class="btn btn-info btn-sm ">Open</button></td>
                                                @include('modals.barrestaurantview') --}}

                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6"><center>Bar Restaurant Not Found</center></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{ $restaurant->links('vendor.livewire.bootstrap')}}
                    </div>

                </div>

            </div>


        </div>
    </div>
</div>
@push('js')
<script>
    window.addEventListener('modalClose', event => {
        $('#addmodalClose').click();
    })
    window.addEventListener('modalClose', event => {
        $('#editmodalClose').click();
    })
</script>

@endpush
