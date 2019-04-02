<div class="col-sm-10 pl-0 limit" data-limit="{{ $vSettings->count_limit }}" data-id="{{ $vSettings->id }}"  data-price="{{ $vSettings->price }}" data-per-price="{{  $vSettings->price_per}}" data-min-limit="{{ $vSettings->min_count_limit }}" data-req="{{ $vSettings->is_required }}">
    <div class="col-sm-12 pl-0 d-flex">
      @if(! $vSettings->is_required)
        {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input req_check ','id' => 'opt'.$vSettings->id]) !!}
        <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer "
               for="opt{{ $vSettings->id }}">
          <h4>
            @if($vSettings->min_count_limit == 1 && $vSettings->count_limit == 1)
              {{ $vSettings->title }} (you can select one option)
            @else
              {{ $vSettings->title }} (select {{ $vSettings->min_count_limit }} - {{ $vSettings->count_limit }} options)
            @endif
          </h4>
        </label>
      @else
        <h4>
          @if($vSettings->min_count_limit == 1 && $vSettings->count_limit == 1)
            {{ $vSettings->title }} (you can select one option)
          @else
            {{ $vSettings->title }} (select {{ $vSettings->min_count_limit }} - {{ $vSettings->count_limit }} options)
          @endif</h4>
      @endif
    </div>
    <div class="wall--wrapper">
      {!! filter_button(@$vSettings->filter->slug,@$vSettings->variation_id,'Select options','filter',true,@$vSettings->display_as) !!}
    </div>
</div>

<div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
    @if($vSettings->price_per == 'product' && ! $vSettings->stock->type)
        <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
            @if($vSettings->is_required)
             {{ convert_price($vSettings->price,$currency) }}
            @else
              Nothing selected
            @endif
        </span>
    @endif
</div>

<div class="selected-menu-options">

</div>
