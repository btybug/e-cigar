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


<div class="col-sm-{{ ($vSettings->price_per == 'product')? '10' : '12' }} products-list-wrap limit" id="products-list_{{ $vSettings->id }}" data-id="{{ $vSettings->id }}" data-limit="{{ $vSettings->count_limit }}">
    @foreach($variation as $item)
        <div class="d-flex flex-wrap mb-2">
            <div class="col-sm-10 align-self-center">
              <div class="row justify-content-between product-list-item">
                <div class="align-self-center checkbox-wrap">
                  <input type="checkbox" id="pv{{ $item->id }}" data-id="" class="custom-control-input package_checkbox"
                         name="package_v[{{ $vape->id }}][]"  value="{{ $item->id }}" >
                  <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer package_checkbox_label" for="pv{{ $item->id }}">
                    {{ $item->name }}
                  </label>
                </div>
                <div style="max-width: 150px" class="list-qty">

                </div>
              </div>

            </div>

            @if($vSettings->price_per == 'item')
                <div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
                <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
                    {{ convert_price($item->price,$currency) }}
                </span>
                </div>
            @endif
        </div>
    @endforeach
</div>
@if($vSettings->price_per == 'product')
    <div class="col-sm-2 pl-sm-3 p-0 text-sm-center">
        <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-placee">
            {{ convert_price($vSettings->price,$currency) }}
        </span>
    </div>
@endif
