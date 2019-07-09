<div class="product__single-item-info mb-3 limit {{$vSettings->type}}"
     data-group-id="{{ $vSettings->variation_id }}"
     data-req="{{ $vSettings->is_required }}" data-id="{{ $vSettings->id }}" data-limit="{{ $vSettings->count_limit }}"
     data-per-price="{{ $vSettings->price_per }}" data-price="{{ convert_price($vSettings->price,$currency,false,true) }}"
     data-min-limit="{{ $vSettings->min_count_limit }}">

    <div
        class="d-flex flex-wrap align-items-center lh-1 product__single-item-info-top">
        <div class="col-md-9 pl-0">
            <span class="font-sec-light font-26">{{ $vSettings->title }}</span>
        </div>
        <div class="col-md-3 d-flex justify-content-end pr-0">
            @if($vSettings->price_per == 'product')
                <span class="font-40 product__single-item_price">
                        {{ convert_price($vSettings->price,$currency, false) }}
                </span>
            @endif
        </div>
    </div>
    @if(! isset($selected))
        @php $selected = $variation->first(); @endphp
    @endif
    <div class="d-flex flex-wrap align-items-end mb-2 product__single-item-info-bottom">
        <div class="col-md-6 pl-0">
            <div class="d-flex flex-wrap product__single-item-info-size">
                <div class="product_radio-single">
                    @foreach($variation as $item)
                    <div
                        class="custom-radio custom-control-inline">
                        <input type="radio"
                               @if(isset($selected) && $selected->id == $item->id) checked @endif data-out="{{ out_of_stock($item) }}"
                               class="custom-control-input"
                               id="single_v_select_{{ $item->id }}" name="variations[]"
                               value="{{ $item->id }}">
                        <label class="custom-label"
                               for="single_v_select_{{ $item->id }}">
                                <span class="font-sec-ex-light font-26 count">{{ $item->name }}</span>
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex justify-content-center">
            @if($selected->discount_type == 'range')
                <div class="d-flex flex-column w-100 align-items-center">
                    <span class="text-tert-clr">*Quality Discount</span>
                    <div class="product__single-item-inp-num">
                        <div class="quantity">
                            {!! Form::number('qty',1,['class' => 'product-qty product-qty_per_price ',
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
                                class="select-2 select-2--no-search main-select not-selected arrow-dark select2-hidden-accessible product-qty product-qty_per_price"
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
        </div>
        <div class="col-md-3 pr-0 d-flex justify-content-end">
            @if($selected->price_per =='item' && ! $selected->stock->type)
                <div class="product__single-item-info-price lh-1">
                    <span class="font-40">
                        @if($selected->price_type == 'static')
                            {{ convert_price($selected->price,$currency, false) }}
                        @else
                            @if($selected->discount_type == 'range')
                                @php
                                    $qty = (isset($qty))?:1;
                                    $discount = $selected->discounts()->where('from','<=',$qty)->where('to','>=',$qty)->first();
                                @endphp
                                @if($discount)
                                    {{ convert_price($discount->price*$qty,$currency, false) }}
                                @else
                                    not found
                                @endif
                            @elseif($selected->discount_type == 'fixed')
                                @php
                                    $discount = $selected->discounts()->first();
                                @endphp
                                @if($discount)
                                    {{ convert_price($discount->price,$currency, false) }}
                                @else
                                    not found
                                @endif
                            @endif
                        @endif
                    </span>
                </div>
            @endif
        </div>
    </div>
</div>


