
<!-- ___add___ -->

<div wire:ignore.self  class="modal fade" id="addcombo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                        
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{__('combo.addcombo')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
        <div class="form-row mb-4">
            <label class="form-control  text-center"><h5>{{__('combo.product1')}}</h5></label>
            <div class="col">
            <label>{{__('combo.category')}}</label>
          <select class="form-control"  wire:model="category">
<option value="">{{ __('combo.selectcategory')}}</option>
@foreach($categories as $Category)
<option value="{{$Category->id}}">{{$Category->name}}</option>

@endforeach
    </select>
          @error('category') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
      
        <div class="col">
        <label>{{__('combo.product')}}</label>
          <select class="form-control"  wire:model="product_1">
<option value="">{{ __('combo.selectproduct')}}</option>
@foreach($products as $product)
<option value="{{$product->id}}">{{$product->name}}</option>

@endforeach
    </select>
          @error('product_1') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
       
     </div>
    <div class="form-row mb-4">
    <label  class="form-control  text-center" ><h5>{{__('combo.product2')}}</h5></label>
            <div class="col">
            <label>{{__('combo.category')}}</label>
          <select class="form-control"  wire:model="category_2">
<option value="">{{ __('combo.selectcategory')}}</option>
@foreach($categories as $Category)
<option value="{{$Category->id}}">{{$Category->name}}</option>

@endforeach
    </select>
          @error('category_2') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
      
        <div class="col">
        <label>{{__('combo.product')}}</label>
          <select class="form-control"  wire:model="product_2">
<option value="">{{ __('combo.selectproduct')}}</option>
@foreach($products as $product)
<option value="{{$product->id}}">{{$product->name}}</option>

@endforeach
    </select>
          @error('product_2') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="form-row mb-4">
    <label  class="form-control text-center"><h5>{{__('combo.comboimage')}}</h5></label>
    <div class="col">
    <label>{{__('combo.image')}}</label>
        <input type="file" class="form-control" wire:model="image">
        @error('image') <span class="error text-danger">{{ $message }}</span> @enderror
   
      </div>
    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="addClosecombo" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('combo.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="submitForm()">{{__('combo.save')}}</button>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>

<!-- ___edit___ -->


<div wire:ignore.self  class="modal fade" id="editcombo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('combo.editcombo')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
        <div class="form-row mb-4">
            <label class="form-control  text-center"><h5>{{__('combo.productone')}}</h5></label>
            <div class="col">
            <label>{{__('combo.category')}}</label>
          <select class="form-control"  wire:model="edit_category">
<option value="">{{ __('combo.selectcategory')}}</option>
@foreach($categories as $Category)
<option value="{{$Category->id}}">{{$Category->name}}</option>

@endforeach
    </select>
          @error('edit_category') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
      
        <div class="col">
        <label>{{__('combo.product')}}</label>
          <select class="form-control"  wire:model="edit_product_1">
<option value="">{{ __('combo.selectproduct')}}</option>
@foreach($products as $product)
<option value="{{$product->id}}">{{$product->name}}</option>

@endforeach
    </select>
          @error('edit_product_1') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
       
     </div>
    <div class="form-row mb-4">
    <label  class="form-control  text-center" ><h5>{{__('combo.producttwo')}}</h5></label>
            <div class="col">
            <label>{{__('combo.category')}}</label>
          <select class="form-control"  wire:model="edit_category_2">
<option value="">{{ __('combo.selectcategory')}}</option>
@foreach($categories as $Category)
<option value="{{$Category->id}}">{{$Category->name}}</option>

@endforeach
    </select>
          @error('edit_category_2') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
      
        <div class="col">
        <label>{{__('combo.product')}}</label>
          <select class="form-control"  wire:model="edit_product_2">
<option value="">{{ __('combo.selectproduct')}}</option>
@foreach($products as $product)
<option value="{{$product->id}}">{{$product->name}}</option>

@endforeach
    </select>
          @error('edit_product_2') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    <div class="form-row mb-4">
    <label  class="form-control text-center"><h5>{{__('combo.comboimage')}}</h5></label>
    <div class="col">
    <label>{{__('combo.image')}}</label>
        <input type="file" class="form-control" wire:model="edit_image">
        @error('edit_image') <span class="error text-danger">{{ $message }}</span> @enderror
      
      </div>
    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="editClosecombo" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('combo.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="editForm()">{{__('combo.update')}}</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

<!-- __delete__ -->


<div wire:ignore.self  class="modal fade" id="deletecombo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('combo.deletecombo')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
<p>{{__('combo.wanttodelete')}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn" id="deleteClosecombo" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('combo.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="deleteForm()">{{__('combo.delete')}}</button>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
