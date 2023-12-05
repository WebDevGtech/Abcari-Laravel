<!-- __edit__ -->

<div wire:ignore.self  class="modal fade" id="editpeak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('peakhour.editpeak')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                               
        <div class="form-row mb-4">
        <div class="col">
        <label >{{__('peakhour.starttime')}}</label>
          <input type="time" class="form-control" wire:model="edit_start_time" placeholder="Start Time">
          @error('edit_start_time') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        
        <div class="col">
        <label >{{__('peakhour.endtime')}}</label>
          <input type="time" class="form-control" wire:model="edit_end_time" placeholder="End TIme">
          @error('end_time') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
       
       
    </div>
    <div class="form-row mb-4">
    <div class="col">
    <label >{{__('peakhour.extendhour')}}</label>
          <input type="number" class="form-control" wire:model="edit_extended_hour" placeholder="Extended Hour">
          @error('extended_hour') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
     
        <div class="col">
        <table>
  <th>
        <label>{{__('happyhour.availabledays')}}</label>
        </th>
  <tbody>
    <tr>
      <td>
    @if(count($pluckpeakhours)==0 )
      <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Allday" id="allday" wire:click=editalldaycheck($event.target.checked) wire:model="edit_allday" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.allday')}}
                                </label>
                            </div>
                            @endif
                            </td>
</tr>
<tr>
 <td>
                            @if (!in_array("Sunday", $pluckpeakhours))
                            <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Sunday" id="sunday" wire:model="edit_available_days.0" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.sunday')}}
                                </label>
                            </div>
                            @endif
                            </td>
</tr>
<tr>
 <td>
                            @if (!in_array("Monday", $pluckpeakhours))
                            <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Monday" wire:model="edit_available_days.1" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.monday')}}
                                </label>
                            </div>
                            @endif
                            </td>
</tr>
<tr>
 <td>
                            @if (!in_array("Tuesday", $pluckpeakhours))
                            <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Tuesday" wire:model="edit_available_days.2" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.tuesday')}}
                                </label>
                            </div>
                            @endif
                            </td>
</tr>
<tr>
 <td>
                            @if (!in_array("Wednesday", $pluckpeakhours))
                            <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Wednesday" wire:model="edit_available_days.3" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.wednesday')}}
                                </label>
                            </div>
                            @endif
                            </td>
</tr>
<tr>
 <td>
                            @if (!in_array("Thursday", $pluckpeakhours))
                            <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Thursday" wire:model="edit_available_days.4" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.thursday')}}
                                </label>
                            </div>
                            @endif
                            </td>
</tr>
<tr>
 <td>
                            @if (!in_array("Friday", $pluckpeakhours))
                            <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Friday" wire:model="edit_available_days.5" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.friday')}}
                                </label>
                            </div>
                            @endif
                            </td>
</tr>
<tr>
 <td>
                            @if (!in_array("Saturday", $pluckpeakhours))
                            <div class="n-chk ">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="Saturday" wire:model="edit_available_days.6" class="new-control-input " >
                                  <span class="new-control-indicator"></span>{{__('happyhour.saturday')}}
                                </label>
                            </div>@endif
                            </td>
</tr>
</tbody>
</table>
    
          @error('available_days') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
   
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="editClosepeak" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('peakhour.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="editForm()">{{__('peakhour.save')}}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                  
