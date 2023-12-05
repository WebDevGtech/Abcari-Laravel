 <div>
            <div class="layout-px-spacing">
                            
                            <div class="row layout-top-spacing" id="cancel-row">
                            
                                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                    <div class="widget-content widget-content-area br-6">
                                    <div class="row m-2 ">
                            <h4 class="modal-title" id="exampleModalLabel">Bar Admin</h4>
                                        
            
                         
                                            
                                                   <div class="col-sm-3  ml-auto">
                                                    {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                                    </div> 
                                                    <a href="{{ route('add-bar-admin') }}"class="btn btn-primary btn-rounded  btn-sm">To Add</a> 
                                                 
                                                                               
                                             
                                               
                                            </div> 
            
          
            
                                            <div class="table-responsive">
                                            <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center" >Email
                                                    </th>
                                                        
                                                        <th class="text-center">Status</th>
                                                      
                                                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">Action</th>
                                
                                                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">Terminate</th>
                                                    </tr>
                                                </thead>
                                          
                                            <tbody>
                                                @foreach ($user as $users  )
                   
                                                <tr role="row">
                                                
                                                  <td class="text-center">{{ $users->name }}</td>
                                                  <td class="text-center">{{ $users->email }}</td>
                                                 
                                                  <td  class="text-center"> 
                                                    <label class="switch s-icons s-outline s-outline-primary mr-2"  for="{{$users->id }}">
                                                        <input type="checkbox" {{$users->status=='1' ? 'checked':''}}  wire:click="updateStatus($event.target.checked,'{{$users->id }}')"class="custom-control-input" id="{{$users->id }}">  
                                                        <span class="slider round"></span>
                                                    </label>
                                                     </td>
                                                      <td>
                                                          <button  data-target="#editadmin" wire:click.prevent="edit('{{ $users->id  }}')"data-toggle="modal" class="btn btn-primary btn-sm ">Edit</button></td>
                                                       @include('modals.editadmin')
                                                      <td><button  wire:click.prevent="deleteId('{{ $users->id }}')"class="btn btn-danger btn-sm ">Delete</button></td>
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
<script>
    window.addEventListener('deleteadmin', event => {
     $('#').click()
   })

   window.addEventListener('onstatus', event => {
     $('#').click()
   })

   window.addEventListener('offstatus', event => {
     $('#').click()
   })

   window.addEventListener('update', event => {
     $('#').click()
   })


</script>

