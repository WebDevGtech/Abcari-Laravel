<div>
<div class="layout-px-spacing">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                        <div class="widget-content widget-content-area br-6 ">
                      
                       
                <h4 class="modal-title ml-1" id="exampleModalLabel">{{ __('bar.filter')}}</h4>
              
        <div class="  modal-body m">
                <div class="row mt-2  ">
                <div class="col-sm-6 ">
                <label>{{ __('bar.start')}}</label>
          <input type="date" id="start_date" class="form-control" wire:model.defer="start_date"  placeholder="Start Date">
        </div>
        <div class="col-sm-6 ">
         <label>{{ __('bar.end')}}</label>
          <input type="date" id="end_date" class="form-control"  wire:model.defer="end_date" placeholder="End Date">
        </div>
        </div>
        </div>
        <div class=" col-sm-5 mr-1 ml-auto mb-5">
                           
        <button class="btn btn-outline-primary float-right" wire:click="filter()" >{{__('bar.filter')}}</button>
       
    </div>
        </div>
        <div class="widget-content widget-content-area br-6 mt-2">
        <div class="modal-header p-1">
                       
                       <h5 class="modal-title  p-2" id="addAdmintitle" >{{ __('bar.bar')}}</h5>
                      

                   
                     
                       <div class="col-sm-3  ml-auto">
             <input type="text" class="form-control sm float-end mt-2" wire:model="search" placeholder="Search Bar report..">
                 </div>
                
                       
                   </div>
                   <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{ __('bar.s.no')}}</th>
                                                    <th class="text-center">{{ __('bar.barrestaurant')}}</th>
                                                    <th class="text-center">{{ __('bar.bartieup')}}</th>
                                                  
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($bars as $bar)
                                                <tr>
                                                    <td class="text-center">{{$loop->index+1}}</td>
                                                    <td class="text-center">{{$bar->name}}</td>
                                                    <td class="text-center">{{$bar->bartieup->name}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>


        </div>


</div>
</div>
</div>
</div>