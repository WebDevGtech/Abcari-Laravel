<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('combo.combo')}}</h4>
                                                 
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Combo.." >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addcombo">{{__('combo.add')}}</button>
                                           
                                </div> 


@include('modals.combo')

                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{__('combo.s.no')}}</th>
                                      
                                        <th class="text-center">{{__('combo.image')}}</th>
                                        <th class="text-center">{{__('combo.category')}} </th>
                                        <th class="text-center">{{__('combo.product')}}</th>
                                      
                                        <th class="text-center">{{__('combo.status')}} </th>
                                        <th class="text-center">{{__('combo.action')}}</th>
                                    </tr>
                                </thead>
                                @if(count($combos) >0)
                                <tbody>
                                    @foreach($combos as $combo)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                      
                                       
                                        <td class="text-center"><img src="{{ Storage::url($combo->image); }}"  width="100" height="50" /></td>
                                        <td class="text-center">{{$combo->category->name }}</br>
                                        {{$combo->categorys->name }}

                                        </td>
                                      
                                      <td class="text-center">{{$combo->product->name}}</br>

                                      {{$combo->products->name}}
                                      </td>
                                        <td class="text-center">

                                          
                                            <label class="switch s-success  mr-2 mt-3" for="{{$combo->id}}">
                                                <input type="checkbox"  {{$combo->status== '1' ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$combo->id
                  }}')"  id="{{$combo->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        
                                        
                                        
                                        </td>
                                        <td class="text-center">  <a href="" data-toggle="modal"  wire:click="editId({{$combo->id}})"  data-target="#editcombo" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                           {{-- <a href="" data-toggle="modal" wire:click="deleteId({{$combo->id}})"  data-placement="top" data-target="#deletecombo"  title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> --}}
                                                           
                                                      {{--  <a class="icon-container" href="" data-toggle="modal" data-target="#viewcombo">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather "><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg><span class="icon-name"> </span>
                </a> --}}
                                                   </td>
                                                        </tr>
                                   @endforeach
                                   @else
            <tr>

              <td colspan="6">
            <center >{{__('combo.norecordfound')}}</center>
                                                      </td> 
            @endif
                                </tbody>

           

                            </table>
                        {{$combos->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>
<script>
window.addEventListener('modalClose', event => {
    $('#addClosecombo').click()
  })
  window.addEventListener('modalClose', event => {
    $('#editClosecombo').click()
  })
  window.addEventListener('modalClose', event => {
    $('#deleteClosecombo').click()
  })
</script>