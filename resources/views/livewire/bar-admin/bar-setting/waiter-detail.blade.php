<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('waiter-detail.title')}}</h4>
                            

             
                                
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Waiter" >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addwaiter">{{__('waiter-detail.addwaiter')}}</button>
                                       
                                            
                                   
                                </div> 


                                @include('modals.waiter-detail')

                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>

                                        <th class="text-center">{{__('waiter-detail.s.no')}}</th> 
                                        <th class="text-center">{{__('waiter-detail.name')}}</th>
                                        <th class="text-center">{{__('waiter-detail.Phoneno')}} </th>
                                        <th class="text-center">{{__('waiter-detail.action')}}</th>
                                      
                                    </tr>
                                </thead>
                                @if(count($waiters) >0)
                                <tbody>
                                    @foreach($waiters as $waiter)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                        <td class="text-center">{{$waiter->name}}</td>
                                        <td class="text-center">{{$waiter->phone_number}}</td>
                                      <td class="text-center"><a href="" data-toggle="modal" wire:click="editId({{$waiter->id}})"  data-target="#editwaiter" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                         {{--   <a href="" data-toggle="modal" data-placement="top" data-target="#deletewaiter" wire:click="deleteId({{$waiter->id}})"  title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> --}}
                           </td>
                                      
                                      
                                           </tr>
                                   @endforeach
                                </tbody>
@else
<tbody>
            <tr>



              <td colspan="4" >
              
            <center>{{__('waiter-detail.norecordfound')}}</center>
                
               </td></tr>
                </tbody>
            @endif
           

                            </table>
                           {{$waiters->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>

<script>
     window.addEventListener('modalClose', event => {
    
    $('#addClosewaiter').click()
  })
  window.addEventListener('modalClose', event => {
    
    $('#editClosewaiter').click()
  })
  window.addEventListener('modalClose', event => {
    
    $('#deleteClosewaiter').click()
  })
  </script> 