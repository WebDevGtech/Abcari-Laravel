 <div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('rule.title')}}</h4>
                            

             
                                
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Rule" >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addrule">{{__('rule.addrule')}}</button>
                                       
                                            
                                   
                                </div> 

@include('modals.bar-rule')
                                

                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>

                                        <th class="text-center">{{__('rule.s.no')}}</th> 
                                        <th class="text-center">{{__('rule.rule')}}</th>
                                        <th class="text-center">{{__('rule.status')}} </th>
                                        <th class="text-center">{{__('rule.action')}}</th>
                                      
                                    </tr>
                                </thead>
                                @if(count($barrules) >0)
                                <tbody>
                                    @foreach($barrules as $barrule)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                        <td class="text-center">{{$barrule->rule->name}}</td>
                                        <td class="text-center">
                                       
                                            <label class="switch s-success  mt-2 mr-2" for="{{$barrule->id}}">
                                                <input type="checkbox"  {{$barrule->status== 1 ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$barrule->id
                  }}')"  id="{{$barrule->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                      
                                      
                </td>
                <td class="text-center"> <a href="" data-toggle="modal" data-placement="top" wire:click="deleteId({{$barrule->id}})" data-target="#deleterule" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td>
                                           </tr>
                                   @endforeach
                                </tbody>
@else
<tbody>
            <tr>




              <td colspan="4" >
              
            <center>{{__('rule.norecordfound')}}</center>
                
               </td></tr>
                </tbody>
            @endif
           

                            </table>
                          {{$barrules->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>


<script>
     window.addEventListener('modalClose', event => {
    
    $('#deleteCloserule').click()
  })
  window.addEventListener('modalClose', event => {
    
    $('#addCloserule').click()
  })
  </script> 