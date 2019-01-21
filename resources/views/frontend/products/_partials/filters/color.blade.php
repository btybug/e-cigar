<div class="filter-wall colors">
    <h5 class="font-sec-bold font-16 text-uppercase">{{ $filter->name }}</h5>
    <div class="d-flex flex-wrap">
        @foreach($filter->stickers as $sticker)
            <div class="col-sm-3 single-wall">
                <div class="custom-control custom-radio custom-control-inline" style="position: relative">
                    {!! Form::radio("select_filter[$filter->id]",$sticker->id,null,['class' => 'select-filter custom-control-input','id' => 'customColor'.$filter->id.$sticker->id]) !!}
                    <label class="custom-control-label pointer"
                           for="customColor{{ $filter->id.$sticker->id }}">
                        {{ $sticker->name }}
                    </label>
                    <span style="background: {{ $sticker->color }};position: absolute;left:0;top:0;width: 100%;height: 100%;"></span>
                </div>
            </div>
        @endforeach
    </div>
</div>
