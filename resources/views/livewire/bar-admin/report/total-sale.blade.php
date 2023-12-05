<div>
<div class="layout-px-spacing">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                        <div class="widget-content widget-content-area br-6 ">
                      
                       
                <h4 class="modal-title ml-1" id="exampleModalLabel">{{ __('totalsale.filter')}}</h4>
              
        <div class="  modal-body m">
                <div class="row mt-2  ">
                <div class="col-sm-6 ">
                <label>{{ __('totalsale.start')}}</label>
          <input type="date" class="form-control" wire:model.defer="start_date" placeholder="Start Date">
        </div>
        <div class="col-sm-6 ">
         <label>{{ __('totalsale.end')}}</label>
          <input type="date" class="form-control" wire:model.defer="end_date" placeholder="End Date">
        </div>
        </div>
        </div>
        <div class=" col-sm-5 mr-1 ml-auto mb-5">
                           
                           <button class="btn btn-outline-primary float-right" wire:click="filter()" >{{__('food.filter')}}</button>
                          
                       </div>
        </div>
        <div class="widget-content widget-content-area br-6 mt-2">
        <div class="modal-header p-1">
                       
                       <h5 class="modal-title  p-2" id="addAdmintitle" >{{ __('totalsale.modalttitle')}}</h5>
                      

                   
                     
                       <div class="col-sm-3  ml-auto">
             <input type="text" class="form-control sm float-end mt-2" wire:model="search" placeholder="Search Sales report..">
                 </div>
                 <h5  class="modal-title  mt-3 " id="addAdmintitle" >{{ __('totalsale.total')}}
                     </h5><h5 class="modal-title mr-5 mt-3 "style="color: blue">{{$totals}}</h5>
                       
                   </div>
                   <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                <th class="text-center">{{ __('totalsale.s.no')}}</th>
                                                    <th class="text-center">{{ __('totalsale.orderno')}}</th>
                                                    
                                                   
                                                    <th class="text-center">{{ __('totalsale.amount')}}</th>
                                                   
                                                  
                                                </tr>
                                            </thead>
                                            @if(count($totalsales)>0)
                                            <tbody>
                                               @foreach($totalsales as $totalsale) 
                                                <tr>
                                                    <td class="text-center">{{$loop->index+1}}</td>
                                                    <td class="text-center">{{$totalsale->order_no}}</td>
                                                   
                                                    <td class="text-center">{{$totalsale->sub_total }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @else
                                    <tbody>
     
              <td colspan="3" rowspan="2" style="text-align:center">{{__('totalsale.norecordfound')}}</td>
                  
              
                        </tbody>  
      
                   @endif
                                        </table>
                                        @if($totalsales)
                                        {{$totalsales->links('vendor.livewire.bootstrap')}} 
                                        @endif
                                    </div>


        </div>


</div>
</div>
</div>