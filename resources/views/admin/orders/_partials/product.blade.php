<div class="main-right-wrapp kaliony-page d-flex flex-wrap" data-id="{{ $vape->id }}">
    <div class="single-product-dtls-wrap" id="requiredProducts">
        <div class="row">
            <div class="col-lg-6 product-single-view-outer mr-0 w-100">
                <div class="product-card_view product-card_view--single position-relative">
                    <!--product main image-->
                    @if($vape->image)
                        <div class="h-100">
                            <img class="single-product_top-img"
                                 src="{!! checkImage($vape->image) !!}"
                                 alt="{!! @getImage( $vape->image)->seo_alt !!}">
                        </div>
                    @endif
                <!--new label-->
                    {{--                                                <span--}}
                    {{--                                                    class="new-label product-card_new-label d-inline-block text-uppercase font-main-bold font-16 text-sec-clr position-absolute">new</span>--}}
                <!--sale label-->
                    {{--                                                <span--}}
                    {{--                                                    class="sale-label product-card_sale-label d-inline-block text-uppercase font-main-bold font-16 text-sec-clr position-absolute">-10%</span>--}}
                </div>

                <div class="d-flex product-card-thumbs product-card-thumbs--single">
                    @if($vape->image)
                        <div class="product-card_thumb-img-holder pointer active_slider">
                            <img class="" src="{!! checkImage($vape->image) !!}"
                                 alt="{!! @getImage( $vape->image)->seo_alt !!}">
                        </div>
                    @endif
                    @if($vape->variations && count($vape->variations))
                        @foreach($vape->variations()->required()->get() as $variation)
                            @if(isset($variation['image']))
                                <div class="product-card_thumb-img-holder pointer"
                                     data-id="{{ $variation['id'] }}">
                                    <img class=""
                                         src="{{ checkImage($variation["image"]) }}"
                                         alt="{!! @getImage($variation["image"])->seo_alt !!}">
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col-lg-6 product-single-info-outer">
                <div class="product-single-info">
                    <input type="hidden" value="{{ $vape->id }}" data-p="{{ $vape->type }}"
                           id="vpid">

                    <div class="product__single-item">
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-between product__single-item-top">
                            <div
                                class="d-flex align-items-center justify-content-center product_btn-discount">
                                                            <span
                                                                class="font-sec-reg font-26 text-sec-clr">QTY Discount</span>
                            </div>
                            <div class="font-main-light font-20">
                                The more you order the more you get
                            </div>
                            <a href="#" class="font-20 text-tert-clr top_details">Offer
                                Details</a>
                        </div>

                        @include("admin.inventory._partials.render_price_form",['model' => $vape])
                    </div>
                    <div
                        class="d-flex flex-wrap align-items-center justify-content-between product__single-delivery">
                        <div
                            class="d-flex align-items-center product__single-delivery-left">
                            <div
                                class="font-sec-reg text-main-clr font-28 lh-1 product__single-delivery-title">
                                Delivery
                            </div>
                            <div class="product__single-delivery-select">
                                <div class="select-wall product__select-wall">
                                    <select name="" id=""
                                            class="select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible"
                                            style="width: 250px">
                                        <option value="">United Kingdom</option>
                                        <option value="">Armenia</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div
                            class="d-flex align-items-center product__single-delivery-right">
                            <div class="product__single-delivery-free font-20 lh-1">
                                Free on orders over £10
                            </div>
                            <a href="#"
                               class="product__single-delivery-details font-20 text-tert-clr lh-1">More
                                Details</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
