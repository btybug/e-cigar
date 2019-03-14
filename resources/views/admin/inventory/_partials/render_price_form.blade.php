<div class="product-single-info_row options-group" data-main-stock="{{ $model->id }}">
    <div class="d-flex flex-wrap align-items-center">
        @include("frontend.products._partials.variation_types.$model->type")
    </div>

</div>

<input type="hidden" value="" id="variation_uid">
@if(count($model->promotions))
    @foreach($model->promotions as $pkey => $promotion)
        @include('frontend.products._partials.render_promotion')
    @endforeach
@endif

