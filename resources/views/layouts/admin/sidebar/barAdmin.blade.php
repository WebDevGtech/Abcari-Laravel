  <!--  BEGIN SIDEBAR  -->
  <div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu">
                <a href="{{route('bar-admin-dashboard')}}" data-active="true"aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>{{ __('SideBar.dashboard') }}</span>
                    </div>
                </a>
            </li>
            {{-- <li class="menu">
                <a href="{{route('bar-admin-dashboard')}}" data-active="true" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                    <li>
                        <a href="index.html"> Sales </a>
                    </li>
                    <li class="active">
                        <a href="index2.html"> Analytics </a>
                    </li>
                </ul>
            </li> --}}

            <li class="menu">
                <a href="#app" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='product'?'true':'false'}}" class="{{Request::segment('2')=='product'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>{{__('SideBar.product')  }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='product'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="app" data-parent="#accordionExample">

                <li  class="{{Request::segment('3')=='view-product'?'active':null}}">
                        <a href="{{route('view-product')}}">{{ __('SideBar.viewproduct') }} </a>
                    </li>

                <li  class="{{Request::segment('3')=='add-product'?'active':null}}">
                        <a href="{{route('add-product')}}"> {{ __('SideBar.addproduct') }} </a>
                    </li>


                </ul>
            </li>
         {{--   <li class="menu">
                <a href="{{route('order')}}" aria-expanded="{{Request::segment('2')=='order'?'true':'false'}}"  class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
                        <span>{{ __('SideBar.order') }}</span>
                    </div>

                </a>

            </li> --}}

            <li class="menu">
                <a href="#order" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='order'?'true':'false'}}" class="{{Request::segment('2')=='order'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
                        <span>{{ __('SideBar.order') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='order'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="order" data-parent="#accordionExample">

                <li  class="{{Request::segment('2')=='order'?'active':null}}">
                        <a href="{{route('bar-order')}}">{{ __('SideBar.new') }} </a>
                    </li>

                <li  class="{{Request::segment('3')=='prepare-order'?'active':null}}">
                        <a href="{{route('bar-prepare-order')}}"> {{ __('SideBar.prepare') }} </a>
                    </li>
                    <li  class="{{Request::segment('3')=='ready-to-serve'?'active':null}}">
                        <a href="{{route('bar-ready-to-serve')}}"> {{ __('SideBar.readytoserve') }} </a>
                    </li>
                    <li  class="{{Request::segment('3')=='served-order'?'active':null}}">
                        <a href="{{route('bar-served-order')}}"> {{ __('SideBar.served') }} </a>
                    </li>
                    <li  class="{{Request::segment('3')=='cancel-order'?'active':null}}">
                        <a href="{{route('bar-cancel-order')}}"> {{ __('SideBar.cancel') }} </a>
                    </li>

                </ul>
            </li>
     {{--       <li class="menu">
                <a href="{{route('order-invoice')}}" aria-expanded="{{Request::segment('2')=='orderinvoice'?'true':'false'}}"  class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
                        <span>{{ __('SideBar.orderinvoice') }}</span>
                    </div>

                </a>

            </li> --}}
            <li class="menu">
                <a href="#invoice" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='orderinvoice'?'true':'false'}}" class="{{Request::segment('2')=='orderinvoice'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M22 17H2a3 3 0 0 0 3-3V9a7 7 0 0 1 14 0v5a3 3 0 0 0 3 3zm-8.27 4a2 2 0 0 1-3.46 0"></path></svg>
                        <span>{{ __('SideBar.orderinvoice') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='orderinvoice'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="invoice" data-parent="#accordionExample">

                <li  class="{{Request::segment('2')=='orderinvoice'?'active':null}}">
                        <a href="{{route('order-invoice')}}">{{ __('SideBar.new') }} </a>
                    </li>

                <li  class="{{Request::segment('3')=='approved-invoice'?'active':null}}">
                        <a href="{{route('approved-order-invoice')}}"> {{ __('SideBar.approved') }} </a>
                    </li>
                    {{-- <li  class="{{Request::segment('3')=='cancel-invoice'?'active':null}}">
                        <a href="{{route('cancel-order-invoice')}}"> {{ __('SideBar.cancel') }} </a>
                    </li> --}}

                </ul>
            </li>
            <li class="menu">
                <a href="#happyhour" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='bar-time'?'true':'false'}}" class="{{Request::segment('2')=='bar-time'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        <span>{{ __('SideBar.bartime') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='bar-time'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="happyhour" data-parent="#accordionExample">
                    <li class="{{Request::segment('3')=='happy-hour'?'active':null}}">
                        <a href="{{route('happy-hour')}}">{{ __('SideBar.happyhour') }} </a>
                    </li>

                    <li class="{{Request::segment('3')=='peak-hour'?'active':null}}">
                        <a href="{{route('peak-hour')}}"> {{ __('SideBar.peakhour') }}</a>
                    </li>

                </ul>
            </li>

            <li class="menu">
                <a href="#elements" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='offer'?'true':'false'}}" class="{{Request::segment('2')=='offer'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>{{ __('SideBar.offers') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='offer'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="elements" data-parent="#accordionExample">
             {{--   <li class="{{Request::segment('3')=='banner'?'active':null}}">
                        <a href="{{route('banner')}}"> {{ __('SideBar.banner') }} </a>
                    </li> --}}

                <li class="{{Request::segment('3')=='combo'?'active':null}}">
                        <a href="{{route('combo')}}"> {{ __('SideBar.combos') }} </a>
                    </li>

                      <li class="{{Request::segment('3')=='coupon'?'active':null}}">
                        <a href="{{route('coupon')}}"> {{ __('SideBar.coupons') }} </a>
                    </li>
               <li class="{{Request::segment('3')=='offer'?'active':null}}">
                        <a href="{{route('offer')}}"> {{ __('SideBar.offer') }} </a>
                    </li>


                </ul>
            </li>





            <li class="menu">
                <a href="{{route('rating-review')}}" aria-expanded="{{Request::segment('2')=='rating-review'?'true':'false'}}"  class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg>
                        <span>{{__('SideBar.ratingandreviews')  }}</span>
                    </div>

                </a>
            </li>

            <li class="menu">
                <a href="{{route('transaction')}}" aria-expanded="{{Request::segment('2')=='transaction'?'true':'false'}}"  class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M3 17v3a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-3"></path><polyline points="16 6 12 2 8 6"></polyline><line x1="12" y1="2" x2="12" y2="16"></line></svg>
                        <span>{{__('SideBar.transaction')  }}</span>
                    </div>

                </a>
            </li>

            <li class="menu">
                <a href="#rewardpoints" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='reward-points'?'true':'false'}}" class="{{Request::segment('2')=='reward-points'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        <span>{{__('SideBar.rewardpoints')  }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='reward-points'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="rewardpoints" data-parent="#accordionExample">

                <li class="{{Request::segment('3')=='reward-transaction'?'active':null}}">
                <a href="{{route('reward-transaction')}}">  {{ __('SideBar.rewardpointransaction') }}  </a>
                    </li>
                   
            </ul>
            </li>


            <li class="menu">
                <a href="#settings" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='settings'?'true':'false'}}" class="{{Request::segment('2')=='settings'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                        <span>{{ __('SideBar.settings') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='settings'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="settings" data-parent="#accordionExample">



                    <li class="{{Request::segment('3')=='payment-gateway'?'active':null}}">
                        <a href="{{route('bar-payment-gateway')}}"> {{ __('SideBar.paymentgateway') }} </a>
                    </li>

                    <!-- <li class="{{Request::segment('3')=='tax-type'?'active':null}}">
                        <a href="{{route('tax-type')}}">{{ __('SideBar.taxtype') }} </a>
                    </li> -->
                    <li class="{{Request::segment('3')=='push-notification'?'active':null}}">
                        <a href="{{route('push-notification')}}">{{ __('SideBar.pushnotification') }} </a>
                    </li>

                </ul>
            </li>


            <li class="menu">
                <a href="#barsettings" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='bar-setting'?'true':'false'}}" class="{{Request::segment('2')=='bar-setting'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                        <span>{{ __('SideBar.barsetting') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='bar-setting'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="barsettings" data-parent="#accordionExample">



                    <li class="{{Request::segment('3')=='rules'?'active':null}}">
                        <a href="{{route('rules')}}"> {{ __('SideBar.rules') }} </a>
                    </li>

                    <li class="{{Request::segment('3')=='waiter-details'?'active':null}}">
                        <a href="{{route('waiter-details')}}">{{ __('SideBar.waiterdetails') }} </a>
                    </li>


                </ul>
            </li>




            <li class="menu">
                <a href="#report" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='report'?'true':'false'}}" class="{{Request::segment('2')=='report'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                        <span>{{ __('SideBar.report') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='report'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="report" data-parent="#accordionExample">
                    <li class="{{Request::segment('3')=='total-sale'?'active':null}}">
                        <a href="{{route('total-sale')}}">{{ __('SideBar.totalsale') }} </a>
                    </li>
                    <!-- <li class="{{Request::segment('3')=='brand'?'active':null}}">
                        <a href="{{route('brand')}}"> {{ __('SideBar.brand') }} </a>
                    </li> -->
                    <li class="{{Request::segment('3')=='liquor'?'active':null}}">
                        <a href="{{route('liquor')}}"> {{ __('SideBar.liquor') }} </a>
                    </li>
                    <li class="{{Request::segment('3')=='food'?'active':null}}">
                        <a href="{{route('food')}}"> {{ __('SideBar.food') }} </a>
                    </li>
                </ul>
            </li>



       {{-- <li class="menu">
                <a href="{{route('bar_sitesetting')}}" aria-expanded="{{Request::segment('2')=='bar_sitesetting'?'true':'false'}}"  class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>{{__('Sidebar.sitesettings')  }}</span>
                    </div>
            </li> --}}
    </nav>

</div>
<!--  END SIDEBAR  -->
