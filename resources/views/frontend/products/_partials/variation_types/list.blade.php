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


<div class="col-sm-{{ ($vSettings->price_per == 'product')? '10' : '12' }}">
    @foreach($variation as $item)
        <div class="d-flex flex-wrap mb-2">
            <div class="col-sm-10 align-self-center">
              <div class="row justify-content-between">
                <div class="align-self-center">
                  <input type="checkbox" id="pv{{ $item->id }}" class="custom-control-input package_checkbox"
                         name="package_v[{{ $vape->id }}][]"  value="{{ $item->id }}" >
                  <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer package_checkbox_label" for="pv{{ $item->id }}">
                    {{ $item->name }}
                  </label>
                </div>
                <div style="max-width: 150px">
                  <div class="continue-shp-wrapp_qty position-relative product-counts-wrapper w-100">
                    <!--minus qty-->
                    <span class="d-flex align-items-center h-100 pointer position-absolute product-count-minus">
                            <svg viewBox="0 0 20 3" width="20px" height="3px">
                                <path fill-rule="evenodd" fill="rgb(214, 217, 225)" d="M20.004,2.938 L-0.007,2.938 L-0.007,0.580 L20.004,0.580 L20.004,2.938 Z"></path>
                            </svg>
                        </span>
                  {!! Form::number('qty',1,['class' => 'field-input w-100 h-100 font-23 text-center border-0 form-control product-qty','data-id' => $item->id,'min' => 1]) !!}
                  <!--plus qty-->
                    <span  class="d-flex align-items-center h-100 pointer position-absolute product-count-plus">
                            <svg viewBox="0 0 20 20" width="20px" height="20px">
                                <path fill-rule="evenodd" fill="rgb(211, 214, 223)" d="M20.004,10.938 L11.315,10.938 L11.315,20.000 L8.696,20.000 L8.696,10.938 L-0.007,10.938 L-0.007,8.580 L8.696,8.580 L8.696,0.007 L11.315,0.007 L11.315,8.580 L20.004,8.580 L20.004,10.938 Z"></path>
                            </svg>
                        </span>
                  </div>
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
