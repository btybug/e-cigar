<div class="product-form-groups poptions-group" data-promotion="{{ $promotion->id }}">
    @if($promotion->type == 'variation_product')
        @foreach($promotion->type_attrs as $promotionAttr)
            @php
                $poptions = $promotion->type_attrs_pivot()->with('sticker')->where('attributes_id',$promotionAttr->id)->get();
            @endphp
            @if($modelattr->display_as == 'radio')
                <div class="row align-items-center row-product-range mt-2">
                    <div class="col-md-5">
                        <label for="productPack" class="fnz-20 mb-md-0"> {!! $promotionAttr->name !!}</label>
                    </div>
                    <div class="col-md-5">
                        @if(count($poptions))
                            <div class="product-range d-flex">
                                @foreach($poptions as $item)
                                    <div class="item {{ ($loop->first) ? 'active' : '' }} line-none">
                                        <label for="r{{ $item->sticker->id }}"></label>
                                        <input data-name="{{ $promotionAttr->id }}"
                                               {{ ($loop->first) ? 'checked' : '' }} class="select-variation-radio-poption"
                                               type="radio" id="r{{ $item->sticker->id }}" value="{{ $item->sticker->id }}"
                                               name="rate{{ $promotionAttr->id }}">
                                        <span class="count">{{ $item->sticker->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="row align-items-center mt-2">
                    <div class="col-md-5">
                        <label for="productPack" class="fnz-20 mb-md-0">{!! $promotionAttr->name !!}</label>
                    </div>
                    <div class="col-md-5">
                        <select data-name="{{ $promotionAttr->id }}"
                                class="select-default product-pack-select fnz-20 select-variation-poption"
                                id="productPack{{ $promotionAttr->id }}">
                            @foreach($poptions as $item)
                                <option value="{{ $item->sticker->id }}">{{ $item->sticker->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        @endforeach
        <p class="product-tab-main-content-price font-main-light price-place-promotion"></p>
    @else
        @php
            $variation = (count($promotion->variations)) ? $promotion->variations->first() : null;
            $promotionPrice = ($variation) ? $model->promotion_prices()->where('variation_id',$variation->id)->first() : null;
        @endphp
        <div class="row align-items-center row-product-range mt-2">
            <div class="col-md-5">
                <label for="productPack" class="fnz-20 mb-md-0"> {!! $promotion->name !!}</label>
            </div>
            <div class="col-md-5">
                {!! ($promotionPrice) ? "€" . $promotionPrice->price : (($variation) ? "€" . $variation->price : "no price") !!}
            </div>
        </div>
    @endif
</div>


