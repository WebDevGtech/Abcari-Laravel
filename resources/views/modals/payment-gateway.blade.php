
<!-- __add rule__ -->
<div wire:ignore.self  class="modal fade" id="addpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('paymentgateway.selectpaymentgateway')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                             
                                                <div id="mailbox-inbox" class="accordion mailbox-inbox">

                                      
                                        
                                
                                                             
<div class="message-box-scroll ps ps--active-y" id="ct">

    <div class="mail-item draft">
        <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingOne">
            <div class="mb-0">
           
            @foreach($payments as $key => $payment) 
                <div class="mail-item-heading personal collapsed" data-toggle="collapse" role="navigation" aria-expanded="false">
                    <div class="mail-item-inner">
                   
                        <div class="d-flex">
                     
                            <div class="n-chk text-center">
                                <label class="new-control new-checkbox checkbox-primary">
                                  <input type="checkbox" value="{{$payment->id}}" wire:model="selectpayment.{{$key}}" class="new-control-input " >
                                  <span class="new-control-indicator"></span>
                                </label>
                            </div>
                          
                            <div class="f-body"  >
                                <div class="meta-mail-time">
                                    <p>{{$payment->displayname}}</p>
                                </div>
                               
                            </div>
                        </div>
                    
                    </div>
                </div>
              
                @endforeach
            </div>
        </div>
    </div>



</div>


</div>
                                           

                                                </div>
                                                <div class="modal-footer">
                                                <button class="btn" id="addClosepayment" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('paymentgateway.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="sumbitForm()">{{__('paymentgateway.save')}}</button>
                                                </div>




                                                </div>
                                                </div>
                                                </div>
                                               
<!-- __delete__ -->
<div wire:ignore.self  class="modal fade" id="deletepayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('paymentgateway.deletepayment')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                <p>{{__('paymentgateway.wanttodelete')}} {{__('paymentgateway.questionmark')}}
                                                </div>
                                              
                                                <div class="modal-footer">
                                                    <button class="btn" id="deleteClosepayment" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('paymentgateway.discard')}}</button>
                                                    <button type="button" class="btn btn-primary" wire:click="deleteForm()">{{__('paymentgateway.delete')}}</button>
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                