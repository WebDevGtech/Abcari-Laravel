

    <div>
        <div class="layout-px-spacing">
                        
                        <div class="row layout-top-spacing" id="cancel-row">
                        
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{__('productcategory.productcategory')}}</h4>
                                    
        
                     
                                        
                                               <div class="col-sm-3  ml-auto">
                                              <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search.." > 
                                                </div> 
                                                <button class="btn btn-primary btn-rounded "wire:click="reseted"data-toggle="modal" data-target="#addmodal">{{__('productcategory.add')}}</button>
                                                    
                                              @include('modals.newcategory')
                                           
                                        </div> 
        
      
        
                                        <div class="table-responsive">
                                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center">{{__('productcategory.categoryname')}}</th>
                                                    <th class="text-center">{{__('productcategory.categoryimage')}}</th>
                                                 
                                                 
                                                  
                                                    <th class="text-center">{{__('productcategory.isliquor')}}</th>
                                                    <th class="text-center">{{__('productcategory.preferred')}}</th>
                                                    <th class="text-center">{{__('productcategory.status')}}</th>
                                                    <th class=" dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('productcategory.action')}}</th>
                                            
                                                   
                                                </tr>
                                            </thead>
                                            @if(count($category)>0)
                                            <tbody>
                                                @foreach ($category as $categorys )
                                                <tr role="row">

                                                    <td class="text-center">{{ $categorys->name }}</td>
                                                    <td class="text-center"><img src="{{ Storage::url($categorys->image); }}"  width="100" height="50" /></td>
                                                    <td  class="text-center"> 
                                                       <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$categorys->id }}">
                                                           <input type="checkbox"  {{$categorys->is_liquor=='1' ? 'checked':''}} wire:click="updateLiquor($event.target.checked,'{{$categorys->id }}')" id="{{$categorys->id }}" >
                                                           <span class="slider round"></span>
                                                       </label>
                                                      </td>
                                                      <td  class="text-center"> 
                                                       <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$categorys->name}}">
                                                           <input type="checkbox" {{$categorys->is_preferred=='1' ? 'checked':''}} wire:click="updatePreferred($event.target.checked,'{{$categorys->id }}')" id="{{$categorys->name }}" >
                                                           <span class="slider round"></span>
                                                       </label>
                                                      </td>
                                                    <td  class="text-center"> 
                                                       <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$categorys->id }}">
                                                           <input type="checkbox" {{$categorys->status=='1' ? 'checked':''}} wire:click="updateStatus($event.target.checked,'{{$categorys->id }}')" id="{{$categorys->id }}" >
                                                           <span class="slider round"></span>
                                                       </label>
                                                      </td>
                                                      <td><button  data-target="#editmodal" wire:click.prevent="edit('{{ $categorys->id  }}')" data-toggle="modal" class="btn btn-primary btn-sm  ">{{__('productcategory.edit')}}</button></td>
                                                       @include('modals.newcategoryedit')
                                                 {{--     <td><button data-target="#deletemodal" data-toggle="modal"  wire:click.prevent="deleteId('{{ $categorys->id }}')"class="btn btn-danger btn-sm ">{{__('productcategory.delete')}}</button></td>
                                                      @include('modals.deleteproductcategory') --}}
                                                    @endforeach  
                                                    </tr>                      
                                                
                                              
                                                
                                               </tbody>
       
                                               @else
                                    <tbody><td></td><td></td><td></td>
        <td class="text-center m-3" >
              
              <h6>{{__('product.norecordfound')}}</h6>
                  
                 </td> <td></td><td></td><td></td><td></td>
                        </tbody>  
      
                   @endif
                   
                  
                    
                
        
                                    </table>
                                   
                            </div>
                            {{$category->links('livewire-pagination')}}
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