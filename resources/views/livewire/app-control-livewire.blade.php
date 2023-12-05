<x-barAdmin-layout>
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-three">
                    <form wire:submit.prevent="update">
               
                    
                        <div class="form-row mb-4 p-3">  
                            <div class="col-sm-4 p-3">
                                <label>{{ __('appcontrol.name') }}</label>
                                <input type="text"   wire:model="name" class="form-control" >
                              @error('name')
                                  <span class="text-danger error">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="col-sm-4 p-3">
                                <label>{{ __('appcontrol.image') }}</label>
                                <input type="text"   wire:model="image"class="form-control" >
                               @error('image')
                                   <span class="text-danger error">{{ $message }}</span>
                               @enderror
                            </div>
                            <div class="col-sm-4 p-3">
                                <label>{{ __('appcontrol.address') }}</label>
                                <input type="text"  wire:model="address"  class="form-control" >
                             @error('address')
                                 <span class="text-danger error">{{ $message }}</span>
                             @enderror
                            </div>
                            <div class="col-sm-4 p-3">
                            <label>{{ __('appcontrol.minimum') }}</label>
                            <input type="number" wire:model="minimum"   class="form-control" >
                            @error('minimum')
                                <span class="text-danger error">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4 p-3">
                            <label>{{ __('appcontrol.maximum') }}</label>
                            <input type="number"   wire:model="maximum" class="form-control" >
                           @error('maxmium')
                               <span class="text-danger error">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="col-sm-4 p-3">
                            <label>{{ __('appcontrol.selling') }}</label>
                            <input type="number"  wire:model="sellingproduct"  class="form-control" >
                           @error('sellingproduct')
                               <span class="text-danger error">{{ $message }}</span>
                           @enderror
                        </div>
                        <div class="col-sm-4 p-3">
                            <label>{{ __('appcontrol.cart') }}</label>
                            <input type="number" wire:model="cart"class="form-control" >
                         @error('cart')
                             <span class="text-danger error">{{ $message }}</span>
                         @enderror
                        </div>

                        <div class="col-sm-4 p-3">
                            <label>{{ __('appcontrol.opening') }}</label>
                            <input type="time"  wire:model="openingtime" class="form-control" >
                         @error('openingtime')
                             <span class="text-danger error">{{ $message }}</span>
                         @enderror
                        </div>
                        <div class="col-sm-4 p-3">
                            <label>{{ __('appcontrol.closing') }}</label>
                            <input type="time"  wire:model="closingtime"class="form-control" >
                         @error('closingtime')
                             <span class="text-danger error">{{ $message }}</span>
                         @enderror
                        </div>
                       </div>
                      

                        <input type="submit" name="time" class="mb-4 ml-3 btn btn-primary">
                    </form>
                        
                 
            </div>
        </div>
</x-barAdmin-layout>

