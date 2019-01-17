<div class="filter-wall colors">
    <h5 class="font-sec-bold font-16 text-uppercase">{{ $filter->name }}</h5>
    <div class="d-flex flex-wrap">
        @foreach($filter->stickers as $sticker)
            <div class="col-sm-3 single-wall">
                <div class="custom-control custom-radio custom-control-inline">
                    {!! Form::radio("select_filter[$filter->id]",$sticker->id,null,['class' => 'select-filter custom-control-input','id' => 'customColor'.$filter->id.$sticker->id]) !!}
                    <label class="custom-control-label pointer" style="background: {{ $sticker->color }}"
                           for="customColor{{ $filter->id.$sticker->id }}">
                        <span class="d-block custom-control-label-text">{{ $sticker->name }}</span>
                    </label>
                </div>
            </div>
        @endforeach
    </div>
</div>