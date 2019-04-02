@php
$variations = collect($model->variations)->groupBy('variation_id');
@endphp

@if(count($variations))
    @foreach($variations as $variation)
        @php
            $vSettings = $variation->first();
        @endphp
        @if($vSettings->type == 'filter')
            @if(\view::exists("frontend.products._partials.filter_types.$vSettings->display_as"))
                <div class="product-single-info_row options-group">
                    <div class="d-flex flex-wrap align-items-center {{$vSettings->type}}" data-group-id="{{ $vSettings->variation_id }}">
                        @include("frontend.products._partials.filter_types.$vSettings->display_as")
                    </div>
                    <div class="product-single-info_row-items">
                    </div>
                </div>
            @endif
        @else
            @if(\view::exists("frontend.products._partials.variation_types.$vSettings->display_as"))
                <div class="product-single-info_row options-group">
                    <div class="d-flex flex-wrap align-items-center {{$vSettings->type}}" data-group-id="{{ $vSettings->variation_id }}">
                        @include("frontend.products._partials.variation_types.$vSettings->display_as")
                    </div>
                    <div class="product-single-info_row-items">

                    </div>
                </div>
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

