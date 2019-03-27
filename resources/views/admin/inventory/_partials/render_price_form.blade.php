@php
$variations = collect($model->variations)->groupBy('variation_id');
@endphp

@if(count($variations))
    @foreach($variations as $variation)
        @php
            $vSettings = $variation->first();
        @endphp
        <div class="product-single-info_row options-group">
            <div class="d-flex flex-wrap align-items-center single_product" data-group-id="{{ $vSettings->variation_id }}">
                @if($vSettings->type == 'simple_product')
                    <div class="col-sm-10 pl-0 d-flex" data-price="{{ $vSettings->price }}" data-id="{{ $vSettings->id }}">
                        @if(! $vSettings->is_required)
                            {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input ','id' => 'opt'.$vSettings->id]) !!}
                            <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer " for="opt{{ $vSettings->id }}">
                                {{ $vSettings->name }}
                            </label>
                        @else
                            {{ $vSettings->name }}
                        @endif
                    </div>
                    <div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
                        <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
                            {{ convert_price($vSettings->price,$currency) }}
                        </span>
                    </div>
                @else
                    @include("frontend.products._partials.variation_types.$vSettings->display_as")
                @endif
            </div>
        </div>
    @endforeach
@endif

{{--<input type="hidden" value="" id="variation_uid">--}}
{{--@if(count($model->promotions))--}}
    {{--@foreach($model->promotions as $pkey => $promotion)--}}
        {{--@include('frontend.products._partials.render_promotion')--}}
    {{--@endforeach--}}
{{--@endif--}}

