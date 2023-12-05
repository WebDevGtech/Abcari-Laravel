<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('paymentgateway.paymentgateway')}}</h4>
                            

             
                                
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search Payment Gateways.." >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addpayment">{{__('paymentgateway.addpaymentgateway')}}</button>
                                       
                                      
                                   
                                </div> 

@include('modals.payment-gateway')


                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>
                                        <th  class="text-center">{{__('paymentgateway.s.no')}}</th>
                                        <th  class="text-center">{{__('paymentgateway.name')}}</th>
                                      
                                        <th  class="text-center">{{__('paymentgateway.status')}}</th>
                                      
                                        <th  class="text-center">{{__('paymentgateway.action')}}</th>
                                    </tr>
                                </thead>
                                @if(count($barpayments) >0)
                                <tbody>
                                    @foreach($barpayments as $barpayment)
                                    <tr>
                                        <td  class="text-center">{{$loop->index+1}}</td>
                                       
                                        
                                        <td  class="text-center">{{$barpayment->paymentgateway->displayname}}</td>
                                       <td  class="text-center"> 
                                            <label class="switch s-success   mr-2 mt-3" for="{{$barpayment->id}}">
                                                <input type="checkbox"  {{$barpayment->status== '1' ? 'checked':''}}
                  wire:click="updateStatus($event.target.checked,'{{$barpayment->id
                  }}')"  id="{{$barpayment->id}}">
                                                <span class="slider round"></span>
                                            </label>
                                       </td>
                                      
                                        <td  class="text-center">
                                                            <a href="" data-toggle="modal" data-placement="top" data-target="#deletepayment" wire:click="deleteId({{$barpayment->id}})" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a> </td>
                                    </tr>
                                   @endforeach
                                </tbody>
@else
<tbody>
            <tr>

              <td colspan="4" >
             
            <center>{{__('paymentgateway.norecordfound')}}</center>
              
                </td>
            </tr>
                </tbody>
            @endif
          

                            </table>
                           {{$barpayments->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>

<script>
     window.addEventListener('modalClose', event => {
    
    $('#addClosepayment').click()
  })
  window.addEventListener('modalClose', event => {
    
    $('#deleteClosepayment').click()
  })
  </script> 