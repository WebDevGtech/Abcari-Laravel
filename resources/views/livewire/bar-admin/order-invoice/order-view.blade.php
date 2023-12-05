<div class="layout-px-spacing">
    <div class="row mt-2 " id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
            <div class="widget-content widget-content-area br-6 ">


                <center>
                    <h4 class="modal-title" id="exampleModalLabel"> Order Invoice View</h4>
                </center>
                <!-- * -->
            </div>
            <!-- * -->
        </div>
    </div>
</div>


<div class="layout-px-spacing">
    <div class="row mt-2 " id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
            <div class="widget-content widget-content-area br-6 ">



                <!-- * -->
                <table class="table" width="100%"
                    style="border-collapse: collapse;color:#1b2e4b;border-style: solid;border-width: 1px;font-size:10pt;">
                    <tr>

                        <td colspan="3" style="width:50%;">
                            <b>
                                <p> Customer Name: {{ $order->username->name }} </p>
                            </b><br>
                            {{--  <b> <p>  Waiter Name: {{$waiter->name}}  </p> </b> --}}
                        </td>
                        <td colspan="4" style="text-align:right;width:50%;">
                            <b>
                                <p> Order No: {{ $order->order_no }} </p>
                            </b> <br>
                            <b>
                                <p> Invoice No &nbsp;&nbsp;: {{ $order->invoice_no }} </p>
                            </b><br>
                            <b>
                                <p> Invoice Date: {{ date('d-m-Y', strtotime($order->created_at)) }} </p>
                            </b>
                        </td>











                    </tr>

                    <tr style="background-color:#1b2e4b">
                        <td colspan="1" style="width:20%;" style="text-align:center;color:black"> <b>S.No</b></td>
                        <td colspan="1" style="width:20%;" style="text-align:center"><b>Product</b></td>
                        <td colspan="1" style="width:20%;" style="text-align:center"><b>Units</b></td>

                        <td colspan="1" style="width:20%;" style="text-align:center"><b>Quantity</b></td>
                        <td colspan="1" style="width:20%;" style="text-align:center"><b>Price</b></td>
                        <td colspan="2" style="width:20%;" style="text-align:center"><b>Amount</b></td>




                    </tr>
                    @if ($orders)
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td colspan="1" style="width:20%;" style="text-align:center">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td colspan="1" style="width:20%;" style="text-align:center">
                                    {{ $order->productName->name }}
                                </td>
                                <td colspan="1" style="width:20%;" style="text-align:center">
                                    {{ $order->productvariations->value }}
                                    {{ $order->productvariations->variation->name }}
                                </td>
                                <td colspan="1" style="width:20%;" style="text-align:center">{{ $order->quantity }}
                                </td>
                                <td colspan="1" style="width:20%;" style="text-align:center">
                                    {{ Auth::user()->countryname->currency_name }} {{ $order->price }}</td>
                                <td colspan="1" style="width:20%;" style="text-align:center">
                                    {{ Auth::user()->countryname->currency_name }} {{ $order->quantity * $order->price }}   </td>
                                  

                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td>Sub Total</td>
                        <td style="text-align:center"> {{ Auth::user()->countryname->currency_name }}
                            {{ $orders_total }}</td>

                    </tr>
                    <tr>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td>Tax</td>
                        <td style="text-align:center"> {{ Auth::user()->countryname->currency_name }}
                            {{ $orders_tax }}</td>

                    </tr>
                    <tr>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td>Redeem Amount</td>
                        <td style="text-align:center"> {{ Auth::user()->countryname->currency_name }}
                            {{ $rewardredeempoint->redeem_points_amount }}</td>
                            <tr>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td style="text-align:right"></td>
                        <td>Total</td>
                        <td style="text-align:center"> {{ Auth::user()->countryname->currency_name }}
                            {{ $redeempointamount }}</td>

                    </tr>

                </table>

            </div>
            <!-- * -->
        </div>
    </div>
</div>
