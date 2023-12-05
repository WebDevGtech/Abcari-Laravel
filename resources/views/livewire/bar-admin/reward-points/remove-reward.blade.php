<div>
<div class="layout-px-spacing">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">

                    <div class="widget-content widget-content-area br-6 mt-2">
        <div class="modal-header p-1">
                       
                       <h5 class="modal-title  p-2" id="addAdmintitle" >{{ __('removereward.removereward')}}</h5>
                      

                   
                     
                       <div class="col-sm-3  ml-auto">
             <input type="text" class="form-control sm float-end mt-2" wire:model="search" placeholder="Search Reward report..">
                 </div>
                
                       
                   </div>
                   <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                <th class="text-center">{{ __('removereward.s.no')}}</th>
                                                 
                                                    <th class="text-center">{{ __('removereward.user')}}</th>
                                                    <th class="text-center">{{ __('rewardtransaction.rewardpoints')}}</th>
                                                    <th class="text-center">Action</th>

                                                </tr>
                                            </thead>
                                            @if($remove_reward_orders ==0)
                                            <tbody>
                                                <tr > 
                                                <td colspan="4"><center>No Record Found  </center>
                                                </td>
                                                </tr>
                                            </tbody>
                                            @else
                                            <tbody>
                                          
                                
                                            @foreach($remove_reward_orders as $remove_reward) 
                                                <tr>
                                                
                                                <td class="text-center">{{$loop->index+1}}</td>
                                                   
                                                    <td class="text-center">{{$remove_reward->name }}</td>
                                                    <td class="text-center">{{$remove_reward->reward_point_remaining}}</td>
                                                  
                                                    <td class="text-center">


<div class=" row " >
                                        <div class="col">
                                  
                                       
                        <button class="btn btn-danger"   wire:click="remove({{$remove_reward->id}})">Remove</button>
                    </div> 



                                                    </td>
                                                   
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                          
                                           
                                            @endif
                                        </table>
                                    </div>


                </div>
</div>
</div>
</div>
</div>