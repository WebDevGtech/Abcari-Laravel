<!-- __add product variation__ -->
<div wire:ignore.self class="modal fade " id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__('productvariation.addproductvariation')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
<div class="form-row mb-4">
  
    <div class="col">
        <label>{{__('productvariation.selectproduct')}}</label>
        <select wire:model="productid" class="form-control">
            <option value="">{{__('productvariation.selectproduct')}}</option>
            @foreach($productvariation as $productvariations)
            <option value="{{$productvariations->id }}">
                {{$productvariations->name}}</option>
            @endforeach
        </select>
        @error('productid') <span class="text-danger error">{{ $message }}</span> @enderror
    
    </div>


    
    <div class="col">
        <label>{{__('productvariation.productvariation')}}</label>
        <select wire:model="variationid" class="form-control">
            <option value="">{{__('productvariation.variation')}}</option>
            @foreach($variation as $variations)
            <option value="{{$variations->id }}">
                {{$variations->name}}</option>
            @endforeach
        </select>
        @error('variationid') <span class="text-danger error">{{ $message }}</span> @enderror
    
    </div>
            </div>
    <div class="form-row mb-4">
<div class="col">
        <label> {{__('productvariation.value')}}</label>
    <input type="text" class="form-control" wire:model="value" placeholder="Value">
    @error('value') <span class="error text-danger">{{ $message}}</span> @enderror 
    </div>
   
<div class="col">
        <label>{{__('productvariation.price')}}</label>
        <input type="text" class="form-control" wire:model="price" placeholder="Price">
        @error('price') <span class="error text-danger">{{ $message}}</span> @enderror 
        </div>
</div>
     

        
        


            </div>
            <div class="modal-footer">
               
                <button class="btn" id="addmodalClose" data-dismiss="modal"  ><i class="flaticon-cancel-12"></i>{{__('productvariation.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="saveup">{{__('productvariation.save')}}</button>
            </div>
        </div>
    </div>
</div>