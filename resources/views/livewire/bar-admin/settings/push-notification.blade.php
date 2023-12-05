<div>
<div class="layout-px-spacing">
                
                <div class="row layout-top-spacing" id="cancel-row">
                
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                        <div class="row m-2 ">
                <h4 class="modal-title " id="exampleModalLabel">{{ __('pushnotification.pushnotification')}}</h4>
                            

             
                                
                <div class="col-sm-3  ml-auto">
                                        <input id="search-text" type="search" class="form-control mb-1 mr-5" wire:model="search"  placeholder="Search PushNotification" >
                                        </div> 
                                        <button class="btn btn-outline-primary mb-2" data-toggle="modal" data-target="#addpush">{{__('pushnotification.addsend')}}</button>
                                       
                                      
                                   
                                </div> 

@include('modals.push-notification')


                            <table id="zero-config" class="table table-bordered table-hover table-condensed" style="width:100%">
                                <thead>
                                    <tr>

                                        <th class="text-center">{{__('pushnotification.s.no')}}</th> 
                                        <th class="text-center">{{__('pushnotification.title')}}</th>
                                        <th class="text-center">{{__('pushnotification.body')}} </th>
                                        <th class="text-center">{{__('pushnotification.image')}}</th>
                                        <th class="text-center">{{__('pushnotification.type')}} </th>
                                        <th class="text-center">{{__('pushnotification.url')}} </th>
                                        <th class="text-center">{{__('pushnotification.category')}}</th>
                                    </tr>
                                </thead>
                                @if(count($pushnotifications) >0)
                                <tbody>
                                    @foreach($pushnotifications as $pushnotification)
                                    <tr>
                                        <td class="text-center">{{$loop->index+1}}</td>
                                        <td class="text-center">{{$pushnotification->title}}</td>
                                        <td class="text-center">{{$pushnotification->body}}</td>
                                        <td class="text-center"><img src="{{Storage::url($pushnotification->image);}}" width="100" height="50"/></td>
                                        <td class="text-center">@if($pushnotification->type == 1)
                      
                                                <p class="text-center">{{__('pushnotification.news')}}</p>
                                        @elseif($pushnotification->type == 2)
                                              <p class="text-center">{{__('pushnotification.promotional')}}</p>
                                       @elseif($pushnotification->type == 3)
                                             <p class="text-center">{{__('pushnotification.app')}}</p>
                                             @endif</td>
                                        <td class="text-center">{{$pushnotification->url }}</td>
                                        <td class="text-center">{{$pushnotification->category}}</td>
                                       
                                           </tr>
                                   @endforeach
                                </tbody>
@else
<tbody>
            <tr>
              <td colspan="7">
              
            <center>{{__('pushnotification.norecordfound')}}</center>
                
                </td></tr>
                </tbody>
            @endif
          

                            </table>
                           {{$pushnotifications->links('vendor.livewire.bootstrap')}}
                        </div>
                    </div>

                </div>

            </div>
           

</div>

<script>
     window.addEventListener('modalClose', event => {
    
    $('#addClosepush').click()
  })
  </script> 