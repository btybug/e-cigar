<div class="d-flex flex-md-row flex-column align-items-center">
    <label for="singlePacksField1"
           class="product-single-info_label text-uppercase mb-0">Products
        Packs:</label>
    <select id="singlePacksField1"
            class="select-2 select-2--no-search main-select main-select-2arrows single-product-select product-pack-select"
            style="width: 453px">
        <option value="single packs" selected>SINGLE PACKS</option>
        <option value="pack 1">pack 1</option>
        <option value="pack 2">pack 2</option>
        <option value="pack 3">pack 3</option>
    </select>
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
