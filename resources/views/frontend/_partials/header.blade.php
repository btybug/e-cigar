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
                            <li class="nav-item nav-item--has-dropdown position-relative">
                                <a class="nav-link" href="{!! route('blog') !!}">
                                    Community
                                    <span class="ml-2 d-inline-block arrow main-transition pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="9px" height="6px">
<path fill-rule="evenodd" fill="rgb(121, 121, 121)" d="M0.003,0.001 L8.998,0.001 L4.501,5.999 L0.003,0.001 Z"></path>
</svg>
                        </span>
                                </a>
                                <ul class="nav-item--has-dropdown_dropdown list-unstyled p-0">
                                    <li class="nav-item--has-dropdown_dropdown-item">
                                        <a href="{!! route('blog') !!}" class="nav-item--has-dropdown_dropdown-link d-inline-block w-100 text-gray-clr font-15 main-transition">News</a>
                                    </li>
                                    <li class="nav-item--has-dropdown_dropdown-item">
                                        <a href="#" class="nav-item--has-dropdown_dropdown-link d-inline-block w-100 text-gray-clr font-15 main-transition">Forums</a>
                                    </li>
                                    <li class="nav-item--has-dropdown_dropdown-item">
                                        <a href="#" class="nav-item--has-dropdown_dropdown-link d-inline-block w-100 text-gray-clr font-15 main-transition">Social</a>
                                    </li>
                                </ul>
                            </li>
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


{{--<header class="page-header bg-main-clr">--}}
{{--<nav class="navbar navbar-expand-xl navbar-dark align-items-stretch justify-content-between">--}}
{{--<div class="header-navbar-brand-holder">--}}
{{--<a class="navbar-brand header-navbar-brand p-0 m-0" href="{!! url('/') !!}">--}}
{{--<img src="/public/img/header-logo.png" class="header-logo-img" alt="kaliony">--}}
{{--<img src="/public/img/header-logo-text.png" class="header-logo-text-img" alt="kaliony">--}}
{{--</a>--}}
{{--</div>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"--}}
{{--aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}
{{--<div class="collapse navbar-collapse" id="navbarTogglerDemo02">--}}
{{--<ul class="navbar-nav ml-xl-auto header-navbar-nav h-100">--}}
{{--<li class="nav-item active">--}}
{{--<a class="nav-link text-uppercase" href="{!! url('/') !!}">Home <span class="sr-only">(current)</span></a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link text-uppercase" href="{!! route('categories_front') !!}">Product</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link text-uppercase" href="{!! route('product_sales') !!}">Sales</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link text-uppercase" href="{!! route('blog') !!}">Community</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link text-uppercase" href="{!! route('product_support') !!}">Support</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--<div class="header-right-wrapp d-flex align-items-center ml-auto">--}}
{{--<span class="header-search-icon pointer">--}}
{{--<svg width="26px" height="28px" viewBox="0 0 26 28">--}}
{{--<path fill-rule="evenodd" fill="rgb(255, 255, 255)"--}}
{{--d="M25.805,27.105 L18.246,18.936 C20.174,16.927 21.368,14.156 21.368,11.101 C21.368,4.980 16.576,-0.000 10.684,-0.000 C4.793,-0.000 -0.000,4.980 -0.000,11.101 C-0.000,17.223 4.793,22.203 10.684,22.203 C13.270,22.203 15.644,21.242 17.494,19.648 L25.072,27.838 C25.172,27.946 25.305,28.000 25.439,28.000 C25.566,28.000 25.693,27.951 25.791,27.852 C25.994,27.650 26.000,27.315 25.805,27.105 ZM10.684,21.146 C5.354,21.146 1.017,16.640 1.017,11.101 C1.017,5.563 5.354,1.057 10.684,1.057 C16.015,1.057 20.351,5.563 20.351,11.101 C20.351,16.640 16.014,21.146 10.684,21.146 Z"/>--}}
{{--</svg>--}}
{{--</span>--}}
{{--<div class="header-shop-icons-outer d-flex align-items-center">--}}
{{--<a href="{!! route('my_account_favourites') !!}" class="header-like-icon position-relative active">--}}
{{--<span class="qty position-absolute absolute-center">3</span>--}}
{{--<svg width="30px" height="28px" viewBox="0 0 30 28">--}}
{{--<path fill-rule="evenodd"--}}
{{--d="M29.355,11.060 C28.755,13.649 27.363,16.008 25.333,17.877 L14.912,27.331 L4.670,17.879 C2.637,16.007 1.246,13.648 0.645,11.060 C0.213,9.200 0.390,8.149 0.391,8.142 L0.400,8.080 C0.796,3.538 3.897,0.241 7.774,0.241 C10.634,0.241 13.152,2.028 14.347,4.904 L14.909,6.259 L15.471,4.904 C16.647,2.072 19.298,0.242 22.227,0.242 C26.102,0.242 29.204,3.539 29.609,8.139 C29.610,8.149 29.787,9.200 29.355,11.060 Z"/>--}}
{{--</svg>--}}
{{--</a>--}}
{{--<a id="headerShopCartBtn" class="header-cart-bag-icon pointer position-relative active" href="{!!route('shop_my_cart')  !!}">--}}
{{--<span class="qty position-absolute absolute-center cart-count">{{ cartCount() }}</span>--}}
{{--<svg width="27px" height="35px" viewBox="0 0 27 35">--}}
{{--<path fill-rule="evenodd" fill="rgb(255, 255, 255)"--}}
{{--d="M26.842,34.836 C26.738,34.941 26.594,35.000 26.445,35.000 L0.555,35.000 C0.404,35.000 0.261,34.941 0.158,34.836 C0.055,34.731 -0.000,34.590 0.007,34.444 L1.239,9.387 C1.254,9.104 1.494,8.883 1.787,8.883 L7.028,8.883 L7.028,6.263 C7.028,2.810 9.931,-0.000 13.499,-0.000 C17.068,-0.000 19.971,2.810 19.971,6.263 L19.971,8.883 L25.213,8.883 C25.505,8.883 25.746,9.104 25.760,9.387 L26.993,34.444 C27.000,34.590 26.946,34.731 26.842,34.836 ZM18.875,6.263 C18.875,3.395 16.464,1.061 13.499,1.061 C10.535,1.061 8.124,3.395 8.124,6.263 L8.124,8.883 L18.875,8.883 L18.875,6.263 ZM24.690,9.943 L19.971,9.943 L19.971,11.534 C19.971,11.827 19.726,12.064 19.423,12.064 C19.120,12.064 18.875,11.827 18.875,11.534 L18.875,9.943 L8.124,9.943 L8.124,11.534 C8.124,11.827 7.878,12.064 7.576,12.064 C7.273,12.064 7.028,11.827 7.028,11.534 L7.028,9.943 L2.309,9.943 L1.129,33.939 L25.870,33.939 L24.690,9.943 Z"/>--}}
{{--</svg>--}}
{{--</a>--}}
{{--<span id="headerShopCartBtn" class="header-cart-bag-icon pointer position-relative active">--}}
{{--<span class="qty position-absolute absolute-center cart-count">{{ cartCount() }}</span>--}}
{{--<svg width="27px" height="35px" viewBox="0 0 27 35">--}}
{{--<path fill-rule="evenodd" fill="rgb(255, 255, 255)"--}}
{{--d="M26.842,34.836 C26.738,34.941 26.594,35.000 26.445,35.000 L0.555,35.000 C0.404,35.000 0.261,34.941 0.158,34.836 C0.055,34.731 -0.000,34.590 0.007,34.444 L1.239,9.387 C1.254,9.104 1.494,8.883 1.787,8.883 L7.028,8.883 L7.028,6.263 C7.028,2.810 9.931,-0.000 13.499,-0.000 C17.068,-0.000 19.971,2.810 19.971,6.263 L19.971,8.883 L25.213,8.883 C25.505,8.883 25.746,9.104 25.760,9.387 L26.993,34.444 C27.000,34.590 26.946,34.731 26.842,34.836 ZM18.875,6.263 C18.875,3.395 16.464,1.061 13.499,1.061 C10.535,1.061 8.124,3.395 8.124,6.263 L8.124,8.883 L18.875,8.883 L18.875,6.263 ZM24.690,9.943 L19.971,9.943 L19.971,11.534 C19.971,11.827 19.726,12.064 19.423,12.064 C19.120,12.064 18.875,11.827 18.875,11.534 L18.875,9.943 L8.124,9.943 L8.124,11.534 C8.124,11.827 7.878,12.064 7.576,12.064 C7.273,12.064 7.028,11.827 7.028,11.534 L7.028,9.943 L2.309,9.943 L1.129,33.939 L25.870,33.939 L24.690,9.943 Z"/>--}}
{{--</svg>--}}
{{--</span>--}}
{{--</div>--}}
{{--<div class="ml-auto d-flex align-items-center">--}}
{{--<div class="header-lang-bar">--}}
{{--<div class="dropdown">--}}
{{--<a href="javascript:void(0);" class="dropdown-toggle d-flex align-items-center" id="dropdownLang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--<div><span class="flag-icon flag-icon-gb"></span></div>--}}

{{--<span class="icon">--}}
{{--<svg width="18px" height="9px" viewBox="0 0 18 9">--}}
{{--<path fill-rule="evenodd" fill="rgb(255, 255, 255)"--}}
{{--d="M9.024,7.799 L0.918,0.187 C0.718,-0.000 0.399,-0.000 0.199,0.187 C-0.000,0.374 -0.000,0.675 0.199,0.862 L8.667,8.813 C8.866,9.000 9.186,9.000 9.385,8.813 L17.849,0.862 C17.947,0.770 18.000,0.646 18.000,0.526 C18.000,0.406 17.951,0.283 17.849,0.191 C17.650,0.003 17.330,0.003 17.131,0.191 L9.024,7.799 Z"/>--}}
{{--</svg>--}}
{{--</span>--}}
{{--</a>--}}
{{--<div class="dropdown-menu" aria-labelledby="dropdownLang">--}}
{{--<a href="javascript:void(0);" class="dropdown-item"><span class="flag-icon flag-icon-gr"></span></a>--}}
{{--<a href="javascript:void(0);" class="dropdown-item"><span class="flag-icon flag-icon-am"></span></a>--}}
{{--<a href="javascript:void(0);" class="dropdown-item"><span class="flag-icon flag-icon-ru"></span></a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--@if(Auth::check())--}}
{{--<span id="ptofileBtn" class="pointer header-profile-icon">--}}
{{--<svg width="34px" height="34px" viewBox="0 0 34 34">--}}
{{--<path fill-rule="evenodd" fill="rgb(255, 255, 255)"--}}
{{--d="M34.000,17.000 C34.000,7.626 26.373,-0.000 17.000,-0.000 C7.627,-0.000 -0.000,7.626 -0.000,17.000 C-0.000,21.951 2.129,26.414 5.518,29.523 L5.502,29.537 L6.053,30.002 C6.089,30.032 6.128,30.057 6.164,30.087 C6.457,30.330 6.760,30.560 7.069,30.784 C7.170,30.856 7.270,30.928 7.372,30.999 C7.702,31.226 8.041,31.442 8.387,31.647 C8.462,31.691 8.538,31.734 8.614,31.778 C8.993,31.993 9.380,32.197 9.776,32.383 C9.806,32.397 9.835,32.409 9.864,32.423 C11.156,33.023 12.534,33.464 13.976,33.724 C14.013,33.731 14.051,33.738 14.090,33.745 C14.537,33.822 14.990,33.884 15.448,33.925 C15.503,33.930 15.559,33.933 15.615,33.938 C16.071,33.976 16.533,34.000 17.000,34.000 C17.463,34.000 17.920,33.976 18.374,33.939 C18.431,33.934 18.488,33.931 18.546,33.926 C19.000,33.885 19.449,33.825 19.892,33.749 C19.931,33.742 19.970,33.735 20.008,33.728 C21.428,33.473 22.787,33.042 24.061,32.458 C24.108,32.436 24.156,32.416 24.203,32.393 C24.584,32.214 24.957,32.021 25.322,31.815 C25.413,31.763 25.504,31.711 25.594,31.658 C25.926,31.462 26.254,31.258 26.571,31.040 C26.686,30.962 26.797,30.880 26.911,30.798 C27.182,30.603 27.448,30.402 27.707,30.191 C27.765,30.144 27.827,30.104 27.883,30.057 L28.449,29.584 L28.432,29.570 C31.851,26.459 34.000,21.976 34.000,17.000 ZM1.236,17.000 C1.236,8.308 8.308,1.236 17.000,1.236 C25.692,1.236 32.764,8.308 32.764,17.000 C32.764,21.684 30.708,25.895 27.454,28.784 C27.272,28.659 27.089,28.546 26.902,28.452 L21.668,25.836 C21.198,25.601 20.906,25.128 20.906,24.604 L20.906,22.776 C21.027,22.626 21.155,22.457 21.288,22.271 C21.965,21.314 22.509,20.249 22.905,19.104 C23.688,18.731 24.194,17.951 24.194,17.070 L24.194,14.879 C24.194,14.343 23.997,13.823 23.645,13.414 L23.645,10.529 C23.678,10.209 23.791,8.398 22.481,6.904 C21.342,5.604 19.498,4.945 17.000,4.945 C14.502,4.945 12.658,5.604 11.519,6.904 C10.209,8.397 10.322,10.208 10.354,10.529 L10.354,13.414 C10.003,13.823 9.806,14.342 9.806,14.878 L9.806,17.070 C9.806,17.750 10.112,18.385 10.635,18.814 C11.135,20.775 12.166,22.260 12.547,22.763 L12.547,24.552 C12.547,25.057 12.271,25.520 11.828,25.763 L6.940,28.429 C6.785,28.514 6.630,28.612 6.475,28.723 C3.261,25.835 1.236,21.650 1.236,17.000 ZM26.247,29.754 C26.031,29.911 25.811,30.063 25.588,30.209 C25.485,30.275 25.383,30.342 25.279,30.407 C24.987,30.588 24.690,30.759 24.387,30.920 C24.320,30.955 24.253,30.989 24.186,31.023 C23.490,31.380 22.769,31.687 22.030,31.936 C22.004,31.945 21.978,31.954 21.951,31.962 C21.563,32.091 21.171,32.205 20.774,32.304 C20.773,32.304 20.772,32.304 20.770,32.304 C20.370,32.403 19.964,32.485 19.556,32.553 C19.545,32.555 19.534,32.557 19.523,32.559 C19.139,32.621 18.752,32.667 18.364,32.701 C18.295,32.707 18.226,32.711 18.157,32.716 C17.773,32.745 17.388,32.764 17.000,32.764 C16.608,32.764 16.217,32.744 15.829,32.715 C15.761,32.710 15.694,32.706 15.627,32.700 C15.235,32.665 14.845,32.619 14.459,32.556 C14.441,32.553 14.424,32.550 14.407,32.547 C13.589,32.410 12.785,32.209 12.002,31.946 C11.978,31.938 11.953,31.930 11.929,31.922 C11.540,31.789 11.156,31.643 10.778,31.481 C10.776,31.480 10.772,31.478 10.770,31.477 C10.413,31.323 10.062,31.153 9.716,30.973 C9.671,30.949 9.625,30.927 9.580,30.903 C9.265,30.734 8.956,30.552 8.651,30.361 C8.560,30.304 8.471,30.247 8.382,30.189 C8.101,30.005 7.824,29.814 7.555,29.612 C7.527,29.591 7.500,29.569 7.473,29.548 C7.492,29.537 7.512,29.526 7.532,29.514 L12.420,26.848 C13.261,26.390 13.783,25.510 13.783,24.552 L13.782,22.326 L13.640,22.154 C13.626,22.138 12.290,20.512 11.785,18.311 L11.729,18.066 L11.518,17.930 C11.221,17.737 11.043,17.416 11.043,17.069 L11.043,14.878 C11.043,14.590 11.164,14.323 11.387,14.122 L11.591,13.937 L11.591,10.494 L11.585,10.413 C11.583,10.398 11.401,8.912 12.448,7.718 C13.342,6.699 14.874,6.182 17.000,6.182 C19.118,6.182 20.645,6.695 21.541,7.706 C22.587,8.888 22.416,10.402 22.415,10.414 L22.409,13.939 L22.613,14.123 C22.835,14.323 22.957,14.592 22.957,14.879 L22.957,17.070 C22.957,17.511 22.657,17.911 22.227,18.044 L21.920,18.139 L21.821,18.445 C21.456,19.578 20.937,20.624 20.278,21.555 C20.116,21.784 19.959,21.987 19.823,22.142 L19.670,22.317 L19.670,24.604 C19.670,25.600 20.224,26.496 21.115,26.942 L26.349,29.558 C26.383,29.575 26.415,29.592 26.448,29.610 C26.382,29.660 26.314,29.706 26.247,29.754 Z"/>--}}
{{--</svg>--}}
{{--</span>--}}
{{--@else--}}
{{--<span class="d-inline-block">--}}
{{--<a href="{!! route('login') !!}" class="header-login-link">Login</a>--}}
{{--<span class="header-login-icon">&nbsp;&#47;&nbsp;</span>--}}
{{--<a href="{!! route('register') !!}" class="header-login-link">Register</a>--}}
{{--</span>--}}
{{--@endif--}}
{{--</div>--}}

{{--</div>--}}
{{--</nav>--}}
{{--</header>--}}


{{--use App\Models\Orders;--}}

{{--$count_orders = Orders::where("user_id",Auth::id())->count();--}}
{{--$count_favorites = \App\Models\Favorites::where("user_id",Auth::id())->count();--}}
{{--dd($count_orders,$count_favorites);--}}







@if(Auth::check())
    <!--Hidden Sidebars-->
    <div id="profileSidebar" class="hidden-sidebar profile-sidebar d-flex flex-column align-items-center">
        <div class="profile-sidebar_avatar-holder">
            <img src="@if(Auth::user()->avatar) {!! Auth::user()->avatar !!} @else /public/images/{!!Auth::user()->gender!!}.png  @endif"
                 alt="">
        </div>
        <ul class="profile-sidebar-menu list-unstyled mb-0 w-100">
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
                    document.getElementById('g-recaptcha-response').value = token
                });
        });
    </script>
@endpush
@endif