 <div>
        <div class="layout-px-spacing">
                        
                        <div class="row layout-top-spacing" id="cancel-row">
                        
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">{{ __('bartieup.bartieup') }}</h4>
                                    
        
                     
                                        
                                               <div class="col-sm-3  ml-auto">
                                                {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                                </div> 
                                                <button class="btn btn-primary btn-rounded " data-toggle="modal" wire:click="reseted" data-target="#addmodal">{{ __('bartieup.add') }}</button>
                                                      @include('modals.addTieup')
                                                       
                                           
                                        </div> 
                <div class="table-responsive"><table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                <thead>
                    <tr role="row">
                        <th  class="text-center">{{ __('bartieup.name') }}</th>
                        <th  class="text-center">{{ __('bartieup.details') }}</th>
                        <th class="text-center" >{{__('bartieup.image')}}
                    </th>
                        <th class="text-center">{{ __('bartieup.status') }}</th>
                        
                      
                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{ __('bartieup.action') }}</th>
                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="default-ordering" rowspan="1" colspan="1" style="width: 59px;" aria-label="Action: activate to sort column ascending">{{ __('bartieup.terminate') }}</th>

                      
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($tieup as $tieups )
                      <tr role="row">
                        <td class="text-center">{{ $tieups->name }}</td> 
                        <td class="text-center">{{ $tieups->details}}</td> 
                        <td class="text-center"><img src="{{ $tieups->image }}" width="170" height="90"/></td>
                       
                        <td  class="text-center">  
                            <label class="switch s-icons s-outline s-outline-primary mr-2" for="{{$tieups->id }}">
                                <input type="checkbox" {{$tieups->status=='1' ? 'checked':''}}  wire:click="updateStatus($event.target.checked,'{{$tieups->id }}')"class="custom-control-input" id="{{$tieups->id }}">  
                                <span class="slider round"></span>
                            </label>
                        </td>
                            <td>
                                <button  data-target="#editmodal" wire:click.prevent="edit('{{ $tieups->id  }}')"data-toggle="modal" class="btn btn-primary btn-sm  ">{{ __('bartieup.edit') }}</button></td>
                                 @include('modals.edittieup')
                                 <td>
                                  <button   wire:click.prevent="deleteId('{{ $tieups->id  }}')" class="btn btn-danger btn-sm  ">{{ __('bartieup.delete') }}</button></td>
                           </tr>
                        
                      </tr>
                    @endforeach
                    
                  
                    
                   </tbody>
                
            </table>
        </div>
        {{-- <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center"><div class="dt--pages-count  mb-sm-0 mb-3"><div class="dataTables_info" id="default-ordering_info" role="status" aria-live="polite">Showing page 4 of 4</div></div><div class="dt--pagination"><div class="dataTables_paginate paging_simple_numbers" id="default-ordering_paginate"><ul class="pagination pagination-style-13 pagination-bordered"><li class="paginate_button page-item previous" id="default-ordering_previous"><a href="#" aria-controls="default-ordering" data-dt-idx="0" tabindex="0" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg></a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-ordering" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-ordering" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="default-ordering" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="default-ordering" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next disabled" id="default-ordering_next"><a href="#" aria-controls="default-ordering" data-dt-idx="5" tabindex="0" class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a></li></ul></div></div></div> --}}
           
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
   
