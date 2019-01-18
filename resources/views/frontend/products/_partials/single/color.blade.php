<div class="d-flex flex-md-row flex-column align-items-center product-single-info_colors-outer">
    <label class="product-single-info_label text-uppercase mb-0">Colors</label>
    <div class="product-single-colors">
        <div class="d-flex flex-wrap">
            <div class="product-single-colors_item cl-blue">
                <input type="radio" name="colors" id="customRadio1"
                       checked>
                <label class="pointer d-inline-block mb-0"
                       for="customRadio1"></label>
            </div>
            <div class="product-single-colors_item cl-red">
                <input type="radio" name="colors" id="customRadio2">
                <label class="pointer d-inline-block mb-0"
                       for="customRadio2"></label>
            </div>
            <div class="product-single-colors_item cl-white">
                <input type="radio" name="colors" id="customRadio3">
                <label class="pointer d-inline-block mb-0"
                       for="customRadio3"></label>
            </div>
            <div class="product-single-colors_item cl-black">
                <input type="radio" name="colors" id="customRadio5">
                <label class="pointer d-inline-block mb-0"
                       for="customRadio5"></label>
            </div>
            <div class="product-single-colors_item cl-gray">
                <input type="radio" name="colors" id="customRadio4">
                <label class="pointer d-inline-block mb-0"
                       for="customRadio4"></label>
            </div>


        </div>
    </div>
</div>

{{--<div class="filter-wall colors">--}}
    {{--<h5 class="font-sec-bold font-16 text-uppercase">{{ $filter->name }}</h5>--}}
    {{--<div class="d-flex flex-wrap">--}}
        {{--@foreach($filter->stickers as $sticker)--}}
            {{--<div class="col-sm-3 single-wall">--}}
                {{--<div class="custom-control custom-radio custom-control-inline">--}}
                    {{--{!! Form::radio("select_filter[$filter->id]",$sticker->id,null,['class' => 'select-filter custom-control-input','id' => 'customColor'.$filter->id.$sticker->id]) !!}--}}
                    {{--<label class="custom-control-label pointer" style="background: {{ $sticker->color }}"--}}
                           {{--for="customColor{{ $filter->id.$sticker->id }}">--}}
                        {{--<span class="d-block custom-control-label-text">{{ $sticker->name }}</span>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--@endforeach--}}
    {{--</div>--}}
{{--</div>--}}