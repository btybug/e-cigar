@extends('layouts.admin')
@section('content')
    <main class="main-content py-3 bg-white">
        <div class="shopping-cart_wrapper">
            <div class="container main-max-width mw-100">
                <div class="shopping-cart-head">
                    <ul class="nav nav-pills">
                        <li class="nav-item col-md-3">
                            <a class="item visited d-flex align-items-center justify-content-between"
                               href="javascript:void(0);">
                                <span
                                        class="name text-uppercase font-main-bold font-16 text-truncate">SHOPPING CART</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                                              d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item active d-flex align-items-center justify-content-between"
                               href="javascript:void(0);">
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">CHECKOUT</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                                              d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item d-flex align-items-center justify-content-between"
                               href="javascript:void(0);">
                                <span class="name text-uppercase font-main-bold font-16 text-truncate">Payment</span>
                                <span class="icon">
                                    <svg width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                                              d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item col-md-3">
                            <a class="item d-flex align-items-center justify-content-between"
                               href="javascript:void(0);">
                                <span
                                        class="name text-uppercase font-main-bold font-16 text-truncate">Confirmation</span>
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         width="21px" height="21px">
                                        <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                                              d="M10.501,0.000 C4.702,0.000 0.000,4.700 0.000,10.499 C0.000,16.298 4.702,21.000 10.501,21.000 C16.300,21.000 21.000,16.298 21.000,10.499 C21.000,4.700 16.300,0.000 10.501,0.000 ZM16.216,7.475 L9.908,14.572 C9.753,14.745 9.535,14.838 9.315,14.838 C9.143,14.838 8.969,14.779 8.824,14.664 L4.880,11.511 C4.542,11.239 4.485,10.742 4.760,10.401 C5.030,10.060 5.528,10.006 5.866,10.278 L9.224,12.964 L15.036,6.425 C15.325,6.101 15.825,6.072 16.150,6.361 C16.475,6.650 16.506,7.149 16.216,7.475 Z"/>
                                    </svg>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="shopping-cart-content">
                    <div class="shopping-cart-inner">
                        <div class="d-flex flex-wrap checkout-data">
                            <div class="col-lg-9 pl-md-left">
                                <div class="left-content">
                                        <span class="head d-flex align-items-center">
            <span class="d-inline-block font-20 font-main-bold text-quatr-clr text-uppercase mr-4">Address</span>
            <span>
                <span class="profile-required-icon font-main-bold">&#42;</span>
                Your Billing address is same as your account
            </span>
        </span>
                                    <div class="checkout-note-wrap">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="d-flex flex-wrap mb-4">
                        <span class="col-2">
                            <svg viewBox="0 0 17 18" width="17px" height="18px">
                                <path fill-rule="evenodd" fill="rgb(132, 129, 157)"
                                      d="M15.807,18.000 C14.518,15.165 11.667,13.342 8.498,13.342 C5.333,13.342 2.482,15.165 1.190,18.000 L-0.000,18.000 C0.913,15.667 2.778,13.816 5.157,12.893 L5.604,12.720 L5.185,12.488 C3.049,11.302 1.722,9.074 1.722,6.671 C1.722,2.992 4.762,-0.000 8.498,-0.000 C12.235,-0.000 15.274,2.992 15.274,6.671 C15.274,9.075 13.949,11.304 11.815,12.488 L11.396,12.720 L11.843,12.893 C14.220,13.816 16.083,15.667 17.000,18.000 L15.807,18.000 ZM8.498,1.081 C5.369,1.081 2.824,3.589 2.824,6.671 C2.824,9.753 5.369,12.261 8.498,12.261 C11.629,12.261 14.176,9.753 14.176,6.671 C14.176,3.589 11.629,1.081 8.498,1.081 Z"/>
                            </svg>
                        </span>
                                                    <span class="col-10 font-16 text-uppercase font-main-bold">
                            Name
                                                        Last name
                        </span>
                                                </div>
                                                <div id="address">
                                                    <div class="d-flex flex-wrap">
                                                        <span class="col-2">
        <svg viewBox="0 0 14 18" width="14px" height="18px">
            <path fill-rule="evenodd" fill="rgb(132, 129, 157)"
                  d="M7.672,17.772 C7.488,17.923 7.244,17.999 7.000,17.999 C6.756,17.999 6.513,17.923 6.328,17.772 C6.328,17.772 -0.000,12.588 -0.000,6.990 C-0.000,3.129 3.134,-0.000 7.000,-0.000 C10.866,-0.000 14.000,3.129 14.000,6.990 C14.000,12.588 7.672,17.772 7.672,17.772 ZM7.000,0.993 C3.688,0.993 0.994,3.683 0.994,6.990 C0.994,8.429 1.506,10.789 3.943,13.864 C5.391,15.690 6.842,16.907 6.952,16.999 C6.959,17.002 6.976,17.006 7.000,17.006 C7.023,17.006 7.041,17.002 7.048,16.999 C7.276,16.809 13.006,11.970 13.006,6.990 C13.006,3.683 10.312,0.993 7.000,0.993 ZM7.000,8.457 C6.232,8.457 5.610,7.836 5.610,7.069 C5.610,6.303 6.232,5.681 7.000,5.681 C7.767,5.681 8.390,6.303 8.390,7.069 C8.390,7.836 7.767,8.457 7.000,8.457 Z"/>
        </svg>
    </span>
                                                        <div class="col-10">
                                                                <ul class="list-unstyled mb-0 font-16">
                                                                    <li>Company</li>
                                                                    <li>first address</li>
                                                                    <li>second address</li>
                                                                    <li>city</li>
                                                                    <li>country</li>
                                                                    <li>region</li>
                                                                    <li>111 street name</li>
                                                                    <li>post code</li>
                                                                </ul>
                                                            <div class="d-flex flex-wrap align-items-center change-new-btn mt-4">
                                                                <div class="mr-3">
                <span data-toggle="modal" data-target="#changeAddressModal"
                      class="d-inline-flex align-items-center text-quatr-clr font-main-bold font-15 text-uppercase pointer">
                change
                <span class="d-inline-block ml-1">&#9998;</span>
            </span>

                                                                </div>
                                                                <div>
                <span data-toggle="modal" data-target="#addNewAddress"
                      class="d-inline-flex align-items-center text-quatr-clr font-main-bold font-15 text-uppercase pointer  nav-link--new-address address-book-new">
                    add new
                    <span class="d-inline-block ml-1">&#43;</span>
                </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


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
                                    {{--@include("frontend.shop._partials.shipping_options")--}}
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
                                                <div class="price font-main-bold">1</div>
                                            </div>
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Tax
                                                </div>
                                                <div class="price font-main-bold">2</div>
                                            </div>
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Shipping 3
                                                </div>
                                                <div
                                                        class="price font-main-bold">4</div>
                                            </div>
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Discount (Coupon)
                                                </div>
                                                <div class="price font-main-bold">5</div>
                                            </div>
                                            <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Total
                                                </div>
                                                <div class="price font-main-bold">6</div>
                                            </div>
                                            <div class="coupon-code font-17 d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="name">
                                                    Coupon code
                                                </div>
                                                <div class="code">
                                                    <input type="text" class="form-control" name="coupon_code" id="coupon_code">
                                                </div>
                                            </div>
                                            <div class="checkout-btn text-center">
                                                        <button class="btn btn-primary text-uppercase font-15 go-to-payment">
                                                            CHECKOUT
                                                        </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="secure d-flex flex-wrap justify-content-between align-items-center">
            <span class="secure-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="26px">
                    <path fill-rule="evenodd" fill="rgb(81, 132, 229)"
                          d="M12.000,26.000 C0.711,21.986 0.882,13.191 1.034,5.421 C1.043,4.954 1.052,4.502 1.057,4.059 C5.462,3.878 8.985,2.571 12.000,-0.000 C15.016,2.571 18.538,3.878 22.945,4.059 C22.950,4.502 22.959,4.954 22.969,5.421 C23.121,13.189 23.290,21.986 12.000,26.000 ZM21.282,5.596 C17.725,5.220 14.666,4.076 12.000,2.125 C9.335,4.076 6.276,5.220 2.720,5.596 C2.647,9.347 2.587,13.215 3.816,16.559 C5.134,20.144 7.742,22.594 12.000,24.232 C16.259,22.594 18.867,20.144 20.185,16.558 C21.415,13.213 21.355,9.346 21.282,5.596 ZM10.783,17.740 C10.783,17.740 10.288,17.352 10.126,17.226 L5.719,13.776 C5.716,13.772 5.716,13.772 5.713,13.769 L6.869,12.462 L10.576,15.367 L17.033,8.254 L18.365,9.386 L11.339,17.127 C11.164,17.316 10.783,17.740 10.783,17.740 Z"/>
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
    </main>
@stop
@section('js')
@stop
