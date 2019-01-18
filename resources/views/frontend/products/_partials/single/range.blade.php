<div class="d-flex flex-md-row flex-column align-items-center product-single-info_range-outer">
    <label class="product-single-info_label text-uppercase mb-0">Nicotin
        strength (mg):</label>

    <div class="range-steps d-flex">
        <div class="range-steps_item">
            <label for="r1"
                   class="range-steps_count font-15 font-sec-bold pointer">0</label>
            <input type="radio" id="r1" name="rate">
        </div>
        <div class="range-steps_item">
            <label for="r2"
                   class="range-steps_count font-15 font-sec-bold pointer">3</label>
            <input type="radio" id="r2" name="rate">
        </div>
        <div class="range-steps_item active">
            <label for="r3"
                   class="range-steps_count font-15 font-sec-bold pointer">6</label>
            <input type="radio" id="r3" name="rate">
        </div>
        <div class="range-steps_item">
            <label for="r4"
                   class="range-steps_count font-15 font-sec-bold pointer">9</label>
            <input type="radio" id="r4" name="rate">
        </div>
        <div class="range-steps_item">
            <label for="r5"
                   class="range-steps_count font-15 font-sec-bold pointer">12</label>
            <input type="radio" id="r5" name="rate">
        </div>

    </div>

</div>

<div class="filter-wall cat-name">
    <h5 class="font-sec-bold font-16 text-uppercase">{{ $filter->name }}</h5>
    @foreach($filter->stickers as $sticker)
        <div class="single-wrap">
            <div class="custom-control custom-radio custom-control-inline align-items-center">
                {!! Form::radio("select_filter[$filter->id]",$sticker->id,null,['class' => 'select-filter custom-control-input','id' => 'customRadio'.$filter->id.$sticker->id]) !!}
                <label class="custom-control-label text-gray-clr font-15"
                       for="customRadio{{ $filter->id.$sticker->id }}">{{ $sticker->name }}
                    {{--<span class="amount">(189)</span>--}}
                </label>
            </div>
        </div>
    @endforeach
</div>
