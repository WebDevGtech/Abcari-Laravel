
   
        <div>
            <div class="layout-px-spacing">
                            
                            <div class="row layout-top-spacing" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                    <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel">{{__('productvariation.productvariation')}} </h4>
                                        
            
                         
                                            
                                                   <div class="col-sm-3  ml-auto">
                                                    {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                                    </div> 
                                                    <button class="btn btn-primary btn-rounded " wire:click="reseted" data-toggle="modal" data-target="#addmodal">{{__('productvariation.add')}}</button>
                                                   @include('modals.addproductvariation')
                                                     
                                            </div> 
            
          
            
                                            <div class="table-responsive">
                                            <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                  
                                                <thead>
                                                    <tr role="row">
                                                        <th  class="text-center">{{__('productvariation.productname')}}</th>
                                                        <th class="text-center">{{__('productvariation.variationname')}}</th>
                                                   
                                                        <th class="text-center">{{__('productvariation.value')}}</th>
                                                        <th class="text-center">{{__('productvariation.price')}}   </th>
                                                        <th class="text-center">{{__('productvariation.status')}}</th>
                                                        
                                                      
                                                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('productvariation.action')}}</th>
                                
                                                        <th class="text-center dt-no-sorting sorting " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{__('productvariation.terminate')}}</th>
                                                  
                                                </thead>
                                                @if(count($product)>0)
                                                <tbody>
                                                    @foreach ($product as $products )
                                                         <tr>
                                                            <td class="text-center">{{ $products->product->name}}</td>
                                                         
                                                            <td class="text-center">{{ $products->variation->name }}</td>
                                                             <td class="text-center">{{ $products->value }}</td>
                                                             <td class="text-center">{{ $products->price }}</td>
                                                             <td  class="text-center"> 
                                                                <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$products->id }}">
                                                                    <input type="checkbox" {{$products->status=='1' ? 'checked':''}} wire:click="updateStatus($event.target.checked,'{{$products->id }}')" id="{{$products->id }}" >
                                                                    <span class="slider round"></span>
                                                                </label>
                                                               </td>
                                                               <td><button  data-target="#editmodal" wire:click.prevent="edit('{{ $products->id  }}')"data-toggle="modal" class="btn btn-primary btn-sm  ">{{__('productvariation.edit')}}</button></td>
                                                             @include('modals.editproductvariation')
                                                              <td><button  wire:click.prevent="deleteId('{{ $products->id }}')"class="btn btn-danger btn-sm ">Delete</button></td>
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