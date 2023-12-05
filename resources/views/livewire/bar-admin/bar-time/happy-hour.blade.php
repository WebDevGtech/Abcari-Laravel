<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('happyhour.title')}}</h4>
                                                 
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search HappyHour.." >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addhappy">{{__('peakhour.add')}}</button>
                                       
                                      
                                   
                                </div> 

@include('modals.happy-hour')


                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('happyhour.s.no')}}</th>
                                      
                                        <th class="text-center">{{__('happyhour.starttime')}}</th> 
                                        <th class="text-center">{{__('happyhour.endtime')}}</th>
                                        <th class="text-center">{{__('happyhour.extendhour')}} </th>
                                        <th class="text-center">{{__('happyhour.availabledays')}}</th>
                                      
                                        <th class="text-center">{{__('happyhour.status')}} </th>
                                        <th class="text-center">{{__('happyhour.action')}}</th>
                                    </tr>
                                </thead>
                                @if(count($happyhours) >0)
                                <tbody>
                                    @foreach($happyhours as $happyhour)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                      
                                        <td class="text-center">{{$happyhour->stating_time}}</td>
                                        <td class="text-center">{{$happyhour->end_time }}</td>
                                        <td class="text-center">{{$happyhour->extended_minutes }} &nbsp; {{__('happyhour.hour') }}</td>
                                        <td class="text-center">{{$happyhour->available_days }}</td>
                                      
                                        <td class="text-center">

                                           <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                            <label class="switch s-success  mr-2 mt-3" for="{{$happyhour->id}}">
                                                <input type="checkbox"  {{$happyhour->status== 1 ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$happyhour->id
                  }}')"  id="{{$happyhour->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        
                                        
                                        </td>
                                        <td class="text-center"> <a href="" data-toggle="modal" wire:click="editId({{$happyhour->id}})" data-target="#edithappy" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                          {{--  <a href="" data-toggle="modal" data-placement="top" data-target="#deletehappy" wire:click="deleteId({{$happyhour->id}})" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> </td> --}}
                                    </tr>
                                   @endforeach
                                </tbody>
@else
<tbody>
            <tr>


              <td colspan="7" >
           
            <center>{{__('happyhour.norecordfound')}}</center>
                </td>
                </tr>
                </tbody>
            @endif
           

                            </table>
                        {{$happyhours->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>


<script>
     window.addEventListener('modalClose', event => {
    
    $('#addClosehappy').click()
  })
  window.addEventListener('modalClose', event => {
    
    $('#editClosehappy').click()
  })
 
     </script>
      <script> mobiscroll.select('#multiple-select', {
    inputElement: document.getElementById('my-input'),
    touchUi: false
});</script>