<header class="main-header">
    <div class="header-top">
        <div class="container main-max-width h-100">
            <div class="d-flex flex-wrap justify-content-between h-100">
                <nav class="navbar navbar-expand-md flex-md-row-reverse w-100 navbar-dark">
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarTogglerDemo01"
                                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="logo-small-screens d-md-none d-flex align-items-center ml-3">
                            <img src="{!! url('/public/img/logo-icon.png') !!}"  alt="" class="logo-small-screens_logo">
                            <h1 class="font-14 font-sec-bold text-sec-clr text-uppercase ml-2 mb-0">The Vapors Hub</h1>
                        </div>
                    </div>

                    @if(Auth::check())
                        <div id="ptofileBtn"
                             class="form-inline my-2 my-lg-0 align-self-lg-auto align-self-baseline pointer">
                            <div class="user-img">
                                <img src="{!! url('/public/img/user.png') !!}" alt="user">
                            </div>
                            <span class="user-name font-15 text-sec-clr font-main-bold">
                                Hi {{ Auth::user()->name }}
                            </span>
                        </div>
                    @else
                        {{--<span class="d-inline-block">--}}
                        {{--<a href="{!! route('login') !!}" class="header-login-link">Login</a>--}}
                        {{--<span class="header-login-icon">&nbsp;&#47;&nbsp;</span>--}}
                        {{--<a href="{!! route('register') !!}" class="header-login-link">Register</a>--}}
                        {{--</span>--}}


                        <div class="form-inline my-lg-0 h-100 align-self-lg-auto align-self-baseline pointer">
                                <span class="d-inline-block">
                                    <a href="javascript:void(0);" class="text-sec-clr header-login-link"
                                       data-toggle="modal" data-target="#loginModal">Login</a>
                                    <span class="text-sec-clr">&nbsp;/&nbsp;</span>
                                    <a href="javascript:void(0);" class="text-sec-clr header-login-link"
                                       data-toggle="modal" data-target="#registerModal">Register</a>
                                </span>
                        </div>
                    @endif

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{!! url('/') !!}">Home</a>
                            </li>
                            <li class="nav-item align-items-center nav-item--has-dropdown">
                                <a class="nav-link" href="javascript:void(0)">Products
                                    <span class="ml-2 d-inline-block arrow main-transition pointer">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="9px" height="6px">
<path fill-rule="evenodd" fill="rgb(121, 121, 121)"
      d="M0.003,0.001 L8.998,0.001 L4.501,5.999 L0.003,0.001 Z"/>
</svg>
                        </span>
                                </a>

                                <div class="nav-item--has-dropdown_dropdown">
                                    <div class="products-menu-item row">
                                        @include("frontend._partials.header_menu_products")
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('product_sales') !!}">Sales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! route('blog') !!}">News</a>
                            </li>
                            {{--<li class="nav-item nav-item--has-dropdown position-relative">--}}
                                {{--<a class="nav-link" href="{!! route('blog') !!}">--}}
                                    {{--Community--}}
                                    {{--<span class="ml-2 d-inline-block arrow main-transition pointer">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9px" height="6px">--}}
{{--<path fill-rule="evenodd" fill="rgb(121, 121, 121)" d="M0.003,0.001 L8.998,0.001 L4.501,5.999 L0.003,0.001 Z"></path>--}}
{{--</svg>--}}
                        {{--</span>--}}
                                {{--</a>--}}
                                {{--<ul class="nav-item--has-dropdown_dropdown list-unstyled p-0">--}}
                                    {{--<li class="nav-item--has-dropdown_dropdown-item">--}}
                                        {{--<a href="{!! route('blog') !!}" class="nav-item--has-dropdown_dropdown-link d-inline-block w-100 text-gray-clr font-15 main-transition">News</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item--has-dropdown_dropdown-item">--}}
                                        {{--<a href="#" class="nav-item--has-dropdown_dropdown-link d-inline-block w-100 text-gray-clr font-15 main-transition">Forums</a>--}}
                                    {{--</li>--}}
                                    {{--<li class="nav-item--has-dropdown_dropdown-item">--}}
                                        {{--<a href="#" class="nav-item--has-dropdown_dropdown-link d-inline-block w-100 text-gray-clr font-15 main-transition">Social</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            <li class="nav-item">
                                <a class="nav-link " href="{!! route('product_support') !!}">Support</a>
                            </li>
                        </ul>
                    </div>
                </nav>

            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container main-max-width">
            <div class="d-flex justify-content-between align-items-center header-bottom-wrapper">
                <a href="{!! url('/') !!}" class="d-md-block d-none logo">
                    <img src="{!! url('/public/img/vapors-logo.png') !!}" alt="logo">
                </a>
                <div class="d-flex align-self-center cat-search">
                    @if(\Request::route()->getName() != 'categories_front')
                        <div class="category-select">
                            @php
                                $categories = \App\Models\Category::with('children')->where('type', 'stocks')->whereNull('parent_id')->get()->pluck('name','slug');
                            @endphp
                            {!! Form::select('category',['' => 'All Categories'] + $categories->toArray(),null,
                                [
                                    'class' => 'all_categories select-2 select-2--no-search main-select main-select-2arrows products-filter-wrap_select not-selected',
                                    'style' =>'width: 190px',
                                    'id' => 'filter_sort'
                                ]) !!}
                        </div>
                    @endif
                    <div class="search position-relative">
                        <input type="search" class="form-control" id="search-product"
                               value="{{ (\Request::has('q')) ? \Request::get('q') :null }}"
                               placeholder="Serach for anything">
                        <span class="position-absolute d-flex align-items-center">
                            <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="20px" height="20px">
<path fill-rule="evenodd" fill="rgb(121, 121, 121)"
      d="M19.996,18.987 L16.407,15.260 C19.498,11.614 19.327,6.153 15.881,2.715 C14.065,0.902 11.684,-0.004 9.303,-0.004 C6.922,-0.004 4.541,0.902 2.725,2.715 C-0.908,6.339 -0.908,12.216 2.725,15.841 C4.541,17.653 6.922,18.559 9.303,18.559 C11.469,18.559 13.630,17.800 15.371,16.300 L18.936,20.003 L19.996,18.987 ZM9.303,17.370 C7.136,17.370 5.099,16.528 3.567,15.000 C2.035,13.471 1.191,11.439 1.191,9.277 C1.191,7.116 2.035,5.084 3.567,3.555 C5.099,2.027 7.136,1.185 9.303,1.185 C11.469,1.185 13.507,2.027 15.039,3.555 C18.201,6.710 18.201,11.845 15.039,15.000 C13.507,16.528 11.469,17.370 9.303,17.370 Z"/>
</svg>
                        </span>
                    </div>
                </div>
                <div class="favorite-add-cart d-flex align-items-center">
                    <span class="position-relative pointer add-links-wrap_icon search-mobile-icon">
                        <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="26px" height="22px" viewBox="0 0 29 22">
<path fill-rule="evenodd"  fill="rgb(121, 121, 121)"
      d="M19.996,18.987 L16.406,15.260 C19.498,11.613 19.327,6.153 15.881,2.715 C14.065,0.902 11.684,-0.004 9.303,-0.004 C6.922,-0.004 4.541,0.902 2.724,2.715 C-0.909,6.339 -0.909,12.216 2.724,15.840 C4.541,17.653 6.922,18.559 9.303,18.559 C11.469,18.559 13.630,17.800 15.371,16.300 L18.936,20.002 L19.996,18.987 ZM9.303,17.370 C7.136,17.370 5.099,16.528 3.567,15.000 C2.035,13.471 1.191,11.439 1.191,9.277 C1.191,7.116 2.035,5.084 3.567,3.555 C5.099,2.026 7.136,1.185 9.303,1.185 C11.469,1.185 13.506,2.026 15.038,3.555 C18.201,6.710 18.201,11.844 15.038,15.000 C13.506,16.528 11.469,17.370 9.303,17.370 Z"/>
</svg>
                    </span>
                    <div class="d-inline-block simple_select_wrapper currency--wrap">
                        {!! Form::select('currency',site_currencies(),$currency,[
                           'class' =>'select-2 currency--select-2 main-select',
                           'id' => 'change-currency'
                       ]) !!}
                    </div>


                    <a href="{!! route('my_account_favourites') !!}"
                       class="d-inline-block pointer add-links-wrap_icon add-links-wrap_favorite active">
                        <svg viewBox="0 0 29 22" width="26px" height="22px">
                            <path fill-rule="evenodd" fill="rgb(227, 40, 84)"
                                  d="M23.901,2.043 C22.539,0.732 20.737,0.016 18.813,0.016 C16.890,0.016 15.081,0.738 13.720,2.048 L13.009,2.732 L12.287,2.037 C10.926,0.727 9.112,0.000 7.188,0.000 C5.270,0.000 3.462,0.722 2.106,2.027 C0.745,3.337 -0.005,5.077 0.001,6.928 C0.001,8.780 0.756,10.515 2.117,11.825 L12.469,21.788 C12.612,21.926 12.805,22.000 12.992,22.000 C13.180,22.000 13.373,21.931 13.516,21.793 L23.890,11.846 C25.251,10.536 26.001,8.796 26.001,6.944 C26.006,5.093 25.262,3.353 23.901,2.043 L23.901,2.043 Z"/>
                        </svg>
                    </a>
                    <span id="headerShopCartBtn" class="d-inline-block position-relative pointer add-links-wrap_icon">
                        <span class="d-inline-block position-absolute absolute-center add-cart-number cart-count">{{ cartCount() }}</span>
                    <svg
                            width="25px" height="30px" viewBox="0 0 25 30">
<path fill-rule="evenodd" fill="rgb(121, 121, 121)"
      d="M19.867,4.943 L19.867,-0.003 L5.131,-0.003 L5.131,4.943 L-0.005,4.943 L-0.005,30.000 L25.003,30.000 L25.003,4.943 L19.867,4.943 ZM6.854,1.629 L18.143,1.629 L18.143,4.943 L6.854,4.943 L6.854,1.629 ZM23.279,28.368 L1.719,28.368 L1.719,6.575 L5.131,6.575 L5.131,9.857 L6.854,9.857 L6.854,6.575 L18.143,6.575 L18.143,9.857 L19.867,9.857 L19.867,6.575 L23.279,6.575 L23.279,28.368 Z"/>
</svg>
                </span>
                </div>
            </div>
        </div>
    </div>
</header>





@if(Auth::check())
    <!--Hidden Sidebars-->
    <div id="profileSidebar" class="hidden-sidebar profile-sidebar d-flex flex-column align-items-center">
        <div class="profile-sidebar_avatar-holder">
            <img src="@if(Auth::user()->avatar) {!! Auth::user()->avatar !!} @else /public/images/{!!Auth::user()->gender!!}.png  @endif"
                 alt="">
        </div>
        <ul class="profile-sidebar-menu list-unstyled w-100 main-scrollbar">
            <li class="profile-sidebar-menu_item">
                <a href="{!! url('my-account') !!}"
                   class="profile-sidebar-menu_link d-inline-flex align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg viewBox="0 0 22 24" width="22px" height="24px">
                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                              d="M20.454,23.292 C18.787,19.625 15.097,17.266 10.998,17.266 C6.903,17.266 3.213,19.625 1.542,23.292 L0.001,23.292 C1.184,20.274 3.596,17.879 6.674,16.685 L7.252,16.460 L6.711,16.160 C3.948,14.627 2.231,11.743 2.231,8.634 C2.231,3.874 6.163,0.002 10.998,0.002 C15.832,0.002 19.765,3.874 19.765,8.634 C19.765,11.744 18.050,14.628 15.289,16.160 L14.747,16.460 L15.325,16.685 C18.400,17.879 20.812,20.274 21.997,23.292 L20.454,23.292 ZM10.998,1.402 C6.949,1.402 3.655,4.646 3.655,8.634 C3.655,12.622 6.949,15.866 10.998,15.866 C15.049,15.866 18.344,12.622 18.344,8.634 C18.344,4.646 15.049,1.402 10.998,1.402 Z"/>
                    </svg>
                </span>
                    <span class="d-inline-block">Account</span>
                </a>
            </li>
            <li class="profile-sidebar-menu_item">
                <a href="{!! route('my_account_favourites') !!}"
                   class="profile-sidebar-menu_link d-inline-flex align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg viewBox="0 0 22 21" idth="22px" height="21px">
                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                              d="M15.952,1.493 C18.635,1.493 20.659,3.532 20.659,6.235 C20.659,9.774 17.405,12.847 11.653,17.972 L11.624,17.999 L11.596,18.027 L11.000,18.625 L10.404,18.027 L10.376,17.999 L10.346,17.972 C4.595,12.847 1.342,9.774 1.342,6.235 C1.342,3.532 3.365,1.493 6.048,1.493 C7.514,1.493 9.020,2.201 9.978,3.342 L11.000,4.560 L12.023,3.342 C12.981,2.201 14.486,1.493 15.952,1.493 M15.952,0.144 C14.077,0.144 12.208,1.031 11.000,2.470 C9.791,1.031 7.923,0.144 6.048,0.144 C2.644,0.144 0.002,2.806 0.002,6.235 C0.002,10.450 3.740,13.886 9.459,18.983 L11.000,20.530 L12.541,18.983 C18.260,13.886 21.998,10.450 21.998,6.235 C21.998,2.806 19.356,0.144 15.952,0.144 L15.952,0.144 Z"/>
                    </svg>
                </span>
                    <span class="d-inline-block">Favorites</span>
                    <span class="profile-sidebar-menu_item-amount d-inline-flex align-items-center justify-content-center font-14">
                    {{\App\Models\Favorites::where("user_id",Auth::id())->count()}}
                </span>
                </a>
            </li>
            <li class="profile-sidebar-menu_item">
                <a href="{!! route('my_account_orders') !!}"
                   class="profile-sidebar-menu_link d-inline-flex align-items-center font-15 main-transition">
                    <span class="d-inline-block profile-sidebar-menu_icon">
                        <svg viewBox="0 0 21 24" width="21px" height="24px">
                            <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                                  d="M16.116,4.279 L16.116,0.439 L4.839,0.439 L4.839,4.279 L0.909,4.279 L0.909,23.736 L20.046,23.736 L20.046,4.279 L16.116,4.279 ZM6.158,1.706 L14.796,1.706 L14.796,4.279 L6.158,4.279 L6.158,1.706 ZM18.726,22.468 L2.228,22.468 L2.228,5.547 L4.839,5.547 L4.839,8.095 L6.158,8.095 L6.158,5.547 L14.796,5.547 L14.796,8.095 L16.116,8.095 L16.116,5.547 L18.726,5.547 L18.726,22.468 Z"/>
                        </svg>
                    </span>
                    <span class="d-inline-block">Orders</span>
                    <!--order amount-->
                    <span class="profile-sidebar-menu_item-amount d-inline-flex align-items-center justify-content-center font-14">
                        {{\App\Models\Orders::where("user_id",Auth::id())->count()}}
                    </span>
                </a>
            </li>
            <li class="profile-sidebar-menu_item">
                <a href="{!! route('my_account_address') !!}"
                   class="profile-sidebar-menu_link d-inline-flex align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg viewBox="0 0 21 21" idth="21px" height="21px">
                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                              d="M2.709,0.614 L2.709,3.948 L0.917,3.948 L0.917,5.239 L2.709,5.239 L2.709,10.161 L0.917,10.161 L0.917,11.452 L2.709,11.452 L2.709,16.359 L0.917,16.359 L0.917,17.650 L2.709,17.650 L2.709,20.999 L20.041,20.999 L20.041,0.614 L2.709,0.614 ZM18.769,19.818 L3.980,19.818 L3.980,17.650 L7.229,17.650 L7.229,16.359 L3.980,16.359 L3.980,11.452 L7.229,11.452 L7.229,10.161 L3.980,10.161 L3.980,5.239 L7.229,5.239 L7.229,3.948 L3.980,3.948 L3.980,1.795 L18.769,1.795 L18.769,19.818 Z"/>
                    </svg>
                </span>
                    <span class="d-inline-block">Address</span>
                </a>
            </li>
            <li class="profile-sidebar-menu_item">
                <a href="{!! route('my_account_tickets') !!}"
                   class="profile-sidebar-menu_link d-inline-flex align-items-center font-15">x
                    <span class="d-inline-block profile-sidebar-menu_icon">
                        <svg viewBox="0 0 15 21" width="15px" height="21px">
                            <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                                  d="M11.421,20.998 L10.105,20.998 C10.105,20.553 9.984,20.139 9.781,19.778 C9.331,19.003 8.476,18.477 7.499,18.477 C6.523,18.477 5.667,19.003 5.218,19.778 C5.015,20.139 4.894,20.553 4.894,20.998 L3.578,20.998 L-0.003,20.998 L-0.003,-0.003 L15.002,-0.003 L15.002,20.998 L11.421,20.998 ZM13.741,6.639 L12.028,6.639 L12.028,5.305 L13.741,5.305 L13.741,1.218 L1.258,1.218 L1.258,5.305 L2.970,5.305 L2.970,6.639 L1.258,6.639 L1.258,19.778 L3.792,19.778 C4.313,18.281 5.777,17.204 7.499,17.204 C9.222,17.204 10.686,18.281 11.207,19.778 L13.741,19.778 L13.741,6.639 ZM5.464,5.305 L9.534,5.305 L9.534,6.639 L5.464,6.639 L5.464,5.305 Z"/>
                        </svg>
                    </span>
                    <span class="d-inline-block">Tickets</span>
                    <span class="profile-sidebar-menu_item-amount d-inline-flex align-items-center justify-content-center font-14">
                        {{\App\Models\Ticket::where("user_id",Auth::id())->count()}}
                    </span>
                </a>
            </li>
        </ul>
        {!! Form::open(['url'=>route('logout'),'class' => 'mt-auto']) !!}
        <button class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">
            Logout
        </button>
        {!! Form::close() !!}
    </div>
@endif
<div id="cartSidebar" class="hidden-sidebar cart-aside d-flex flex-column">
    @include('frontend._partials.shopping_cart_options')
</div>
@if(!Auth::check())

    <!--modal Login-->
    @include("frontend._partials.login_modal")

    <!--modal Register-->
    @include("frontend._partials.register_modal")

@push('javascript')
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{!! env('GOOGLE_RECAPTCHA_KEY') !!}', {action: 'action_name'})
                .then(function (token) {
                    $('.g-recaptcha-response').val(token);
                    $('.sign_in').attr('disabled', false);
//                    document.getElementsByClassName('g-recaptcha-response').value = token
                });
        });
    </script>
@endpush
@endif