<!-- __ add category__ -->
<div wire:ignore.self class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__('productcategory.addproductcategory')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
            <div class="form-row mb-4">
            <div class="col-sm-6">
                                              <label>{{__('productcategory.barservice')}}</label>
                                              <select wire:model="service_id" class="form-control">
                                                  <option value="">{{__('productcategory.selectservice')}}</option>
                                                  @foreach($services as $service)
                                                  <option value="{{$service->id }}">
                                                      {{$service->name}}</option>
                                                  @endforeach
                                              </select>
                                              @error('service_id') <span class="text-danger error">{{ $message }}</span> @enderror
                          
                                          </div>
            </div>
<div class="form-row mb-4">
    <div class="col">
        <label>{{__('productcategory.categoryname')}}</label>
    <input type="text" class="form-control" wire:model.defer="name" placeholder="Name">
    @error('name') <span class="error text-danger">{{ $message}}</span> @enderror 
    </div>
    <div class="col">
        <label>{{__('productcategory.arabicname')}}</label>
    <input type="text" class="form-control" wire:model.defer="arabic_name" placeholder="Arabic Name">
    @error('arabic_name') <span class="error text-danger">{{ $message}}</span> @enderror 
    </div>
    </div>
    <div class="form-row mb-4">
    <div class="col">
        <label>{{__('productcategory.categoryimage')}}</label>
        <input type="file" class="form-control" wire:model.defer="image" placeholder="Name">
        @error('image') <span class="error text-danger">{{ $message}}</span> @enderror 
        </div>

</div>
<div class="form-row mb-4">
<div class="col-sm-6">
<label class="">{{__('productcategory.isliquor')}}</label>
<div class="">

<label class="switch s-icons s-outline s-outline-primary mr-2 " for="liquor">
                                                           <input type="checkbox" wire:model="liquor" id="liquor"  checked>
                                                           <span class="slider round"></span>
                                                       </label>  
                                                      
                                                      
</div>
</div>
<div class="col-sm-6">
<label class="">  {{__('productcategory.preferred')}}</label> 
<div class="">

<label class="switch s-icons s-outline s-outline-primary mr-2 " for="preferred">
                                                           <input type="checkbox" wire:model="preferred" id="preferred"  checked>
                                                           <span class="slider round"> </span>
                                                       </label>   
                                                      
</div>
</div>
            </div>
            </div>
            <div class="modal-footer">
                
            
                <button class="btn" id="addmodalClose" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('productcategory.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="saveup">{{__('productcategory.update')}}</button>
            </div>
        </div>
    </div>
</div>