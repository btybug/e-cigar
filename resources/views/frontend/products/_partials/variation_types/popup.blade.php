<div class="col-sm-10 pl-0 limit" data-limit="{{ $vSettings->count_limit }}" data-id="{{ $vSettings->id }}"  data-price="{{ $vSettings->price }}" data-min-limit="{{ $vSettings->min_count_limit }}">
    <div class="col-sm-12 pl-0 d-flex">
        @if(! $vSettings->is_required)
            {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input ','id' => 'opt'.$vSettings->id]) !!}
            {{--<label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer " for="opt{{ $vSettings->id }}">--}}
                {{--<h4>Select {{ $vSettings->count_limit }} items</h4>--}}
            {{--</label>--}}
        @else
            {{--<h4>Select {{ $vSettings->count_limit }} items</h4>--}}
        @endif
    </div>
    @php
        $id = (($vSettings->count_limit > 1) ? "multi_v_select_$vSettings->id" : "single_v_select_$vSettings->id");
        $class = (($vSettings->count_limit > 1) ? "multi_v_select" : "");
    @endphp
    <button type="button" class="btn btn-primary rounded-0" data-toggle="modal" data-target="#popUpModal">
        Select {{ $vSettings->count_limit }} items
    </button>
</div>

<div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
    @if($vSettings->price_per == 'product')
        <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
            {{ convert_price($vSettings->price,$currency) }}
        </span>
    @endif
</div>

<div class="selected-menu-options">

</div>
