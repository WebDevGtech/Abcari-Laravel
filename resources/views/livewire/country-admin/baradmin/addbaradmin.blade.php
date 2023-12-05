<div>
    <div>
        <div class="layout-px-spacing">
                        
                        <div class="row layout-top-spacing" id="cancel-row">
                        
                            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                <div class="widget-content widget-content-area br-6">
                                <div class="row m-2 ">
                        <h4 class="modal-title" id="exampleModalLabel">Add Bar Admin</h4>
                                    
        
                     
                                        
                                               <div class="col-sm-3  ml-auto">
                                                {{-- <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Tax.." > --}}
                                                </div> 
                                                <a href="{{ route('view-bar-admins') }}"class="btn btn-primary btn-rounded  btn-sm">To View</a>
                                              
                                           
                                        </div> 
        
      
                                        <div class="form-row mb-4">
                                            <div class="col-sm-4 p-3">
                                                <label>Name</label>
                                                <input type="text"  wire:model.defer="name" placeholder="name" class="form-control" >
                                              @error('name')
                                                  <span class='error text-danger'>{{ $message }}</span>
                                              @enderror
                                            </div>
                                            <div class="col-sm-4 p-3">
                                                <label>Email</label>
                                                <input type="email" wire:model.defer="email"placeholder="email@mail.com" class="form-control" >
                                                @error('email')
                                                <span class='error text-danger'>{{ $message }}</span>
                                            @enderror
                                                 
                                            </div>
                                            <div class="col-sm-4 p-3">
                                                <label>Password</label>
                                                <input type="password"  wire:model.defer="password" placeholder="password" class="form-control" >
                                                @error('password')
                                                <span class='error text-danger'>{{ $message }}</span>
                                            @enderror
                                            </div>
                                            
                                        <div class="col-sm-4 p-3">
                                            {{-- <label>Country</label>
                                            <input type="text"  disabled class="form-control" >
                                            --}}
                                        </div>
                                        <div class="col-sm-4 p-3">
                                            {{-- <label>state</label>
                                            <input type="text"  disabled class="form-control" >
                                           --}}
                                        </div>
                                        <div class="col-sm-4 p-3">
                                            {{-- <label>Pincode</label>
                                            <input type="text"  disabled class="form-control" > --}}
                                          
                                        </div>

                                       
                            
                                      </div>
                                    <button class="btn btn-primary btn-rounded mb-2 btn-sm" wire:click.prevent="new"> To Add</button>
                            </div>
        
                        </div>
        
                    </div>
                   
        
        </div>
</div>
<script>
     window.addEventListener('addadmin', event => {
      $('#').click()
    })
</script>
  



        
              
                  



