<div class="product-form-groups options-group">
    @if($model->type == 'variation_product')
        @foreach($model->type_attrs as $modelattr)
            @php
                $options = $model->type_attrs_pivot()->with('sticker')->where('attributes_id',$modelattr->id)->get();
            @endphp
            @if($modelattr->pivot->type == 'radio')
                <div class="row align-items-center row-product-range mt-2">
                    <div class="col-md-5">
                        <label for="productPack" class="fnz-20 mb-md-0"> {!! $modelattr->name !!}</label>
                    </div>
                    <div class="col-md-5">
                        @if(count($options))
                            <div class="product-range d-flex">
                                @foreach($options as $item)
                                    <div class="item {{ ($loop->first) ? 'active' : '' }} line-none">
                                        <label for="r{{ $item->sticker->id }}"></label>
                                        <input data-name="{{ $modelattr->id }}"
                                               {{ ($loop->first) ? 'checked' : '' }} class="select-variation-radio-option"
                                               type="radio" id="r{{ $item->sticker->id }}" value="{{ $item->sticker->id }}"
                                               name="rate{{ $modelattr->id }}">
                                        <span class="count">{{ $item->sticker->name }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="row align-items-center mt-2">
                    <div class="col-md-5">
                        <label for="productPack" class="fnz-20 mb-md-0">{!! $modelattr->name !!}</label>
                    </div>
                    <div class="col-md-5">
                        <select data-name="{{ $modelattr->id }}"
                                class="select-default product-pack-select fnz-20 select-variation-option"
                                id="productPack{{ $modelattr->id }}">
                            @foreach($options as $item)
                                <option value="{{ $item->sticker->id }}">{{ $item->sticker->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
</div>
<p class="product-tab-main-content-price font-main-light price-place"></p>
<input type="hidden" value="" id="variation_uid">
@if(count($model->promotions))
<h3>Promotions</h3>
    @foreach($model->promotions as $promotion)
        @include('frontend.products._partials.render_promotion')
    @endforeach
@endif

