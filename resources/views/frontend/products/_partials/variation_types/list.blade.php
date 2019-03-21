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
        <div class="d-flex flex-wrap">
            <div class="col-sm-10 align-self-center">
                <input type="checkbox" id="pv{{ $item->id }}" class="custom-control-input package_checkbox"
                       name="package_v[{{ $vape->id }}][]"  value="{{ $item->id }}" >
                <label class="product-single-info_check-label custom-control-label font-15 text-gray-clr pointer package_checkbox_label" for="pv{{ $item->id }}">
                    {{ $item->name }}
                </label>
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
