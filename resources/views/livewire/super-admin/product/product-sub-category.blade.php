<div>
    <div>
        <div>
            <div class="layout-px-spacing">
                            
                            <div class="row layout-top-spacing" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                    <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel">{{__('productsubcategory.productsubcategory')}}</h4>
                                        
            
                         
                                            
                                                   <div class="col-sm-3  ml-auto">
                                                    <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search.." > 
                                                    </div> 
                                                  <button class="btn btn-primary btn-rounded " data-toggle="modal" wire:click="reseted" data-target="#addmodal">{{__('productsubcategory.add')}}</button> 
                                                 @include('modals.addsubcategory')
                                                     
                                            </div> 
            
          
            
                                            <div class="table-responsive">
                                            <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                  
                                                <thead>
                                                    <tr role="row">
                                                        <th  class="text-center">{{__('productsubcategory.subcategoryname')}}</th>
                                                        <th class="text-center">{{__('productsubcategory.categoryname')}}</th>
                                                   
                                                        <th class="text-center" >{{__('productsubcategory.image')}}
                                                    </th>
                                                        <th class="text-center">{{__('productsubcategory.status')}}</th>
                                                        
                                                      
                                                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('productsubcategory.action')}}</th>
                                
                                                        <th class="text-center dt-no-sorting sorting " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('productsubcategory.terminate')}}</th>
                                                  
                                                </thead>
                                                @if(count($subcategory)>0)
                                                <tbody>
                                                    
                                                    @foreach ($subcategory as $subcategorys )
                                                      <tr role="row">
                                                        <td class="text-center">{{ $subcategorys->name }}</td> 
                                                        <td class="text-center">{{ $subcategorys->category->name}}</td>
                                                        <td class="text-center"><img src="{{ Storage::url($subcategorys->image); }}"  width="100" height="50" /></td>
                                                       
                                                        <td  class="text-center">  
                                                            <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$subcategorys->id }}">
                                                                <input type="checkbox" {{$subcategorys->status=='1' ? 'checked':''}}  wire:click="updateStatus($event.target.checked,'{{$subcategorys->id }}')"class="custom-control-input" id="{{$subcategorys->id }}">  
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>


                                                          
                                                            <td>
                                                                <button  data-target="#editmodal" wire:click.prevent="edit('{{ $subcategorys->id  }}')" data-toggle="modal" class="btn btn-primary btn-sm  ">{{__('productsubcategory.edit')}}</button></td>
                                                             @include('modals.editsubcategory')
                                                            <td><button  data-target="#deletemodal" data-toggle="modal" wire:click.prevent="deleteId('{{ $subcategorys->id }}')"class="btn btn-danger btn-sm ">{{__('productsubcategory.delete')}}</button></td> @include('modals.deleteproductsubcategory')
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
                              
                            </div>
                            {{$subcategory->links('livewire-pagination')}}
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