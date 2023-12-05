<div x-cloak>
                                                                                <div>
    <div class="layout-px-spacing">
        <div class="row mt-2 " id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                <div class="widget-content widget-content-area br-6 ">
                   
                    <div class="row m-2 ">
                        <h4 class="modal-title" >Ready to Serve Order</h4>
                        <div class="col-sm-3  ml-auto">
                            <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"
                                placeholder="Search Order..">
                        </div>
                       
                    </div>

<table id="zero-config"
                                                                class="table table-bordered table-hover table-condensed"
                                                                style="width:100%">
    <thead>
        <tr>
        <th class="text-center">{{ __('rule.s.no') }}</th>
                                                                        <th class="text-center">Order No</th>
                                                                        <th class="text-center">Product Name</th>
                                                                        <th class="text-center">Quantity</th>
                                                                        <th class="text-center">Total</th>
                                                                        <th class="text-center">Waiter Details</th>
                                                                        <th class="text-center">Actions</th>
        </tr>
    </thead>

    @if  (count($orders)>0)
    <tbody>
    @foreach ($orders as $key => $order)
        <tr>
            <td class="text-center">{{$orders->firstitem()+$key}}</td>
            <td class="text-center">
                                                                                    {{ $order->order_no }}</td>
                                                                                <td class="text-center">
                                                                                    {{ $order->productName->name }}</td>
                                                                                <td class="text-center">
                                                                                    {{ $order->quantity }}</td>
                                                                                <td class="text-center">
                                                                                    {{ Auth::user()->countryname->currency_name }}
                                                                                    {{ $order->total_price }}</td>
                                                                                    @if ($order->status == 'ready_to_serve')
                                                                                    <td class="text-center">
                                                                                        @if ($order->waiterId->bar_waiter_detail_id == null)
                                                                                            <select
                                                                                                name="waiter_updated_id"
                                                                                                id=""
                                                                                                class="form-control"
                                                                                                style="height:40px;font-size:12px;"
                                                                                                wire:model.defer="waiter_updated_id">
                                                                                                <option value="">
                                                                                                    --Select Waiter--
                                                                                                </option>
                                                                                                @foreach ($barwaiters as $barwaiter)
                                                                                                    <option
                                                                                                        value="{{ $barwaiter->id }}">
                                                                                                        {{ $barwaiter->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        @else
                                                                                            {{ $order->waiterTableDetails->name }}
                                                                                        @endif
                                                                                    </td>
                                                                                @elseif($order->status == 'served')
                                                                                    <td class="text-center">
                                                                                        @if ($order->waiterTableDetails)
                                                                                            {{ $order->waiterTableDetails->name }}
                                                                                        @else
                                                                                            N/A
                                                                                        @endif
                                                                                    </td>
                                                                                @else
                                                                                    @if ($order->status == 'cancelled')
                                                                                        <td class="text-center">
                                                                                            {{ $order->waiterTableDetails->name }}
                                                                                        </td>
                                                                                    @endif
                                                                                    <td class="text-center">NA</td>
                                                                                @endif
                                                                                 
                                                                                    <td class="text-center">
                                                                                    @if ($order->status == 'ready_to_serve')
                                                                                    <div class=" row ">
                                                                                            <div class="col">
                                                                                                <button
                                                                                                    class="btn btn-success"
                                                                                                    wire:click="serve('{{ $order->id }}','{{ $order->order_no }}')">Serve</button>
                                                                                                <button
                                                                                                    class="btn btn-danger"
                                                                                                    wire:click="cancel({{ $order->id }})">Cancel</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        @endif
                                                                                    </td>
                                                                                 
        </tr>
        @endforeach
        @else
   
   <tr>
       <td colspan="7"><center>Order Not Found</center></td>
   </tr>

@endif
    </tbody>
   
</table>
  @if ($orders)
                                                                {{ $orders->links('vendor.livewire.bootstrap') }}
                                                            @endif







                       
                </div>
               


                <!-- * -->
            </div>
        </div>
    </div>

</div>




