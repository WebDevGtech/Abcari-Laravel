
    
<!-- __view product__ -->
<div wire:ignore.self  class="modal fade bd-example-modal-xl show" id="viewproduct" tabindex="-1" role="dialog" aria-labelledby="videoMedia1Label" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <div class="modal-content">
                      <form>
                      <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{__('viewproduct.viewproduct')}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                <div class="modal-body">
                <div class="form-row mb-4">
<div class="col-sm-2">
<label>{{__('viewproduct.productname')}}</label>
  <h5>{{$view_name}}</h5>
</div>
<div class="col-sm-2">
<label>{{__('viewproduct.arabicname')}}</label>
  <h5>{{$view_arabic_name}}</h5>
</div>
<div class="col-sm-2">
<label>{{__('viewproduct.image')}}</label>
  <h5><img src="{{ Storage::url($view_image);}}" width="100" height="100"></h5>
</div>

<div class="col-sm-2 ">
<label>{{__('viewproduct.category')}}</label>

  <h5>{{$view_category}}</h5>
</div>
{{--
<div class="col-sm-2">
<label>{{__('viewproduct.tax')}}</label>
  <h5>{{$view_tax}}</h5>
</div> --}}


<div class="col-sm-2">
<label>{{__('viewproduct.happyhour')}}</label>
  @if($happy_hour == 1)

<h5>{{__('viewproduct.happyhouradd')}}</h5>
@else
<h5>N/A</h5>

@endif
</div>
</div>
@if($view_variation)

@foreach($view_variation as $key =>$value)
<div class="form-row mb-4">


<div class="col-sm-2">
<label>{{__('viewproduct.units')}}</label>
@php
$variation=App\Models\VariationType::where('id',$value['variation_type_id'])->first();
@endphp
  <h5> {{ $variation->value}}</h5>

</div>
<div class="col-sm-2">
<label>{{__('viewproduct.price')}}</label>
  <h5>{{$value['price']}}</h5>
</div>
<div class="col-sm-2">
<label>{{__('viewproduct.ishappyhourprice')}}</label>
@if($value['is_happyhour_price']!=null)
  <h5>{{$value['is_happyhour_price']}}</h5>
  @else
  <h5>N/A</h5>
  @endif

</div>

</div>
@endforeach
@endif


</div>

                
              <div class="modal-footer">
                                                    <button class="btn" id="view" data-dismiss="modal"><i class="flaticon-cancel-12"></i>{{__('viewproduct.discard')}}</button>
                                                  
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
    