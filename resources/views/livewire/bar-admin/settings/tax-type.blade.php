<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('taxtype.taxtype')}}</h4>
                            

             
                                
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." >
                                        </div> 
                                       
                                       
                                      
                                   
                                </div> 

@include('modals.tax-type')


                            <table id="zero-config" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{__('taxtype.s.no')}}</th>
                                        <th>{{__('taxtype.taxname')}}</th>
                                        <th>{{__('taxtype.countryname')}}</th> 
                                        <th>{{__('taxtype.zonename')}}</th>
                                        <th>{{__('taxtype.cityname')}} </th>
                                        <th>{{__('taxtype.postcode')}}</th>
                                        <th>{{__('taxtype.taxrate')}} </th>
                                        <th>{{__('taxtype.status')}} </th>
                                        <th >{{__('taxtype.action')}}</th>
                                    </tr>
                                </thead>
                                @if(count($taxtypes) >0)
                                <tbody>
                                    @foreach($taxtypes as $taxtype)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$taxtype->tax_name}}</td>
                                        <td>{{$taxtype->country->name}}</td>
                                        <td>{{$taxtype->zone->name }}</td>
                                        <td>{{$taxtype->city->name }}</td>
                                        <td>{{$taxtype->postcode->code }}</td>
                                        <td>{{$taxtype->tax_rate}}</td>
                                        <td>

                                           <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                            <label class="switch s-success  mb-4 mr-2" for="{{$taxtype->id}}">
                                                <input type="checkbox"  {{$taxtype->status== 1 ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$taxtype->id
                  }}')"  id="{{$taxtype->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        
                                        
                                        </td>
                                        <td>
                                                            <a href="" data-toggle="modal" data-placement="top" data-target="#deletetax" wire:click="deleteId({{$taxtype->id}})" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> </td>
                                    </tr>
                                   @endforeach
                                </tbody>
@else
<tbody>
            <tr>
<td></td>
<td></td>
<td></td>
<td></td>
              <td class="text-center m-3" >
              <div class="row p-4">
            <p >{{__('taxtype.norecordfound')}}</p>
                </div>
                </td><td></td><td></td><td></td><td></td></tr>
                </tbody>
            @endif
            @if(count($taxtypes) >2)
                                <tfoot>
                                    <tr>
                                    <th>{{__('taxtype.s.no')}}</th>
                                        <th>{{__('taxtype.taxname')}}</th>
                                        <th>{{__('taxtype.countryname')}}</th> 
                                        <th>{{__('taxtype.zonename')}}</th>
                                        <th>{{__('taxtype.postcode')}}</th>
                                        <th>{{__('taxtype.cityname')}} </th>
                                        <th>{{__('taxtype.taxrate')}} </th>
                                        <th>{{__('taxtype.status')}} </th>
                                        <th >{{__('taxtype.action')}}</th>
                                    </tr>
                                </tfoot>
                                @endif

                            </table>
                            {{$taxtypes->links('livewire-pagination')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>


<script>
     window.addEventListener('modalClose', event => {
    
    $('#addClosetax').click()
  })
  window.addEventListener('modalClose', event => {
    
    $('#editClosetax').click()
  })
  window.addEventListener('modalClose', event => {
    
    $('#deleteClosetax').click()
  })
     </script>