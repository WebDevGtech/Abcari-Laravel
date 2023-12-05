{{-- view restaurant modal --}}

<div wire:ignore.self class="modal fade bd-example-modal-xl show" id="viewrestaurant" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myExtraLargeModalLabel">Bar Restaurant Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
              </button>
          </div>
          <div class="modal-body">
            <div class="form-row ">

                <div class="col-sm-4 p-3">
                    <label> Restaurant Name</label>
                    <h3 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $restaurantname }}</b></h3>
                </div>
                  <div class="col-sm-4  p-3">
                     <label>Admin Name</label>  
                   
                     <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{$adminname}} </b></h2>
              
                    </div>

                    <div class="col-sm-4  p-3">
                      <label>Bar Bucket</label>
                    <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $barbucket }}</b></h2>
                  </div>
                 <div class="col-sm-4  p-3">
                    <label>Bar Category</label>
                    <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $barcategory }} </b></h2>
                      
                              </div>
                   

 
                <div class="col-sm-4  p-3">
                    <label>Bar Service</label>
                    <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $barservice }}</b></h2>
                 </div>
                <div class="col-sm-4  p-3">
                    <label>Bar Tie Up</label>
                  <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $bartieup }}</b></h2>
                </div>

                <div class="col-sm-4  p-3">
                    <label>Bucket Reward Point</label>
                  <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $barreward }}</b></h2>
                </div>
                <div class="col-sm-4  p-3">
                  <label>Bucket Redeem Point</label>
                <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $barredeem }}</b></h2>
              </div>
                <div class="col-sm-4  p-3">
                  <label>Postcode</label>
                <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $postcode }}</b></h2>
              </div>
              <div class="col-sm-4  p-3">
                <label>opening hours</label>
              <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $openinghours }}</b></h2>
            </div>
            <div class="col-sm-4  p-3">
              <label>closing hours</label>
            <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $closinghours }}</b></h2>
          </div>
          <div class="col-sm-4  p-3">
            <label>peak hours</label>
          <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $peakhours }}</b></h2>
        </div>


                        <div class="col-sm-4  p-3">
                            <label> Latitude </label>
                         <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $latitude }}</b></h2>  
                        </div>

                            <div class="col-sm-4  p-3">
                                <label> longitude </label>
                               <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $longitude }}</b></h2>   
                            </div>

                                <div class="col-sm-4 p-3">
                                    <label> description </label>
                                   <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $description }}</b></h2>  
                                 </div>

                              
                                 <div class="col-sm-4 p-3">
                                  <label>address</label>
                                  <h2 style="color: rgba(24, 228, 243, 0.658)"><b>{{ $address }}</b></h2>  
                                  <div>
                
                                 <div class="col-sm-4 p-3">
                    <label> Image</label>
                    <div class="m-4 mr-auto">
                   <img src="{{ $image }}" width="180" height="100">
                </div></div>

                <div class="col-sm-4 p-3">
                        <label > Banner Image </label>
                        <div class="m-4 ">
                     <img src="{{ $bannerimage }}" width="180" height="100">
                        
                        </div>
                </div>
                      
              
            
          </div>
         

         
           
          
      </div>
    </div>
  </div>
</div>