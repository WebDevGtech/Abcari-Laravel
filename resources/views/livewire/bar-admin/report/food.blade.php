<div>
<div class="layout-px-spacing">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                        <div class="widget-content widget-content-area br-6 ">
                      
                       
                <h4 class="modal-title ml-1" id="exampleModalLabel">{{ __('food.filter')}}</h4>
              
        <div class="  modal-body m">
                <div class="row mt-2  ">
                <div class="col-sm-6 ">
                <label>{{ __('food.start')}}</label>
          <input type="date" class="form-control" wire:model.defer="start_date" placeholder="Start Date">
        </div>
        <div class="col-sm-6 ">
         <label>{{ __('food.end')}}</label>
          <input type="date" class="form-control" wire:model.defer="end_date" placeholder="End Date">
        </div>
        </div>
        </div>
        <div class=" col-sm-5 mr-1 ml-auto mb-5">
                           
                           <button class="btn btn-outline-primary float-right " wire:click="filter()" >{{__('food.filter')}}</button>
                          
                       </div>
        </div>
        <div class="widget-content widget-content-area br-6 mt-2">
        <div class="modal-header p-1">
                       
                       <h5 class="modal-title  p-2" id="addAdmintitle" >{{ __('food.modalttitle')}}</h5>
                      

                   
                     
                       <div class="col-sm-3  ml-auto">
             <input type="text" class="form-control sm float-end mt-2" wire:model="search" placeholder="Search Food report..">
                 </div>
                
                       
                   </div>
                   <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                <th class="text-center">{{ __('food.s.no')}}</th>
                                                    <th class="text-center">{{ __('food.name')}}</th>
                                                    <th class="text-center">{{ __('food.price')}}</th>
                                                    <th class="text-center">{{ __('food.tax')}}</th>
                                                </tr>
                                            </thead>
                                            @if(count($foods)>0)
                                            <tbody>
                                               @foreach($foods as $food)
                                                <tr>
                                                <td class="text-center">{{$loop->index+1}}</td>
                                                <td class="text-center">{{$food->name}}</td>
                                                <td class="text-center">{{$food->price}}</td>
                                                <td class="text-center">{{$food->tax->tax_rate}}</td>
                                                   
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @else
                                    <tbody>
                                        <tr>
        <td colspan="4" >
              
              <center>{{__('food.norecordfound')}}</center>
                  
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