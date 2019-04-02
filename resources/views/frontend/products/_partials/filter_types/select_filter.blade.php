<div class="col-sm-10 pl-0 limit" data-limit="{{ $vSettings->count_limit }}" data-id="{{ $vSettings->id }}"  data-price="{{ $vSettings->price }}" data-per-price="{{  $vSettings->price_per}}" data-min-limit="{{ $vSettings->min_count_limit }}">
    <div class="col-sm-12 pl-0 d-flex">
        @if(! $vSettings->is_required)
            {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input ','id' => 'opt'.$vSettings->id]) !!}
        @endif
    </div>
    @php
        $id = (($vSettings->count_limit > 1) ? "multi_v_select_$vSettings->id" : "single_v_select_$vSettings->id");
        $class = (($vSettings->count_limit > 1) ? "multi_v_select" : "");
    @endphp
    @if($vSettings->min_count_limit == 1 && $vSettings->count_limit == 1)
        {{ $vSettings->title }} (you can select one option)
    @else
        {{ $vSettings->title }} (select {{ $vSettings->min_count_limit }} - {{ $vSettings->count_limit }} options)
    @endif

    here select filter functional

</div>

<div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
    @if($vSettings->price_per == 'product' && ! $vSettings->stock->type)
        <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
            {{ convert_price($vSettings->price,$currency) }}
        </span>
    @endif
</div>

<div class="selected-menu-options">

</div>
