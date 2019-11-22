<div class="col-md-6 pl-0">
    @if($vSettings->display_as == 'menu')
        <div class="select-wall product__select-wall">
            @if($vSettings->type == 'package_product')

                @if($vSettings->count_limit > 1)
                    <span
                        class="d-flex align-items-center justify-content-center text-sec-clr align-self-center remove-single_product-item">
                    <i class="fas fa-times"></i>
                </span>
                @endif
            @endif
            <select name="variations[{{ $vSettings->variation_id }}][]"
                    id="single_v_select_{{ $vSettings->id.uniqid() }}"
                    data-count="{{ $vSettings->count_limit }}" data-id="{{ $vSettings->id }}"
                    style="width: 100%"
                    class="select-variation-option select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible single-product-select">
                @if(!$vSettings->min_count_limit || $vSettings->min_count_limit == 0)
                    <option value="no" data-out="1">
                        No, Thank you
                    </option>
                @endif
                @foreach($variation as $item)
                    <option value="{{ $item->id }}" @if(isset($selected) && $selected->id == $item->id) selected
                            @endif data-out="{{ out_of_stock($item) }}">
                        {{ $item->name }}
                        <b>{{ out_of_stock_msg($item) }}</b>
                    </option>
                @endforeach
            </select>
        </div>
    @elseif($vSettings->type == 'filter')
        <div class="select-wall product__select-wall">
            <span
                class="d-flex align-items-center justify-content-center text-sec-clr align-self-center remove-single_product-item">
            <i class="fas fa-times"></i>
            </span>
            <span class="font-sec-light font-26">{{ $selected->name }}</span>
        </div>
    @elseif($vSettings->display_as == 'list' && $vSettings->type == 'single')
        <div class="d-flex flex-wrap product__single-item-info-size">
            <div class="product_radio-single d-flex flex-column">
                @foreach($variation as $item)
                    @php
                        $x = uniqid();
                    @endphp
                    <div
                        class="custom-radio custom-control-inline product--inputs-wrap">
                        <input type="radio"
                               @if(isset($selected) && $selected->id == $item->id) checked
                               @endif data-out="{{ out_of_stock($item) }}"
                               class="custom-control-input custom-control-input-radio"
                               id="single_v_select_{{ $item->id.$x }}" name="variations[{{ $item->variation_id }}][]"
                               value="{{ $item->id }}">
                        <label class="custom-label"
                               for="single_v_select_{{ $item->id.$x }}">
                            <span class="font-sec-ex-light font-26 count">{{ $item->name }}</span>
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
    @elseif($vSettings->display_as == 'list' && $vSettings->type == 'package_product')
        <div class="d-flex flex-wrap product__single-item-info-size">
            <div class="product_radio-single">
                @php
                    $x = uniqid();
                @endphp
                <div
                    class="custom-radio custom-control-inline product--inputs-wrap">
                    <input type="checkbox"
                           data-out="{{ out_of_stock($selected) }}"
                           class="custom-control-input"
                           id="single_v_select_{{ $selected->id.$x}}"
                           name="variations[{{ $vSettings->variation_id }}][]"
                           value="{{ $selected->id }}">
                    <label class="custom-label checkbox-select"
                           for="single_v_select_{{ $selected->id.$x }}">
                        <span class="font-sec-ex-light font-26 count">{{ $selected->name }}</span>
                        <span class="check-icon d-inline-flex align-items-center justify-content-center position-absolute">
                                            <svg viewBox="0 0 26 26" enable-background="new 0 0 26 26">
  <path d="m.3,14c-0.2-0.2-0.3-0.5-0.3-0.7s0.1-0.5 0.3-0.7l1.4-1.4c0.4-0.4 1-0.4 1.4,0l.1,.1 5.5,5.9c0.2,0.2 0.5,0.2 0.7,0l13.4-13.9h0.1v-8.88178e-16c0.4-0.4 1-0.4 1.4,0l1.4,1.4c0.4,0.4 0.4,1 0,1.4l0,0-16,16.6c-0.2,0.2-0.4,0.3-0.7,0.3-0.3,0-0.5-0.1-0.7-0.3l-7.8-8.4-.2-.3z"></path>
</svg>
                                        </span>
                    </label>
                </div>
            </div>
        </div>
    @elseif($vSettings->display_as == 'popup' && $vSettings->type == 'package_product')
        <div class="select-wall product__select-wall">
            <span
                class="d-flex align-items-center justify-content-center text-sec-clr align-self-center remove-single_product-item">
            <i class="fas fa-times"></i>
            </span>
            <span class="font-sec-light font-26">{{ $selected->name }}</span>
        </div>
        {{--<div class="d-flex flex-wrap product__single-item-info-size">--}}
        {{--<div class="product_radio-single">--}}
        {{--@php--}}
        {{--$x = uniqid();--}}
        {{--@endphp--}}
        {{--<div--}}
        {{--class="custom-radio custom-control-inline">--}}
        {{--<input type="checkbox"--}}
        {{--data-out="{{ out_of_stock($selected) }}"--}}
        {{--class="custom-control-input"--}}
        {{--id="single_v_select_{{ $selected->id.$x}}" name="variations[{{ $vSettings->variation_id }}][]"--}}
        {{--value="{{ $selected->id }}">--}}
        {{--<label class="custom-label checkbox-select"--}}
        {{--for="single_v_select_{{ $selected->id.$x }}">--}}
        {{--<span class="font-sec-ex-light font-26 count">{{ $selected->name }}</span>--}}
        {{--</label>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
    @endif

</div>
<div class="col-md-3 d-flex justify-content-center">
    @if($vSettings->price_per == 'item')
        @if($selected->discount_type == 'range')
            <div class="d-flex flex-column w-100 align-items-center">
                <span class="text-tert-clr">*Quality Discount</span>
                <div class="product__single-item-inp-num">
                    <div class="quantity">
                        {!! Form::number('qty',1,['class' => 'product-qty product-qty_per_price input-qty',
                            'data-id' => $selected->id,'min' => 1,'step' => 1]) !!}
                        <div class="inp-icons">
                            <span class="inp-up"></span>
                            <span class="inp-down"></span>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($selected->discount_type == 'fixed')
            <div
                class="d-flex flex-column w-100 align-items-center">
                <span class="text-tert-clr">*Quality Discount</span>
                <div class="select-wall product__select-wall w-100">
                    <select name="qty" id="" data-id="{{ $selected->id }}"
                            class="select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible product-qty product-qty_per_price select-qty"
                            style="width: 100%">
                        @if(count($selected->discounts))
                            @foreach($selected->discounts as $d)
                                <option value="{{ $d->id }}">Pack of {{ $d->qty }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        @endif
    @endif
</div>
<div class="col-md-3 pr-0 d-flex justify-content-end">
    @if($selected->price_per =='item' && ! $selected->stock->type)
        @if($selected->price_type == 'static')
            <div class="product__single-item-info-price lh-1" data-single-price="{{ $selected->price }}">
                <span class="font-40">
                        {{ convert_price($selected->price,$currency, false) }}
                </span>
            </div>
        @else
            @if($selected->discount_type == 'range')
                @php
                    $qty = (isset($qty))?:1;
                    $discount = $selected->discounts()->where('from','<=',$qty)->where('to','>=',$qty)->first();
                @endphp
                @if($discount)
                    <div class="product__single-item-info-price lh-1" data-single-price="{{ $discount->price*$qty }}">
                        <span class="font-40">
                            {{ convert_price($discount->price*$qty,$currency, false) }}
                        </span>
                    </div>
                @else
                    not found
                @endif
            @elseif($selected->discount_type == 'fixed')
                @php
                    $discount = $selected->discounts()->first();
                @endphp
                @if($discount)
                    <div class="product__single-item-info-price lh-1" data-single-price="{{ $discount->price }}">
                        <span class="font-40">
                           {{ convert_price($discount->price,$currency, false) }}
                        </span>
                    </div>
                @else
                    not found
                @endif
            @endif
        @endif
    @endif
</div>
