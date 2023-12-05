<!-- __add sub category__ -->
<div wire:ignore.self class="modal fade " id="addmodal" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">{{__('productsubcategory.addsubcategory')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>
            <div class="modal-body">
           
<div class="form-row mb-4">
  
<div class="col">
        <label>{{__('productsubcategory.subcategoryname')}}</label>
    <input type="text" class="form-control" wire:model="name" placeholder="Name">
    @error('name') <span class="error text-danger">{{ $message}}</span> @enderror 
    </div>
    <div class="col">
        <label>{{__('productsubcategory.arabicname')}}</label>
    <input type="text" class="form-control" wire:model="arabic_name" placeholder="Name">
    @error('arabic_name') <span class="error text-danger">{{ $message}}</span> @enderror 
    </div>
</div>

        
        <div class="form-row mb-4">
              
<div class="col">
        <label>{{__('productsubcategory.subcategoryimage')}}</label>
        <input type="file" class="form-control" wire:model="image" placeholder="Name">
        @error('image') <span class="error text-danger">{{ $message}}</span> @enderror 
        </div>
    <div class="col-6 ">
            <label>{{__('productsubcategory.category')}}</label>
            <select wire:model="categoryid" class="form-control">
                <option value="">{{__('productsubcategory.selectcategory')}}</option>
                @foreach($category as $categorys)
                <option value="{{$categorys->id }}">
                    {{$categorys->name}}</option>
                @endforeach
            </select>
            @error('categoryid') <span class="text-danger error">{{ $message }}</span> @enderror
        
        </div>


            </div>
            <div class="modal-footer">
                
                <button class="btn" id="addmodalClose" data-dismiss="modal"  ><i class="flaticon-cancel-12"></i>{{__('productsubcategory.discard')}}</button>
                <button type="button" class="btn btn-primary" wire:click="saveup">{{__('productsubcategory.save')}}</button>
            </div>
        </div>
    </div>
</div>