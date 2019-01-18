<div class="d-flex align-items-center flex-md-row flex-column">
    <div class="product-single-info_custom-control custom-control custom-radio">
        <input type="radio" id="singleProductRadio1"
               class="custom-control-input" name="customRadio">
        <label class="product-single-info_radio-label custom-control-label font-15 text-gray-clr pointer"
               for="singleProductRadio1">Extra product name1</label>
    </div>
    <div class="product-single-info_custom-control custom-control custom-radio">
        <input type="radio" id="singleProductRadio2"
               class="custom-control-input" name="customRadio"
               checked>
        <label class="product-single-info_radio-label custom-control-label font-15 text-gray-clr pointer"
               for="singleProductRadio2">Extra product name1</label>
    </div>
</div>

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
