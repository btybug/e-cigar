<div class="col-sm-10 pl-0 ">
    <div class="col-sm-12 pl-0 d-flex">
        @if(! $vSettings->is_required)
            {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input ','id' => 'opt'.$vSettings->id]) !!}
            <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer " for="opt{{ $vSettings->id }}">
                <h4>Select {{ $vSettings->count_limit }} items</h4>
            </label>
        @else
            <h4>Select {{ $vSettings->count_limit }} items</h4>
        @endif
    </div>

    {!! Form::select('variations[]',$variation->pluck('name','id')->all(),null,
    ['class' => 'select-variation-option select-2 select-2--no-search main-select main-select-2arrows single-product-select product-pack-select select2-hidden-accessible',
    'multiple' => (($vSettings->count_limit > 1) ? true : false),'data-count' => $vSettings->count_limit,'data-id' => $vSettings->id]) !!}
</div>
<div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
    <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
        {{ convert_price($vSettings->price,$currency) }}
    </span>
</div>
