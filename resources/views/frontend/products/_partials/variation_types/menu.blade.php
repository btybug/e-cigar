@php
  $isSingle = ($vSettings->min_count_limit == 1 && $vSettings->count_limit == 1) ? true : false;
@endphp
@if($isSingle)

  <div class="col-sm-12 pl-0 limit" data-id="{{ $vSettings->id }}" data-limit="{{ $vSettings->count_limit }}"
       data-min-limit="{{ $vSettings->min_count_limit }}">
    <div class="col-sm-12 pl-0 d-flex">
      @if(! $vSettings->is_required)
        {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input ','id' => 'opt'.$vSettings->id]) !!}
        <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer "
               for="opt{{ $vSettings->id }}">
          <h4>{{ $vSettings->title }} (you can select one option)</h4>
        </label>
      @else
        <h4>{{ $vSettings->title }} (you can select one option)</h4>
      @endif
    </div>
    <div class="d-flex">
      {!! Form::select('variations[]',$variation->pluck('name','id')->all(),null,
    ['id' => "single_v_select_$vSettings->id",'class' => 'select-variation-option select-2 main-select main-select-2arrows single-product-select product-pack-select select2-hidden-accessible',
    'multiple' => false,'data-count' => $vSettings->count_limit,'data-id' => $vSettings->id]) !!}

      <div class="col-sm-2 pl-sm-3 p-0 text-sm-center text-right">
        <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
          <div class="selected-menu-options">
              {{ convert_price($vSettings->price,$currency) }}
          </div>
        </span>
      </div>
    </div>

  </div>




@else
  {{--//multiple--}}
  <div class="col-sm-10 pl-0 limit" data-id="{{ $vSettings->id }}" data-limit="{{ $vSettings->count_limit }}"
       data-min-limit="{{ $vSettings->min_count_limit }}">
    <div class="col-sm-12 pl-0 d-flex">
      @if(! $vSettings->is_required)
        {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input ','id' => 'opt'.$vSettings->id]) !!}
        <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer "
               for="opt{{ $vSettings->id }}">
          <h4>{{ $vSettings->title }} (select {{ $vSettings->min_count_limit }} - {{ $vSettings->count_limit }}
            options)</h4>
        </label>
      @else
        <h4>{{ $vSettings->title }} (select {{ $vSettings->min_count_limit }} - {{ $vSettings->count_limit }}
          options)</h4>
      @endif
    </div>
    @php
      $id = "multi_v_select_$vSettings->id";
      $class = "multi_v_select";
    @endphp
    {!! Form::select('variations[]',$variation->pluck('name','id')->all(),null,
    ['id' => $id,'class' => $class.' select-variation-option select-2 main-select main-select-2arrows single-product-select product-pack-select select2-hidden-accessible',
    'multiple' => true,'data-count' => $vSettings->count_limit,'data-id' => $vSettings->id]) !!}
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
@endif



