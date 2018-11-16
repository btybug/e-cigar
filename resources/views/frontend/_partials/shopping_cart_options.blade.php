@if(\Cart::isEmpty())
    <!--Empty Card Message-->
    <p id="cartSidebarEmptyMsg" class="text-white text-center cart-aside-empty-msg">Cart is Empty</p>
@else
    @foreach(\Cart::getContent() as $item)
        @php
            $stock = $item->attributes->variation->stock
        @endphp
    <!--Repeating cart item-->
    <div class="cart-aside-item position-relative">
        <div class="row">
            <div class="col-5">
                <div class="cart-aside-img-holder position-relative">
                    <img class="img-fluid"
                         src="{{ $stock->image }}"
                         alt="{!! $stock->name !!}">
                    {{--<span class="cart-aside-img-badge position-absolute rounded-circle d-flex align-items-center justify-content-center">--}}
                             {{--<svg width="15px" height="23px">--}}
{{--<path fill-rule="evenodd" fill="rgb(255, 255, 255)"--}}
      {{--d="M13.932,8.633 L2.068,22.474 C1.940,22.625 1.755,22.704 1.567,22.704 C1.450,22.704 1.330,22.673 1.223,22.607 C0.947,22.437 0.835,22.092 0.959,21.793 L4.952,12.159 L1.568,12.159 C1.334,12.159 1.118,12.034 0.999,11.832 C0.881,11.630 0.879,11.381 0.994,11.176 L6.926,0.631 C7.042,0.424 7.262,0.295 7.500,0.295 L12.773,0.295 C13.013,0.295 13.235,0.427 13.351,0.637 C13.466,0.848 13.458,1.105 13.329,1.309 L9.360,7.545 L13.432,7.545 C13.689,7.545 13.923,7.695 14.030,7.929 C14.137,8.162 14.100,8.438 13.932,8.633 ZM8.159,8.864 C7.919,8.864 7.697,8.732 7.581,8.521 C7.466,8.311 7.474,8.054 7.603,7.850 L11.573,1.614 L7.886,1.614 L2.695,10.841 L5.939,10.841 C6.159,10.841 6.364,10.951 6.487,11.133 C6.609,11.317 6.633,11.549 6.548,11.752 L3.762,18.472 L11.999,8.864 L8.159,8.864 Z"/>--}}
                            {{--</svg>--}}
                        {{--</span>--}}
                </div>
            </div>
            <div class="col-7">
                <h3 class="cart-product-qty-title text-white">{!! $stock->name !!}</h3>
                <div class="cart-product-dtls font-main-light">
                    @foreach($item->attributes->variation->options as $voption)
                        <span class="d-block">{{ $voption->attr->name }} : {{ $voption->option->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-5">
                <div class="form-group mb-0">
                    <label class="cart-product-qty-label text-white font-main-light" for="cartProductqQty">QTY&nbsp;:&nbsp;</label>
                    {!! ForM::number('',$item->quantity,['class' => 'cart-product-qty-select select-default','min' => '1']) !!}

                </div>
            </div>
            <div class="col-7">
                <span class="d-block cart-product-price">€ {{ $item->price }}</span>
            </div>
        </div>
        <span class="cart-item-close d-inline-block position-absolute pointer d-flex align-items-center justify-content-center">
                <svg width="16px" height="16px">
                    <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                          d="M15.120,-0.000 L7.996,7.177 L0.818,0.053 L-0.000,0.879 L7.177,8.003 L0.053,15.180 L0.879,16.000 L8.003,8.823 L15.180,15.946 L16.000,15.121 L8.822,7.997 L15.946,0.820 L15.120,-0.000 Z"/>
                </svg>
            </span>
    </div>
    @endforeach
@endif



<div class="mt-auto">
    <a href="{!! route('shop_my_cart') !!}" class="profile-aside-btn btn mt-auto align-self-center rounded-0 bg-cl-red mr-3">View Cart</a>
    @if(! \Cart::isEmpty())
        <a href="{!! route('shop_check_out') !!}" class="profile-aside-btn btn mt-auto align-self-center rounded-0 bg-cl-blue">Checkout</a>
    @endif
</div>
