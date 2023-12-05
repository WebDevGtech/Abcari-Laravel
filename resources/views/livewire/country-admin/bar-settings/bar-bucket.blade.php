

    <div>
        <div class="layout-px-spacing">
                        
                        <div class="row layout-top-spacing" id="cancel-row">
                        
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('barbucket.barbucket') }}</h4>
                                    
        
                     
                                        
                                               <div class="col-sm-3  ml-auto">
                                                {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                                </div> 
                                                <button class="btn btn-primary btn-rounded " data-toggle="modal" wire:click="reseted" data-target="#addmodal">add</button>
                                                     @include('modals.addbarbucket')
                                            
                                           
                                        </div> 
        
      
        
                                        <div class="table-responsive">
                                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                                            <thead>
                                                <tr role="row">
                                                 
                                                    <th class="text-center">{{ __('barbucket.bucketname') }}</th>
                                                    <th class="text-center">{{ __('barbucket.Buckettype') }}
                                                </th>
                                                    <th  class="text-center">{{ __('barbucket.image') }}</th>
                                                    <th  class="text-center">{{ __('barbucket.status') }}</th>
                                                    
                                                  
                                                    <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{ __('barbucket.action') }}</th>
                                                    <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{ __('barbucket.terminate') }}</th>
                            
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                     @foreach ($bucket as $buckets )
                                                  <tr role="row">
                                                    
                                                     
                                                    <td class="text-center">{{ $buckets->name }}</td> 
                                                    <td  class="text-center">   
                                                        <label class="switch s-icons s-outline s-outline-primary mr-2" for="{{$buckets->name}}">
                                                            <input type="checkbox" {{$buckets->bucket_type=='redeem' ? 'checked':''}}  wire:click="updateBucket($event.target.checked,'{{$buckets->id }}')"class="custom-control-input" id="{{$buckets->name }}">  
                                                            <span class="slider "></span>
                                                                
                                                        </label>   <h6>{{ $buckets->bucket_type }}</h6>
                                                    </td> 
                                                       
                                                    <td class="text-center"><img src="{{ $buckets->image }}" width="170" height="90"/></td>
                                                        
                                                    <td  class="text-center">   
                                                        <label class="switch s-icons s-outline s-outline-primary mr-2" for="{{$buckets->id }}">
                                                            <input type="checkbox" {{$buckets->status=='1' ? 'checked':''}}  wire:click="updateStatus($event.target.checked,'{{$buckets->id}}')"class="custom-control-input" id="{{$buckets->id }}">  
                                                            <span class="slider round"></span>
                                                        </label>
                                                       
                                                    
                                                    </td>
                                                 
                                                        <td>
                                                            <button  data-target="#editmodal" wire:click.prevent="edit('{{ $buckets->id  }}')"data-toggle="modal" class="btn btn-primary btn-sm ">Edit</button></td>
                                                             @include('modals.editbarbucket')
                                                         <td> <button   wire:click.prevent="deleteId('{{ $buckets->id  }}')" class="btn btn-danger btn-sm ">Delete</button></td>
                                                      
                                                     
                                                    
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