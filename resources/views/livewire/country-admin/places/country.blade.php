<div>
    <div class="layout-px-spacing">
                            
        <div class="row layout-top-spacing" id="cancel-row">
        
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                <div class="row m-2 ">
        <h4 class="modal-title" id="exampleModalLabel">{{ __('country.country') }}</h4>
                    

     
                        
                               <div class="col-sm-3  ml-auto">
                                {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                </div> 
                             <button class="btn btn-primary btn-rounded " data-toggle="modal" wire:click="reseted"data-target="#addcountry">add</button> 
                               @include('modals.addcountry')
                              
                        </div> 



                        <div class="table-responsive">
                        <table id="default-ordering" class="table table-hover dataTable" style="width: 100%;" role="grid" aria-describedby="default-ordering_info">
                            <thead>
                                <tr role="row">
                                    <th class="text-center" > {{__('country.countryname') }}</th>
                                   
                                </th>
                               
                                
                                    <th class="text-center" >{{ __('country.countrycode') }}</th>
                                    <th class="text-center" >{{ __('country.phonecode') }}</th>
                                    <th class="text-center">{{ __('country.status') }}</th>

                                  
                                    <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending">{{ _('country.action') }}</th>
            
                                    <th class="text-center  " tabindex="0" aria-controls="default-ordering" rowspan="0" colspan="1" style="width: 90px;" aria-label="Action: activate to sort column ascending" >{{ __('country.terminate') }}</th>
                                </tr>
                            </thead>
                      
                        <tbody>

                         @foreach ($country as $countrys )
                         <tr role="row">
                         <td class="text-center">{{ $countrys->name }}</td>
                         <td class="text-center">{{ $countrys->code }}</td>
                         <td class="text-center">{{ $countrys->phonecode }}</td>
                         <td  class="text-center"> 
                            <label class="switch s-icons s-outline s-outline-primary mr-2 mt-3" for="{{$countrys->id }}">
                                <input type="checkbox" {{$countrys->status=='1' ? 'checked':''}} wire:click="updateStatus($event.target.checked,'{{$countrys->id }}')" id="{{$countrys->id }}" >
                                <span class="slider round"></span>
                            </label>
                           </td>
                           <td><button  data-target="editmodal" wire:click.prevent="edit('{{ $countrys->id  }}')"data-toggle="modal" class="btn btn-primary btn-sm  ">{{ __('country.edit') }}</button></td>
                            @include('modals.editcountry')
                           <td><button  wire:click.prevent="delete('{{ $countrys->id }}')"class="btn btn-danger btn-sm ">{{ __('country.delete') }}</button></td>
                         @endforeach  
                         </tr>                        


                        </tbody>


    


                    </table>
                   
            </div>

        </div>

    </div>
</div>
