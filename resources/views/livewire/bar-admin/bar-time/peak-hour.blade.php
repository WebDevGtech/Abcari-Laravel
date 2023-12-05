<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('peakhour.title')}}</h4>
                                                 
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search PeakHour.." >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addpeak">{{__('peakhour.add')}}</button>
                                       
                                      
                                   
                                </div> 

@include('modals.peak-hour')
@include('modals.edit-peakhour')

                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('peakhour.s.no')}}</th>
                                      
                                        <th class="text-center">{{__('peakhour.starttime')}}</th> 
                                        <th class="text-center">{{__('peakhour.endtime')}}</th>
                                        <th class="text-center">{{__('peakhour.extendhour')}} </th>
                                        <th class="text-center">{{__('peakhour.availabledays')}}</th>
                                      
                                        <th class="text-center">{{__('peakhour.status')}} </th>
                                        <th class="text-center">{{__('peakhour.action')}}</th>
                                    </tr>
                                </thead>
                                @if(count($peakhours) >0)
                                <tbody>
                                    @foreach($peakhours as $peakhour)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                      
                                        <td class="text-center">{{$peakhour->stating_time}}</td>
                                        <td class="text-center">{{$peakhour->end_time }}</td>
                                        <td class="text-center">{{$peakhour->extended_hours }} <p>{{__('peakhour.hour') }}</p></td>
                                        <td class="text-center">{{$peakhour->available_days }}</td>
                                      
                                        <td class="text-center">

                                           <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                            <label class="switch s-success   mr-2 mt-3" for="{{$peakhour->id}}">
                                                <input type="checkbox"  {{$peakhour->status== '1' ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$peakhour->id
                  }}')"  id="{{$peakhour->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        
                                        
                                        </td>
                                        <td class="text-center"> <a href="" data-toggle="modal" wire:click="editId({{$peakhour->id}})" data-target="#editpeak" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                          
                                    </tr>
                                   @endforeach
                                </tbody>
@else
<tbody>
            <tr>

<td colspan="7" >
             
            <center >{{__('peakhour.norecordfound')}}</center>
               
                </td></tr>
                </tbody>
            @endif
           
                            </table>
                        {{$peakhours->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>


<script>
     window.addEventListener('modalClose', event => {
    
    $('#addClosepeak').click()
  })
 
     </script>