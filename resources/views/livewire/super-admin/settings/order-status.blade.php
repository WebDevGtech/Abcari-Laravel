<div>
    <div>
        <div>
            <div class="layout-px-spacing">
                            
                            <div class="row layout-top-spacing" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                    <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel">{{__('orderstatus.orderstatus')}}</h4>
                                        
            
                         
                                            
                                                   <div class="col-sm-3  ml-auto">
                                                   <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search.." > 
                                                    </div> 
                                                    <button class="btn btn-primary btn-rounded " wire:click="reseted" data-toggle="modal" data-target="#addmodal">{{__('orderstatus.add')}}</button>
                                             
                                                      @include('modals.countryorderstatusadd')
                                            </div> 
            
          
            
                                            <div class="table-responsive">
                                            <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                                <thead>
                                                    <tr role="row">
                                                    <th class="text-center" >{{__('orderstatus.s.no')}}</th>

                                                        <th class="text-center" >{{__('orderstatus.display')}}</th>
                                                       
                                                    </th>
                                                    <th class="text-center" >{{__('orderstatus.value')}}</th>
                                                    <th class="text-center" >{{__('orderstatus.color')}}</th>
                                                        <th class="text-center" >{{__('orderstatus.status')}}</th>
                                                      
                                                        <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending">{{__('orderstatus.action')}}</th>
                                
                                                    {{--    <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending" >{{__('orderstatus.terminate')}}</th> --}}
                                                    </tr>
                                                </thead>
                                          @if(count($order)>0)
                                            <tbody>
                                                @foreach ($order as $orders )
                                                <tr role="row">
                                                <td class="text-center">{{ $loop->index+1 }}</td> 

                                                  <td class="text-center">{{ $orders->display_name }}</td> 
                                               
                                                  <td class="text-center">{{ $orders->int_value }}</td> 
                                                  <td class="text-center">{{ $orders->color }}</td> 
                                                  <td  class="text-center"> 
                                                    <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3" for="{{$orders->id }}">
                                                        <input type="checkbox" {{$orders->status=='1' ? 'checked':''}} wire:click="updateStatus($event.target.checked,'{{$orders->id }}')" id="{{$orders->id }}" >
                                                        <span class="slider round"></span>
                                                    </label>
                                                   </td>
                                                     
                                                     
                                                      <td class="text-center">
                                                          <button  data-target="#editmodal" data-toggle="modal" class="btn btn-primary btn-sm " wire:click="edit({{ $orders->id }})"  >{{__('orderstatus.edit')}}</button></td>
                                                        @include('modals.editorderstatus')
                                                    {{--  <td><button   data-target="#deletemodal" data-toggle="modal"  wire:click="deleteId({{ $orders->id }})"class="btn btn-danger btn-sm ">{{__('orderstatus.delete')}}</button></td>  @include('modals.deleteorderstatus') --}}
                                                     </tr>
                                                  
                                                </tr>
                                              @endforeach
                                            </tbody>
           
                                            @else
                                    <tbody><td></td><td></td><td></td>
        <td class="text-center m-3" >
              
              <h6>{{__('orderstatus.norecordfound')}}</h6>
                  
                 </td> <td></td><td></td><td></td><td></td>
                        </tbody>  
      
                   @endif
                        
                    
            
                                        </table>
                                       
                                </div>
                                {{$order->links('vendor.livewire.bootstrap')}}
                            </div>
            
                        </div>
                       
            
            </div>
    </div>
</div>
{{--
<script>
    window.addEventListener('deleted', event => {
     $('#').click()
   })

   window.addEventListener('onstatus', event => {
     $('#').click()
   })

   window.addEventListener('offstatus', event => {
     $('#').click()
   })

   window.addEventListener('updated', event => {
     $('#').click()
   })
   window.addEventListener('saved', event => {
     $('#').click()
   })



</script>
--}}


<script>
      window.addEventListener('modalClose', event => {
        $('#addmodalClose').click();
       })
     window.addEventListener('modalClose', event => {
        $('#editmodalClose').click();
       })
     
       window.addEventListener('modalClose', event => {
        $('#deletemodalClose').click();
       })
  
    
</script>
