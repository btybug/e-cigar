<div class="product-single-info_row options-group" data-main-stock="{{ $model->id }}">
    @if($model->type == 'variation_product')
        @foreach($model->type_attrs as $modelattr)
            @php
                $options = $model->type_attrs_pivot()->with('sticker')->where('attributes_id',$modelattr->id)->get();
            @endphp

            @if(\View::exists('frontend.products._partials.single.'.$modelattr->pivot->type))
                @include('frontend.products._partials.single.'.$modelattr->pivot->type)
            @endif
        @endforeach
    @endif
</div>

<input type="hidden" value="" id="variation_uid">
@if(count($model->promotions))
    @foreach($model->promotions as $pkey => $promotion)
        @include('frontend.products._partials.render_promotion')
    @endforeach
@endif

