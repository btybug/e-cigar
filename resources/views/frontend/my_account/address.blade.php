@extends('layouts.frontend')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="page-main-content">
        <div class="d-flex h-100">
            <div id="profileSidebar" class="profile-aside profile-page-profile-aside d-flex flex-column">
                <div class="profile-aside-dtls">
                    <div class="profile-aside-img-holder">
                        <img src="/public/img/profile.png" alt="">
                    </div>
                    <h2 class="profile-aside-username text-white text-center">Admin</h2>
                </div>
                <ul class="user-aside-menu list-unstyled">
                    <li class="user-aside-menu-item">
                        <a href="{!! route('my_account') !!}" class="user-aside-menu-link text-white d-inline-flex align-items-center">
                <span class="user-aside-menu-icon-holder">
                    <svg width="37px" height="34px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M34.000,17.000 C34.000,7.626 26.373,-0.000 17.000,-0.000 C7.626,-0.000 -0.000,7.626 -0.000,17.000 C-0.000,21.951 2.129,26.414 5.518,29.523 L5.502,29.537 L6.053,30.002 C6.089,30.032 6.128,30.057 6.164,30.087 C6.457,30.330 6.760,30.560 7.069,30.784 C7.170,30.856 7.270,30.928 7.372,30.999 C7.702,31.226 8.041,31.442 8.387,31.647 C8.462,31.691 8.538,31.734 8.614,31.778 C8.993,31.993 9.380,32.197 9.776,32.383 C9.805,32.397 9.835,32.409 9.864,32.423 C11.156,33.023 12.534,33.464 13.976,33.724 C14.013,33.731 14.051,33.738 14.089,33.745 C14.537,33.822 14.990,33.884 15.448,33.925 C15.503,33.930 15.559,33.933 15.615,33.938 C16.071,33.976 16.532,34.000 17.000,34.000 C17.463,34.000 17.920,33.976 18.373,33.939 C18.431,33.934 18.488,33.931 18.546,33.926 C19.000,33.885 19.449,33.825 19.892,33.749 C19.931,33.742 19.970,33.735 20.008,33.728 C21.428,33.473 22.787,33.042 24.061,32.458 C24.108,32.436 24.156,32.416 24.203,32.393 C24.584,32.214 24.957,32.021 25.322,31.815 C25.413,31.763 25.504,31.711 25.594,31.658 C25.926,31.462 26.253,31.258 26.571,31.040 C26.686,30.962 26.797,30.880 26.911,30.798 C27.182,30.603 27.448,30.402 27.707,30.191 C27.765,30.144 27.827,30.104 27.883,30.057 L28.449,29.584 L28.432,29.570 C31.850,26.459 34.000,21.976 34.000,17.000 ZM1.236,17.000 C1.236,8.308 8.308,1.236 17.000,1.236 C25.692,1.236 32.764,8.308 32.764,17.000 C32.764,21.684 30.708,25.895 27.454,28.784 C27.272,28.659 27.089,28.546 26.902,28.452 L21.668,25.836 C21.198,25.601 20.906,25.128 20.906,24.604 L20.906,22.776 C21.027,22.626 21.155,22.457 21.288,22.271 C21.965,21.314 22.508,20.249 22.905,19.104 C23.688,18.731 24.194,17.951 24.194,17.070 L24.194,14.879 C24.194,14.343 23.997,13.823 23.645,13.414 L23.645,10.529 C23.678,10.209 23.791,8.398 22.481,6.904 C21.342,5.604 19.498,4.945 17.000,4.945 C14.502,4.945 12.658,5.604 11.518,6.904 C10.208,8.397 10.322,10.208 10.354,10.529 L10.354,13.414 C10.003,13.823 9.806,14.342 9.806,14.878 L9.806,17.070 C9.806,17.750 10.111,18.385 10.634,18.814 C11.135,20.775 12.166,22.260 12.546,22.763 L12.546,24.552 C12.546,25.057 12.271,25.520 11.828,25.763 L6.940,28.429 C6.784,28.514 6.630,28.612 6.475,28.723 C3.261,25.835 1.236,21.650 1.236,17.000 ZM26.247,29.754 C26.031,29.911 25.811,30.063 25.588,30.209 C25.485,30.275 25.383,30.342 25.279,30.407 C24.987,30.588 24.690,30.759 24.387,30.920 C24.320,30.955 24.253,30.989 24.186,31.023 C23.490,31.380 22.769,31.687 22.029,31.936 C22.003,31.945 21.977,31.954 21.951,31.962 C21.563,32.091 21.171,32.205 20.774,32.304 C20.773,32.304 20.771,32.304 20.770,32.304 C20.370,32.403 19.964,32.485 19.556,32.553 C19.545,32.555 19.534,32.557 19.523,32.559 C19.139,32.621 18.752,32.667 18.364,32.701 C18.295,32.707 18.226,32.711 18.157,32.716 C17.773,32.745 17.387,32.764 17.000,32.764 C16.608,32.764 16.217,32.744 15.828,32.715 C15.761,32.710 15.694,32.706 15.627,32.700 C15.235,32.665 14.845,32.619 14.459,32.556 C14.441,32.553 14.424,32.550 14.407,32.547 C13.589,32.410 12.785,32.209 12.002,31.946 C11.978,31.938 11.953,31.930 11.929,31.922 C11.540,31.789 11.156,31.643 10.778,31.481 C10.775,31.480 10.772,31.478 10.770,31.477 C10.413,31.323 10.062,31.153 9.716,30.973 C9.671,30.949 9.625,30.927 9.580,30.903 C9.265,30.734 8.955,30.552 8.651,30.361 C8.560,30.304 8.471,30.247 8.382,30.189 C8.101,30.005 7.824,29.814 7.555,29.612 C7.527,29.591 7.500,29.569 7.472,29.548 C7.492,29.537 7.512,29.526 7.532,29.514 L12.420,26.848 C13.260,26.390 13.783,25.510 13.783,24.552 L13.782,22.326 L13.640,22.154 C13.626,22.138 12.290,20.512 11.785,18.311 L11.729,18.066 L11.518,17.930 C11.220,17.737 11.042,17.416 11.042,17.069 L11.042,14.878 C11.042,14.590 11.164,14.323 11.387,14.122 L11.591,13.937 L11.591,10.494 L11.585,10.413 C11.583,10.398 11.401,8.912 12.448,7.718 C13.342,6.699 14.874,6.182 17.000,6.182 C19.118,6.182 20.645,6.695 21.541,7.706 C22.587,8.888 22.416,10.402 22.414,10.414 L22.409,13.939 L22.613,14.123 C22.835,14.323 22.957,14.592 22.957,14.879 L22.957,17.070 C22.957,17.511 22.657,17.911 22.227,18.044 L21.920,18.139 L21.821,18.445 C21.456,19.578 20.937,20.624 20.278,21.555 C20.116,21.784 19.958,21.987 19.823,22.142 L19.670,22.317 L19.670,24.604 C19.670,25.600 20.224,26.496 21.115,26.942 L26.349,29.558 C26.383,29.575 26.415,29.592 26.448,29.610 C26.382,29.660 26.314,29.706 26.247,29.754 Z"></path>
</svg></span>Account</a>
                    </li>
                    <li class="user-aside-menu-item">
                        <a href="{!! route('my_account_favourites') !!}" class="user-aside-menu-link text-white d-inline-flex align-items-center">
                <span class="user-aside-menu-icon-holder">
                    <svg width="37px" height="30px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M31.814,8.946 C31.351,3.762 27.742,0.000 23.226,0.000 C20.217,0.000 17.462,1.647 15.912,4.285 C14.376,1.613 11.734,-0.000 8.774,-0.000 C4.259,-0.000 0.649,3.761 0.187,8.945 C0.150,9.174 -0.000,10.379 0.456,12.344 C1.114,15.179 2.634,17.757 4.850,19.799 L15.905,30.000 L27.150,19.800 C29.366,17.757 30.886,15.180 31.543,12.344 C32.000,10.380 31.850,9.175 31.814,8.946 ZM30.355,12.060 C29.755,14.649 28.363,17.008 26.333,18.877 L15.912,28.331 L5.670,18.879 C3.637,17.006 2.246,14.648 1.645,12.059 C1.213,10.200 1.390,9.149 1.391,9.142 L1.400,9.080 C1.797,4.538 4.897,1.241 8.774,1.241 C11.634,1.241 14.152,3.028 15.347,5.904 L15.909,7.259 L16.471,5.904 C17.647,3.072 20.298,1.242 23.227,1.242 C27.102,1.242 30.204,4.539 30.609,9.139 C30.610,9.149 30.787,10.200 30.355,12.060 Z"></path>
</svg></span>Favorites</a>
                    </li>
                    <li class="user-aside-menu-item">
                        <a href="{!! route('my_account_orders') !!}" class="user-aside-menu-link text-white d-inline-flex align-items-center">
                <span class="user-aside-menu-icon-holder">
                   <svg width="37px" height="36px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M29.828,35.810 C29.714,35.931 29.557,36.000 29.392,36.000 L0.607,36.000 C0.443,36.000 0.286,35.931 0.172,35.810 C0.059,35.689 -0.000,35.526 0.008,35.359 L1.208,11.562 C1.213,11.467 1.243,11.382 1.285,11.304 C1.290,11.296 1.288,11.287 1.292,11.279 L3.091,8.228 C3.200,8.044 3.395,7.932 3.606,7.932 L4.036,7.932 L3.549,3.742 C3.511,3.408 3.746,3.105 4.074,3.065 L10.826,2.253 C10.843,2.211 10.854,2.168 10.881,2.130 C11.839,0.796 13.378,-0.000 15.000,-0.000 C17.401,-0.000 19.465,1.743 19.964,4.100 L25.345,5.381 C25.500,5.417 25.634,5.515 25.718,5.653 C25.802,5.790 25.829,5.956 25.792,6.114 L25.374,7.932 L26.394,7.932 C26.605,7.932 26.800,8.044 26.908,8.228 L28.707,11.279 C28.711,11.286 28.710,11.295 28.713,11.302 C28.756,11.381 28.787,11.467 28.792,11.562 L29.992,35.359 C30.000,35.526 29.941,35.689 29.828,35.810 ZM4.178,9.152 L3.945,9.152 L2.866,10.983 L4.390,10.983 L4.178,9.152 ZM4.811,4.205 L5.598,10.983 L8.517,10.983 L8.043,8.974 C7.965,8.647 8.163,8.317 8.485,8.238 L14.083,6.869 L13.650,3.142 L4.811,4.205 ZM9.349,9.282 L9.751,10.983 L18.736,10.983 L17.843,7.204 L9.349,9.282 ZM15.000,1.220 C14.151,1.220 13.343,1.523 12.675,2.030 L14.104,1.859 C14.263,1.840 14.421,1.885 14.546,1.985 C14.671,2.086 14.752,2.232 14.770,2.393 L15.257,6.581 L15.865,6.433 L16.449,3.890 C16.485,3.733 16.582,3.596 16.717,3.511 C16.852,3.426 17.015,3.398 17.170,3.435 L18.635,3.784 C18.070,2.279 16.637,1.220 15.000,1.220 ZM17.481,4.762 L17.170,6.113 L18.146,5.875 C18.302,5.837 18.464,5.863 18.599,5.947 C18.735,6.032 18.832,6.168 18.869,6.325 L19.970,10.983 L23.441,10.983 L24.488,6.430 L17.481,4.762 ZM26.054,9.152 L25.093,9.152 L24.673,10.983 L27.134,10.983 L26.054,9.152 ZM27.623,12.203 L2.376,12.203 L1.238,34.780 L28.761,34.780 L27.623,12.203 ZM10.502,13.424 C11.494,13.424 12.301,14.245 12.301,15.254 C12.301,16.049 11.798,16.720 11.102,16.972 L11.102,19.220 C11.102,21.407 12.850,23.186 15.000,23.186 C17.149,23.186 18.898,21.407 18.898,19.220 L18.898,16.972 C18.201,16.720 17.698,16.049 17.698,15.254 C17.698,14.245 18.505,13.424 19.497,13.424 C20.489,13.424 21.296,14.245 21.296,15.254 C21.296,16.049 20.794,16.720 20.097,16.972 L20.097,19.220 C20.097,22.080 17.810,24.407 15.000,24.407 C12.189,24.407 9.903,22.080 9.903,19.220 L9.903,16.972 C9.206,16.720 8.703,16.049 8.703,15.254 C8.703,14.245 9.510,13.424 10.502,13.424 ZM19.497,14.644 C19.167,14.644 18.898,14.918 18.898,15.254 C18.898,15.353 18.926,15.442 18.967,15.524 C19.075,15.365 19.247,15.254 19.451,15.254 L19.497,15.254 C19.717,15.254 19.900,15.380 20.005,15.559 C20.058,15.468 20.097,15.368 20.097,15.254 C20.097,14.918 19.828,14.644 19.497,14.644 ZM9.995,15.559 C10.099,15.380 10.283,15.254 10.502,15.254 C10.721,15.254 10.905,15.380 11.010,15.559 C11.063,15.468 11.102,15.368 11.102,15.254 C11.102,14.918 10.833,14.644 10.502,14.644 C10.171,14.644 9.903,14.918 9.903,15.254 C9.903,15.368 9.941,15.468 9.995,15.559 Z"></path>
</svg></span>Orders</a>
                    </li>
                    <li class="user-aside-menu-item">
                        <a href="{!! route('my_account_address') !!}" class="user-aside-menu-link text-white d-inline-flex align-items-center">
                <span class="user-aside-menu-icon-holder">
                   <svg width="37px" height="33px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M27.921,33.000 L5.807,33.000 C4.127,33.000 2.796,31.664 2.796,29.978 L2.796,23.799 L-0.000,23.799 L-0.000,22.396 L2.796,22.396 L2.796,17.201 L-0.000,17.201 L-0.000,15.798 L2.796,15.798 L2.796,10.604 L-0.000,10.604 L-0.000,9.201 L2.796,9.201 L2.796,3.022 C2.796,1.336 4.127,-0.000 5.807,-0.000 L27.989,-0.000 C29.669,-0.000 31.000,1.336 31.000,3.022 L31.000,29.978 C30.933,31.664 29.602,33.000 27.921,33.000 ZM29.595,29.991 L29.595,3.022 C29.595,2.111 28.829,1.410 27.989,1.410 L5.807,1.410 C4.900,1.410 4.201,2.179 4.201,3.022 L4.201,9.215 L6.863,9.215 L6.863,10.618 L4.201,10.618 L4.201,15.812 L6.863,15.812 L6.863,17.215 L4.201,17.215 L4.201,22.409 L6.869,22.409 L6.869,23.812 L4.208,23.812 L4.208,29.991 C4.208,30.902 4.974,31.604 5.814,31.604 L27.995,31.604 C28.903,31.604 29.602,30.835 29.602,29.991 L29.595,29.991 ZM17.214,24.939 C14.411,24.939 11.971,24.204 10.849,23.151 C10.432,22.726 10.896,16.088 15.392,16.088 L18.962,16.088 C23.452,16.088 23.794,22.895 23.371,23.252 C22.322,24.237 20.017,24.939 17.214,24.939 ZM19.036,17.424 L15.466,17.424 C12.361,17.424 11.971,22.058 12.038,22.268 C12.879,23.037 14.908,23.529 17.214,23.529 C19.519,23.529 21.549,23.043 22.390,22.268 C22.464,22.052 22.107,17.417 19.036,17.424 ZM17.147,15.664 C15.043,15.664 13.369,13.977 13.369,11.872 C13.369,9.768 15.050,8.081 17.147,8.081 C19.244,8.081 20.924,9.768 20.924,11.872 C20.998,13.977 19.244,15.664 17.147,15.664 ZM17.147,9.484 C15.816,9.484 14.693,10.537 14.693,11.872 C14.693,13.208 15.823,14.260 17.147,14.260 C18.471,14.260 19.593,13.208 19.593,11.872 C19.593,10.537 18.545,9.484 17.147,9.484 Z"></path>
</svg></span>Address</a>
                    </li>
                    <li class="user-aside-menu-item">
                        <a href="{!! route('my_account_tickets') !!}" class="user-aside-menu-link text-white d-inline-flex align-items-center">
                <span class="user-aside-menu-icon-holder">
                   <svg width="37px" height="37px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M13.934,37.000 L9.703,32.768 L10.106,32.365 C10.862,31.609 11.080,31.060 11.080,29.915 C11.080,27.600 9.400,25.920 7.085,25.920 C5.940,25.920 5.391,26.138 4.635,26.894 L4.231,27.297 L-0.000,23.066 L23.066,-0.000 L27.297,4.231 L26.894,4.635 C26.138,5.391 25.920,5.940 25.920,7.085 C25.920,9.400 27.600,11.080 29.915,11.080 C31.060,11.080 31.609,10.862 32.365,10.106 L32.768,9.703 L37.000,13.934 L13.934,37.000 ZM32.753,11.301 C31.941,11.981 31.160,12.222 29.915,12.222 C26.986,12.222 24.778,10.014 24.778,7.085 C24.778,5.840 25.019,5.059 25.699,4.248 L23.066,1.614 L15.883,8.797 L17.762,10.677 L16.955,11.484 L15.076,9.604 L1.614,23.066 L4.247,25.699 C5.059,25.019 5.840,24.778 7.085,24.778 C10.014,24.778 12.222,26.986 12.222,29.915 C12.222,31.160 11.981,31.941 11.301,32.752 L13.934,35.386 L27.396,21.924 L25.516,20.045 L26.323,19.238 L28.203,21.117 L35.386,13.934 L32.753,11.301 ZM22.092,16.621 L22.899,15.814 L25.182,18.097 L24.375,18.904 L22.092,16.621 ZM18.096,12.626 L18.903,11.819 L21.186,14.102 L20.379,14.909 L18.096,12.626 Z"></path>
</svg></span>Tickets</a>
                    </li>
                    <li class="user-aside-menu-item">
                        <a href="{!! route('my_account_verification') !!}" class="user-aside-menu-link text-white d-inline-flex align-items-center">
                <span class="user-aside-menu-icon-holder">
                   <svg width="37px" height="37px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)" d="M13.934,37.000 L9.703,32.768 L10.106,32.365 C10.862,31.609 11.080,31.060 11.080,29.915 C11.080,27.600 9.400,25.920 7.085,25.920 C5.940,25.920 5.391,26.138 4.635,26.894 L4.231,27.297 L-0.000,23.066 L23.066,-0.000 L27.297,4.231 L26.894,4.635 C26.138,5.391 25.920,5.940 25.920,7.085 C25.920,9.400 27.600,11.080 29.915,11.080 C31.060,11.080 31.609,10.862 32.365,10.106 L32.768,9.703 L37.000,13.934 L13.934,37.000 ZM32.753,11.301 C31.941,11.981 31.160,12.222 29.915,12.222 C26.986,12.222 24.778,10.014 24.778,7.085 C24.778,5.840 25.019,5.059 25.699,4.248 L23.066,1.614 L15.883,8.797 L17.762,10.677 L16.955,11.484 L15.076,9.604 L1.614,23.066 L4.247,25.699 C5.059,25.019 5.840,24.778 7.085,24.778 C10.014,24.778 12.222,26.986 12.222,29.915 C12.222,31.160 11.981,31.941 11.301,32.752 L13.934,35.386 L27.396,21.924 L25.516,20.045 L26.323,19.238 L28.203,21.117 L35.386,13.934 L32.753,11.301 ZM22.092,16.621 L22.899,15.814 L25.182,18.097 L24.375,18.904 L22.092,16.621 ZM18.096,12.626 L18.903,11.819 L21.186,14.102 L20.379,14.909 L18.096,12.626 Z"></path>
</svg></span>Verification</a>
                    </li>
                </ul>
                <form method="POST" action="http://e-cigar.loc/logout" accept-charset="UTF-8"><input name="_token" type="hidden" value="teujYutXdjnkk0xIfCeJO62V30CdYAHbHsElmVE1">
                    <div class="text-center">
                        <button type="submit" class="profile-aside-btn-logout btn mt-auto align-self-center rounded-0">Logout</button>
                    </div>
                </form>
            </div>

            <div class="main-right-wrapp">
                <div class="container mt-5">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address active" id="billingAddress-tab"
                               data-toggle="tab" href="#billingAddress" role="tab" aria-controls="billingAddress"
                               aria-selected="true" aria-expanded="true">Billing Address</a>
                        </li>
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address" id="shippingAddress-tab"
                               data-toggle="tab" href="#shippingAddress" role="tab" aria-controls="shippingAddress">Shipping Address</a>
                        </li>
                        <li>
                            <a class="btn btn-info nav-link nav-link--new-address" id="addressBook-tab" data-toggle="tab"
                               href="#addressBook" role="tab" aria-controls="addressBook">Address Book</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in show p-4" id="billingAddress" role="tabpanel"
                             aria-labelledby="billingAddress-tab">
                            {!! Form::model($billing_address,['class'=>'form-horizontal']) !!}
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Name</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Company name</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('company',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">1st Line address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">2nd line address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Country</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('country',['' => 'SELECT'] + $countries,null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Regions</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('region',null,['class'=>'form-control','id' => 'regions']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">City</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Post Code</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('type','billing_address') !!}
                            {!! Form::hidden('id') !!}
                            <div class="form-group row">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade p-4" id="shippingAddress" role="tabpanel"
                             aria-labelledby="shippingAddress-tab">
                            {!! Form::model($default_shipping,['class'=>'form-horizontal']) !!}
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Name</label>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! Form::text('first_name',null,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Form::text('last_name',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Company name</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('company',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">1st Line address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('first_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">2nd line address</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('second_line_address',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Country</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('country',$countriesShipping,null,['class'=>'form-control','id' => 'geo_country']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Regions</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('region',getRegionByZone(@$default_shipping->country),$default_shipping->region?$default_shipping->region:null,['class'=>'form-control','id' => 'geo_region']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group hide">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">City</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('city',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label for="text" class="control-label col-sm-4">Post Code</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('post_code',null,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::hidden('type','default_shipping') !!}
                            {!! Form::hidden('id') !!}
                            <div class="form-group row">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade p-4" id="addressBook" role="tabpanel" aria-labelledby="addressBook-tab">
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <div>
                                        <div class="p-5">

                                            <div class="form-group row mb-5">
                                                <div class="col-md-5">
                                                    <h5>
                                                        <label for="selectAddress" class="control-label text-muted">Select
                                                            your address</label>
                                                    </h5>
                                                </div>
                                                <div class="col-md-7 d-flex">
                                                {!! Form::select('address_book',$address,null,['class' => 'form-control select-address']) !!}
                                                <!-- Button trigger modal -->
                                                    <button type="button"
                                                            class="nav-link nav-link--new-address btn btn-info address-book-new">+ Add New
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="border py-3 px-4">
                                                <div class="render-address">

                                                </div>
                                                <button type="submit" class="btn btn-primary edit-address">Edit</button>
                                                <button type="button" class="btn btn-danger edit-address">Delete</button>
                                            </div>

                                        </div>
                                    </div>
                                    {{--Inner Tab Content--}}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>





    <div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog"
         aria-labelledby="newAddressModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Address Book</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body address-form">

                </div>
            </div>
        </div>
    </div>
@stop



@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <style>
        /*.btn-group-vertical .btn {*/
        /*width: 135px;*/
        /*border: 1px solid;*/
        /*margin-bottom: 3px;*/
        /*}*/

        /*.add-new {*/
        /*width: 135px;*/
        /*}*/
    </style>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $("body").on('click','.save-address-book',function () {
                var form = $(".address-book-form").serialize();
                AjaxCall(
                    "/my-account/save-address-book",
                    form,
                    res => {
                        if (!res.error) {
                            window.location.reload();
                        }
                    },
                    error => {
                        if(error.status == 422) {
                            $('.errors').html('');
                            for (var err in error.responseJSON.errors) {
                                $('.errors').append(error.responseJSON.errors[err] + '<br>');
                            }
                        }
                    }
                );
            })

            $("#country").select2();
            $("#geo_country").select2();
            function getRegionsPackage(){
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    { country: value},
                    res => {
                    let select = document.getElementById('regions');
                select.innerText = null;
                if (!res.error) {
                    $.each(res.data,function (index,value) {
                        var opt = document.createElement('option');
                        opt.value = res.data[value];
                        opt.innerHTML = res.data[value];
                        select.appendChild(opt);
                    })

                }
            }
            );
            }

            $("body").on('click','.address-book-new',function () {
                AjaxCall(
                    "/my-account/address-book-form",
                    { },
                    res => {
                        if (!res.error) {
                            $(".address-form").html(res.html);
                            $("#geo_country_book").select2();
                            $("#newAddressModal").modal();
                        }
                    }
                );
            });

            $("body").on('click','.edit-address',function () {
                var id = $(".select-address").val();
                AjaxCall(
                    "/my-account/address-book-form",
                    { id: id},
                    res => {
                        if (!res.error) {
                            $(".address-form").html(res.html);
                            $("#geo_country_book").select2();
                            $("#newAddressModal").modal();
                        }
                    }
                );
            });

            function getRegions(){
                let value = $("#geo_country").val();
                AjaxCall(
                        "/get-regions-by-geozone",
                        { country: value},
                        res => {
                            let select = document.getElementById('geo_region');
                        select.innerText = null;
                        if (!res.error) {
                            var opt = document.createElement('option');
                            $.each(res.data,function (k,v) {
                                var option=$(opt).clone();
                                option.val(k) ;
                                option.text(v);
                                $(select).append(option);
                            });

                        }
                    }
                );
            }

            function renderAddressBook(){
                let value = $(".select-address").val();
                AjaxCall(
                        "/my-account/select-address-book",
                        { id: value},
                        res => {
                        if (!res.error) {
                            $(".render-address").html(res.html);
                        }
                    }
                );
            }
            renderAddressBook();
            $("body").on("change", ".select-address", function() {
                renderAddressBook();
            });

            $("body").on("change", "#country", function() {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function() {
                getRegions();
            });

            $("body").on("change", "#geo_country_book", function() {
                var value = $(this).val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    { country: value},
                    res => {
                        let select = document.getElementById('geo_region_book');
                        select.innerText = null;
                        if (!res.error) {
                            var opt = document.createElement('option');
                            $.each(res.data,function (k,v) {
                                var option=$(opt).clone();
                                option.val(k) ;
                                option.text(v);
                                $(select).append(option);
                            });
                        }
                    }
                );
            });
        })
    </script>
@endsection