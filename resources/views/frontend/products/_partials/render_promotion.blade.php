<div class="product-single-info_row poptions-group" data-promotion="{{ $promotion->id }}">
    <h3 class="product-single-info_title font-main-bold font-20 text-uppercase text-tert-clr">
        {{ $promotion->name }}
        @if(! $promotion->pivot->type)
            <div class="col-md-6">
                {!! Form::checkbox('',1,null,['class' => 'optional_checkbox']) !!}
                <input type="hidden" value="" class="variation_items optional_item">
            </div>
        @else
            <input type="hidden" value="" class="variation_items required_item">
        @endif
    </h3>
    <div class="d-flex align-items-center">
        @if($promotion->type == 'variation_product')
            <div>
                @foreach($promotion->type_attrs as $promotionAttr)
                    @php
                        $poptions = $promotion->type_attrs_pivot()->with('sticker')->where('attributes_id',$promotionAttr->id)->get();
                    @endphp

                    @if(\View::exists('frontend.products._partials.singleExtra.'.$promotion->pivot->type))
                        @include('frontend.products._partials.singleExtra.'.$promotion->pivot->type)
                    @endif
                @endforeach
            </div>
            <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-place-promotion"></span>
        @else
            @php
                $variation = (count($promotion->variations)) ? $promotion->variations->first() : null;
                $promotionPrice = ($variation) ? $model->promotion_prices()->where('variation_id',$variation->id)->first() : null;
            @endphp
            <div>

            </div>
            <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-place-promotion">
                  {!! ($promotionPrice) ? "€" . $promotionPrice->price : (($variation) ? "€" . $variation->price : "no price") !!}
            </span>
        @endif
    </div>
</div>



