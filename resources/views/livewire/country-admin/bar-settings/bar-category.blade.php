<div>
    <div>
        <div class="layout-px-spacing">
                        
                        <div class="row layout-top-spacing" id="cancel-row">
                        
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">Bar category</h4>
                                    
        
                     
                                        
                                               <div class="col-sm-3  ml-auto">
                                                {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                                </div> 
                                                <button class="btn btn-primary btn-rounded " data-toggle="modal" wire:click="reseted"data-target="#addmodal">add</button>
                                               @include('modals.countryaddcategory')
                                                @include('modals.countrycategory')                              
                                  
                                           
                                        </div> 
        
      
        
                                        <div class="table-responsive">
                                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                            <thead>
                                                <tr role="row">
                                                    <th class="text-center" >Name</th>
                                                    <th class=" text-center" >Image
                                                </th>
                                                 
                                                    <th class="text-center" >Status</th>
                                                  
                                                    <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending">Action</th>
                                                    <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending">terminate</th>
                            
                                           
                                                </tr>
                                            </thead>
                                      
                                        <tbody>
                                            @foreach ($category as $categorys )
                                            <tr role="row">
                                                <td hidden>{{ $categorys->id }}</td>
                                              <td class="text-center">{{ $categorys->name }}</td> 
                                              <td class="text-center"><img src="{{ $categorys->image }}" width="170" height="90"/></td>
                                             
                                              <td  class="text-center"> 
                                                <label class="switch s-icons s-outline s-outline-primary mr-2 " for="{{$categorys->id }}">
                                                    <input type="checkbox" {{$categorys->status=='1' ? 'checked':''}} wire:click="updateStatus($event.target.checked,'{{$categorys->id }}')" id="{{$categorys->id }}" >
                                                    <span class="slider round"></span>
                                                </label>
                                               </td>
                                                 
                                                 
                                                  <td>
                                                      <button  data-target="#editmodal" wire:click="edit({{ $categorys->id }})"data-toggle="modal" class="btn btn-primary btn-sm  ">{{ __('barcategory.edit') }}</button></td>
                      
                                                      <td> <button   wire:click="deleteId({{ $categorys->id }})" class="btn btn-danger btn-sm  ">{{ __('barcategory.delete') }}</button></td>
                                                 </tr>
                                              
                                            </tr>
                                          @endforeach
                                        </tbody>
       
        <tbody>
                   
                        </tbody>
                    
                
        
                                    </table>
                                   
                            </div>
        
                        </div>
        
                    </div>
                   
        
        </div>
</div>

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
  
  
        
        

