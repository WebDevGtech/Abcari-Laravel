<div>
    <div x-cloak>
        <div class="layout-px-spacing" wire:init='onload()' >
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-xl-12  col-md-12">
                            <div class="mail-box-container">
                            <div class="mail-overlay"></div>
                                <div class="tab-title">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12 mail-categories-container">
                                            <div class="mail-sidebar-scroll">
                                                <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link  list-actions "  wire:click='orderinvoiceStatusChange("pending")'    ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg> <span class="nav-names">New Order Invoice</span> </a>
                                                    </li>


                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions"  wire:click='orderinvoiceStatusChange("approved")' ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> <span class="nav-names"> Approved Invoice</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions"  wire:click='orderinvoiceStatusChange("cancelled")' ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg> <span class="nav-names"> Cancelled Invoice</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div  class="accordion mailbox-inbox">
                                    <div class="message-box">
                                        <div class="message-box-scroll" id="ct">
                                            <div id="unread-promotion-page" class="mail-item ">
                                                <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingThree">
                                                    <div class="mb-0">
                                                        <div class="mail-item-heading social collapsed"  data-toggle="collapse" role="navigation" data-target="#mailCollapseThree" aria-expanded="false">
                                                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">{{__('rule.s.no')}}</th>
                                                                        <th class="text-center">Order No</th>
                                                                        <th class="text-center"> Name</th>
                                                                        <th class="text-center">User Name</th>

                                                                        <th class="text-center">Total Amount</th>

                                                                        <th class="text-center">Actions</th>
                                                                    </tr>
                                                                </thead>


                                                                @if($orders)
                                                                    <tbody>
                                                                        @foreach($orders as $order)
                                                                        @if($order->orderTransaction->payment_gateway_id==3 ||$order->orderTransaction->payment_gateway_id==4)
                                                                            <tr>

                                                                                <td class="text-center">{{$loop->index+1}}</td>
                                                                                <td class="text-center">

                                                                                <b><a style="color:blueviolet" href="{{route('order-invoice-view',['id'=>$order->order_no])}}" target="_blank">{{$order->order_no}}</a><b>
                                                                                </td>
                                                                                <td class="text-center">{{$order->username->name}}</td>
                                                                                <td class="text-center">{{$order->username->user_unique_id}}</td>

                                                                                <td class="text-center"> {{Auth::user()->countryname->currency_name }}  {{$order->grand_total}}</td>

                                                                                @if($order->status== "pending")
                                                                                <td class="text-center" >
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <button class="btn btn-success" wire:click="accept({{$order->id}})">Approve</button>
                                                                                          {{--  <button class="btn btn-danger" wire:click="cancel({{$order->id}})">Cancel</button> --}}
                                                                                        </div>
                                                                                    </div>
                                                                                </td>

                                                                                @endif



                                                                                @if($order->status== "approved")

                                                                                <td class="text-center" >Approved</td>
                                                                                @endif
                                                                                @if($order->status== "cancelled")

                                                                                <td class="text-center" >Cancelled</td>
                                                                                @endif
                                                                                @endif
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                @else
                                                                <tbody> <td colspan="7"> No Record Found</td></tbody>

                                                                @endif

                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
