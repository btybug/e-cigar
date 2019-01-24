@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="d-flex">
            {{--acoount sidebar--}}
            <div class="profile-sidebar profile-sidebar--inner-pages d-flex flex-column align-items-center">
                <ul class="profile-sidebar-menu list-unstyled mb-0 w-100">
                    <li class="profile-sidebar-menu_item active">
                        <a href="{!! route('my_account') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 22 24"
                            width="22px" height="24px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M20.454,23.292 C18.787,19.625 15.097,17.266 10.998,17.266 C6.903,17.266 3.213,19.625 1.542,23.292 L0.001,23.292 C1.184,20.274 3.596,17.879 6.674,16.685 L7.252,16.460 L6.711,16.160 C3.948,14.627 2.231,11.743 2.231,8.634 C2.231,3.874 6.163,0.002 10.998,0.002 C15.832,0.002 19.765,3.874 19.765,8.634 C19.765,11.744 18.050,14.628 15.289,16.160 L14.747,16.460 L15.325,16.685 C18.400,17.879 20.812,20.274 21.997,23.292 L20.454,23.292 ZM10.998,1.402 C6.949,1.402 3.655,4.646 3.655,8.634 C3.655,12.622 6.949,15.866 10.998,15.866 C15.049,15.866 18.344,12.622 18.344,8.634 C18.344,4.646 15.049,1.402 10.998,1.402 Z"/>
                </svg>
                </span>
                            <span class="d-inline-block">Account</span>
                        </a>
                    </li>
                    <li class="profile-sidebar-menu_item">
                        <a href="{!! route('notifications') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                                <span class="d-inline-block profile-sidebar-menu_icon">

                    <svg x="0px" y="0px"
                         viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
	<g>
		<path fill="rgb(81, 132, 229)" d="M467.819,431.851l-36.651-61.056c-16.896-28.181-25.835-60.437-25.835-93.312V224
			c0-82.325-67.008-149.333-149.333-149.333S106.667,141.675,106.667,224v53.483c0,32.875-8.939,65.131-25.835,93.312
			l-36.651,61.056c-1.984,3.285-2.027,7.403-0.149,10.731c1.899,3.349,5.461,5.419,9.301,5.419h405.333
			c3.84,0,7.403-2.069,9.301-5.419C469.845,439.253,469.803,435.136,467.819,431.851z M72.171,426.667l26.944-44.907
			C118.016,350.272,128,314.219,128,277.483V224c0-70.592,57.408-128,128-128s128,57.408,128,128v53.483
			c0,36.736,9.984,72.789,28.864,104.277l26.965,44.907H72.171z"/>
	</g>
</g>
<g>
	<g>
		<path fill="rgb(81, 132, 229)" d="M256,0c-23.531,0-42.667,19.136-42.667,42.667v42.667C213.333,91.221,218.112,96,224,96s10.667-4.779,10.667-10.667
			V42.667c0-11.776,9.557-21.333,21.333-21.333s21.333,9.557,21.333,21.333v42.667C277.333,91.221,282.112,96,288,96
			s10.667-4.779,10.667-10.667V42.667C298.667,19.136,279.531,0,256,0z"/>
	</g>
</g>
<g>
	<g>
		<path fill="rgb(81, 132, 229)" d="M302.165,431.936c-3.008-5.077-9.515-6.741-14.613-3.819c-5.099,2.987-6.805,9.536-3.819,14.613
			c2.773,4.715,4.288,10.368,4.288,15.936c0,17.643-14.357,32-32,32c-17.643,0-32-14.357-32-32c0-5.568,1.515-11.221,4.288-15.936
			c2.965-5.099,1.259-11.627-3.819-14.613c-5.141-2.923-11.627-1.259-14.613,3.819c-4.715,8.064-7.211,17.301-7.211,26.731
			C202.667,488.085,226.581,512,256,512s53.333-23.915,53.376-53.333C309.376,449.237,306.88,440,302.165,431.936z"/>
	</g>
</g>
</svg>
                </span>
                            <span class="d-inline-block">Notifications</span>
                        </a>
                    </li>
                    <li class="profile-sidebar-menu_item">
                        <a href="{!! route('my_account_favourites') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 22 21"
                            width="22px" height="21px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M15.952,1.493 C18.635,1.493 20.659,3.532 20.659,6.235 C20.659,9.774 17.405,12.847 11.653,17.972 L11.624,17.999 L11.596,18.027 L11.000,18.625 L10.404,18.027 L10.376,17.999 L10.346,17.972 C4.595,12.847 1.342,9.774 1.342,6.235 C1.342,3.532 3.365,1.493 6.048,1.493 C7.514,1.493 9.020,2.201 9.978,3.342 L11.000,4.560 L12.023,3.342 C12.981,2.201 14.486,1.493 15.952,1.493 M15.952,0.144 C14.077,0.144 12.208,1.031 11.000,2.470 C9.791,1.031 7.923,0.144 6.048,0.144 C2.644,0.144 0.002,2.806 0.002,6.235 C0.002,10.450 3.740,13.886 9.459,18.983 L11.000,20.530 L12.541,18.983 C18.260,13.886 21.998,10.450 21.998,6.235 C21.998,2.806 19.356,0.144 15.952,0.144 L15.952,0.144 Z"/>
                </svg>
                </span>
                            <span class="d-inline-block">Favorites</span>
                        </a>
                    </li>
                    <li class="profile-sidebar-menu_item">
                        <a href="{!! route('my_account_orders') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 21 24"
                            width="21px" height="24px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M16.116,4.279 L16.116,0.439 L4.839,0.439 L4.839,4.279 L0.909,4.279 L0.909,23.736 L20.046,23.736 L20.046,4.279 L16.116,4.279 ZM6.158,1.706 L14.796,1.706 L14.796,4.279 L6.158,4.279 L6.158,1.706 ZM18.726,22.468 L2.228,22.468 L2.228,5.547 L4.839,5.547 L4.839,8.095 L6.158,8.095 L6.158,5.547 L14.796,5.547 L14.796,8.095 L16.116,8.095 L16.116,5.547 L18.726,5.547 L18.726,22.468 Z"/>
                </svg>
                </span>
                            <span class="d-inline-block">Orders</span>
                        </a>
                    </li>
                    <li class="profile-sidebar-menu_item">
                        <a href="{!! route('my_account_address') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15 main-transition">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 21 21"
                            width="21px" height="21px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M2.709,0.614 L2.709,3.948 L0.917,3.948 L0.917,5.239 L2.709,5.239 L2.709,10.161 L0.917,10.161 L0.917,11.452 L2.709,11.452 L2.709,16.359 L0.917,16.359 L0.917,17.650 L2.709,17.650 L2.709,20.999 L20.041,20.999 L20.041,0.614 L2.709,0.614 ZM18.769,19.818 L3.980,19.818 L3.980,17.650 L7.229,17.650 L7.229,16.359 L3.980,16.359 L3.980,11.452 L7.229,11.452 L7.229,10.161 L3.980,10.161 L3.980,5.239 L7.229,5.239 L7.229,3.948 L3.980,3.948 L3.980,1.795 L18.769,1.795 L18.769,19.818 Z"/>
                </svg>
                </span>
                            <span class="d-inline-block">Address</span>
                        </a>
                    </li>
                    <li class="profile-sidebar-menu_item">
                        <a href="{!! route('my_account_tickets') !!}" class="profile-sidebar-menu_link d-inline-flex flex-column align-items-center font-15">
                <span class="d-inline-block profile-sidebar-menu_icon">
                    <svg
                            viewBox="0 0 15 21"
                            width="15px" height="21px">
                    <path fill-rule="evenodd"  fill="rgb(81, 132, 229)"
                          d="M11.421,20.998 L10.105,20.998 C10.105,20.553 9.984,20.139 9.781,19.778 C9.331,19.003 8.476,18.477 7.499,18.477 C6.523,18.477 5.667,19.003 5.218,19.778 C5.015,20.139 4.894,20.553 4.894,20.998 L3.578,20.998 L-0.003,20.998 L-0.003,-0.003 L15.002,-0.003 L15.002,20.998 L11.421,20.998 ZM13.741,6.639 L12.028,6.639 L12.028,5.305 L13.741,5.305 L13.741,1.218 L1.258,1.218 L1.258,5.305 L2.970,5.305 L2.970,6.639 L1.258,6.639 L1.258,19.778 L3.792,19.778 C4.313,18.281 5.777,17.204 7.499,17.204 C9.222,17.204 10.686,18.281 11.207,19.778 L13.741,19.778 L13.741,6.639 ZM5.464,5.305 L9.534,5.305 L9.534,6.639 L5.464,6.639 L5.464,5.305 Z"/>
                </svg>
                </span>
                            <span class="d-inline-block">Tickets</span>

                        </a>
                    </li>
                </ul>
                <div class="mt-auto">
                    {!! Form::open(['url'=>route('logout')]) !!}
                    <div class="text-center">
                        <button type="submit" class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">Logout</button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
    <div class="profile-inner-pg-right-cnt">
        <div class="profile-inner-pg-right-cnt_inner h-100">
           <div class="row flex-lg-row flex-column-reverse">
               <div class="col-lg-9">
                   <div class="row justify-content-md-start justify-content-center display-grid">

                       @foreach($user->favorites as $favorite)
                           {{--<div class="col-sm-4 items">--}}
                           {{--<div class="view-fav-item mb-4">--}}
                           {{--<button class="btn btn-danger view-fav-item_btn-dlt pull-right remove-from-favorite"--}}
                           {{--data-id="{!! $favorite->id !!}" href="#"><i class="fa fa-trash"></i></button>--}}
                           {{--<a href="{!!  route('product_single',[$favorite->type,$favorite->slug]) !!}"--}}
                           {{--class="text-center  px-5 py-3 d-flex flex-column d-block">--}}
                           {{--<span class="d-inline-block mb-3 view-fav-item_img-outer">--}}
                           {{--<img class="img-fluid"--}}
                           {{--src="{!! $favorite->stock->image !!}"--}}
                           {{--alt="{!! $favorite->name !!}">--}}
                           {{--</span>--}}
                           {{--<span class="text-my-yellow">{!! $favorite->name !!}</span>--}}
                           {{--</a>--}}
                           {{--</div>--}}
                           {{--</div>--}}

                           <div class="products-wrap_col">
                               <div class="product-card position-relative">
                                   <div class="product-card_view position-relative">
                                       <!--product main image-->
                                       <div>
                                           <img class="card-img-top" src="{!! $favorite->stock->image !!}" alt="">
                                       </div>
                                       <!--like icon-->
                                       <span class="remove-from-favorite product-card_like-icon d-inline-block pointer position-absolute" data-id="{{ $favorite->id }}"> <!--gets class active-->
                                           {{--<svg viewBox="0 0 20 18" width="20px" height="18px">--}}
                                           {{--<path fill-rule="evenodd" opacity="0.949" fill="rgb(255, 255, 255)"--}}
                                           {{--d="M14.698,-0.003 C13.055,-0.003 11.417,0.767 10.358,2.015 C9.299,0.767 7.661,-0.003 6.017,-0.003 C3.034,-0.003 0.718,2.306 0.718,5.280 C0.718,8.935 3.994,11.915 9.007,16.336 L10.358,17.677 L11.709,16.336 C16.722,11.915 19.998,8.935 19.998,5.280 C19.998,2.306 17.682,-0.003 14.698,-0.003 L14.698,-0.003 Z"/>--}}
                                           {{--</svg>--}}
                                           X
                                </span>
                                       <!--new label-->
                                       <span class="new-label product-card_new-label d-inline-block text-uppercase font-main-bold font-16 text-sec-clr position-absolute">new</span>
                                       <!--sale label-->
                                       <span class="sale-label product-card_sale-label d-inline-block text-uppercase font-main-bold font-16 text-sec-clr position-absolute">-10%</span>
                                   </div>
                                   <div class="product-card_body">
                                       <!--product image thumbs-->
                                       <div class="d-flex product-card-thumbs flex-wrap">
                                           <div class="product-card_thumb-img-holder pointer active_slider">
                                               <img class="" src="{!! $favorite->stock->image !!}" alt="">
                                           </div>
                                           @if($favorite->stock->other_images && is_array($favorite->stock->other_images))
                                               @foreach($favorite->stock->other_images as $other_image)
                                                   <div class="product-card_thumb-img-holder pointer">
                                                       <img class="" src="{{ $other_image }}" alt="">
                                                   </div>
                                               @endforeach
                                           @endif
                                       </div>
                                       <div class="product-card_body-text">
                                           <h2 class="card-title font-21 font-sec-bold">
                                               <a href="{{ route('product_single', ['type' =>"vape", 'slug' => $favorite->stock->slug]) }}">
                                                   {{ $favorite->name }}
                                               </a>
                                           </h2>
                                           <p class="card-text font-main-light font-15 text-light-clr">
                                               {{ $favorite->stock->short_description }}
                                           </p>
                                           <div class="product-card_icons-outer d-flex justify-content-between align-items-center">
                                               <!--icons-->
                                               <div class="product-card_icons">
                                            <span class="product-card_icon d-inline-block">
                                                <svg viewBox="0 0 18 18" width="18px" height="18px">
                                                    <path fill-rule="evenodd" fill="rgb(124, 124, 124)"
                                                          d="M17.791,6.835 C17.566,6.980 17.251,6.934 17.091,6.732 C16.191,5.598 15.052,4.707 13.702,4.086 C10.833,2.759 7.169,2.763 4.305,4.095 C2.950,4.725 1.805,5.620 0.911,6.763 C0.811,6.885 0.656,6.948 0.501,6.948 C0.401,6.948 0.301,6.921 0.211,6.867 C-0.014,6.723 -0.069,6.444 0.091,6.241 C1.081,4.981 2.345,3.991 3.845,3.294 C6.989,1.832 11.008,1.827 14.157,3.285 C15.652,3.978 16.911,4.959 17.906,6.210 C18.066,6.412 18.016,6.691 17.791,6.835 ZM14.807,2.223 C14.727,2.223 14.652,2.205 14.577,2.173 C12.662,1.282 10.998,0.900 9.009,0.900 C7.024,0.900 5.155,1.327 3.440,2.169 C3.195,2.286 2.895,2.209 2.761,1.989 C2.631,1.768 2.715,1.499 2.960,1.377 C4.825,0.463 6.859,-0.000 9.009,-0.000 C11.138,-0.000 12.997,0.423 15.037,1.372 C15.282,1.485 15.377,1.759 15.252,1.980 C15.162,2.133 14.987,2.223 14.807,2.223 ZM8.964,4.347 C13.507,4.347 17.206,7.510 17.206,11.398 C17.206,12.861 15.822,14.049 14.127,14.049 C12.432,14.049 11.048,12.861 11.048,11.398 C11.048,10.435 10.113,9.648 8.968,9.648 C7.824,9.648 6.889,10.431 6.889,11.398 C6.889,12.933 7.554,14.377 8.758,15.457 C9.704,16.303 10.623,16.771 12.032,17.118 C12.297,17.185 12.458,17.433 12.382,17.671 C12.323,17.869 12.122,18.000 11.902,18.000 C11.857,18.000 11.813,17.995 11.773,17.982 C10.178,17.590 9.138,17.059 8.059,16.092 C6.664,14.841 5.894,13.171 5.894,11.394 C5.894,9.931 7.274,8.743 8.973,8.743 C10.673,8.743 12.053,9.931 12.053,11.394 C12.053,12.357 12.988,13.144 14.132,13.144 C15.277,13.144 16.211,12.361 16.211,11.394 C16.211,8.001 12.962,5.242 8.968,5.242 C6.125,5.242 3.530,6.664 2.361,8.869 C1.971,9.598 1.776,10.449 1.776,11.394 C1.776,12.096 1.845,13.203 2.440,14.638 C2.536,14.872 2.406,15.129 2.146,15.219 C1.886,15.304 1.601,15.187 1.500,14.953 C1.011,13.770 0.771,12.609 0.771,11.394 C0.771,10.314 1.001,9.333 1.456,8.483 C2.790,5.971 5.740,4.347 8.964,4.347 ZM8.999,6.538 C12.123,6.538 14.662,8.712 14.662,11.389 C14.662,11.637 14.437,11.839 14.162,11.839 C13.887,11.839 13.662,11.637 13.662,11.389 C13.662,9.211 11.573,7.438 8.999,7.438 C6.429,7.438 4.335,9.211 4.335,11.389 C4.335,12.685 4.655,13.882 5.259,14.859 C5.904,15.894 6.334,16.339 7.104,17.037 C7.299,17.212 7.299,17.500 7.099,17.671 C7.009,17.766 6.879,17.806 6.754,17.806 C6.624,17.806 6.499,17.761 6.400,17.671 C5.534,16.884 5.065,16.384 4.390,15.300 C3.700,14.193 3.335,12.838 3.335,11.389 C3.335,8.716 5.875,6.538 8.999,6.538 ZM8.443,11.394 C8.443,11.146 8.668,10.944 8.944,10.944 C9.219,10.944 9.443,11.146 9.443,11.394 C9.443,12.658 10.168,13.855 11.383,14.598 C12.087,15.030 12.917,15.241 13.917,15.241 C14.157,15.241 14.562,15.219 14.962,15.156 C15.232,15.111 15.491,15.277 15.542,15.520 C15.592,15.763 15.407,15.997 15.137,16.042 C14.552,16.137 14.057,16.141 13.917,16.141 C12.727,16.141 11.683,15.871 10.818,15.345 C9.333,14.436 8.443,12.960 8.443,11.394 Z"/>
                                                </svg>
                                            </span>
                                                   <span class="product-card_icon d-inline-block">
                                                <svg viewBox="0 0 16 17" width="16px" height="17px">
                                                    <path fill-rule="evenodd" fill="rgb(124, 124, 124)"
                                                          d="M16.000,4.548 C16.000,4.315 15.877,4.111 15.686,4.009 L8.258,0.062 C8.081,-0.025 7.875,-0.025 7.711,0.092 C7.547,0.194 7.452,0.397 7.452,0.601 L7.452,7.534 L0.845,4.009 C0.571,3.863 0.229,3.980 0.093,4.271 C-0.044,4.563 0.065,4.927 0.339,5.072 L6.753,8.480 L0.339,11.917 C0.065,12.063 -0.058,12.427 0.093,12.718 C0.188,12.922 0.393,13.053 0.599,13.053 C0.681,13.053 0.763,13.039 0.845,12.995 L7.452,9.471 L7.452,16.403 C7.452,16.607 7.547,16.796 7.711,16.912 C7.807,16.971 7.903,17.000 8.012,17.000 C8.094,17.000 8.190,16.985 8.258,16.942 L15.686,12.995 C15.877,12.893 16.000,12.689 16.000,12.456 C16.000,12.223 15.877,12.019 15.686,11.917 L9.270,8.495 L15.686,5.087 C15.877,4.985 16.000,4.781 16.000,4.548 ZM8.573,15.427 L8.573,9.471 L14.181,12.456 L8.573,15.427 ZM8.573,7.534 L8.573,1.562 L14.181,4.548 L8.573,7.534 Z"/>
                                                </svg>
                                            </span>
                                                   <span class="product-card_icon d-inline-block">
                                                <svg viewBox="0 0 20 15" width="20px" height="15px">
                                                    <path fill-rule="evenodd" fill="rgb(124, 124, 124)"
                                                          d="M19.794,5.420 C19.690,5.514 19.554,5.566 19.412,5.566 C19.255,5.566 19.109,5.505 19.002,5.394 C16.700,3.007 13.586,1.693 10.231,1.693 C6.876,1.693 3.761,3.007 1.461,5.394 C1.354,5.505 1.208,5.566 1.050,5.566 C0.908,5.566 0.773,5.514 0.668,5.420 C0.442,5.217 0.429,4.873 0.641,4.654 C3.156,2.045 6.562,0.609 10.231,0.608 C13.901,0.609 17.307,2.045 19.822,4.654 C20.033,4.873 20.020,5.217 19.794,5.420 ZM10.231,4.473 C12.727,4.472 15.121,5.464 16.970,7.266 C17.076,7.368 17.133,7.505 17.133,7.649 C17.132,7.794 17.073,7.930 16.967,8.032 C16.861,8.133 16.721,8.189 16.572,8.189 C16.421,8.189 16.280,8.132 16.174,8.029 C14.537,6.435 12.427,5.557 10.232,5.557 C8.035,5.557 5.925,6.435 4.288,8.029 C4.183,8.132 4.041,8.189 3.890,8.189 C3.741,8.189 3.601,8.133 3.495,8.032 C3.276,7.821 3.274,7.477 3.492,7.265 C5.341,5.465 7.734,4.473 10.231,4.473 ZM10.166,8.371 L10.223,8.371 C11.492,8.371 12.884,8.950 13.858,9.882 C13.964,9.984 14.023,10.120 14.024,10.264 C14.024,10.409 13.966,10.546 13.861,10.649 C13.755,10.752 13.614,10.809 13.463,10.809 C13.314,10.809 13.173,10.753 13.068,10.652 C12.309,9.925 11.192,9.455 10.224,9.455 L10.167,9.455 C9.198,9.455 8.081,9.925 7.322,10.652 C7.217,10.753 7.076,10.809 6.927,10.809 C6.777,10.809 6.635,10.752 6.529,10.649 C6.311,10.436 6.313,10.092 6.533,9.882 C7.506,8.950 8.898,8.371 10.166,8.371 ZM10.192,12.459 C10.780,12.459 11.259,12.922 11.259,13.490 C11.259,14.059 10.780,14.521 10.192,14.521 C9.604,14.521 9.126,14.059 9.126,13.490 C9.126,12.922 9.604,12.459 10.192,12.459 Z"/>
                                                </svg>
                                            </span>
                                               </div>
                                               <!--Price-->
                                           {{--<span class="product-card_price d-inline-block font-sec-bold font-24 text-tert-clr lh-1 ml-auto">--}}
                                           {{--$70--}}
                                           {{--<!--old price-->--}}
                                           {{--<span class="product-card_old-price font-sec-reg font-18 text-gray-clr lh-1 position-absolute">$77</span>--}}
                                           {{--</span>--}}
                                           <!--Price-->
                                               <span class="product-card_price d-inline-block font-sec-bold font-24 text-tert-clr lh-1 ml-auto">${{ $favorite->price }}</span>
                                           </div>
                                       </div>
                                       <!--btn-->

                                       <a
                                               class="product-card_btn d-inline-flex align-items-center text-center font-15 text-sec-clr text-uppercase text-white cursor-pointer __add_to_card" data-id="{{ $favorite->id }}">
                                           <span class="product-card_btn-text">add to cart</span>
                                           <span class="d-inline-block ml-auto">
                                    <svg viewBox="0 0 18 22" width="18px" height="22px">
<path fill-rule="evenodd" opacity="0.8" fill="rgb(255, 255, 255)"
      d="M14.305,3.679 L14.305,0.003 L3.694,0.003 L3.694,3.679 L-0.004,3.679 L-0.004,21.998 L18.003,21.998 L18.003,3.679 L14.305,3.679 ZM4.935,1.216 L13.064,1.216 L13.064,3.679 L4.935,3.679 L4.935,1.216 ZM16.761,20.785 L1.238,20.785 L1.238,4.891 L3.694,4.891 L3.694,7.329 L4.935,7.329 L4.935,4.891 L13.064,4.891 L13.064,7.329 L14.305,7.329 L14.305,4.891 L16.761,4.891 L16.761,20.785 Z"/>
</svg>
                                </span>
                                       </a>
                                   </div>

                               </div>
                           </div>
                       @endforeach
                   </div>
               </div>
               <div class="col-lg-3 mb-xl-0 mb-4">
               </div>
           </div>
        </div>
    </div>
            {{--@include('frontend.my_account._partials.verify_bar.blade.php')--}}

        </div>
    </main>
@stop
@section('js')
    <script>
        $(function () {
            $('.remove-from-favorite').on('click', function () {



                let variation_id = $(this).data("id");
                let _this = $(this);

                $.ajax({
                    type: "post",
                    url: "/my-account/delete_favourites",
                    cache: false,
                    data: {
                        id: variation_id
                    },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        console.log(data);
                        if (!data.error) {
                            _this.closest(".products-wrap_col").remove();
                        } else {
                            alert("error");
                        }
                    }
                })
            });





            $("body").on('click', '.__add_to_card', function () {
                var variationId = $(this).data("id");

                if (variationId && variationId != '') {
//                    console.log(requiredItems)
//                    return false;
                    console.log(variationId);
                    $.ajax({
                        type: "post",
                        url: "/add-to-cart",
                        cache: false,
                        datatype: "json",
                        data: {
                            uid: variationId
                        },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function (data) {
                            console.log(data);
                            if (!data.error) {
                                $(".cart-count").html(data.count)
                                $('#cartSidebar').html(data.headerHtml)
                                $("#headerShopCartBtn").trigger('click');
                            } else {

                            }
                        }
                    });
                } else {
                    alert('Select available variation');
                }
            });
        })
    </script>
@stop