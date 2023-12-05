<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('banner.banner')}}</h4>
                                                 
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Banner.." >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addbanner">{{__('banner.add')}}</button>
                                           
                                </div> 


@include('modals.bar-banner')

                            <table id="zero-config" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{__('banner.s.no')}}</th>
                                      
                                        <th>{{__('banner.name')}}</th>
                                        <th>{{__('banner.image')}}</th>
                                        <th>{{__('banner.category')}} </th>
                                        <th>{{__('banner.location')}}</th>
                                        
                                        <th>{{__('banner.status')}} </th>
                                        <th >{{__('banner.action')}}</th>
                                    </tr>
                                </thead>
                                @if(count($banners) >0)
                                <tbody>
                                    @foreach($banners as $banner)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                      
                                        <td>{{$banner->banner_name  }}</td>
                                        <td><img src="{{ Storage::url($banner->image); }}"  width="100" height="50" /></td>
                                        <td>{{$banner->category->name  }}</td>
                                        @if($banner->location == 0)
                                    <td class=""> {{__('banner.top')}} </td>
                                @else
                                <td class="">{{__('banner.bottom')}}</td>
                                @endif
                                      
                                        <td>

                                           <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                            <label class="switch s-success  mb-4 mr-2" for="{{$banner->id}}">
                                                <input type="checkbox"  {{$banner->status== '1' ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$banner->id
                  }}')"  id="{{$banner->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        
                                        
                                        </td>
                                        <td> <a href="" data-toggle="modal"  wire:click="editId({{$banner->id}})"  data-target="#editbanner" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                         
                                                           
                                                      {{--  <a class="icon-container" href="" data-toggle="modal"  wire:click="editId({{$banner->id}})"  data-target="#viewbanner">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather "><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon></svg><span class="icon-name"> </span></a> --}}
                </a>
                                                   </td>
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
            <p >{{__('banner.norecordfound')}}</p>
                </div>
                </td><td></td><td></td><td></td><td></td></tr>
                </tbody>
            @endif
            @if(count($banners) >2)
                                <tfoot>
                                    <tr>
                                    <th>{{__('banner.s.no')}}</th>
                                      
                                       
                                        <th>{{__('banner.image')}}</th>
                                        <th>{{__('banner.category')}} </th>
                                        <th>{{__('banner.location')}}</th>
                                      
                                        <th>{{__('banner.status')}} </th>
                                        <th >{{__('banner.action')}}</th>
                                    </tr>
                                </tfoot>
                                @endif

                            </table>
                        {{$banners->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>
<script>
window.addEventListener('modalClose', event => {
    $('#addcloseBanner').click()
  })
  window.addEventListener('modalClose', event => {
    $('#editClosebanner').click()
  })
  window.addEventListener('modalClose', event => {
    $('#deleteClosebanner').click()
  })
</script>