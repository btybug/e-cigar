<div class="col-sm-12 pl-0 d-flex">
    @if(! $vSettings->is_required)
        {!! Form::checkbox('checkbox',1,null,['class' => 'custom-control-input req_check ','id' => 'opt'.$vSettings->id]) !!}
        <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer " for="opt{{ $vSettings->id }}">
            @if($vSettings->min_count_limit == 1 && $vSettings->count_limit == 1)
                <h4>{{ $vSettings->title }} (you can select one option)</h4>
            @else
                <h4>{{ $vSettings->title }} (select {{ $vSettings->min_count_limit }} - {{ $vSettings->count_limit }} options)</h4>
            @endif
        </label>
    @else
        @if($vSettings->min_count_limit == 1 && $vSettings->count_limit == 1)
            <h4>{{ $vSettings->title }} (you can select one option)</h4>
        @else
            <h4>{{ $vSettings->title }} (select {{ $vSettings->min_count_limit }} - {{ $vSettings->count_limit }} options)</h4>
        @endif
    @endif
</div>


<div data-req="{{ $vSettings->is_required }}" data-per-price="{{ $vSettings->price_per }}" data-price="{{ convert_price($vSettings->price,$currency,false,true) }}" class="col-sm-{{ ($vSettings->price_per == 'product')? '10' : '12' }} products-list-wrap limit" id="products-list_{{ $vSettings->id }}" data-id="{{ $vSettings->id }}" data-limit="{{ $vSettings->count_limit }}" data-min-limit="{{ $vSettings->min_count_limit }}">
  <div class="wall--wrapper">
    @foreach($variation as $item)
        <div class="d-flex flex-wrap mb-2" data-price="{{ $item->price }}">
            <div class="col-sm-10 align-self-center">
              <div class="row justify-content-between product-list-item">
                <div class="align-self-center checkbox-wrap">
                  <input type="checkbox" id="pv{{ $item->id }}" data-id="" class="custom-control-input package_checkbox"
                         name="package_v[{{ $vape->id }}][]"  value="{{ $item->id }}" >
                  <label data-out="{{ out_of_stock($item) }}" class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer package_checkbox_label" for="pv{{ $item->id }}">
                    {{ $item->name }}
                      <b>{{ out_of_stock_msg($item) }}</b>
                  </label>
                </div>
                <div style="max-width: 150px" class="list-qty">

                </div>
              </div>

            </div>

            @if($vSettings->price_per == 'item' && ! $vSettings->stock->type)
                <div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
                <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
                    {{ convert_price($item->price,$currency) }}
                </span>
                </div>
            @endif
        </div>
    @endforeach
  </div>
</div>
@if($vSettings->price_per == 'product' && ! $vSettings->stock->type)
    <div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
        <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
            @if($vSettings->is_required)
              {{ convert_price($vSettings->price,$currency) }}
            @else
              Nothing selected
            @endif
        </span>
    </div>
@endif
