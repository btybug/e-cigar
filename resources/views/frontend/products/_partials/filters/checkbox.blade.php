<div class="filter-wall cat-name">
    <h5 class="font-sec-bold font-16 text-uppercase">{{ $filter->name }}</h5>
    @foreach($filter->stickers as $sticker)
        <div class="single-wrap">
            <div class="custom-control custom-checkbox custom-control-inline align-items-center">
                {!! Form::checkbox("select_filter[$filter->id][]",$sticker->id,null,['class' => 'select-filter custom-control-input','id' => 'customCheck'.$filter->id.$sticker->id]) !!}
                <label class="custom-control-label text-gray-clr font-15"
                       for="customCheck{{ $filter->id.$sticker->id }}">{{ $sticker->name }}
                    {{--<span class="amount">(189)</span>--}}
                </label>
            </div>
        </div>
    @endforeach
</div>