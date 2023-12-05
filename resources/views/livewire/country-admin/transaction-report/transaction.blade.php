<div>
<div class="layout-px-spacing">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">

                    <div class="widget-content widget-content-area br-6 mt-2">
        <div class="modal-header p-1">
                       
                       <h5 class="modal-title  p-2" id="addAdmintitle" >{{ __('transaction.transaction')}}</h5>
                      

                   
                     
                       <div class="col-sm-3  ml-auto">
             <input type="text" class="form-control sm float-end mt-2" wire:model="search" placeholder="Search Transaction report..">
                 </div>
                
                       
                   </div>
                   <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('transaction.s.no')}}</th>
                                                    <th class="text-center">{{ __('transaction.orderno')}}</th>
                                                    <th class="text-center">{{ __('transaction.barrestaurant')}}</th>
                                                    <th class="text-center">{{ __('transaction.totalamount')}}</th>
                                                    <th class="text-center">{{ __('transaction.transactiondate')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($transactions as $transaction)
                                                <tr>
                                                    <td class="text-center">{{$loop->index+1}}</td>
                                                    <td class="text-center">{{$transaction->order_no}}</td>
                                                    <td class="text-center">{{$transaction->bar_restaurant_id }}</td>
                                                    <td class="text-center">{{$transaction->total_amount}}</td>
                                                    <td class="text-center">{{$transaction->transaction_date}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

























                </div>
</div>
</div>
</div>