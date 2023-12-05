<div>
<div class="layout-px-spacing">       
                <div class="row mt-2 " id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  p-1 ">
                        <div class="widget-content widget-content-area br-6 ">
                      
                       
                <h4 class="modal-title ml-1" id="exampleModalLabel">{{ __('brand.filter')}}</h4>
              
        <div class="  modal-body m">
                <div class="row mt-2  ">
                <div class="col-sm-6 ">
                <label>{{ __('brand.start')}}</label>
          <input type="date" class="form-control" placeholder="Start Date">
        </div>
        <div class="col-sm-6 ">
         <label>{{ __('brand.end')}}</label>
          <input type="date" class="form-control" placeholder="End Date">
        </div>
        </div>
        </div>

        </div>
        <div class="widget-content widget-content-area br-6 mt-2">
        <div class="modal-header p-1">
                       
                       <h5 class="modal-title  p-2" id="addAdmintitle" >{{ __('brand.modalttitle')}}</h5>
                      

                   
                     
                       <div class="col-sm-3  ml-auto">
             <input type="text" class="form-control sm float-end mt-2" wire:model="search" placeholder="Search Brand report..">
                 </div>
                
                       
                   </div>
                   <div class="table-responsive">
                                        <table class="table table-bordered table-hover mb-4">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Date</th>
                                                    <th>Sale</th>
                                                    <th class="text-center">Status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                               
                                                <tr>
                                                    <td>Vincent Carpenter</td>
                                                    <td>13/08/2020</td>
                                                    <td>260</td>
                                                    <td class="text-center"><span class="text-danger">Canceled</span></td>
                                                    <td class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>


        </div>


</div>
</div>
</div>