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
                <div class="contents-wrapper">
                    <div class="content-wrap shoping-card d-none">
                        shoping-card
                    </div>
                    <div class="content-wrap check-out">
                        <ul class="row">
                            <li class="col-md-3">
                                <div class="item-content">
                                    <div class="item-photo">
                                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/intermediary/f/c0481d96-83b9-423e-a234-42a226980db3/d9xw3a0-a23207d9-a507-4fef-a3ca-4c5c1bf47d64.jpg/v1/fill/w_359,h_250,q_70,strp/vape_girl_by_asiamckinley_ann_d9xw3a0-250t.jpg"
                                             alt="photo">
                                    </div>
                                    <div class="item-title">
                                        <span>Title</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="item-content">
                                    <div class="item-photo">
                                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/intermediary/f/c0481d96-83b9-423e-a234-42a226980db3/d9xw3a0-a23207d9-a507-4fef-a3ca-4c5c1bf47d64.jpg/v1/fill/w_359,h_250,q_70,strp/vape_girl_by_asiamckinley_ann_d9xw3a0-250t.jpg"
                                             alt="photo">
                                    </div>
                                    <div class="item-title">
                                        <span>Title</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="item-content">
                                    <div class="item-photo">
                                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/intermediary/f/c0481d96-83b9-423e-a234-42a226980db3/d9xw3a0-a23207d9-a507-4fef-a3ca-4c5c1bf47d64.jpg/v1/fill/w_359,h_250,q_70,strp/vape_girl_by_asiamckinley_ann_d9xw3a0-250t.jpg"
                                             alt="photo">
                                    </div>
                                    <div class="item-title">
                                        <span>Title</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="item-content">
                                    <div class="item-photo">
                                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/intermediary/f/c0481d96-83b9-423e-a234-42a226980db3/d9xw3a0-a23207d9-a507-4fef-a3ca-4c5c1bf47d64.jpg/v1/fill/w_359,h_250,q_70,strp/vape_girl_by_asiamckinley_ann_d9xw3a0-250t.jpg"
                                             alt="photo">
                                    </div>
                                    <div class="item-title">
                                        <span>Title</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-md-3">
                                <div class="item-content">
                                    <div class="item-photo">
                                        <img src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/intermediary/f/c0481d96-83b9-423e-a234-42a226980db3/d9xw3a0-a23207d9-a507-4fef-a3ca-4c5c1bf47d64.jpg/v1/fill/w_359,h_250,q_70,strp/vape_girl_by_asiamckinley_ann_d9xw3a0-250t.jpg"
                                             alt="photo">
                                    </div>
                                    <div class="item-title">
                                        <span>Title</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="content-wrap payment-wrapper d-none">
payement
                    </div>
                    <div class="content-wrap confirm-wrapper d-none">
                        confirm
                    </div>
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="back-item">
                            <button class="btn btn-secondary back-btn">Back</button>
                        </div>
                        <div class="next-item">
                            <button class="btn btn-secondary next-btn">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop
@section('js')
    <script>
        $('body').on('click','.shopping-cart_wrapper .item-content',function () {
            $(this).toggleClass('active');
        });
        $('body').on('click','.shopping-cart_wrapper .next-btn',function (e) {
            e.preventDefault();

            $($('.shopping-cart-head').find('.active')[0]).addClass('visited');
            $($($('.shopping-cart-head').find('.active')[0]).closest('li').next().find('.item')[0]).addClass('active');
            $($('.shopping-cart-head').find('.active')[0]).removeClass('active');

            $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[0]).next().removeClass('d-none');
            $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[0]).addClass('d-none');

            !$('.confirm-wrapper').hasClass('d-none') && $('.next-btn').prop('disabled',true);
            $('.back-btn').prop('disabled',false)
        });
        $('body').on('click','.shopping-cart_wrapper .back-btn',function (e) {
            e.preventDefault();

            $($('.shopping-cart-head').find('.active')[0]).removeClass('visited');
            $($($('.shopping-cart-head').find('.active')[0]).closest('li').prev().find('.item')[0]).addClass('active');
            $($('.shopping-cart-head').find('.active')[1]).removeClass('active');

            $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[0]).prev().removeClass('d-none');
            $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[1]).addClass('d-none');

            !$('.shoping-card').hasClass('d-none') && $('.back-btn').prop('disabled',true);
            $('.next-btn').prop('disabled',false)
        });
    </script>
@stop
