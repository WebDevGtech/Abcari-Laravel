
   
        <div>
            <div class="layout-px-spacing">
                            
                            <div class="row layout-top-spacing" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                    <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel">{{__('variationtype.variationtype')}}</h4>
                                        
            
                         
                                            
                                                   <div class="col-sm-3  ml-auto">
                                                   <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search.." > 
                                                    </div> 
                                                  <button class="btn btn-primary btn-rounded " data-toggle="modal" wire:click="reseted" data-target="#addmodal">{{__('variationtype.add')}}</button> 
                                                  @include('modals.addvariation')
                                                     
                                            </div> 
            
          
            
                                            <div class="table-responsive">
                                            <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                  
                                                <thead>
                                                    <tr role="row">
                                                        <th  class="text-center">{{__('variationtype.variationname')}}</th>
                                                        <th class="text-center">{{__('variationtype.variationvalue')}}</th>
                                                   
                                                      
                                                        <th class="text-center">{{__('variationtype.status')}}</th>
                                                        
                                                      
                                                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('variationtype.action')}}</th>
                                
                                                        <th class="text-center dt-no-sorting sorting " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('variationtype.terminate')}}</th>
                                                  
                                                </thead>
                                                @if(count($variation)>0)
                                                <tbody>
                                                    
                                                    @foreach ($variation as $variations )
                                                      <tr role="row">
                                                        <td class="text-center">{{ $variations->name }}</td> 
                                                        <td class="text-center">{{ $variations->value}}</td>
                                                        
                                                       
                                                        <td  class="text-center">  
                                                            <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$variations->id }}">
                                                                <input type="checkbox" {{$variations->status=='1' ? 'checked':''}}  wire:click="updateStatus($event.target.checked,'{{$variations->id }}')"class="custom-control-input" id="{{$variations->id }}">  
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>


                                                          
                                                            <td>
                                                                <button  data-target="#editmodal" wire:click.prevent="edit('{{ $variations->id  }}')" data-toggle="modal" class="btn btn-primary btn-sm  ">{{__('variationtype.edit')}}</button></td>
                                                             @include('modals.editvariation')
                                                            <td><button  data-target="#deletemodal" data-toggle="modal" wire:click.prevent="deleteId('{{ $variations->id }}')"class="btn btn-danger btn-sm ">{{__('variationtype.delete')}}</button></td> @include('modals.deletevariationtype')
                                                           </tr>
                                                        
                                                      </tr>
                                                    @endforeach
                                                    
                                                  
                                                    
                                                   </tbody>
                                                   @else
                                    <tbody><td></td><td></td><td></td>
        <td class="text-center m-3" >
              
              <h6>{{__('barbucketreward.norecordfound')}}</h6>
                  
                 </td> <td></td><td></td><td></td><td></td>
                        </tbody>  
      
                   @endif
                        
                    
            
                                        </table>
                                       
                                </div>
                                {{$variation->links('livewire-pagination')}}
                            </div>
            
                        </div>
                       
            
            </div>
    </div>
        </div>

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