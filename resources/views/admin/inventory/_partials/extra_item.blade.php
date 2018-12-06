<div data-promotion-v="{{ $model->id }}" class="extra-item-data">
    @if($model->variations)
        @if($model->type == 'simple_product')
            @php
                $single_variation = ($model && $model->variations) ? $model->variations->first() : null;
                $promotionPrice = $model->promotion_prices()->where('variation_id',$single_variation->id)->first();
            @endphp

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-2">Type:</label>
                        <div class="col-sm-6">
                            <select class="form-control">
                                <option value="">Optional</option>
                                <option value="">Required</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <button type="button" class="btn btn-primary save-extra-variations pull-right " data-type="normal">
                        Save
                    </button>
                </div>
            </div>
            <table class="table table-style table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        {{ ($single_variation) ? $single_variation->name : null }}
                    </td>
                    <td>
                        {{ ($single_variation) ? $single_variation->variation_id : null }}
                    </td>
                    <td>
                        {!! (isset($item['qty'])) ? $item['qty'] : 0 !!}
                    </td>
                    <td>
                        {!! Form::text("extra_product[$single_variation->id][price]",
                        ($promotionPrice) ? $promotionPrice->price : (($single_variation) ? $single_variation->price : null),
                        ['class' => 'form-control extra-item','data-variation' => $single_variation->id]) !!}
                    </td>
                </tr>
                </tbody>
            </table>
        @elseif($model->type == 'variation_product')
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-2">Type:</label>
                        <div class="col-sm-6">
                            <select class="form-control">
                                <option value="">Optional</option>
                                <option value="">Required</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <button type="button" class="btn btn-primary save-extra-variations pull-right " data-type="normal">
                        Save
                    </button>
                </div>
            </div>
            <table id="variations-table" class="table table-style table-bordered"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Attributes</th>
                    <th>SKU</th>
                    <th>Qty</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody class="all-list-attrs">
                @foreach($model->variations()->with('options')->get() as $variation)
                    <tr>
                        <td>
                            {!! $variation->name !!}
                        </td>
                        <td class="variation-options-place">
                            @foreach($variation->options as $items)
                                <p><strong> {{ \App\Models\Attributes::getById($items->attributes_id) }}
                                        :</strong> {{ \App\Models\Stickers::getById($items->options_id) }}</p>
                            @endforeach
                        </td>
                        <td>
                            {{ $variation->variation_id }}
                        </td>
                        <td>
                            {!! (isset($item['qty'])) ? $item['qty'] : null !!}
                        </td>
                        <td>
                            @php
                                $promotionPrice = $model->promotion_prices()->where('variation_id',$variation->id)->first();
                            @endphp
                            {!! Form::text("extra_product[$variation->id][price]",
                            ($promotionPrice) ? $promotionPrice->price : (($variation) ? $variation->price : null),
                            ['class' => 'form-control extra-item','data-variation' => $variation->id]) !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @elseif($model->type == 'package_product')
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="row">
                        <label class="col-md-2">Type:</label>
                        <div class="col-sm-6">
                            <select class="form-control">
                                <option value="">Optional</option>
                                <option value="">Required</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    @php
                        $variation = ($model && count($model->variations)) ? $model->variations->first() : null;
                        $promotionPrice = $model->promotion_prices()->where('variation_id',$variation->id)->first();
                    @endphp

                    <div class="row">
                        <label class="col-md-2">Price:</label>
                        <div class="col-sm-6">
                            {!! Form::text("extra_product[$variation->id][price]",
                ($promotionPrice) ? $promotionPrice->price : (($variation) ? $variation->price : null),
                ['class' => 'form-control extra-item extra-price','data-variation' => ($variation) ? $variation->id : null]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary save-extra-variations pull-right " data-type="normal">
                        Save
                    </button>
                </div>
            </div>

            <table class="table table-style table-bordered" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>Qty</th>
                </tr>
                </thead>
                <tbody class="package-variation-box">
                @foreach($model->variations as $package_variation)
                    <tr>
                        <td>
                            {!! ($package_variation) ? $package_variation->name : null !!}
                        </td>
                        <td>
                            {!! ($package_variation) ? $package_variation->variation_id : null !!}
                        </td>
                        <td>
                            {!! ($package_variation && $package_variation->qty) ? $package_variation->qty : 0 !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @else
        NO Variations
    @endif
</div>
