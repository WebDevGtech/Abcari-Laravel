<!-- __addoffer__ -->
<div wire:ignore.self  class="modal fade" id="addoffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('offer.addoffer')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
        <div class="form-row mb-4">
          
        <div class="col">
        <label>{{__('offer.name')}}</label>
      <input type="text" class="form-control" wire:model="name" placeholder="Name">
      @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
   
    <div class="col">
    <label>{{__('offer.offerimage')}}</label>
      <input type="file" class="form-control" wire:model="image" placeholder="Image">
      @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
     </div>
    <div class="form-row mb-4">
    
    <div class="col">
    <label>{{__('offer.offertype')}}</label>
       <select class="form-control tagging" wire:model="offer_type" wire:change="updateOfferType($event.target.value)" >
           <option selected value="">{{__('offer.selectoffertype')}}</option>
          
           <option value="category">{{__('offer.category')}}</option>
          
           <option value="brand">{{__('offer.brand')}}</option>
           <option value="bar">{{__('offer.bar')}}</option>
         </select>
         @error('offer_type') <span class="error text-danger">{{ $message }}</span> @enderror
        
   </div> 
  @if($offer_type!='bar'&& $offer_type!=null)
   <div class="col">
   <label>{{__('offer.offer')}}</label>
       <select class="form-control tagging" wire:model="offer_id" >
           <option selected="">{{__('offer.selectoffer')}}</option>
         @if($offer_type!=null)
           @foreach($offertypes as $offer)
           <option value="{{$offer->id}}">{{$offer->name}}</option>
         
@endforeach
     @endif
         </select>
         @error('offer_id') <span class="error text-danger">{{ $message }}</span> @enderror
      
   </div> 
   @endif
     
      
    </div>
    <div class="form-row mb-4">
   <div class="col">
   <label>{{__('offer.discounttype')}} </label>
    <select class="form-control tagging" wire:model="discount_type" >
    <option value="" >{{__('offer.selecttype')}}</option>
                                      <option value="flat">{{__('offer.flat')}}</option>
                                      <option value="percentage">{{__('offer.percentage')}}</option>       
  
      
          </select> 
          @error('discount_type') <span class="error text-danger">{{ $message }}</span> @enderror
        
        </div>
       
   <div class="col">
   <label>{{__('offer.discountvalue')}}</label>
      <input type="number" class="form-control" wire:model="discount_value" placeholder="Discount Value">
      @error('discount_value') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
   
   
    </div>
    <div class="form-row mb-4">
   
    <div class="col">
    <label>{{__('offer.minimumamount')}}</label>
      <input type="number" class="form-control" wire:model="minimum_amount" placeholder="Minimum Amount">
      @error('minimum_amount') <span class="error text-danger">{{ $message }}</span> @enderror
    </div>
   
    </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="addCloseoffer" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('offer.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="submitForm()">{{__('offer.save')}}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                   
 <!-- ____edit__ -->

<div wire:ignore.self  class="modal fade" id="editoffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('offer.editoffer')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
                                                <div class="form-row mb-4">
                                                  
                                                <div class="col">
                                                <label>{{__('offer.name')}}</label>
                                              <input type="text" class="form-control" wire:model="edit_name" placeholder="Name">
                                              @error('edit_name') <span class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col">
                                           <label>{{__('offer.discounttype')}} </label>
                                            <select class="form-control tagging" wire:model="edit_discount_type" >
                                            <option value="" >{{__('offer.selecttype')}}</option>
                                                                              <option value="flat">{{__('offer.flat')}}</option>
                                                                              <option value="percentage">{{__('offer.percentage')}}</option>       
                                          
                                              
                                                  </select> 
                                                  @error('edit_discount_type') <span class="error text-danger">{{ $message }}</span> @enderror
                                                
                                                </div>
                                               
                                           
                                             </div>
                                            <div class="form-row mb-4">
                                            
                                            <div class="col">
                                            <label>{{__('offer.offertype')}}</label>
                                               <select class="form-control tagging" wire:change="updateOfferType($event.target.value)" wire:model="edit_offer_type" >
                                                   <option s value="">{{__('offer.selectoffertype')}}</option>
                                                  
                                                   <option value="category">{{__('offer.category')}}</option>
                                                  
                                                   <option value="brand">{{__('offer.brand')}}</option>
                                                   <option value="bar">{{__('offer.bar')}}</option>
                                                 </select>
                                                 @error('edit_offer_type') <span class="error text-danger">{{ $message }}</span> @enderror
                                                
                                           </div> 
                                           @if($edit_offer_type!='bar'&& $edit_offer_type!=null)
                                           <div class="col">
                                           <label>{{__('offer.offer')}}</label>
                                               <select class="form-control tagging" wire:model="edit_offer_id" >
                                                   <option selected="">{{__('offer.selectoffer')}}</option>
                                                   @if($edit_offer_type!=null)          
           @foreach($editoffertypes as $offer)
           <option value="{{$offer->id}}">{{$offer->name}}</option>
         
@endforeach

               @endif                        
                                             
                                                 </select>
                                                 @error('edit_offer_id') <span class="error text-danger">{{ $message }}</span> @enderror
                                              
                                           </div> 
                                           @endif
                                             
                                              
                                            </div>
                                            <div class="form-row mb-4">
                                          
                                           <div class="col">
                                           <label>{{__('offer.discountvalue')}}</label>
                                              <input type="number" class="form-control" wire:model="edit_discount_value" placeholder="Discount Value">
                                              @error('edit_discount_value') <span class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col">
                                            <label>{{__('offer.minimumamount')}}</label>
                                              <input type="number" class="form-control" wire:model="edit_minimum_amount" placeholder="Minimum Amount">
                                              @error('edit_minimum_amount') <span class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                           
                                          
                                           
                                            </div>

                                            <div class="form-row mb-4">
                                            <div class="col">
                                            <label>{{__('offer.offerimage')}}</label>
                                              <input type="file" class="form-control" wire:model="edit_image" placeholder="Image">
                                              @error('edit_image') <span class="error text-danger">{{ $message }}</span> @enderror
                                             
                                            </div>
                                         
                                            </div>
                                                                                    </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="editCloseoffer" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('offer.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="editForm()">{{__('offer.update')}}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

<!-- ___view___ -->


<div wire:ignore.self  class="modal fade" id="vieweoffer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('offer.viewoffer')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="form-row mb-4">
<div class="col">
<label>{{__('offer.name')}}</label>
  <h5>{{$name}}</h5>
</div>
<div class="col">
<label>{{__('offer.offerimage')}}</label>
  <h5><img src="{{ Storage::url($image);}}" width="100" height="50"></h5>
</div>
<div class="col">
<label>{{__('offer.offertype')}}</label>
  <h5>{{$offer_type}}</h5>
</div>
<div class="col">
<label>{{__('offer.offerbarrestaurant')}}</label>
  <h5>{{$bar_restaurant}}</h5>
</div>
</div>
<div class="form-row mb-4">
<div class="col">
<label>{{__('offer.offer')}}</label>
  <h5>{{$offer_id}}</h5>
</div>
<div class="col">
<label>{{__('offer.discounttype')}} </label>
  <h5>{{$discount_type}}</h5>
</div>
<div class="col">
<label>{{__('offer.discountvalue')}}</label>
  <h5>{{$discount_value}}</h5>
</div>
<div class="col">
<label>{{__('offer.minimumamount')}}</label>
  <h5>{{$minimum_amount}}</h5>
</div>
</div>                                      </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="viewClosebanner" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('offer.discard')}}</button>
                                                  
                                                </div>
                                                </div>
                                                </div>
                                                </div>