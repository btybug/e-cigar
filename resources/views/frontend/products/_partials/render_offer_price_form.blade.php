@php
    $variations = collect($model->variations()->required()->get())->groupBy('variation_id');
@endphp
<li class="col-md-3">
    <div class="special__popup-main-product-item">
        <div class="special__popup-main-product-item-photo">
            <img src="{!! checkImage($model->image) !!}" alt="product">
        </div>
        <h3 class="lh-1 text-tert-clr font-26 special__popup-main-product-item-title">
            {{ $model->name }}
        </h3>

        <div
            class="font-sec-light text-main-clr font-24 lh-1 special__popup-main-product-item-sec-title">
            Choose Nicotine Strenght
        </div>
        <div class="d-flex flex-wrap special__popup-main-product-item-radio mb-3">
            <div class="product_radio-single">
                <div class="custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input"
                           id="customRadio1"
                           name="example" value="">
                    <label class="custom-label" for="customRadio1">
                        <span class="font-sec-ex-light font-26 count">10</span>
                        <span class="font-main-light font-18 mg">mg</span>
                    </label>
                </div>
            </div>
            <div class="product_radio-single">
                <div class="custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input"
                           id="customRadio2"
                           name="example" value="">
                    <label class="custom-label" for="customRadio2">
                        <span class="font-sec-ex-light font-26 count">15</span>
                        <span class="font-main-light font-18 mg">mg</span>
                    </label>
                </div>
            </div>
            <div class="product_radio-single">
                <div class="custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input"
                           id="customRadio3"
                           name="example" value="">
                    <label class="custom-label" for="customRadio3">
                        <span class="font-sec-ex-light font-26 count">20</span>
                        <span class="font-main-light font-18 mg">mg</span>
                    </label>
                </div>
            </div>
        </div>



        <div
            class="d-flex align-items-center flex-wrap special__popup-main-product-item-qty">
            <span class="font-sec-light font-24 qty">QTY</span>
            <div class="product__single-item-inp-num">
                <div class="quantity">
                    <input type="number" min="1" max="9" step="1" value="1">
                    <div class="inp-icons">
                        <span class="inp-up"></span>
                        <span class="inp-down"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="special__popup-main-product-item-price">
            <span class="font-40 product__single-item_price">
                £25,78
            </span>
        </div>
        <a href="#"
           class="font-sec-light font-26 text-sec-clr text-uppercase special__popup-main-product-item-btn remove-btn">
            Remove
        </a>
        <a href="#"
           class="font-sec-light font-26 text-sec-clr text-uppercase special__popup-main-product-item-btn add-btn">
            Add
        </a>
    </div>
</li>

@if(count($variations))
    @foreach($variations as $variation)
        @php
            $vSettings = $variation->first();
        @endphp
        @if($vSettings->type == 'filter')
            <div class="product-single-info_row options-group">
                <div class="d-flex flex-wrap align-items-center {{$vSettings->type}}" data-group-id="{{ $vSettings->variation_id }}">
                    @include("frontend.products._partials.variation_types.filter_popup")
                </div>
                <div class="product-single-info_row-items">
                </div>
            </div>
        @elseif($vSettings->type == 'single')
            @if(\View::exists("frontend.products._partials.single.$vSettings->display_as"))
                @include("frontend.products._partials.single.$vSettings->display_as")
                {{----}}
                {{--<div class="product-single-info_row options-group">--}}
                {{--<div class="d-flex flex-wrap align-items-center {{$vSettings->type}}" data-group-id="{{ $vSettings->variation_id }}">--}}
                {{----}}
                {{--</div>--}}
                {{--<div class="product-single-info_row-items">--}}

                {{--</div>--}}
                {{--</div>--}}
            @endif
        @else
            @if(\View::exists("frontend.products._partials.variation_types.$vSettings->display_as"))
                @include("frontend.products._partials.variation_types.$vSettings->display_as")
            @endif
        @endif
    @endforeach
@endif

{{--<input type="hidden" value="" id="variation_uid">--}}
{{--@if(count($model->promotions))--}}
{{--@foreach($model->promotions as $pkey => $promotion)--}}
{{--@include('frontend.products._partials.render_promotion')--}}
{{--@endforeach--}}
{{--@endif--}}

