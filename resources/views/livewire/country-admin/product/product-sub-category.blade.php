<div>
    <div>
        <div>
            <div class="layout-px-spacing">
                            
                            <div class="row layout-top-spacing" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                    <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel">Product Sub Categorys</h4>
                                        
            
                         
                                            
                                                   <div class="col-sm-3  ml-auto">
                                                    {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                                    </div> 
                                                  <button class="btn btn-primary btn-rounded " data-toggle="modal" wire:click="reseted" data-target="#addmodal">add</button> 
                                                 @include('modals.addsubcategory')
                                                     
                                            </div> 
            
          
            
                                            <div class="table-responsive">
                                            <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                  
                                                <thead>
                                                    <tr role="row">
                                                        <th  class="text-center">SUB CATEGORY NAME</th>
                                                        <th class="text-center">CATEGORY NAME</th>
                                                   
                                                        <th class="text-center" >IMAGE
                                                    </th>
                                                        <th class="text-center">STATUS</th>
                                                        
                                                      
                                                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">Action</th>
                                
                                                        <th class="text-center dt-no-sorting sorting " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">Terminate</th>
                                                  
                                                </thead>
                                                <tbody>
                                                    
                                                    @foreach ($subcategory as $subcategorys )
                                                      <tr role="row">
                                                        <td class="text-center">{{ $subcategorys->name }}</td> 
                                                        <td class="text-center">{{ $subcategorys->category->name}}</td>
                                                        <td class="text-center"><img src="{{ url($subcategorys->image) }}" width="170" height="130"/></td>
                                                       
                                                        <td  class="text-center">  
                                                            <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$subcategorys->id }}">
                                                                <input type="checkbox" {{$subcategorys->status=='1' ? 'checked':''}}  wire:click="updateStatus($event.target.checked,'{{$subcategorys->id }}')"class="custom-control-input" id="{{$subcategorys->id }}">  
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>


                                                          
                                                            <td>
                                                                <button  data-target="#editmodal" wire:click.prevent="edit('{{ $subcategorys->id  }}')"data-toggle="modal" class="btn btn-primary btn-sm  ">Edit</button></td>
                                                             @include('modals.editsubcategory')
                                                            <td><button  wire:click.prevent="deleteId('{{ $subcategorys->id }}')"class="btn btn-danger btn-sm ">Delete</button></td>
                                                           </tr>
                                                        
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