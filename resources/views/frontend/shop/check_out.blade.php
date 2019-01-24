@extends('layouts.frontend')
@section('content')

    <main class="main-content">
        <div class="shopping-cart_wrapper">
            <div class="container main-max-width">
                <div class="shopping-cart-head">
                    <ul class="nav nav-pills">
                        <li class="nav-item col-md-3">
                            <a class="item visited d-flex align-items-center justify-content-between" href="order-shopping-cart.html">
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">SHOPPING CART</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)" d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item active d-flex align-items-center justify-content-between" href="javascript:void(0);">
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">CHECKOUT</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)" d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item d-flex align-items-center justify-content-between" href="order-payment.html">
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">Payment</span>
                                <span class="icon">
                                    <svg width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)" d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item d-flex align-items-center justify-content-between" href="#">
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">Confirmation</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)" d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="shopping-cart-content">
                    <div class="shopping-cart-inner">
                        <div class="d-flex flex-wrap">
                            <div class="col-lg-9 pl-md-left">
                                <div class="left-content">

                                    <span class="head d-flex align-items-center">
                                        <span class="d-inline-block font-20 font-main-bold text-quatr-clr text-uppercase mr-4">Address</span>
                                        <span>
                                            <span class="profile-required-icon font-main-bold">&#42;</span>
                                            Your Billing address is same as your account
                                        </span>
                                    </span>

                                    <div class="d-flex align-items-center checkout-address-wrap">
                                        <label for="cartShpAddr" class="mr-3 text-light-clr mb-0">Enter Shipping address</label>
                                        <div class="mr-4" style="width: 450px;">
                                            <div class="simple_select_wrapper">
                                                <select id="cartShpAddr"  class="select-2 select-2--no-search main-select main-select-2arrows products-filter-wrap_select" >
                                                    <option class="selected">Select address</option>
                                                    <option>address 1</option>
                                                    <option>address 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <span data-toggle="modal" data-target="#addNewAddress" class="d-inline-flex align-items-center text-quatr-clr font-main-bold font-15 text-uppercase pointer">
                                            add new
                                            <span class="d-inline-block ml-1">&#43;</span>
                                        </span>
                                    </div>

                                    <div class="checkout-note-wrap">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="d-flex flex-wrap mb-4">
                                                    <span class="col-2">
                                                        <svg viewBox="0 0 17 18" width="17px" height="18px">
                                                            <path fill-rule="evenodd"  fill="rgb(132, 129, 157)" d="M15.807,18.000 C14.518,15.165 11.667,13.342 8.498,13.342 C5.333,13.342 2.482,15.165 1.190,18.000 L-0.000,18.000 C0.913,15.667 2.778,13.816 5.157,12.893 L5.604,12.720 L5.185,12.488 C3.049,11.302 1.722,9.074 1.722,6.671 C1.722,2.992 4.762,-0.000 8.498,-0.000 C12.235,-0.000 15.274,2.992 15.274,6.671 C15.274,9.075 13.949,11.304 11.815,12.488 L11.396,12.720 L11.843,12.893 C14.220,13.816 16.083,15.667 17.000,18.000 L15.807,18.000 ZM8.498,1.081 C5.369,1.081 2.824,3.589 2.824,6.671 C2.824,9.753 5.369,12.261 8.498,12.261 C11.629,12.261 14.176,9.753 14.176,6.671 C14.176,3.589 11.629,1.081 8.498,1.081 Z"/>
                                                        </svg>
                                                    </span>
                                                    <span class="col-10 font-16 text-uppercase font-main-bold">Mr. TOMMY COPELAND</span>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <span class="col-2">
                                                        <svg viewBox="0 0 14 18" width="14px" height="18px">
                                                            <path fill-rule="evenodd"  fill="rgb(132, 129, 157)" d="M7.672,17.772 C7.488,17.923 7.244,17.999 7.000,17.999 C6.756,17.999 6.513,17.923 6.328,17.772 C6.328,17.772 -0.000,12.588 -0.000,6.990 C-0.000,3.129 3.134,-0.000 7.000,-0.000 C10.866,-0.000 14.000,3.129 14.000,6.990 C14.000,12.588 7.672,17.772 7.672,17.772 ZM7.000,0.993 C3.688,0.993 0.994,3.683 0.994,6.990 C0.994,8.429 1.506,10.789 3.943,13.864 C5.391,15.690 6.842,16.907 6.952,16.999 C6.959,17.002 6.976,17.006 7.000,17.006 C7.023,17.006 7.041,17.002 7.048,16.999 C7.276,16.809 13.006,11.970 13.006,6.990 C13.006,3.683 10.312,0.993 7.000,0.993 ZM7.000,8.457 C6.232,8.457 5.610,7.836 5.610,7.069 C5.610,6.303 6.232,5.681 7.000,5.681 C7.767,5.681 8.390,6.303 8.390,7.069 C8.390,7.836 7.767,8.457 7.000,8.457 Z"/>
                                                        </svg>
                                                    </span>
                                                    <ul class="col-10 list-unstyled mb-0 font-16">
                                                        <li>Company name</li>
                                                        <li>Flat 5</li>
                                                        <li>111 street name</li>
                                                        <li>City Name</li>
                                                        <li>Region</li>
                                                        <li>AA 11 (post code in uk)</li>
                                                        <li>Country Name</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label for="orderNotes" class="text-gray-clr mb-4">Special Notes</label>
                                                <div class="position-relative">
                                                    <textarea name="" id="orderNotes" class="oreder-notes-area w-100">

                                                    </textarea>
                                                    <span class="msg-textarea position-absolute font-12 text-gray-clr">Max 500 character</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <p class="mb-5">According to your shipping address... Select one of these options:</p>
                                        <ul class="list-unstyled mb-0 profile-form row">
                                            <li class="col-md-3">
                                                <input class="form-check-input register-form_input-radio" type="radio" name="exampleRadios" id="deliveryRadios1" value="option1" checked>
                                                <label class="form-check-label mb-0 d-flex text-main-clr pointer" for="deliveryRadios1">
                                                    <span class="d-inline-flex flex-column">
                                                        <span class="delivery-icon">
                                                            <svg viewBox="0 0 36 30" width="36px" height="30px">
                                                                <path fill-rule="evenodd"  fill="rgb(132, 129, 157)" d="M35.223,18.130 C35.213,18.138 34.768,18.517 24.049,27.538 L23.573,27.939 L23.512,27.992 C23.454,28.044 23.441,28.056 23.209,28.056 C22.645,28.056 21.334,27.914 17.830,27.536 L17.619,27.513 C15.849,27.322 13.561,27.075 10.581,26.762 L10.411,26.743 L8.901,28.328 L9.537,28.957 C9.654,29.072 9.718,29.226 9.718,29.389 C9.719,29.552 9.654,29.705 9.538,29.821 C9.421,29.936 9.266,30.000 9.101,30.000 C8.936,30.000 8.781,29.936 8.664,29.821 L0.180,21.431 C-0.060,21.193 -0.060,20.806 0.180,20.567 C0.297,20.452 0.452,20.388 0.618,20.388 C0.783,20.388 0.938,20.452 1.054,20.567 L1.980,21.483 L5.243,17.029 C6.518,15.289 8.582,14.249 10.761,14.249 C11.891,14.249 13.014,14.533 14.009,15.070 C14.009,15.070 14.146,15.152 16.483,16.589 L16.654,16.694 L22.393,16.694 C23.500,16.694 24.509,17.385 24.903,18.414 L25.061,18.829 L25.428,18.573 C26.753,17.648 27.822,16.893 28.693,16.278 L28.739,16.246 C31.875,14.033 32.357,13.693 33.033,13.646 C33.087,13.642 33.141,13.640 33.197,13.640 C34.269,13.640 35.377,14.320 35.773,15.222 C36.217,16.233 36.006,17.348 35.223,18.130 ZM34.648,15.731 C34.421,15.193 33.919,14.859 33.338,14.859 C33.048,14.859 32.770,14.944 32.536,15.106 L24.811,20.499 L24.798,20.524 C24.312,21.446 23.395,22.004 22.393,22.004 L15.641,22.004 C15.300,22.004 15.023,21.730 15.023,21.393 C15.023,21.056 15.300,20.781 15.641,20.781 L22.393,20.781 C22.833,20.781 23.207,20.624 23.473,20.325 C23.704,20.065 23.832,19.718 23.832,19.349 C23.832,18.637 23.338,17.916 22.393,17.916 C20.731,17.916 19.526,17.923 18.644,17.928 C18.623,17.928 17.675,17.933 17.391,17.933 C16.329,17.933 16.288,17.908 16.152,17.824 L13.412,16.140 C12.589,15.702 11.674,15.471 10.760,15.471 C8.976,15.471 7.287,16.322 6.243,17.747 L2.864,22.358 L8.027,27.463 L8.272,27.205 C8.528,26.936 8.744,26.704 8.930,26.505 C9.745,25.630 9.893,25.490 10.139,25.490 C10.170,25.490 10.203,25.492 10.237,25.496 L22.974,26.837 L34.347,17.265 C34.957,16.625 34.731,15.929 34.648,15.731 ZM25.747,10.056 C26.088,10.056 26.365,10.330 26.365,10.667 C26.365,11.004 26.088,11.279 25.747,11.279 L16.091,11.279 C15.750,11.279 15.473,11.004 15.473,10.668 C15.473,10.330 15.750,10.056 16.091,10.056 L25.747,10.056 ZM32.056,11.470 C31.715,11.470 31.438,11.196 31.438,10.859 L31.438,1.222 L25.336,1.222 L25.336,6.402 C25.336,6.738 25.058,7.013 24.718,7.013 L18.024,7.013 C17.683,7.013 17.406,6.738 17.406,6.402 L17.406,1.222 L10.400,1.222 L10.400,10.859 C10.400,11.196 10.123,11.470 9.782,11.470 C9.441,11.470 9.164,11.196 9.164,10.859 L9.164,0.611 C9.164,0.274 9.441,-0.000 9.782,-0.000 L32.056,-0.000 C32.396,-0.000 32.674,0.274 32.674,0.611 L32.674,10.859 C32.674,11.196 32.396,11.470 32.056,11.470 ZM24.099,1.222 L18.642,1.222 L18.642,5.790 L24.099,5.790 L24.099,1.222 Z"/>
                                                            </svg>
                                                        </span>
                                                        <span class="font-main-bold mb-1">Pick Up</span>
                                                        <span class="font-12">Free</span>
                                                    </span>
                                                </label>
                                            </li>
                                            <li class="col-md-3">
                                                <input class="form-check-input register-form_input-radio" type="radio" name="exampleRadios" id="deliveryRadios2" value="option2">
                                                <label class="form-check-label mb-0 d-flex text-main-clr pointer" for="deliveryRadios2">
                                                    <span class="d-inline-flex flex-column">
                                                        <span class="delivery-icon">
                                                             <svg viewBox="0 0 49 37" width="49px" height="37px">
                                                                <image  x="0px" y="0px" width="49px" height="37px"  xlink:href="data:img/png;base64,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" />
                                                            </svg>
                                                        </span>
                                                        <span class="font-main-bold mb-1">Standard</span>
                                                        <span class="font-12"><span class="text-gray-clr">Shipping:</span> <span>Free</span></span>
                                                        <span class="font-12"><span class="text-gray-clr">Delivery Time:</span> <span>14-23 days</span></span>
                                                    </span>
                                                </label>
                                            </li>
                                            <li class="col-md-3">
                                                <input class="form-check-input register-form_input-radio" type="radio" name="exampleRadios" id="deliveryRadios3" value="option3" >
                                                <label class="form-check-label mb-0 d-flex text-main-clr pointer" for="deliveryRadios3">
                                                    <span class="d-inline-flex flex-column">
                                                        <span class="delivery-icon">
                                                    <img src="img/dhl.png" alt="">
                                                    </span>
                                                    <span class="font-main-bold mb-1">DHL</span>
                                                        <span class="font-12"><span class="text-gray-clr">Shipping:</span> <span>$5</span></span>
                                                        <span class="font-12"><span class="text-gray-clr">Delivery Time:</span> <span>14-23 days</span></span>
                                                    </span>
                                                </label>
                                            </li>
                                            <li class="col-md-3">
                                                <input class="form-check-input register-form_input-radio" type="radio" name="exampleRadios" id="deliveryRadios4" value="option3" >
                                                <label class="form-check-label mb-0 d-flex text-main-clr pointer" for="deliveryRadios4">
                                                    <span class="d-inline-flex flex-column">
                                                        <span class="delivery-icon">
                                                     <img src="img/fedEx.png" alt="">
                                                    </span>
                                                    <span class="font-main-bold mb-1">FedEx</span>
                                                        <span class="font-12"><span class="text-gray-clr">Shipping:</span> <span>$10</span></span>
                                                        <span class="font-12"><span class="text-gray-clr">Delivery Time:</span> <span>5-10 days</span></span>
                                                    </span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 pr-md-right">
                                <div class="right-content">
                                    <h3 class=" head font-main-bold font-20 text-uppercase">ORDER
                                        SUMMARY</h3>
                                    <div class="card order-summary">
                                        <div class="card-header border-bottom-0 font-13">
                                            You will earn <span class="font-main-bold">200 points.</span>
                                        </div>
                                        <div class="card-body border-top-0">
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Sub Total
                                                </div>
                                                <div class="price font-main-bold">$110</div>
                                            </div>
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Tax
                                                </div>
                                                <div class="price font-main-bold">$0</div>
                                            </div>
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Shipping
                                                </div>
                                                <div class="price font-main-bold">$0</div>
                                            </div>
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Discount (Coupon)
                                                </div>
                                                <div class="price font-main-bold">$0</div>
                                            </div>
                                            <div class="coupon-code font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <span class="font-22 text-quatr-clr">Total</span>
                                                <span class="font-22 text-quatr-clr font-bold">$100</span>
                                            </div>
                                            <div class="checkout-btn text-center">
                                                <button class="btn btn-primary text-uppercase font-15">
                                                    CHECKOUT
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="secure d-flex flex-wrap justify-content-between align-items-center">
                                        <span class="secure-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="26px">
                                                <path fill-rule="evenodd" fill="rgb(81, 132, 229)" d="M12.000,26.000 C0.711,21.986 0.882,13.191 1.034,5.421 C1.043,4.954 1.052,4.502 1.057,4.059 C5.462,3.878 8.985,2.571 12.000,-0.000 C15.016,2.571 18.538,3.878 22.945,4.059 C22.950,4.502 22.959,4.954 22.969,5.421 C23.121,13.189 23.290,21.986 12.000,26.000 ZM21.282,5.596 C17.725,5.220 14.666,4.076 12.000,2.125 C9.335,4.076 6.276,5.220 2.720,5.596 C2.647,9.347 2.587,13.215 3.816,16.559 C5.134,20.144 7.742,22.594 12.000,24.232 C16.259,22.594 18.867,20.144 20.185,16.558 C21.415,13.213 21.355,9.346 21.282,5.596 ZM10.783,17.740 C10.783,17.740 10.288,17.352 10.126,17.226 L5.719,13.776 C5.716,13.772 5.716,13.772 5.713,13.769 L6.869,12.462 L10.576,15.367 L17.033,8.254 L18.365,9.386 L11.339,17.127 C11.164,17.316 10.783,17.740 10.783,17.740 Z"/>
                                            </svg>
                                        </span>
                                        <p class="mb-0 font-12">
                                            Full Refund if you don't receive your order. <br>
                                            Full or Partial Refund, if the item is not as described.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--scroll top btn-->
        <button id="scrollTopBtn" class="scroll-top-btn d-flex align-items-center justify-content-center pointer">
            <svg viewBox="0 0 17 10" width="17px" height="10px">
                <path fill-rule="evenodd" fill="rgb(124, 124, 124)" d="M0.000,8.111 L1.984,10.005 L8.498,3.789 L15.010,10.005 L16.995,8.111 L8.498,0.001 L0.000,8.111 Z"/>
            </svg>
        </button>

    </main>





























    <div class="container" style="display: none;">
        <ul class="nav nav-pills nav-fill ml-0" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="address-tab" data-toggle="tab" href="javascript:void(0)" role="tab" aria-controls="address" aria-selected="true" aria-expanded="true">Address</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" id="payment-tab" data-toggle="tab" href="javascript:void(0)" role="tab" aria-controls="payment" aria-selected="false">Payment</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in show" id="address" role="tabpanel" aria-labelledby="pricing-tab">
                @include('frontend.shop._partials.checkout_render')
            </div>
            <div class="tab-pane fade payment_tab" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                @include('frontend.shop._partials.checkout_payment')
            </div>
        </div>
    </div>

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
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
    <style>
        .StripeElement {
            width: 389px;
            background-color: white;
            height: 40px;
            padding: 10px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        //addresses js
        $("body").on('click','.save-address-book',function () {
            var form = $(".address-book-form").serialize();
            AjaxCall(
                "/my-account/save-address-book",
                form,
                res => {
                if (!res.error) {
                let select = $(".select-address")
                var opt = document.createElement('option');
                opt.value = res.data.id;
                opt.innerHTML = res.data.name;
                select.append(opt);
                $("#newAddressModal").modal('hide');

                select.val(res.data.id).trigger('change');
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

        $("body").on('click','.address-book-new',function () {
            AjaxCall(
                "/my-account/address-book-form",
                { default:true},
                res => {
                if (!res.error) {
                $(".address-form").html(res.html);
                $("#geo_country_book").select2();
                $("#newAddressModal").modal();
            }
        }
            );
        });

        $("body").on("change", ".select-address", function() {
            $(".container").css('opacity','0.6');
            $(".loader-img").toggleClass('d-none');
            AjaxCall(
                "/change-shipping-method",
                {addressId:$(this).val()},
                res => {
                if (!res.error) {
                $(".container").css('opacity','1');
                $(".loader-img").toggleClass('d-none');
                $("#address").html(res.html);
            }
        },
            error => {
                $(".container").css('opacity','1');
                $(".loader-img").toggleClass('d-none');
            }
            );
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
                opt.value = res.data.id;
                opt.innerHTML = res.data.name;
                select.appendChild(opt);
            }
        }
            );
        });
    </script>

    <script>
        var stripe = Stripe("{!! stripe_key() !!}");
        var elements = stripe.elements();
        // Custom Styling
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '24px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Send Stripe Token to Server
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
// Add Stripe Token to hidden input
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
// Submit form
            form.submit();
        }
    </script>
    <script>
        $(document).ready(function () {
            $("body").on("click", ".go-to-payment", function (event) {
                AjaxCall(
                    "/get-payment-options",
                    {},
                    res => {
                    if (!res.error) {
                    $(".nav-link").each(function (index,value) {
                        $(value).removeClass('active').addClass('disabled');
                    });

                    $(".tab-pane").each(function (index,value) {
                        $(value).removeClass('active in show');
                    });

                    $("#payment").addClass('active in show');
                    $("#payment-tab").removeClass('disabled').addClass('active');
                }
            }
                );
            });

            $("body").on("click", ".back-step", function (event) {
                $(".nav-link").each(function (index,value) {
                    $(value).removeClass('active').addClass('disabled');
                });

                $(".tab-pane").each(function (index,value) {
                    $(value).removeClass('active in show');
                });

                $("#address").addClass('active in show');
                $("#address-tab").removeClass('disabled').addClass('active');
            });

            $("body").on("click", ".nav-link", function (event) {
                event.stopImmediatePropagation();
            });

            $('body').on('change', '.payment_methods input[type=radio][name=payment_method]', function () {
                var method = $(this).val();
                if ($(this).is(':checked')) {
                    $('.payment_box').slideUp();
                    $(this).closest('li').find('.payment_box').slideDown();

                    $(".payment-method-data").each(function (index,value) {
                        $(value).addClass('d-none')
                    })

                    $("#" + method + "-method").removeClass('d-none')
                }
            })
        });

    </script>
    <script>
        $(document).ready(function () {
            function getRegionsPackage() {
                let value = $("#country").val();
                AjaxCall(
                    "/get-regions-by-country",
                    {country: value},
                    res => {
                    let select = document.getElementById('regions');
                select.innerText = null;
                if (!res.error) {
                    $.each(res.data, function (index, value) {
                        var opt = document.createElement('option');
                        opt.value = res.data[value];
                        opt.innerHTML = res.data[value];
                        select.appendChild(opt);
                    })

                }
            }
            );
            }

            function getRegions() {
                let value = $("#geo_country").val();
                AjaxCall(
                    "/get-regions-by-geozone",
                    {country: value},
                    res => {
                    let select = document.getElementById('geo_region');
                select.innerText = null;
                if (!res.error) {
                    var opt = document.createElement('option');
                    opt.value = res.data.id;
                    opt.innerHTML = res.data.name;
                    select.appendChild(opt);
                }
            }
            );
            }

            $("body").on("change", "#country", function () {
                getRegionsPackage();
            });

            $("body").on("change", "#geo_country", function () {
                getRegions();
            });

            $("body").on("change", ".select-shipping-method", function () {
                var optionId = $(this).val();
                var deliveryId = $(this).data('delivery');
                var addressId = $(".select-address").val();
                $(".container").css('opacity','0.6');
                $(".loader-img").toggleClass('d-none');
                AjaxCall(
                    "/change-shipping-method",
                    {deliveryId:deliveryId,optionId: optionId,addressId: addressId},
                    res => {
                    if (!res.error) {
                    $(".container").css('opacity','1');
                    $(".loader-img").toggleClass('d-none');
                    $("#address").html(res.html);
                }
            },
                error => {
                    $(".container").css('opacity','1');
                    $(".loader-img").toggleClass('d-none');
                }
                );
            });


            $("body").on("click", ".submit-cash", function () {
                $(".container").css('opacity','0.6');
                $(".loader-img").toggleClass('d-none');
                AjaxCall(
                    "/cash-order",
                    {},
                    res => {
                    if (!res.error) {
                    $(".container").css('opacity','1');
                    $(".loader-img").toggleClass('d-none');
                    window.location = res.url;
                }
            },
                error => {
                    $(".container").css('opacity','1');
                    $(".loader-img").toggleClass('d-none');
                }
                );
            });
        })
    </script>
@stop