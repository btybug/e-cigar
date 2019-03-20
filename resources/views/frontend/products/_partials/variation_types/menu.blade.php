<div class="col-sm-10 pl-0">
    <label>Select {{ $vSettings->count_limit }} Items</label>
    {!! Form::select('variations[]',$variation->pluck('name','id')->all(),null,
    ['class' => 'select-variation-option select-2 select-2--no-search main-select main-select-2arrows single-product-select product-pack-select select2-hidden-accessible']) !!}
</div>
<div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
    <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
        {{ convert_price($vSettings->price,$currency) }}
    </span>
</div>
