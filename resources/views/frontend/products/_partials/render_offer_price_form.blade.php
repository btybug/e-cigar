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
                    @if(\View::exists("frontend.products._partials.special_offer.single.$vSettings->display_as"))
                        @include("frontend.products._partials.special_offer.single.$vSettings->display_as")
                    @endif
                @else
                    @if(\View::exists("frontend.products._partials.special_offer.multy.$vSettings->display_as"))
                        @include("frontend.products._partials.special_offer.multy.$vSettings->display_as")
                    @endif
                @endif
            @endforeach
        @endif

        {{--<div--}}
            {{--class="d-flex align-items-center flex-wrap special__popup-main-product-item-qty">--}}
            {{--<span class="font-sec-light font-24 qty">QTY</span>--}}
            {{--<div class="product__single-item-inp-num">--}}
                {{--<div class="quantity">--}}
                    {{--<input type="number" min="1" max="9" step="1" value="1">--}}
                    {{--<div class="inp-icons">--}}
                        {{--<span class="inp-up"></span>--}}
                        {{--<span class="inp-down"></span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="special__popup-main-product-item-price">
            <span class="font-40 product__single-item_price">
                £25,78
            </span>
        </div>
        {{--<a href="#"--}}
           {{--class="font-sec-light font-26 text-sec-clr text-uppercase special__popup-main-product-item-btn remove-btn">--}}
            {{--Remove--}}
        {{--</a>--}}
        <a href="#"
           class="font-sec-light font-26 text-sec-clr text-uppercase special__popup-main-product-item-btn add-btn">
            Add
        </a>
    </div>
</li>



