

    <div>
        <div class="layout-px-spacing">
                        
                        <div class="row layout-top-spacing" id="cancel-row">
                        
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('barservice.barservice') }}</h4>
                                    
        
                     
                                        
                                               <div class="col-sm-3  ml-auto">
                                               <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search.." > 
                                                </div> 
                                                <button class="btn btn-primary btn-rounded " data-toggle="modal"  data-target="#addbarservice">{{__('barservice.add')}}</button>
                                                    
                                             @include('modals.addbarservice')
                                           
                                        </div> 
        
      
        
                                        <div class="table-responsive">
                                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                            <thead>
                                                <tr role="row">
                                                 
                                                    <th class="text-center">{{ __('barservice.name') }}</th>
                                                    <th class="text-center">{{ __('barservice.image') }}
                                                </th>
                                                    <th  class="text-center">{{ __('barservice.status') }}</th>
                                                    
                                                  
                                                    <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{ __('barservice.action') }}</th>
                                                    
                            
                                                  
                                                </tr>
                                            </thead>
                                            if(count($service)>4)
                                            <tbody>
                                                
                                                @foreach ($service as $services )
                                                  <tr role="row">
                                                    
                                                    
                                                    <td class="text-center">{{ $services->name }}</td> 
                                                    <td class="text-center"><img src="{{ Storage::url($services->image); }}"  width="100" height="50" /></td>
                                                   
                                                    <td  class="text-center">   
                                                        <label class="switch s-icons s-outline s-outline-primary mr-2" for="{{$services->id }}">
                                                            <input type="checkbox" {{$services->status=='1' ? 'checked':''}}  wire:click="updateStatus($event.target.checked,'{{$services->id }}')"class="custom-control-input" id="{{$services->id }}">  
                                                            <span class="slider round"></span>
                                                        </label>
                                                       
                                                    </td>
                                                        <td>
                                                            <button  data-target="#editbarservice" wire:click.prevent="edit('{{ $services->id  }}')" data-toggle="modal" class="btn btn-primary btn-sm ">{{ __('barservice.edit') }}</button></td>
                                                          @include('modals.editcountryservice')
                                                      {{--   <td> <button  data-target="#deletebarservice"  data-toggle="modal"    wire:click.prevent="deleteId('{{ $services->id  }}')" class="btn btn-danger btn-sm ">{{ __('barservice.delete') }}</button></td>
                                                         @include('modals.deletebarservice') --}}
                                                     
                                                    
                                                  </tr>
                                                @endforeach
                                                
                                              
                                                
                                               </tbody>
                                    @else
                                    <tbody><td></td><td></td><td></td>
        <td class="text-center m-3" >
              
              <h6>{{__('barservice.norecordfound')}}</h6>
                  
                 </td> <td></td><td></td><td></td><td></td>
                        </tbody>  
      
                   @endif
      
                   
                  
                    
                
        
                                    </table>
                                  
                            </div>
                            {{$service->links('livewire-pagination')}}
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