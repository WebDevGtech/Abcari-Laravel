
<div class="layout-px-spacing">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
            <div class="row m-2 ">
                  
                    <div class="col-sm-3  ml-auto">
                        {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                    </div>
                     </div>
            
                <div class="form-row mb-4">
                    <div class="col-sm-4 p-3">
                        <label>{{ __('viewbarRestaurant.restaurantname') }}</label>
                        <input type="text" wire:model="restaurantname" placeholder="restaurant name"
                            class="form-control">
                        @error('restaurantname')
                            <span class='error text-danger'>{{ $message }}</span>
                        @enderror
                    </div>



                    
                          
                   
                    <div class="col-sm-4  p-3"   wire:ignore>
                        <label>{{ __('viewbarRestaurant.barcategory') }}</label>
                      
                        <select wire:model="edit_barcategory" id="edit_category"  multiple="multiple" >
                            
                          
                            @foreach ($categories as $category)
                           
                                <option value="{{ $category->id }}" >
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                       
                        @error('edit_barcategory')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>
                   
                    <div class="col-sm-4  p-3"  wire:ignore>
                        <label>{{ __('viewbarRestaurant.barservice') }}</label>
                        <select wire:model="edit_barservice"  id="edit_service"  multiple="multiple">
                            <option value="">{{ __('viewbarRestaurant.selectbarservice') }}</option>
                         
                            @foreach ($service as $services)
                                <option value="{{ $services->id }}">
                                    {{ $services->name }}</option>
                            @endforeach
                        </select>
                        @error('edit_barservice')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-sm-4  p-3" >
                        <label>{{ __('viewbarRestaurant.bartieup') }}</label>
                        <select wire:model="bartieup" class="form-control" >
                            <option value="">{{ __('viewbarRestaurant.selectbartieup') }}</option>
                            @foreach ($tieup as $tieups)
                                <option value="{{ $tieups->id }}">
                                    {{ $tieups->name }}</option>
                            @endforeach
                        </select>
                        @error('bartieup')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-sm-4  p-3">
                        <label>{{ __('viewbarRestaurant.barbucket') }}</label>
                        <select wire:model="barbucket" class="form-control">
                            <option value="">{{ __('viewbarRestaurant.selectbarbucket') }}</option>
                            @foreach ($bucket as $buckets)
                                <option value="{{ $buckets->id }}">
                                    {{ $buckets->name }}</option>
                            @endforeach
                        </select>
                        @error('barbucket')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>


      

                    <div class="col-sm-4  p-3">
                        <label> {{ __('viewbarRestaurant.openinghours') }}</label>
                        <input type="time" class="form-control" wire:model="openinghours">
                        @error('openinghours')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-4  p-3">
                        <label>{{ __('viewbarRestaurant.closinghours') }}</label>
                        <input type="time" class="form-control" wire:model="closinghours">
                        @error('closinghours')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                 {{--   <div class="col-sm-4  p-3">
                        <label>{{ __('viewbarRestaurant.peakhours') }}</label>
                        <input type="time" class="form-control" wire:model="peakhours">
                        @error('peakhours')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                    <div class="col-sm-4  p-3">
                        <label>{{ __('viewbarRestaurant.latitude') }} </label>
                        <input type="text" class="form-control" wire:model="latitude" placeholder="Latitude">
                        @error('latitude')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-4  p-3">
                        <label> {{ __('viewbarRestaurant.image') }}</label>
                        <input type="file" class="form-control" wire:model="image">
                        @error('image')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror


                        {{-- <img src="{{ Storage::url($image) }}" width="200" height="100" /> --}}
                    </div>
                    <div class="col-sm-4  p-3">
                        <label> {{ __('viewbarRestaurant.bannerimage') }} </label>
                        <input type="file" class="form-control" wire:model="bannerimage" placeholder="Banner Image">
                        @error('bannerimage')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror

                        {{-- <img src="{{ Storage::url($bannerimage) }}" width="200" height="100" /> --}}
                    </div>



                    <div class="col-sm-4  p-3">
                        <label> {{ __('viewbarRestaurant.longitude') }} </label>
                        <input type="text" class="form-control" wire:model="longitude" placeholder="Longitude">
                        @error('longitude')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.city') }}</label>
                        <select wire:model="city_id" class="form-control">
                            <option value="">{{ __('addbarRestaurant.selectcity') }}</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">
                                    {{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                </div>
                <div class="col-sm-4 p-3">
                        <label> {{ __('viewbarRestaurant.description') }} </label>
                        <textarea type="text" class="form-control" wire:model="description" placeholder="Description"></textarea>
                        @error('description')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-4 p-3">
                        <label> {{ __('viewbarRestaurant.address') }} </label>
                        <textarea type="text" class="form-control" wire:model="address" placeholder="Address"></textarea>
                        @error('address')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
  


                <div class="modal-footer">

                    <button class="btn" id="editmodalClose" data-dismiss="modal"><i
                            class="flaticon-cancel-12"></i>{{ __('viewbarRestaurant.discard') }}</button>
                    <button type="button" wire:click="submit"
                        class="btn btn-primary">{{ __('viewbarRestaurant.update') }}</button>
                </div>
            </div>
            </div>
    </div>
</div>
<script>


//  $(function(){
//    $('#edit_category').select2({
//      theme:'bootstrap4',
    
//    }).on('change',function(){
   
//      @this.set('edit_barcategory',$(this).val())
//    });
//  })

    //  $(function(){
    //    $('#edit_service').select2({
    //      theme:'bootstrap4',
        
    //    }).on('change',function(){
      
    //      @this.set('edit_barservice',$(this).val())
    //    });
    //  })
     </script>

</div>

@push('js')
<script>
$(document).ready(function() {
    // Initialize Select2 plugin
    $('#edit_category').select2();
    
    // Listen for Livewire updates
    Livewire.on('updated', function() {
        // Get updated selected values
        var selectedValues = @json($edit_barcategory);
        
        // Update Select2 plugin
        $('#edit_category').val(selectedValues).trigger('change');
    });
    
    // Listen for Select2 changes
    $('#edit_category').on('change', function() {
        // Update Livewire component
        @this.set('edit_barcategory', $(this).val());
    });
});
$(document).ready(function() {
    // Initialize Select2 plugin
    $('#edit_service').select2();
    
    // Listen for Livewire updates
    Livewire.on('updated', function() {
        // Get updated selected values
        var selectedValues = @json($edit_barservice);
        
        // Update Select2 plugin
        $('#edit_service').val(selectedValues).trigger('change');
    });
    
    // Listen for Select2 changes
    $('#edit_service').on('change', function() {
        // Update Livewire component
        @this.set('edit_barservice', $(this).val());
    });
});

    //  $(function(){
    //    $('#edit_service').select2({
    //      theme:'bootstrap4',
        
    //    }).on('change',function(){
      
    //      @this.set('edit_barservice',$(this).val())
    //    });
    //  })
     </script>

@endpush
