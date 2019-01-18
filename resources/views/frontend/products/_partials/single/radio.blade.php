<div class="single-product-row-repeatable d-flex align-items-center flex-md-row flex-column">
    <p class="product-single-info_label text-uppercase mb-0">{!! $modelattr->name !!}:</p>
    @if(count($options))
        @foreach($options as $item)
            <div class="product-single-info_custom-control custom-control custom-radio">
                <input type="radio" id="rm{{ $item->id }}" class="custom-control-input select-variation-radio-option" data-name="{{ $modelattr->id }}"
                       name="rate{{ $modelattr->id }}"  value="{{ $item->sticker->id }}" {{ ($loop->first) ? 'checked' : '' }} >
                <label class="product-single-info_radio-label custom-control-label font-15 text-gray-clr pointer" for="rm{{ $item->id }}">{{ $item->sticker->name }}</label>
            </div>
        @endforeach
    @endif
</div>


{{--<div class="row align-items-center row-product-range mt-2">--}}
    {{--<div class="col-md-5">--}}
        {{--<label for="productPack" class="fnz-20 mb-md-0"> {!! $modelattr->name !!}</label>--}}
    {{--</div>--}}
    {{--<div class="col-md-5">--}}
        {{--@if(count($options))--}}
            {{--<div class="d-flex">--}}
                {{--@foreach($options as $item)--}}
                    {{--<div class="item {{ ($loop->first) ? 'active' : '' }} line-none">--}}
                        {{--<label for="rm{{ $item->id }}"></label>--}}
                        {{--<input data-name="{{ $modelattr->id }}"--}}
                               {{--{{ ($loop->first) ? 'checked' : '' }} class="select-variation-radio-option"--}}
                               {{--type="radio" id="rm{{ $item->id }}" value="{{ $item->sticker->id }}"--}}
                               {{--name="rate{{ $modelattr->id }}">--}}
                        {{--<span class="count">{{ $item->sticker->name }}</span>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            {{--</div>--}}
        {{--@endif--}}
    {{--</div>--}}
{{--</div>--}}


{{--<div class="filter-wall cat-name">--}}
    {{--<h5 class="font-sec-bold font-16 text-uppercase">{{ $filter->name }}</h5>--}}
    {{--@foreach($filter->stickers as $sticker)--}}
        {{--<div class="single-wrap">--}}
            {{--<div class="custom-control custom-radio custom-control-inline align-items-center">--}}
                {{--{!! Form::radio("select_filter[$filter->id]",$sticker->id,null,['class' => 'select-filter custom-control-input','id' => 'customRadio'.$filter->id.$sticker->id]) !!}--}}
                {{--<label class="custom-control-label text-gray-clr font-15"--}}
                       {{--for="customRadio{{ $filter->id.$sticker->id }}">{{ $sticker->name }}--}}
                    {{--<span class="amount">(189)</span>--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
{{--</div>--}}
