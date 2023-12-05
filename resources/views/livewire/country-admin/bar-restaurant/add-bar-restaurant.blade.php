<div class="layout-px-spacing">
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row m-2 ">
                    <h4 class="modal-title" id="exampleModalLabel">{{ __('addbarRestaurant.addbarRestaurant') }}</h4>
                    <div class="col-sm-3  ml-auto">
                        {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                    </div>
                    <a
                        href="{{ route('view-bar-restaurant') }}"class="btn btn-outline-primary ml-1 mb-1">{{ __('addbarRestaurant.toview') }}</a>
                </div>
                <div class="form-row mb-4">
                   
                  
                  
                    <div class="col-sm-4 p-3">
                        <label> {{ __('addbarRestaurant.restaurantname') }}</label>
                        <input type="text" wire:model="restaurantname" placeholder="Restaurant name"
                            class="form-control">
                        @error('restaurantname')
                            <span class='error text-danger'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.bartieup') }}</label>
                        <select wire:model="bartieup" class="form-control">
                            <option value="">{{ __('addbarRestaurant.selectbartieup') }}</option>
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
                        <label>{{ __('addbarRestaurant.barbucket') }}</label>
                        <select wire:model="bucket" class="form-control">
                            <option value="">{{ __('addbarRestaurant.selectbarbucket') }}</option>
                            @foreach ($barbucket as $barbuckets)
                                <option value="{{ $barbuckets->id }}">
                                    {{ $barbuckets->name }}</option>
                            @endforeach
                        </select>
                        @error('bucket')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.openinghours') }}</label>
                        <input type="time" class="form-control" wire:model="openinghours" placeholder="Open Hours">
                        @error('openinghours')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.closinghours') }}</label>
                        <input type="time" class="form-control" wire:model="closinghours"
                            placeholder="Closing Hours">
                        @error('closinghours')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                {{--    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.peakhours') }}</label>
                        <input type="time" class="form-control" wire:model="peakhours" placeholder="Peak Hours">
                        @error('peakhours')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}

                   
                   

                    <div class="col-sm-4  p-3">
                        <label> {{ __('addbarRestaurant.latitude') }} </label>
                        <input type="text" class="form-control" wire:model="latitude" placeholder="Latitude">
                        @error('latitude')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-4  p-3">
                        <label> {{ __('addbarRestaurant.longitude') }} </label>
                        <input type="text" class="form-control" wire:model="longitude" placeholder="Longitude">
                        @error('longitude')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-sm-4  p-3">
                        <label> {{ __('addbarRestaurant.image') }}</label>
                        <input type="file" class="form-control" wire:model="image" placeholder="Image">
                        @error('image')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.bannerimage') }}</label>
                        <input type="file" class="form-control" wire:model="bannerimage" placeholder="Banner Image">
                        @error('bannerimage')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-sm-4 p-3">
                        <label> {{ __('addbarRestaurant.address') }} </label>
                        <textarea type="text" class="form-control" wire:model="address" placeholder="address"></textarea>
                        @error('address')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-sm-4 p-3">
                        <label> {{ __('addbarRestaurant.description') }} </label>
                        <textarea type="text" class="form-control" wire:model="description" placeholder="Description"></textarea>
                        @error('description')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
{{--
                    <div class="n-chk col-sm-4  p-3">
                    <label>Do You know Pincode?</label><br>
                    <label class="new-control new-checkbox checkbox-success " for="yes"
                                        >

                                        <input type="checkbox" wire:model="yes" class="new-control-input"
                                            id="yes"   value="1"> 
      <span class="new-control-indicator"></span>Yes
    </label>
   
</div>



                    @if($yes==1)
                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.postcode') }}</label>
                        <select wire:model="postcoded" class="form-control">
                            <option value="">{{ __('addbarRestaurant.selectpostcode') }}</option>
                      
                            @foreach ($postcodes as $postcode)
                                <option value="{{ $postcode->id }}">
                                    {{ $postcode->code }}</option>
                            @endforeach

                        </select>
                        @error('postcoded')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>
                   
                    @else --}}
                 <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.zone') }}</label>
                        <select wire:model="zone_id" class="form-control"  wire:change="city_list($event.target.value)">
                            <option value="">{{ __('addbarRestaurant.selectzone') }}</option>
                          
                            @foreach ($zone_list as $zone)
                                <option value="{{ $zone->id }}">
                                    {{ $zone->name }}</option>
                            @endforeach
                          
                        </select>
                        @error('zone_id')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div> 
                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.city') }}</label>
                        <select wire:model="city_id" class="form-control"  wire:change="postcode_list($event.target.value)">
                            <option value="">{{ __('addbarRestaurant.selectcity') }}</option>
                          @if($cities)
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">
                                    {{ $city->name }}</option>
                            @endforeach
                          @endif
                        </select>
                        @error('city')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="col-sm-4  p-3">
                        <label>{{ __('addbarRestaurant.postcode') }}</label>
                        <select wire:model="postcoded" class="form-control">
                            <option value="">{{ __('addbarRestaurant.selectpostcode') }}</option>
                           
                            @foreach ($postcodes as $postcode)
                                <option value="{{ $postcode->id }}">
                                    {{ $postcode->code }}</option>
                            @endforeach

                        </select>
                        @error('postcoded')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>

                   {{-- @endif --}}

                    <div class="col-sm-4  p-3" wire:ignore>
                        <label>{{ __('addbarRestaurant.barcategory') }}</label>
                        <select wire:model="barcategory"  id="category"  multiple="multiple" >
                          
                            @foreach ($category as $categorys)
                                <option value="{{ $categorys->id }}">
                                    {{ $categorys->name }}</option>
                            @endforeach
                        </select>
                        @error('barcategory')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-sm-4  p-3" wire:ignore>
                    <label>{{ __('addbarRestaurant.barservice') }}</label>
                        <select wire:model="barservice"  id="service"  multiple="multiple"  >
                           
                            @foreach ($service as $services)
                                <option value="{{ $services->id }}">
                                    {{ $services->name }}</option>
                            @endforeach
                        </select>
                        @error('barservice')
                            <span class="text-danger error">{{ $message }}</span>
                        @enderror
                    </div>
                   
                   
                </div>
                <h4>Bar Crendtials</h4>
<div class="form-row mb-4">
  
<div class="col-sm-4 p-3">
                        <label>{{ __('addbarRestaurant.adminname') }}</label>
                        <input type="text" wire:model="name" placeholder="name" class="form-control">
                        @error('name')
                            <span class='error text-danger'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-4 p-3">
                        <label>{{ __('addbarRestaurant.email') }}</label>
                        <input type="email" wire:model="email"placeholder="email@mail.com" class="form-control">
                        @error('email')
                            <span class='error text-danger'>{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-4 p-3">
                        <label>{{ __('addbarRestaurant.password') }}</label>
                        <input type="password" wire:model="password" placeholder="password" class="form-control" max-length="8">
                        @error('password')
                            <span class='error text-danger'>{{ $message }}</span>
                        @enderror
                    </div>
</div>




                <div class="row">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-1">
                        <button class="btn btn-outline-primary ml-1 mb-1"
                            wire:click.prevent="submit">To&nbspAdd</button>
                    </div>
                </div>
            </div>

        </div>

    </div>


</div>
{{--
@push('scripts')
    <script>
       $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
@endpush
--}}


@push('js')
<script>
 $(function(){
   $('#category').select2({
     theme:'bootstrap4',
   
   }).on('change',function(){
     @this.set('barcategory',$(this).val())
   });
 })

     $(function(){
       $('#service').select2({
         theme:'bootstrap4',
        
       }).on('change',function(){
      
         @this.set('barservice',$(this).val())
       });
     })
     </script>

@endpush

   