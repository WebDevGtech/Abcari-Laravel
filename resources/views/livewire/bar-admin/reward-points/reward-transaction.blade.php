<div>
<div class="layout-px-spacing">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">

                    <div class="widget-content widget-content-area br-6 mt-2">
        <div class="modal-header p-1">
                       
                       <h5 class="modal-title  p-2" id="addAdmintitle" >{{ __('rewardtransaction.rewardtransaction')}}</h5>
                      

                   
                     
                       <div class="col-sm-3  ml-auto">
             <input type="text" class="form-control sm float-end mt-2" wire:model="search" placeholder="Search Reward report..">
                 </div>
                
                       
                   </div>
                   <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                <th class="text-center">{{ __('rewardtransaction.s.no')}}</th>
                                                    <th class="text-center">{{ __('rewardtransaction.orderno')}}</th>
                                                    <th class="text-center">{{ __('rewardtransaction.barrestaurant')}}</th>
                                                    <th class="text-center">{{ __('rewardtransaction.user')}}</th>
                                                    <th class="text-center">{{ __('rewardtransaction.rewardpoints')}}</th>
                                                    <th class="text-center">Action</th>

                                                </tr>
                                            </thead>
                                            @if(count($rewards)>0)
                                          
                                            <tbody>
                                            @foreach($rewards as $reward) 

                                                <tr>
                                                <td class="text-center">{{$loop->index+1}}</td>
                                                    <td class="text-center">{{$reward->order_no}}</td>
                                                    <td class="text-center">{{$reward->bar_restaurant_id }}</td>
                                                    <td class="text-center">{{$reward->user->name }}</td>
                                                    <td class="text-center">{{$reward->reward_points}}</td>
                                                    @if($reward->status =='pending')
                                                    <td class="text-center">


<div class=" row " >
                                        <div class="col">
                        <button class="btn btn-success"  wire:click="accept({{$reward->id}})" >Accept</button>            
                                       
                        <button class="btn btn-danger"   wire:click="cancel({{$reward->id}})">Cancel</button>
                    </div> 



                                                    </td>@endif
                                                   
                                                </tr>
                                                @endforeach
                                            </tbody>
                                           
                                            @else
                                            <tbody>
                                                <tr > 
                                                <td colspan="6"><center>No Record Found  </center>
                                                </td>
                                                </tr>
                                            </tbody>
                                                                @endif
                                        </table>
                                    </div>


                </div>
</div>
</div>
</div>
</div>