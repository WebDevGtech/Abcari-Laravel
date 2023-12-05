<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('coupon.coupon')}}</h4>
                                                 
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Coupon.." >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addcoupon">{{__('coupon.add')}}</button>
                                           
                                </div> 

@include('modals.bar-coupon')


                            <table id="zero-config" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>{{__('coupon.s.no')}}</th>
                                      
                                       
                                        <th>{{__('coupon.name')}}</th>
                                        <th>{{__('coupon.couponcode')}} </th>
                                        <th>{{__('coupon.image')}}</th>
                                      
                                        <th>{{__('coupon.coupontype')}} </th>
                                     
                                        <th >{{__('coupon.status')}}</th>
                                        <th >{{__('coupon.action')}}</th>
                                    </tr>
                                </thead>
                                @if(count($coupons) >0)
                                <tbody>
                                    @foreach($coupons as $coupon)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                      
                                       
                                        <td>{{$coupon->name}}</td>
                                        <td>{{$coupon->coupon_code}}</td>
                                        <td><img src="{{ Storage::url($coupon->image); }}"  width="100" height="50" /></td>
                                        <td>{{$coupon->coupon_type}}</td>
                                      
                                        <td>

                                           <div class="col-lg-3 col-md-3 col-sm-4 col-6">
                                            <label class="switch s-success  mb-4 mr-2" for="{{$coupon->id}}">
                                                <input type="checkbox"  {{$coupon->status== '1' ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$coupon->id
                  }}')"  id="{{$coupon->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        
                                        
                                        </td>
                                        <td> <a href="" data-toggle="modal"  wire:click="editId({{$coupon->id}})"  data-target="#editcoupon" data-placement="top" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                                                         {{--   <a href="" data-toggle="modal" wire:click="deleteId({{$coupon->id}})"  data-placement="top" data-target="#deleteCoupon"  title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> --}}
                                                           
                                                        <a class="icon-container" href=""  wire:click="viewId({{$coupon->id}})" data-toggle="modal" data-target="#viewcoupon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg><span class="icon-name"> </span>
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
            <p >{{__('coupon.norecordfound')}}</p>
                </div>
                </td><td></td><td></td><td></td><td></td></tr>
                </tbody>
            @endif
            @if(count($coupons) >2)
                                <tfoot>
                                    <tr>
                                    <th>{{__('coupon.s.no')}}</th>
                                      
                                       
                                      <th>{{__('coupon.name')}}</th>
                                      <th>{{__('coupon.couponcode')}} </th>
                                      <th>{{__('coupon.image')}}</th>
                                    
                                      <th>{{__('coupon.coupontype')}} </th>
                                   
                                      <th >{{__('coupon.status')}}</th>
                                      <th >{{__('coupon.action')}}</th>
                                    </tr>
                                </tfoot>
                                @endif

                            </table>
                        {{$coupons->links('livewire-pagination')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>
<script>
window.addEventListener('modalClose', event => {
    $('#editClosecoupon').click()
  })
  window.addEventListener('modalClose', event => {
    $('#editClosecoupon').click()
  })
  window.addEventListener('modalClose', event => {
    $('#deleteClosecoupon').click()
  })
</script>