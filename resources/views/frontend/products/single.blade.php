@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="d-flex h-100">
            <div class="main-left-tabs d-flex flex-column kaliony-menu">
                <div class="nav flex-column justify-content-center nav-pills" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <a class="nav-link active d-flex flex-column align-items-center" id="v-pills-product-tab"
                       data-toggle="pill"
                       href="#v-pills-product" role="tab" aria-controls="v-pills-hit" aria-selected="true">
                        <span class="mb-3">
                            <svg width="29px" height="49px">
<path fill-rule="evenodd" fill="rgb(240, 240, 240)"
      d="M25.963,48.965 L3.383,48.965 C1.851,48.965 0.605,47.724 0.605,46.200 L0.605,16.114 C0.605,13.430 2.571,11.196 5.144,10.757 L5.144,3.128 C5.144,1.399 6.557,-0.007 8.294,-0.007 L21.052,-0.007 C22.789,-0.007 24.202,1.399 24.202,3.128 L24.202,10.757 C26.775,11.196 28.741,13.430 28.741,16.114 L28.741,19.611 L28.741,19.690 L28.741,46.200 C28.741,47.724 27.495,48.965 25.963,48.965 ZM22.494,3.128 C22.494,2.337 21.847,1.693 21.052,1.693 L8.294,1.693 C7.499,1.693 6.853,2.337 6.853,3.128 L6.853,3.128 L6.853,10.678 L9.535,10.678 L9.535,5.330 C9.535,4.861 9.918,4.480 10.389,4.480 C10.861,4.480 11.244,4.861 11.244,5.330 L11.244,10.678 L13.819,10.678 L13.819,5.330 C13.819,4.861 14.201,4.480 14.673,4.480 C15.145,4.480 15.527,4.861 15.527,5.330 L15.527,10.678 L18.102,10.678 L18.102,5.330 C18.102,4.861 18.485,4.480 18.957,4.480 C19.429,4.480 19.811,4.861 19.811,5.330 L19.811,10.678 L22.494,10.678 L22.494,3.128 ZM27.032,16.114 C27.032,14.054 25.348,12.378 23.278,12.378 L6.069,12.378 C3.998,12.378 2.314,14.054 2.314,16.114 L2.314,46.200 C2.314,46.787 2.794,47.264 3.383,47.264 L25.963,47.264 C26.552,47.264 27.032,46.787 27.032,46.200 L27.032,19.690 L27.032,19.611 L27.032,16.114 ZM20.811,37.856 L8.535,37.856 C6.834,37.856 5.450,36.479 5.450,34.786 L5.450,24.856 C5.450,23.163 6.834,21.786 8.535,21.786 L20.811,21.786 C22.512,21.786 23.896,23.163 23.896,24.856 L23.896,34.786 C23.896,36.479 22.512,37.856 20.811,37.856 ZM22.187,34.786 L22.187,24.856 C22.187,24.101 21.570,23.486 20.811,23.486 L8.535,23.486 C7.776,23.486 7.158,24.101 7.158,24.856 L7.158,34.786 C7.158,35.541 7.776,36.156 8.535,36.156 L20.811,36.156 C21.570,36.156 22.188,35.541 22.188,34.786 L22.187,34.786 Z"/>
</svg>
                        </span>
                        <span class="name">Product</span></a>
                    <a class="nav-link d-flex flex-column align-items-center" id="v-pills-technical-tab"
                       data-toggle="pill"
                       href="#v-pills-technical" role="tab" aria-controls="v-pills-technical" aria-selected="false">
                        <span class="mb-3">
                            <svg width="41px" height="41px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M38.932,31.472 C38.932,31.472 38.932,31.472 38.932,31.472 L38.931,31.472 L30.398,22.944 C30.136,22.683 29.711,22.683 29.450,22.944 L27.551,24.843 L25.180,22.473 L27.623,20.035 C30.990,20.789 34.509,19.774 36.955,17.342 C39.688,14.591 40.606,10.520 39.318,6.863 C39.241,6.646 39.059,6.484 38.835,6.433 C38.610,6.384 38.376,6.451 38.212,6.612 L33.452,11.365 L29.899,10.181 L28.714,6.630 L33.470,1.873 C33.732,1.611 33.731,1.187 33.469,0.926 C33.399,0.855 33.313,0.802 33.220,0.768 C27.987,-1.094 22.235,1.634 20.371,6.863 C19.731,8.656 19.615,10.594 20.035,12.451 L17.595,14.892 L9.048,6.346 L8.780,3.457 C8.758,3.218 8.609,3.009 8.390,2.909 L3.175,0.544 C2.921,0.428 2.622,0.482 2.424,0.678 L0.533,2.567 C0.337,2.765 0.283,3.064 0.399,3.318 L2.766,8.531 C2.865,8.750 3.075,8.899 3.315,8.921 L6.205,9.189 L14.755,17.730 L1.396,31.078 C-0.433,32.911 -0.433,35.878 1.396,37.711 L2.342,38.656 C4.176,40.484 7.145,40.484 8.979,38.656 L22.341,25.310 L24.712,27.679 L22.813,29.578 C22.551,29.839 22.551,30.263 22.813,30.525 L31.346,39.052 C33.180,40.881 36.150,40.881 37.984,39.052 L38.932,38.105 C40.765,36.273 40.765,33.304 38.932,31.472 ZM6.979,8.070 C6.868,7.960 6.723,7.891 6.567,7.877 L3.823,7.625 L1.812,3.189 L3.045,1.956 L7.484,3.966 L7.737,6.707 C7.751,6.862 7.819,7.008 7.930,7.119 L16.646,15.837 L15.702,16.780 L6.979,8.070 ZM8.034,37.711 C6.723,39.019 4.600,39.019 3.289,37.711 L2.344,36.767 C1.036,35.457 1.036,33.336 2.344,32.026 L21.251,13.131 C21.421,12.962 21.487,12.715 21.425,12.484 C20.192,7.826 22.971,3.051 27.633,1.818 C28.967,1.466 30.366,1.434 31.716,1.727 L27.472,5.973 C27.292,6.153 27.229,6.418 27.310,6.659 L28.731,10.920 C28.798,11.120 28.956,11.277 29.156,11.344 L33.420,12.764 C33.660,12.844 33.926,12.782 34.105,12.603 L38.355,8.362 C39.391,13.057 36.421,17.703 31.722,18.737 C30.357,19.038 28.940,19.006 27.590,18.644 C27.358,18.581 27.111,18.647 26.943,18.817 L8.034,37.711 ZM23.289,24.363 L24.051,23.602 L24.232,23.421 L26.605,25.790 L25.660,26.735 L23.289,24.363 ZM37.983,37.157 L37.983,37.160 L37.035,38.105 C35.725,39.411 33.604,39.411 32.294,38.105 L24.235,30.051 L29.923,24.366 L37.983,32.420 C39.292,33.728 39.292,35.849 37.983,37.157 Z"/>
</svg>
                        </span>
                        <span class="name">Technical</span>
                    </a>
                    <a class="nav-link d-flex flex-column align-items-center" id="v-pills-related-tab"
                       data-toggle="pill"
                       href="#v-pills-related" role="tab" aria-controls="v-pills-related" aria-selected="false">
                        <span class="mb-3">
                            <svg width="41px" height="49px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M40.524,48.542 C40.372,48.704 40.161,48.795 39.941,48.795 L1.376,48.795 C1.155,48.795 0.945,48.704 0.793,48.542 C0.641,48.381 0.562,48.163 0.573,47.941 L2.180,16.230 C2.187,16.104 2.228,15.990 2.284,15.886 C2.290,15.876 2.287,15.863 2.293,15.853 L4.704,11.788 C4.849,11.543 5.110,11.393 5.393,11.393 L5.969,11.393 L5.317,5.810 C5.265,5.364 5.580,4.960 6.021,4.907 L15.066,3.825 C15.090,3.770 15.104,3.712 15.141,3.662 C16.423,1.884 18.486,0.823 20.658,0.823 C23.876,0.823 26.640,3.146 27.309,6.287 L34.518,7.993 C34.726,8.042 34.906,8.172 35.018,8.356 C35.131,8.539 35.166,8.760 35.118,8.970 L34.557,11.393 L35.924,11.393 C36.206,11.393 36.468,11.543 36.613,11.788 L39.023,15.853 C39.029,15.863 39.026,15.874 39.032,15.884 C39.089,15.989 39.131,16.103 39.137,16.230 L40.744,47.941 C40.755,48.163 40.676,48.381 40.524,48.542 ZM6.159,13.019 L5.848,13.019 L4.401,15.458 L6.444,15.458 L6.159,13.019 ZM7.007,6.426 L8.062,15.458 L11.973,15.458 L11.337,12.782 C11.234,12.346 11.499,11.906 11.931,11.801 L19.430,9.976 L18.850,5.010 L7.007,6.426 ZM13.087,13.192 L13.625,15.458 L25.664,15.458 L24.468,10.423 L13.087,13.192 ZM20.658,2.449 C19.521,2.449 18.438,2.853 17.544,3.529 L19.459,3.300 C19.671,3.275 19.883,3.336 20.051,3.469 C20.218,3.602 20.326,3.798 20.351,4.012 L21.003,9.593 L21.817,9.395 L22.600,6.007 C22.649,5.797 22.778,5.615 22.959,5.501 C23.140,5.388 23.358,5.351 23.566,5.401 L25.529,5.865 C24.772,3.860 22.851,2.449 20.658,2.449 ZM23.982,7.169 L23.566,8.970 L24.874,8.651 C25.082,8.601 25.300,8.636 25.481,8.748 C25.663,8.861 25.793,9.042 25.843,9.252 L27.317,15.458 L31.968,15.458 L33.370,9.391 L23.982,7.169 ZM35.469,13.019 L34.182,13.019 L33.618,15.458 L36.915,15.458 L35.469,13.019 ZM37.571,17.085 L3.746,17.085 L2.221,47.169 L39.095,47.169 L37.571,17.085 ZM14.633,18.711 C15.962,18.711 17.043,19.805 17.043,21.150 C17.043,22.209 16.369,23.103 15.436,23.440 L15.436,26.435 C15.436,29.349 17.779,31.720 20.658,31.720 C23.538,31.720 25.881,29.349 25.881,26.435 L25.881,23.440 C24.947,23.103 24.274,22.209 24.274,21.150 C24.274,19.805 25.355,18.711 26.684,18.711 C28.013,18.711 29.095,19.805 29.095,21.150 C29.095,22.209 28.421,23.103 27.487,23.440 L27.487,26.435 C27.487,30.246 24.424,33.347 20.658,33.347 C16.893,33.347 13.829,30.246 13.829,26.435 L13.829,23.440 C12.896,23.103 12.222,22.209 12.222,21.150 C12.222,19.805 13.303,18.711 14.633,18.711 ZM26.684,20.337 C26.241,20.337 25.881,20.702 25.881,21.150 C25.881,21.281 25.918,21.401 25.973,21.510 C26.118,21.298 26.348,21.150 26.622,21.150 L26.684,21.150 C26.978,21.150 27.224,21.318 27.364,21.557 C27.435,21.435 27.487,21.302 27.487,21.150 C27.487,20.702 27.127,20.337 26.684,20.337 ZM13.952,21.557 C14.093,21.318 14.339,21.150 14.633,21.150 C14.926,21.150 15.172,21.318 15.312,21.557 C15.384,21.435 15.436,21.302 15.436,21.150 C15.436,20.702 15.075,20.337 14.633,20.337 C14.189,20.337 13.829,20.702 13.829,21.150 C13.829,21.302 13.881,21.435 13.952,21.557 Z"/>
</svg>
                        </span>
                        <span class="name">Related</span>
                    </a>
                    <a class="nav-link d-flex flex-column align-items-center" id="v-pills-reviews-tab"
                       data-toggle="pill"
                       href="#v-pills-reviews" role="tab" aria-controls="v-pills-reviews" aria-selected="false">
                        <span class="mb-3">
                            <svg width="45px" height="43px">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M22.700,40.506 C19.564,40.506 16.536,39.925 13.692,38.777 C8.685,41.668 1.763,42.666 1.465,42.708 C1.430,42.713 1.396,42.715 1.362,42.715 C1.086,42.715 0.829,42.560 0.703,42.307 C0.562,42.024 0.618,41.682 0.842,41.458 C2.534,39.765 3.699,36.191 4.134,31.377 C1.838,28.168 0.626,24.456 0.626,20.623 C0.626,9.659 10.528,0.739 22.700,0.739 C34.872,0.739 44.774,9.659 44.774,20.623 C44.774,31.586 34.872,40.506 22.700,40.506 ZM22.700,2.212 C11.340,2.212 2.098,10.471 2.098,20.623 C2.098,24.230 3.268,27.724 5.483,30.730 C5.589,30.873 5.639,31.051 5.624,31.229 C5.367,34.302 4.713,38.218 3.092,40.920 C5.546,40.420 9.968,39.311 13.253,37.326 C14.031,36.975 15.225,37.567 15.785,37.945 C17.999,38.654 20.312,39.033 22.700,39.033 C34.061,39.033 43.303,30.774 43.303,20.623 C43.303,10.471 34.060,2.212 22.700,2.212 ZM28.850,23.226 C28.686,23.388 28.610,23.622 28.649,23.851 L29.561,29.228 C29.664,29.832 29.423,30.431 28.933,30.792 C28.655,30.996 28.330,31.099 28.004,31.099 C27.753,31.099 27.500,31.038 27.267,30.914 L22.491,28.375 C22.287,28.267 22.044,28.267 21.841,28.375 L17.065,30.914 C16.528,31.200 15.890,31.153 15.400,30.792 C14.909,30.431 14.668,29.832 14.771,29.228 L15.683,23.850 C15.721,23.622 15.646,23.388 15.481,23.225 L11.618,19.417 C11.183,18.989 11.030,18.361 11.217,17.778 C11.405,17.194 11.894,16.778 12.494,16.690 L17.834,15.905 C18.061,15.871 18.258,15.727 18.360,15.518 L20.748,10.626 C21.016,10.076 21.560,9.734 22.166,9.734 C22.772,9.734 23.316,10.076 23.584,10.626 L25.972,15.518 C26.073,15.727 26.270,15.871 26.497,15.905 L31.837,16.689 C32.438,16.778 32.927,17.194 33.114,17.778 C33.301,18.361 33.148,18.989 32.714,19.417 L28.850,23.226 ZM32.274,18.054 C32.190,17.792 31.979,17.613 31.710,17.573 L26.370,16.788 C25.855,16.713 25.410,16.386 25.180,15.914 L22.792,11.021 C22.671,10.774 22.437,10.627 22.165,10.627 C21.894,10.627 21.659,10.774 21.539,11.021 L19.151,15.914 C18.921,16.386 18.476,16.713 17.960,16.788 L12.621,17.573 C12.352,17.613 12.141,17.792 12.057,18.054 C11.973,18.315 12.039,18.586 12.234,18.778 L16.098,22.586 C16.471,22.953 16.641,23.483 16.553,24.002 L15.641,29.379 C15.596,29.650 15.699,29.908 15.919,30.070 C16.139,30.231 16.413,30.251 16.654,30.124 L21.430,27.585 C21.660,27.462 21.913,27.401 22.166,27.401 C22.418,27.401 22.672,27.462 22.902,27.584 L27.678,30.124 C27.919,30.251 28.193,30.231 28.413,30.070 C28.633,29.908 28.737,29.650 28.691,29.379 L27.779,24.002 C27.691,23.482 27.861,22.953 28.233,22.586 L32.097,18.778 C32.292,18.586 32.358,18.315 32.274,18.054 Z"/>
</svg>
                        </span>
                        <span class="name">Reviews</span>
                    </a>
                </div>
                <div class="user-status mt-auto">
                    <span class="status-color"></span>
                    <div class="user d-flex flex-column align-items-center">
                        <svg width="42px" height="41px">
                            <path fill-rule="evenodd" opacity="0.8" fill="rgb(240, 240, 240)"
                                  d="M39.150,33.633 C35.126,31.496 32.040,30.298 29.293,29.839 L29.577,29.447 C29.712,29.312 29.780,29.110 29.712,28.907 L29.081,26.377 C29.309,26.052 29.525,25.717 29.728,25.373 C32.240,24.516 33.510,23.069 33.724,20.938 C34.827,20.881 35.779,19.894 35.779,18.781 L35.779,13.717 C35.779,12.609 34.899,11.626 33.745,11.561 C33.597,7.661 31.880,0.013 20.949,0.013 C10.018,0.013 8.301,7.661 8.153,11.561 C7.059,11.626 6.119,12.546 6.119,13.717 L6.119,18.781 C6.119,19.928 7.130,20.941 8.343,20.941 L9.354,20.941 C9.726,20.941 10.083,20.834 10.394,20.651 C10.777,22.683 11.620,24.682 12.817,26.376 L12.186,28.907 C12.186,29.042 12.186,29.245 12.321,29.447 L12.605,29.839 C9.858,30.298 6.772,31.496 2.748,33.633 C1.468,34.240 0.726,35.523 0.726,36.941 L0.726,39.844 C0.726,40.249 0.996,40.519 1.400,40.519 L17.578,40.519 L17.848,40.519 L24.050,40.519 L24.319,40.519 L40.498,40.519 C40.902,40.519 41.172,40.249 41.172,39.844 L41.172,36.941 C41.172,35.591 40.363,34.308 39.150,33.633 ZM20.953,32.089 L22.567,35.793 L19.309,35.793 L20.953,32.089 ZM18.819,37.143 L23.077,37.143 L23.471,39.169 L18.414,39.169 L18.819,37.143 ZM28.027,27.692 L28.297,28.907 L27.608,29.854 C27.564,29.890 27.523,29.934 27.488,29.987 L24.684,33.876 L23.794,35.099 L21.977,31.004 C24.193,30.733 26.167,29.602 27.750,27.981 C27.843,27.886 27.936,27.790 28.027,27.692 ZM30.659,23.492 C31.039,22.566 31.326,21.603 31.507,20.632 C31.764,20.788 32.056,20.892 32.371,20.927 C32.254,21.881 31.831,22.782 30.659,23.492 ZM34.363,13.650 L34.363,18.713 C34.363,19.118 34.026,19.523 33.555,19.523 L32.543,19.523 C32.139,19.523 31.734,19.186 31.734,18.713 L31.734,18.240 L31.734,13.650 C31.734,13.245 32.072,12.840 32.543,12.840 L33.555,12.840 C33.959,12.840 34.363,13.177 34.363,13.650 ZM20.949,1.363 C25.104,1.363 32.097,2.721 32.397,11.568 C32.115,11.597 31.844,11.683 31.600,11.815 C30.779,6.674 26.304,2.713 20.949,2.713 C15.595,2.713 11.120,6.673 10.299,11.813 C10.058,11.682 9.788,11.596 9.501,11.568 C9.801,2.721 16.794,1.363 20.949,1.363 ZM10.096,18.713 C10.096,19.118 9.759,19.523 9.287,19.523 L8.276,19.523 C7.871,19.523 7.467,19.186 7.467,18.713 L7.467,13.650 C7.467,13.245 7.804,12.840 8.276,12.840 L9.287,12.840 C9.692,12.840 10.096,13.177 10.096,13.650 L10.096,18.713 ZM11.512,13.515 C11.512,8.316 15.758,4.063 20.949,4.063 C26.140,4.063 30.386,8.316 30.386,13.515 L30.386,18.240 C30.386,20.474 29.806,22.519 28.864,24.244 C27.255,24.712 24.941,24.991 21.623,24.991 C21.219,24.991 20.949,25.262 20.949,25.667 C20.949,26.072 21.219,26.342 21.623,26.342 C24.052,26.342 26.083,26.192 27.747,25.880 C27.705,25.921 27.664,25.963 27.623,26.004 C27.283,26.457 26.926,26.870 26.552,27.242 C24.964,28.723 23.071,29.620 21.247,29.709 C21.155,29.670 21.052,29.650 20.949,29.650 C20.845,29.650 20.752,29.670 20.668,29.710 C19.552,29.659 18.409,29.304 17.325,28.698 C16.228,28.066 15.196,27.156 14.275,26.004 C14.208,25.937 14.141,25.869 14.073,25.802 L14.034,25.788 C12.520,23.800 11.512,21.184 11.512,18.240 L11.512,13.515 L11.512,13.515 ZM19.921,31.004 L18.104,35.099 L17.214,33.876 L14.410,29.987 C14.389,29.966 14.365,29.945 14.340,29.924 L13.601,28.907 L13.871,27.692 C13.962,27.790 14.055,27.886 14.148,27.981 C15.731,29.602 17.705,30.733 19.921,31.004 ZM2.074,36.941 C2.074,36.063 2.546,35.253 3.355,34.848 C7.652,32.562 10.745,31.415 13.500,31.072 L17.523,36.611 L17.012,39.169 L2.074,39.169 L2.074,36.941 ZM39.824,39.169 L24.886,39.169 L24.375,36.611 L28.441,31.012 C31.187,31.427 34.336,32.573 38.543,34.781 C39.352,35.253 39.824,36.063 39.824,36.941 L39.824,39.169 L39.824,39.169 Z"/>
                        </svg>
                        <span class="status">Online</span>
                    </div>
                </div>

            </div>
            <div class="main-right-wrapp kaliony-page d-flex flex-wrap">
                <div class="col-xl-7 col-lg-6 p-0">
                    <div class="tab-content h-100" id="v-pills-tabContent">
                        <div class="tab-pane h-100 fade show active" id="v-pills-product" role="tabpanel"
                             aria-labelledby="v-pills-product-tab">
                            <div class="main-content product-tab-main-content h-100">
                                <div class="row no-gutters h-100">

                                    <div class="sliders">
                                        <div class="carousel_1">
                                            @if($vape->image)
                                                <div>
                                                    <img src="{!! $vape->image !!}" alt="">
                                                </div>
                                            @endif
                                            @if(count($variations))
                                                @foreach($variations as $v)
                                                    @if($v->image)
                                                        <div><img src="{{ $v->image }}" alt=""></div>
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if(count($vape->other_images))
                                                @foreach($vape->other_images as $other_image)
                                                    <div><img src="{{ $other_image }}" alt=""></div>
                                                @endforeach
                                            @endif
                                            @if(count($vape->videos))
                                                @foreach($vape->videos as $video)
                                                    <div>
                                                        <iframe width="100%" height="100%"
                                                                src="https://www.youtube.com/embed/{{$video}}"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="carousel_2" data-carousel-controller-for=".carousel_1">
                                            @if($vape->image)
                                                <div>
                                                    <img src="{!! $vape->image !!}" alt="">
                                                </div>
                                            @endif
                                            @if(count($variations))
                                                @foreach($variations as $v)
                                                    @if($v->image)
                                                        <div><img src="{{ $v->image }}" alt=""></div>
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if(count($vape->other_images))
                                                @foreach($vape->other_images as $other_image)
                                                    <div><img src="{{ $other_image }}" alt=""></div>
                                                @endforeach
                                            @endif
                                            @if(count($vape->videos))
                                                @foreach($vape->videos as $video)
                                                    <div><img src="http://img.youtube.com/vi/{{ $video }}/sddefault.jpg"
                                                              width="100%" height="100%" alt=""></div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane h-100 fade technical_tabs_product" id="v-pills-technical" role="tabpanel"
                             aria-labelledby="v-pills-technical-tab">
                            <div class="row">
                                <table class="table-responsive table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Attributes</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($vape->stockAttrs))
                                        @foreach($vape->stockAttrs as $attr)
                                            <tr>
                                                <td>{!! $attr->attr->name !!}</td>
                                                <td>
                                                    @if(count($attr->children))
                                                        @foreach($attr->children as $option)
                                                            <span class="badge badge-primary">{!! $option->attr->name !!}</span>
                                                        @endforeach
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr colspan="2">
                                            <td>No Attributes</td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            @foreach($vape->stickers as $sticker)
                                <div class="d-flex flex-wrap my-2 wall">
                                    <div class="col-sm-5">
                                        <div class="image">
                                            <img src="{!! $sticker->image !!}"
                                                 alt="{!! $sticker->name !!}">
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="info">
                                            <h4 class="h1 text-center">{!! $sticker->name !!}</h4>
                                            <p class="desc mt-3">{!! $sticker->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane h-100 fade" id="v-pills-related" role="tabpanel"
                             aria-labelledby="v-pills-related-tab">3
                        </div>
                        <div class="tab-pane h-100 fade" id="v-pills-reviews" role="tabpanel"
                             aria-labelledby="v-pills-reviews-tab">4
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 p-0">
                    <div class="product-content-left-col-inner">
                        <div class="d-flex w-100 product-tab-main-content-desc">
                            <div class="product-tab-main-content-title">
                                <img class="img-fluid logo" src="/public/img/kaliony-logo.svg"
                                     alt="kaliony">

                                <div class="product-tab-main-content-sub text-uppercase">
                                    <em class="txt-cl-red emph">{!! $vape->name !!}</em>
                                </div>
                            </div>
                            <div class="share-btns d-inline-block ml-auto">
                                @if(Auth::check())
                                    <a href="javascript:void(0)"
                                       class="d-block share-btns-item add-to-favorite add-to-favorite @if(Auth::user()->favorites()->exists($vape->id)) active @endif"
                                       data-id="{!! $vape->id !!}">
                                        <svg width="30px" height="28px" viewBox="0 0 30 28">
                                            <path fill-rule="evenodd" stroke="rgb(34, 36, 35)"
                                                  d="M29.355,11.060 C28.755,13.649 27.363,16.008 25.333,17.877 L14.912,27.331 L4.670,17.879 C2.637,16.007 1.246,13.648 0.645,11.060 C0.213,9.200 0.390,8.149 0.391,8.142 L0.400,8.080 C0.796,3.538 3.897,0.241 7.774,0.241 C10.634,0.241 13.152,2.028 14.347,4.904 L14.909,6.259 L15.471,4.904 C16.647,2.072 19.298,0.242 22.227,0.242 C26.102,0.242 29.204,3.539 29.609,8.139 C29.610,8.149 29.787,9.200 29.355,11.060 Z"></path>
                                        </svg>
                                    </a>
                                @endif
                                <div class="d-block share-btns-item share-social-btn pointer">
                                    <svg width="32px" height="35px">
                                        <path fill-rule="evenodd" fill="rgb(34, 36, 35)"
                                              d="M22.068,24.875 C21.763,25.186 21.500,25.528 21.274,25.889 L11.220,19.666 C11.486,18.988 11.637,18.249 11.637,17.475 C11.637,16.701 11.486,15.963 11.221,15.284 L21.277,9.109 C22.309,10.763 24.120,11.865 26.182,11.865 C29.390,11.865 32.000,9.204 32.000,5.933 C32.000,2.661 29.390,-0.000 26.182,-0.000 C22.974,-0.000 20.364,2.661 20.364,5.933 C20.364,6.678 20.505,7.388 20.752,8.046 L10.682,14.229 C9.642,12.613 7.851,11.543 5.818,11.543 C2.610,11.543 -0.000,14.204 -0.000,17.475 C-0.000,20.747 2.610,23.408 5.818,23.408 C7.851,23.408 9.642,22.337 10.682,20.721 L20.749,26.952 C20.499,27.620 20.363,28.334 20.363,29.070 C20.363,30.655 20.968,32.145 22.067,33.265 C23.201,34.421 24.691,35.000 26.181,35.000 C27.671,35.000 29.161,34.421 30.295,33.265 C31.394,32.145 31.999,30.655 31.999,29.070 C31.999,27.486 31.394,25.995 30.295,24.875 C28.027,22.561 24.336,22.561 22.068,24.875 ZM26.182,1.186 C28.748,1.186 30.836,3.316 30.836,5.933 C30.836,8.550 28.748,10.679 26.182,10.679 C23.615,10.679 21.527,8.550 21.527,5.933 C21.527,3.316 23.615,1.186 26.182,1.186 ZM5.819,22.221 C3.252,22.221 1.164,20.092 1.164,17.475 C1.164,14.858 3.252,12.729 5.819,12.729 C8.385,12.729 10.473,14.858 10.473,17.475 C10.473,20.092 8.385,22.221 5.819,22.221 ZM29.472,32.426 C27.658,34.277 24.705,34.277 22.890,32.426 C22.011,31.530 21.527,30.337 21.527,29.070 C21.527,27.803 22.011,26.610 22.890,25.714 C23.798,24.789 24.990,24.326 26.182,24.326 C27.374,24.326 28.565,24.789 29.473,25.714 C30.352,26.610 30.836,27.803 30.836,29.070 C30.836,30.337 30.352,31.530 29.472,32.426 Z"/>
                                    </svg>
                                    <div id="share" class="share-social product-share-social"></div>
                                </div>
                            </div>
                        </div>
                        <p class="product-tab-main-content-info">
                            <strong class="font-main-med fnz-18">
                                {!! $vape->long_description !!}
                            </strong>
                        </p>
                        <div>
                            <input type="hidden" value="{{ $vape->id }}" id="vpid">
                            @include("admin.inventory._partials.render_price_form",['model' => $vape])
                            <div>
                                <div class="form-group d-md-flex align-items-center">
                                    <label for="productQty"
                                           class="fnz-20 mb-md-0 mb-4 mr-3">Qty.</label>
                                    {!! Form::number('',1,['class' => 'product-qty-select mr-3','min' => '1','style'=> 'width: 85px;']) !!}

                                    <button class="btn btn-add-to-cart rounded-0 fnz-20 add-to-cart">
                                                    <span class="icon">
                                                        <svg width="24px" height="31px">
                                                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                                          d="M23.860,30.854 C23.767,30.947 23.640,31.000 23.507,31.000 L0.493,31.000 C0.359,31.000 0.232,30.947 0.140,30.854 C0.049,30.761 -0.000,30.636 0.006,30.508 L1.102,8.314 C1.114,8.064 1.328,7.867 1.589,7.867 L6.247,7.867 L6.247,5.547 C6.247,2.488 8.828,-0.000 12.000,-0.000 C15.171,-0.000 17.752,2.488 17.752,5.547 L17.752,7.867 L22.411,7.867 C22.671,7.867 22.886,8.064 22.898,8.314 L23.994,30.508 C24.000,30.636 23.952,30.761 23.860,30.854 ZM16.778,5.547 C16.778,3.007 14.635,0.939 12.000,0.939 C9.364,0.939 7.221,3.007 7.221,5.547 L7.221,7.867 L16.778,7.867 L16.778,5.547 ZM21.947,8.807 L17.752,8.807 L17.752,10.216 C17.752,10.475 17.535,10.685 17.265,10.685 C16.996,10.685 16.778,10.475 16.778,10.216 L16.778,8.807 L7.221,8.807 L7.221,10.216 C7.221,10.475 7.003,10.685 6.734,10.685 C6.465,10.685 6.247,10.475 6.247,10.216 L6.247,8.807 L2.052,8.807 L1.003,30.061 L22.996,30.061 L21.947,8.807 Z"/>
                                                </svg>
                                                    </span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@stop

@section('css')
    <link href="/public/plugins/formstone/carousel/carousel.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css"/>
    <link type="text/css" rel="stylesheet"
          href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css"/>

    <style>
        .share-social-btn {
            position: relative;
        }

        .product-share-social {
            background: #353636;
            visibility: hidden;
            opacity: 0;
            transition: all .5s;
            position: absolute;
            right: 0;
            top: 150%;
        }

        .product-share-social .jssocials-share {
            margin-right: 0;
        }

        .product-share-social:before {
            position: absolute;
            bottom: 100%;
            right: 5px;
            content: '';
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 0 10px 16px 10px;
            border-color: transparent transparent #353636 transparent;
        }

        .product-share-social .jssocials-shares {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        .share-social-btn:hover .product-share-social {
            visibility: visible;
            opacity: 1;
        }
    </style>
@stop

@section("js")
    <script src="/public/plugins/formstone/core.js"></script>
    <script src="/public/plugins/formstone/mediaquery.js"></script>
    <script src="/public/plugins/formstone/touch.js"></script>
    <script src="/public/plugins/formstone/carousel/carousel.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script>
        $(document).ready(function () {
            get_price();

            $("body").on('change', '.select-variation-option', function () {
                get_price();
            });

            $("body").on('change', '.select-variation-radio-option', function () {
                get_price();
            });


            $("body").on('click', '.add-to-cart', function () {
                var variationId = $("#variation_uid").val();

                if (variationId && variationId != '') {
                    $.ajax({
                        type: "post",
                        url: "/add-to-cart",
                        cache: false,
                        datatype: "json",
                        data: {uid: variationId},
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function (data) {
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
            })

        });

        function get_price() {
            var items = document.getElementsByClassName('select-variation-option');

            let options = {};
            for (var i = 0; i < items.length; i++) {
                options[$(items[i]).data('name')] = $(items[i]).val();
            }

            $.map($(".options-group input:radio:checked"), function (elem, idx) {
                options[$(elem).data('name')] = $(elem).val();
            });

            console.log(options);

            if (JSON.stringify(options) !== "{}") {

                $.ajax({
                    type: "post",
                    url: "/products/get-price",
                    cache: false,
                    datatype: "json",
                    data: {options: options, uid: $("#vpid").val()},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
                            $(".price-place").html("€" + data.price);
                            $("#variation_uid").val(data.variation_id);
                        } else {
                            $(".price-place").html(data.message);
                            $("#variation_uid").val('');
                        }
                    }
                });
            }
        }
        $('.add-to-favorite').on('click', function () {
            let data = {'id': $(this).attr('data-id')}
            if ($(this).hasClass('active')) {
                var url = "{!! route('product_remove_from_favorites') !!}";
            } else {
                var url = "{!! route('product_add_to_favorites') !!}";
            }
            $.ajax({
                type: "POST",
                url: url,
                datatype: "json",
                data: data,
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (!data.error) {

                        if ($('.add-to-favorite').hasClass('active')) {
                            $('.add-to-favorite').removeClass('active')
                        } else {
                            $('.add-to-favorite').addClass('active')
                        }
                    }
                }
            });
        })
        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });

    </script>
@stop