<div data-promotion-v="{{ $model->id }}">
@if($model->variations)
    @if($model->type == 'simple_product')
        @php
            $single_variation = ($model && $model->variations) ? $model->variations->first() : null;
        @endphp
        <div class="col-md-12 m-5">
            <button type="button" class="btn btn-primary save-extra-variations pull-right ">Save</button>
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
                <td class="w-5">
                    {!! Form::text("extra_product[price]",($single_variation) ? $single_variation->price : null,['class' => 'form-control']) !!}
                </td>
            </tr>
            </tbody>
        </table>
    @elseif($model->type == 'variation_product')
        <div class="col-md-12 m-5">
            <button type="button" class="btn btn-primary save-extra-variations pull-right ">Save</button>
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
                                <p><strong> {{ \App\Models\Attributes::getById($items->attributes_id) }} :</strong> {{ \App\Models\Stickers::getById($items->options_id) }}</p>
                            @endforeach
                        </td>
                        <td>
                            {{ $variation->variation_id }}
                        </td>
                        <td>
                            {!! (isset($item['qty'])) ? $item['qty'] : null !!}
                        </td>
                        <td>
                            {!! Form::text("extra_product[$variation->variation_id][price]",$variation->price,['class' => 'form-control']) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif($model->type == 'package_product')
        <div class="col-md-6">
            Price : {!! Form::text("extra_product",($model && count($model->variations)) ? $model->variations->first()->price : null,['class' => 'form-control']) !!}
        </div>
        <div class="col-md-6">
            <button type="button" class="btn btn-primary save-extra-variations pull-right ">Save</button>
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
