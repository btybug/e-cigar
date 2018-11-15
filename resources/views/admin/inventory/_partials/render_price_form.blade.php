<div class="product-form-groups options-group">
        @php
                $modelAttributes = $model->forRender();
        @endphp
        @foreach($modelAttributes as $modelattr)
                @php
                        $options = \App\Models\StockVariationOption::where('attributes_id',$modelattr->id)
                        ->whereIn('variation_id',(count($variations))?$variations->pluck('id')->all():$variations)
                        ->groupBy('options_id')->get();
                @endphp
                @if($modelattr->display_as == 'radio')
                        <div class="row align-items-center row-product-range mt-2">
                                <div class="col-md-5">
                                        <label for="productPack" class="fnz-20 mb-md-0"> {!! $modelattr->name !!}</label>
                                </div>
                                <div class="col-md-5">

                                        @if(count($options))
                                                <p class="fnz-20 mb-2 product-range-top-label">Mild Nicotin</p>
                                                <div class="product-range d-flex">
                                                        @foreach($options as $item)
                                                                <div class="item {{ ($loop->first) ? 'active' : '' }} line-none">
                                                                <label for="r{{ $item->option->id }}"></label>
                                                                <input data-name="{{ $modelattr->id }}" {{ ($loop->first) ? 'checked' : '' }} class="select-variation-radio-option" type="radio" id="r{{ $item->option->id }}" value="{{ $item->option->id }}" name="rate{{ $modelattr->id }}">
                                                                <span class="count">{{ $item->option->name }}</span>
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
                                        <select data-name="{{ $modelattr->id }}" class="select-default product-pack-select fnz-20 select-variation-option"
                                                id="productPack{{ $modelattr->id }}">
                                                @foreach($options as $item)
                                                        <option value="{{ $item->option->id }}">{{ $item->option->name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                        </div>
                @endif
        @endforeach

</div>
<p class="product-tab-main-content-price font-main-light price-place"></p>
<input type="hidden" value="" id="variation_uid">
