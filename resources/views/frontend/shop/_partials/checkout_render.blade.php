<div class="col-lg-9 pl-md-left">

    {{--{{dd($billing_address)}}--}}
    <div class="left-content">
        <span class="head d-flex align-items-center">
            <span class="d-inline-block font-20 font-main-bold text-quatr-clr text-uppercase mr-4">Address</span>
            <span>
                <span class="profile-required-icon font-main-bold">&#42;</span>
                Your Billing address is same as your account
            </span>
        </span>

        <div class="checkout-note-wrap">
            {{--{!! Form::model($billing_address,['class'=>'form-horizontal']) !!}--}}
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex flex-wrap mb-4">
                        <span class="col-2">
                            <svg viewBox="0 0 17 18" width="17px" height="18px">
                                <path fill-rule="evenodd"  fill="rgb(132, 129, 157)" d="M15.807,18.000 C14.518,15.165 11.667,13.342 8.498,13.342 C5.333,13.342 2.482,15.165 1.190,18.000 L-0.000,18.000 C0.913,15.667 2.778,13.816 5.157,12.893 L5.604,12.720 L5.185,12.488 C3.049,11.302 1.722,9.074 1.722,6.671 C1.722,2.992 4.762,-0.000 8.498,-0.000 C12.235,-0.000 15.274,2.992 15.274,6.671 C15.274,9.075 13.949,11.304 11.815,12.488 L11.396,12.720 L11.843,12.893 C14.220,13.816 16.083,15.667 17.000,18.000 L15.807,18.000 ZM8.498,1.081 C5.369,1.081 2.824,3.589 2.824,6.671 C2.824,9.753 5.369,12.261 8.498,12.261 C11.629,12.261 14.176,9.753 14.176,6.671 C14.176,3.589 11.629,1.081 8.498,1.081 Z"/>
                            </svg>
                        </span>
                        <span class="col-10 font-16 text-uppercase font-main-bold">
                            {!! Auth::user()->name !!}
                            {!! Auth::user()->last_name !!}
                        </span>
                    </div>
                    <div id="address">

                        @include("frontend.shop._partials.address")
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
        @include("frontend.shop._partials.shipping_options")
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
                    <div class="price font-main-bold">${!! \Cart::getSubTotal() !!}</div>
                </div>
                <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="name">
                        Tax
                    </div>
                    <div class="price font-main-bold">$0</div>
                </div>
                <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="name">
                        Shipping {!! ($shipping) ? '('.$shipping->getAttributes()->courier->name.')' : '' !!}
                    </div>
                    <div class="price font-main-bold">${!! ($shipping) ? $shipping->getValue():0 !!}</div>
                </div>
                <div class="single-row font-17 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="name">
                        Discount (Coupon)
                    </div>
                    <div class="price font-main-bold">$0</div>
                </div>
                <div class="coupon-code font-17 d-flex flex-wrap justify-content-between align-items-center">
                    <span class="font-22 text-quatr-clr">Total</span>
                    <span class="font-22 text-quatr-clr font-bold">${!! \Cart::getTotal() !!}</span>
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


<!--modal change address-->
<div class="modal modal-checkout fade" id="changeAddressModal" tabindex="-1" role="dialog" aria-labelledby="changeAddressModal">
    <div class="modal-dialog main-scrollbar" role="document">
        <div class="modal-content">
            <button type="button" class="close main-transition" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-checkout_header text-center">
                <h2 class="modal-checkout_title font-main-bold font-22 text-uppercase">Change address</h2>
                <p class="font-15 text-gray-clr modal-text">  Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
            </div>
            <div>
                <form action="" class="checkout-form">

                    <div class="form-group d-flex flex-md-row flex-column align-items-md-center justify-content-between ">
                        <label for="title" class="checkout-form_label text-gray-clr mb-0 pl-md-0 pl-3 pb-0">Enter Shipping address<span class="form-required-icon text-quatr-clr font-main-bold">&nbsp;&#42;</span></label>
                        <div class="col-md-8">
                            <div class="simple_select_wrapper">
                                {!! Form::select('address_book',['' => 'Select'] + $address->toArray(),$address_id,['class' => 'form-control select-address']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::button('Select',['class' => 'save-address-book']) !!}
                </form>
            </div>

        </div>
    </div>
</div>








<!--modal new address-->
