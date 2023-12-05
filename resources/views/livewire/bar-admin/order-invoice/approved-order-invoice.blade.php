<div>
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">Approved Invoice</h4>
                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search Product..">
                        </div>
                    </div>
                    <table id="zero-config alter_pagination" class="table table-bordered table-hover table-condensed"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('rule.s.no') }}</th>
                                <th class="text-center">Order No</th>
                                <th class="text-center"> Name</th>
                                <th class="text-center">User Name</th>

                                <th class="text-center">Total Amount</th>

                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($appproved_invoice) > 0)
                                @foreach ($appproved_invoice as $order)
                                    {{-- @if ($order->orderTransaction->payment_gateway_id == 3 || $order->orderTransaction->payment_gateway_id == 4) --}}
                                        <tr>

                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">

                                                <b><a style="color:blueviolet"
                                                        href="{{ route('order-invoice-view', ['id' => $order->order_no]) }}"
                                                        target="_blank">{{ $order->order_no }}</a><b>
                                            </td>
                                            <td class="text-center">{{ $order->username->name }}</td>
                                            <td class="text-center">{{ $order->username->user_unique_id }}</td>

                                            <td class="text-center"> {{ Auth::user()->countryname->currency_name }}
                                                {{ $order->grand_total }}</td>

                                            @if ($order->status == 'pending')
                                                <td class="text-center">
                                                    <div class="row">
                                                        <div class="col">
                                                            <button class="btn btn-success"
                                                                wire:click="accept({{ $order->id }})">Approve</button>
                                                            {{--  <button class="btn btn-danger" wire:click="cancel({{$order->id}})">Cancel</button> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
                                            @if ($order->status == 'approved')
                                                <td class="text-center">Approved</td>
                                            @endif
                                            @if ($order->status == 'cancelled')
                                                <td class="text-center">Cancelled</td>
                                            @endif
                                    {{-- @endif --}}
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6"><center>No Record Found</center></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if(count($appproved_invoice) > 0)
                        {{ $appproved_invoice->links('vendor.livewire.bootstrap')}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
