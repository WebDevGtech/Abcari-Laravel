<!-- __addoffer__ -->
<div wire:ignore.self  class="modal fade" id="addcoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('coupon.addcoupon')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
        <div class="form-row mb-4">
        <div class="col">
      <label>{{__('coupon.name')}}</label>
          <input type="text" class="form-control" wire:model="name" placeholder="Name">
          @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
       
        <div class="col">
        <label>{{__('coupon.couponcode')}}</label>
        <input type="text" class="form-control" wire:model="coupon_code" placeholder="Couponcode">
          @error('coupon_code') <span class="error text-danger">{{ $message }}</span> @enderror
       
    </div>
     </div>
    <div class="form-row mb-4">
    <div class="col">
    <label>{{__('coupon.image')}}</label>
      <input type="file" class="form-control" wire:model="image" placeholder="Image">
      @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="col">
    <label>{{__('coupon.discount')}}</label>
      <input type="number" class="form-control" wire:model="discount" placeholder="Discount">
      @error('discount') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
    </div>
    <div class="form-row mb-4">
    <div class="col">
    <label>{{__('coupon.coupontype')}}</label>
    <select class="form-control tagging" wire:model="coupon_type" >
    <option value="" >{{__('coupon.selectcoupontype')}}</option>
                                      <option value="bar_admin">{{__('coupon.baradmin')}}</option>
                                      <option value="country_admin">{{__('coupon.countryadmin')}}</option>       
                                      <option value="super_admin">{{__('coupon.superadmin')}}</option>  
      
          </select>
          @error('coupon_type') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="col">
    <label>{{__('coupon.minimumdiscount')}}</label>
      <input type="number" class="form-control" wire:model="minimum_amount" placeholder="Minimum Amount">
      @error('minimum_amount') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
      
    </div>
    <div class="form-row mb-4">
    <div class="col">
   <label>{{__('coupon.discounttype')}} </label>
    <select class="form-control tagging" wire:model="discount_type" >
    <option value="">{{__('coupon.selectdiscounttype')}}</option>
                                      <option value="flat">{{__('coupon.flat')}}</option>
                                      <option value="percentage">{{__('coupon.percentage')}}</option>       
  
      
          </select> 
          @error('discount_type') <span class="error text-danger">{{ $message }}</span> @enderror
        
        </div>
    </div>
   
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="addCloseOffer" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('offer.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="submitForm()">{{__('offer.save')}}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                   
 <!-- ____edit__                                    -->

<div wire:ignore.self  class="modal fade" id="editcoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('coupon.editcoupon')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
                                                <div class="form-row mb-4">
                                                <div class="col">
                                              <label>{{__('coupon.name')}}</label>
                                                  <input type="text" class="form-control" wire:model="edit_name" placeholder="Name">
                                                  @error('edit_name') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                               
                                                <div class="col">
                                                <label>{{__('coupon.couponcode')}}</label>
                                                <input type="text" class="form-control" wire:model="edit_coupon_code" placeholder="Couponcode">
                                                  @error('edit_coupon_code') <span class="error text-danger">{{ $message }}</span> @enderror
                                               
                                            </div>
                                             </div>
                                            <div class="form-row mb-4">
                                            <div class="col">
                                           <label>{{__('coupon.discounttype')}} </label>
                                            <select class="form-control tagging" wire:model="edit_discount_type" >
                                            <option value="">{{__('coupon.selectdiscounttype')}}</option>
                                                                              <option value="flat">{{__('coupon.flat')}}</option>
                                                                              <option value="percentage">{{__('coupon.percentage')}}</option>       
                                          
                                              
                                                  </select> 
                                                  @error('edit_discount_type') <span class="error text-danger">{{ $message }}</span> @enderror
                                                
                                                </div>
                                            <div class="col">
                                            <label>{{__('coupon.discount')}}</label>
                                              <input type="number" class="form-control" wire:model="edit_discount" placeholder="Discount">
                                              @error('edit_discount') <span class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            </div>
                                            <div class="form-row mb-4">
                                            <div class="col">
                                            <label>{{__('coupon.coupontype')}}</label>
                                            <select class="form-control tagging" wire:model="edit_coupon_type" >
                                            <option value="" >{{__('coupon.selectcoupontype')}}</option>
                                                                              <option value="bar_admin">{{__('coupon.baradmin')}}</option>
                                                                              <option value="country_admin">{{__('coupon.countryadmin')}}</option>       
                                                                              <option value="super_admin">{{__('coupon.superadmin')}}</option>  
                                              
                                                  </select>
                                                  @error('edit_coupon_type') <span class="error text-danger">{{ $message }}</span> @enderror
                                                </div>
                                                <div class="col">
                                            <label>{{__('coupon.minimumdiscount')}}</label>
                                              <input type="number" class="form-control" wire:model="edit_minimum_amount" placeholder="Minimum Amount">
                                              @error('edit_minimum_amount') <span class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                              
                                            </div>
                                            <div class="form-row mb-4">
                                            <div class="col">
                                            <label>{{__('coupon.image')}}</label>
                                              <input type="file" class="form-control" wire:model="edit_image" placeholder="Image">
                                              @error('edit_image') <span class="error text-danger">{{ $message }}</span> @enderror
                                            
                                            </div>
                                           
                                            </div>
                                           
                                                                                        </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="editClosecoupon" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('offer.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="editForm()">{{__('offer.update')}}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

<!-- ___delete___ -->


<div wire:ignore.self  class="modal fade" id="deletecoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('offer.deleteoffer')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
<p>{{__('offer.wanttodelete')}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="deleteCloseoffer" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('offer.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="deleteForm()">{{__('offer.delete')}}</button>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
  
<!-- ___view___ -->

<div wire:ignore.self  class="modal fade" id="viewcoupon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('coupon.viewcoupon')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
<div class="form-row mb-4">
<div class="col">
<label>{{__('coupon.name')}}</label>
<h5>{{$edit_name}}</h5>
</div>
<div class="col">
<label>{{__('coupon.couponcode')}}</label>
<h5>{{$edit_coupon_code}}</h5>
</div>
<div class="col">
<label>{{__('coupon.image')}}</label>
<h5><img src="{{ Storage::url($edit_image);}}" width="100" height="50"></h5>
</div>
<div class="col">
<label>{{__('coupon.discount')}}</label>
<h5>{{$edit_discount}}</h5>
</div>

</div>
<div class="form-row mb-4">
<div class="col">
<label>{{__('coupon.coupontype')}}</label>
<h5>{{$edit_coupon_type}}</h5>
</div>
<div class="col">
<label>{{__('coupon.discounttype')}}</label>
<h5>{{$edit_minimum_amount}}</h5>
</div>
<div class="col">
<label>{{__('coupon.minimumdiscount')}}</label>
<h5>{{$edit_discount_type}}</h5>
</div>
</div>


                                                
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="deleteCloseoffer" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('offer.discard')}}</button>
                                                   
                                                </div>
                                                </div>
                                                </div>
                                                </div>

