<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            <li class="menu">
                <a href="{{route('super-admin-dashboard')}}" data-active="true"aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>{{ __('SuperAdminSidebar.dashboard') }}</span>
                    </div>
                </a>
            </li>


            <li class="menu">
                <a href="#users" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='users'?'true':'false'}}" class="{{Request::segment('2')=='users'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>{{ __('SuperAdminSidebar.users') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='users'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="users" data-parent="#accordionExample">
                  {{--  <li>
                        <a href="{{ route('add-admin')}}">{{ __('SuperAdminSidebar.addadmins') }}  </a>
                    </li> --}}

                    <li  class="{{Request::segment('3')=='country-admin'?'active':null}}">
                        <a href="{{ route('country-admin') }}">{{ __('SuperAdminSidebar.countryadmin') }}</a>
                    </li>


                </ul>
            </li>

            <li class="menu">
                <a href="#barsettings" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='bar-settings'?'true':'false'}}" class="{{Request::segment('2')==' bar-settings'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-target"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                        <span>{{ __('SuperAdminSidebar.barsettings') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='bar-settings'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="barsettings" data-parent="#accordionExample">
                  {{--  <li  class="{{Request::segment('3')=='bar-bucket'?'active':null}}">
                        <a href="{{ route('superadmin-bar-bucket') }}">{{ __('SuperAdminSidebar.barbucket') }}</a>
                    </li> --}}
                    <li class="{{Request::segment('3')=='bar-tie-up'?'active':null}}">
                        <a href="{{ route('superadmin-bar-tie-up') }}">{{ __('SuperAdminSidebar.bartieup') }}</a>
                    </li>
                  {{--  <li class="{{Request::segment('3')=='bar-service'?'active':null}}">
                        <a href="{{ route('superadmin-bar-service') }}">{{ __("SuperAdminSidebar.barservice") }}  </a>
                    </li> --}}
                    <li class="{{Request::segment('3')=='bar-category'?'active':null}}">
                        <a href="{{ route('superadmin-bar-category') }}"> {{ __("SuperAdminSidebar.barcategory") }} </a>
                    </li>
                    <li class="{{Request::segment('3')=='bucket-reward-point'?'active':null}}">
                        <a href="{{ route('superadmin-bucket-reward-point') }}">{{ __('SuperAdminSidebar.barbucketrewardpoint') }}</a>
                    </li>
                </ul>
            </li>

              <li class="menu">
                <a href="#places" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='places'?'true':'false'}}" class="{{Request::segment('2')=='places'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                        <span>{{ __('SuperAdminSidebar.places') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='places'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="places" data-parent="#accordionExample">
                    <li class="{{Request::segment('3')=='add-country'?'active':null}}">
                        <a href="{{ route('superadmin-add-country') }}">{{ __('SuperAdminSidebar.country') }} </a>
                    </li>
                    <li class="{{Request::segment('3')=='add-zone'?'active':null}}">
                        <a href="{{ route('superadmin-add-zone') }}">{{ __('SuperAdminSidebar.zone') }}</a>
                    </li>
                    <li class="{{Request::segment('3')=='add-city'?'active':null}}">
                        <a href="{{ route('add-city') }}"> {{ __('SuperAdminSidebar.city') }}</a>
                    </li>
                    <li class="{{Request::segment('3')=='add-post-code'?'active':null}}">
                        <a href="{{ route('add-post-code') }}">{{ __('SuperAdminSidebar.postcode') }}</a>
                    </li>


                </ul>
            </li>

             <!-- <li class="menu">
                <a href="#product" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='product'?'true':'false'}}" class="{{Request::segment('2')=='product'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>{{__('SuperAdminSidebar.product') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                  <ul class="{{Request::segment('2')=='product'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="product" data-parent="#accordionExample">
                    <li class="{{Request::segment('3')=='category'?'active':null}}">
                        <a href="{{ route('superadmin-product-category') }}"> {{__('SuperAdminSidebar.categor')}} </a>
                    </li>                  <li class="{{Request::segment('3')=='sub-category'?'active':null}}">
                        <a href="{{ route('superadmin-product-sub-category') }}">{{ __('SuperAdminSidebar.subcategor') }} </a>
                    </li>
                    {{--
                    <li class="{{Request::segment('3')=='variation'?'active':null}}">
                        <a href="{{ route('superadmin-product-variation') }}"> {{ __('SuperAdminSidebar.productvariation') }}</a>
                    </li> --}}
                    <li class="{{Request::segment('3')=='variation-type'?'active':null}}">
                        <a href="{{ route('superadmin-variation-type') }}"> {{ __('SuperAdminSidebar.variationtype') }}</a>
                    </li>
                </ul>


            </li>
             -->
                  <li class="menu">
                <a href="#settings" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='settings'?'true':'false'}}" class="{{Request::segment('2')=='settings'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>{{ __('SuperAdminSidebar.settings') }}</sEct></span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='settings'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="settings" data-parent="#accordionExample">
                    <li class="{{Request::segment('3')=='payment-gateway'?'active':null}}">
                        <a href="{{ route('superadmin-payment-gateway') }}">{{ __('SuperAdminSidebar.paymentgateway') }} </a>
                    </li>
                    {{-- <li class="{{Request::segment('3')=='order-status'?'active':null}}">
                        <a href="{{ route('superadmin-order-status') }}">{{ __('SuperAdminSidebar.orderstatus') }} </a>
                    </li> --}}
                    <li class="{{Request::segment('3')=='rules'?'active':null}}">
                        <a href="{{ route('superadmin-rules') }}">{{ __('SuperAdminSidebar.rules') }} </a>
                    </li>
                    <li  class="{{Request::segment('3')=='variation'?'active':null}}">
                        <a href="{{route('superadmin-variation-type')  }}"> {{ __('SuperAdminSidebar.units') }}</a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a href="#forms" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='transaction-report'?'true':'false'}}" class="{{Request::segment('2')=='transaction-report'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>{{ __('SuperAdminSidebar.transactionreport') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='transaction-report'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="forms" data-parent="#accordionExample">
                    <li  class="{{Request::segment('3')=='transaction'?'active':null}}">
                        <a href="{{route('superadmin-transaction')}}">{{ __('SuperAdminSidebar.transaction ') }} </a>
                    </li>
                    <li class="{{Request::segment('3')=='reward'?'active':null}}">
                        <a href="{{route('superadmin-reward')}}"> {{ __('SuperAdminSidebar.rewardtransaction ') }}</a>
                    </li>

                    <li class="{{Request::segment('3')=='remove-reward'?'active':null}}">
                <a href="{{route('remove-reward')}}">  {{ __('SideBar.removereward') }}  </a>
                    </li>
                </ul>
            </li>


            <li class="menu">
                <a href="#elements" data-toggle="collapse" aria-expanded="{{Request::segment('2')=='report'?'true':'false'}}" class="{{Request::segment('2')=='report'?'dropdown-toggle collapsed':'dropdown-toggle'}}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        <span>{{ __('SuperAdminSidebar.report') }}</span>
                    </div>
                 <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="{{Request::segment('2')=='report'?'submenu list-unstyled collapse show':'submenu list-unstyled collapse'}}" id="elements" data-parent="#accordionExample">
                    <li class="{{Request::segment('3')=='bar'?'active':null}}">
                        <a href="{{route('superadmin-bar-report')}}">{{ __('SuperAdminSidebar.barreport') }}</a>
                    </li>
                    <li class="{{Request::segment('3')=='liquor'?'active':null}}">
                        <a href="{{route('superadmin-liquor-report')}}">{{ __('SuperAdminSidebar.Liquorreport') }}</a>
                    </li>
                    <li class="{{Request::segment('3')=='food'?'active':null}}">
                        <a href="{{route('superadmin-food-report')}}">{{ __('SuperAdminSidebar.foodreport') }}</a>
                    </li>
                   {{-- <li class="{{Request::segment('3')=='country'?'active':null}}">
                        <a href="{{route('superadmin-bar-report')}}">Country Report</a>
                    </li> --}}

                </ul>
            </li>

                  {{--  <li class="menu">
                <a href="{{route('site-setting')}}" aria-expanded="{{Request::segment('2')=='site-setting'?'true':'false'}}"  class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>{{__('SuperAdminSidebar.sitesettings')  }}</span>
                    </div>

                </a>
            </li> --}}


        </ul>

    </nav>

</div>
<!--  END SIDEBAR  -->
