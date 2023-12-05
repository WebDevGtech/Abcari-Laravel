{{-- edit restaurant modal --}}

<div wire:ignore.self class="modal fade bd-example-modal-xl show" id="editmodal" tabindex="-1" role="dialog"
    aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">{{ __('viewbarRestaurant.editbarRestaurant') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
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
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                       
                        @error('barcategory')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>
                   
                    <div class="col-sm-4  p-3" >
                        <label>{{ __('viewbarRestaurant.barservice') }}</label>
                        <select wire:model="edit_barservice"  id="edit_service"  multiple="multiple">
                            <option value="">{{ __('viewbarRestaurant.selectbarservice') }}</option>
                         
                            @foreach ($service as $services)
                                <option value="{{ $services->id }}">
                                    {{ $services->name }}</option>
                            @endforeach
                        </select>
                        @error('barservice')
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

</div>
@push('js')
<script>
 $(function(){
   $('#edit_category').select2({
     theme:'bootstrap4',
    
   }).on('change',function(){
    alert('dsf');
     @this.set('edit_barcategory',$(this).val())
   });
 })

     $(function(){
       $('#edit_service').select2({
         theme:'bootstrap4',
        
       }).on('change',function(){
      
         @this.set('edit_barservice',$(this).val())
       });
     })
     </script>

@endpush
