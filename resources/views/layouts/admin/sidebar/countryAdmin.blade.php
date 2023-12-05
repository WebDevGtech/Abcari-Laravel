  <!--  BEGIN SIDEBAR  -->
  <div class="sidebar-wrapper sidebar-theme">

      <nav id="sidebar">
          <div class="shadow-bottom"></div>

          <ul class="list-unstyled menu-categories" id="accordionExample">

              <li class="menu">
                  <a href="{{ route('country-admin-dashboard') }}" data-active="true"aria-expanded="true"
                      class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                          </svg>
                          <span>{{ __('CountryAdminSidebar.dashboard') }}</span>
                      </div>
                  </a>
              </li>


              {{-- <li class="menu">
                <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        <span>{{ __('CountryAdminSidebar.baradmins') }}</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
                    <li>
                        <a href="{{ route('add-bar-admin') }}"> {{ __('CountryAdminSidebar.addbaradmin') }} </a>
                    </li>
                    <li>
                        <a href="{{ route('view-bar-admins') }}">{{ __('CountryAdminSidebar.viewbaradmins') }}</a>
                    </li>
                </ul>
            </li> --}}
              <li class="menu">
                  <a href="#restaurant" data-toggle="collapse"
                      aria-expanded="{{ Request::segment('2') == 'bar-restaurant' ? 'true' : 'false' }}"
                      class="{{ Request::segment('2') == 'bar-restaurant' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-cpu">
                              <rect x="4" y="4" width="16" height="16" rx="2"
                                  ry="2"></rect>
                              <rect x="9" y="9" width="6" height="6"></rect>
                              <line x1="9" y1="1" x2="9" y2="4"></line>
                              <line x1="15" y1="1" x2="15" y2="4"></line>
                              <line x1="9" y1="20" x2="9" y2="23"></line>
                              <line x1="15" y1="20" x2="15" y2="23"></line>
                              <line x1="20" y1="9" x2="23" y2="9"></line>
                              <line x1="20" y1="14" x2="23" y2="14"></line>
                              <line x1="1" y1="9" x2="4" y2="9"></line>
                              <line x1="1" y1="14" x2="4" y2="14"></line>
                          </svg>
                          <span>{{ __('CountryAdminSidebar.barrestaurant') }}</span>
                      </div>
                      <div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-right">
                              <polyline points="9 18 15 12 9 6"></polyline>
                          </svg>
                      </div>
                  </a>
                  <ul class="{{ Request::segment('2') == 'bar-restaurant' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                      id="restaurant" data-parent="#accordionExample">
                      <li class="{{ Request::segment('3') == 'add-bar-restaurant' ? 'active' : null }}">
                          <a href="{{ route('add-bar-restaurant') }}">
                              {{ __('CountryAdminSidebar.addbarrestaurant') }}</a>
                      </li>
                      <li class="{{ Request::segment('3') == 'view-bar-restaurant' ? 'active' : null }}">
                          <a href="{{ route('view-bar-restaurant') }}">
                              {{ __('CountryAdminSidebar.viewbarrestaurant') }} </a>
                      </li>
                  </ul>
              </li>

              <li class="menu">
                  <a href="#components" data-toggle="collapse"
                      aria-expanded="{{ Request::segment('2') == 'bar-settings' ? 'true' : 'false' }}"
                      class="{{ Request::segment('2') == 'bar-settings' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-target">
                              <circle cx="12" cy="12" r="10"></circle>
                              <circle cx="12" cy="12" r="6"></circle>
                              <circle cx="12" cy="12" r="2"></circle>
                          </svg>
                          <span>{{ __('CountryAdminSidebar.barsettings') }}</span>
                      </div>
                      <div>
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-right">
                              <polyline points="9 18 15 12 9 6"></polyline>
                          </svg>
                      </div>
                  </a>
                  <ul class="{{ Request::segment('2') == 'bar-settings' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                      id="components" data-parent="#accordionExample">
                      {{--   <li class="{{Request::segment('3')=='bar-bucket'?'active':null}}">
                        <a href="{{ route('bar-bucket') }}"> {{ __('CountryAdminSidebar.barbucket') }}</a>
                    </li>
                    <li class="{{Request::segment('3')=='bar-category'?'active':null}}">
                        <a href="{{ route('bar-category') }}"> {{ __("CountryAdminSidebar.barcategory") }} </a> --}}
              </li>
              <li class="{{ Request::segment('3') == 'bar-service' ? 'active' : null }}">
                  <a href="{{ route('bar-service') }}">{{ __('CountryAdminSidebar.barservice') }} </a>
              </li>

              {{--      <li class="{{Request::segment('3')=='bar-tie-up'?'active':null}}">
                        <a href="{{ route('bar-tie-up') }}">{{ __('CountryAdminSidebar.bartieup') }}</a>
                    </li>
                    <li class="{{Request::segment('3')=='bar-bucket-point'?'active':null}}">
                        <a href="{{ route('bar-bucket-point') }}">{{ __('CountryAdminSidebar.bucketreward') }}</a>
                    </li> --}}

          </ul>
          </li>
          <li class="menu">
              <a href="#elements" data-toggle="collapse"
                  aria-expanded="{{ Request::segment('2') == 'offer' ? 'true' : 'false' }}"
                  class="{{ Request::segment('2') == 'offer' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-zap">
                          <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                      </svg>
                      <span>{{ __('SideBar.offers') }}</span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-chevron-right">
                          <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                  </div>
              </a>
              <ul class="{{ Request::segment('2') == 'offer' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                  id="elements" data-parent="#accordionExample">
                  <li class="{{ Request::segment('3') == 'banner' ? 'active' : null }}">
                      <a href="{{ route('banner') }}"> {{ __('SideBar.banner') }} </a>
                  </li>

                  {{-- <li class="{{Request::segment('3')=='combo'?'active':null}}">
                        <a href="{{route('combo')}}"> {{ __('SideBar.combos') }} </a>
                    </li>

                      <li class="{{Request::segment('3')=='coupon'?'active':null}}">
                        <a href="{{route('coupon')}}"> {{ __('SideBar.coupons') }} </a>
                    </li>
               <li class="{{Request::segment('3')=='offer'?'active':null}}">
                        <a href="{{route('offer')}}"> {{ __('SideBar.offer') }} </a>
                    </li>  --}}


              </ul>
          </li>
          <li class="menu">
              <a href="#datatables" data-toggle="collapse"
                  aria-expanded="{{ Request::segment('2') == 'places' ? 'true' : 'false' }}"
                  class="{{ Request::segment('2') == 'places' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-map">
                          <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                          <line x1="8" y1="2" x2="8" y2="18"></line>
                          <line x1="16" y1="6" x2="16" y2="22"></line>
                      </svg>
                      <span>{{ __('CountryAdminSidebar.places') }}</span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-chevron-right">
                          <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                  </div>
              </a>
              <ul class="{{ Request::segment('2') == 'places' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                  id="datatables" data-parent="#accordionExample">

                  <li class="{{ Request::segment('3') == 'add-zone' ? 'active' : null }}">
                      <a href="{{ route('add-zone') }}"> {{ __('CountryAdminSidebar.zone') }}</a>
                  </li>
                  <li class="{{ Request::segment('3') == 'add-city' ? 'active' : null }}">
                      <a href="{{ route('city') }}"> {{ __('CountryAdminSidebar.city') }}</a>
                  </li>
                  <li class="{{ Request::segment('3') == 'add-postcode' ? 'active' : null }}">
                      <a href="{{ route('postcode') }}">{{ __('CountryAdminSidebar.postcode') }}</a>
                  </li>
              </ul>
          </li>

          <li class="menu">
              <a href="#product" data-toggle="collapse"
                  aria-expanded="{{ Request::segment('2') == 'product' ? 'true' : 'false' }}"
                  class="{{ Request::segment('2') == 'product' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-box">
                          <path
                              d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                          </path>
                          <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                          <line x1="12" y1="22.08" x2="12" y2="12"></line>
                      </svg>
                      <span>{{ __('CountryAdminSidebar.productsettings') }}</span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-chevron-right">
                          <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                  </div>
              </a>
              <ul class="{{ Request::segment('2') == 'product' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                  id="product" data-parent="#accordionExample">
                  <li class="{{ Request::segment('3') == 'category' ? 'active' : null }}">
                      <a href="{{ route('product-category') }} "> {{ __('CountryAdminSidebar.categor') }} </a>
                  </li>
                  {{--   <li  class="{{Request::segment('3')=='sub-category'?'active':null}}">
                        <a href="{{ route('product-sub-category') }}">{{ __('CountryAdminSidebar.subcategor') }} </a>
                    </li>
                    <li  class="{{Request::segment('3')=='variation'?'active':null}}">
                        <a href="{{ route('product-variation') }}"> {{ __('CountryAdminSidebar.productvariation') }}</a>
                    </li> --}}
                  <li class="{{ Request::segment('3') == 'variation-type' ? 'active' : null }}">
                      <a href="{{ route('variation-type') }}"> {{ __('CountryAdminSidebar.variationtype') }}</a>
                  </li>
                  <li class="{{ Request::segment('3') == 'brand' ? 'active' : null }}">
                      <a href="{{ route('product-brand') }}">Brand</a>
                  </li>
              </ul>
          </li>

          <li class="menu">
              <a href="#element" data-toggle="collapse"
                  aria-expanded="{{ Request::segment('2') == 'settings' ? 'true' : 'false' }}"
                  class="{{ Request::segment('2') == 'settings' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-zap">
                          <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                      </svg>
                      <span>{{ __('CountryAdminSidebar.settings') }}</sEct></span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-chevron-right">
                          <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                  </div>
              </a>
              <ul class="{{ Request::segment('2') == 'settings' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                  id="element" data-parent="#accordionExample">
                  <li class="{{ Request::segment('3') == 'payment-gateway' ? 'active' : null }}">
                      <a href="{{ route('payment-gateway') }}">{{ __('CountryAdminSidebar.paymentgateway') }} </a>
                  </li>
                  <li class="{{ Request::segment('3') == 'country-tax-type' ? 'active' : null }}">
                      <a href="{{ route('countryadmin-tax-type') }}">{{ __('CountryAdminSidebar.taxtype') }} </a>
                  </li>
                  {{-- <li class="{{ Request::segment('3') == 'order-status' ? 'active' : null }}">
                      <a href="{{ route('order-status') }}">{{ __('CountryAdminSidebar.orderstatus') }} </a>
                  </li> --}}
              </ul>
          </li>

          <li class="menu">
              <a href="#transaction" data-toggle="collapse"
                  aria-expanded="{{ Request::segment('2') == 'transaction-report' ? 'true' : 'false' }}"
                  class="{{ Request::segment('2') == 'transaction-report' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-clipboard">
                          <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                          <rect x="8" y="2" width="8" height="4" rx="1"
                              ry="1"></rect>
                      </svg>
                      <span>{{ __('CountryAdminSidebar.transactionreport') }}</span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-chevron-right">
                          <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                  </div>
              </a>
              <ul class="{{ Request::segment('2') == 'transaction-report' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                  id="transaction" data-parent="#accordionExample">
                  <li class="{{ Request::segment('3') == 'transaction' ? 'active' : null }}">
                      <a href="{{ route('countryadmin-transaction') }}">{{ __('CountryAdminSidebar.transaction ') }}
                      </a>
                  </li>
                  <li class="{{ Request::segment('3') == 'reward' ? 'active' : null }}">
                      <a href="{{ route('countryadmin-reward') }}">
                          {{ __('CountryAdminSidebar.rewardtransaction ') }}</a>
                  </li>


              </ul>
          </li>


          <li class="menu">
              <a href="#reports" data-toggle="collapse"
                  aria-expanded="{{ Request::segment('2') == 'report' ? 'true' : 'false' }}"
                  class="{{ Request::segment('2') == 'report' ? 'dropdown-toggle collapsed' : 'dropdown-toggle' }}">
                  <div class="">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-book">
                          <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                          <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                      </svg>
                      <span>{{ __('CountryAdminSidebar.report') }}</span>
                  </div>
                  <div>
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round" class="feather feather-chevron-right">
                          <polyline points="9 18 15 12 9 6"></polyline>
                      </svg>
                  </div>
              </a>
              <ul class="{{ Request::segment('2') == 'report' ? 'submenu list-unstyled collapse show' : 'submenu list-unstyled collapse' }}"
                  id="reports" data-parent="#accordionExample">
                  <li class="{{ Request::segment('3') == 'bar' ? 'active' : null }}">
                      <a href="{{ route('countryadmin-bar-report') }}">{{ __('CountryAdminSidebar.barreport') }}</a>
                  </li>
                  <li class="{{ Request::segment('3') == 'liquor' ? 'active' : null }}">
                      <a
                          href="{{ route('countryadmin-liquor-report') }}">{{ __('CountryAdminSidebar.Liquorreport') }}</a>
                  </li>
                  <li class="{{ Request::segment('3') == 'food' ? 'active' : null }}">
                      <a
                          href="{{ route('countryadmin-food-report') }}">{{ __('CountryAdminSidebar.foodreport') }}</a>
                  </li>
              </ul>
          </li>

          {{-- <li class="menu">
                <a href="{{route('country_sitesetting')}}" aria-expanded="{{Request::segment('2')=='country_sitesetting'?'true':'false'}}"  class="dropdown-toggle">
                    <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>{{__('Sidebar.sitesettings')  }}</span>
                    </div> --}}


          {{-- <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div> --}}
          </a>

          </li>


          </ul>

      </nav>

  </div>
  <!--  END SIDEBAR  -->
