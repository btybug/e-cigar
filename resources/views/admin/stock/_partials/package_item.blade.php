<div class="basic-center basic-wall">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    How Many items user can select : {!! Form::number("package_variation_count_limit",
                                                                ($model && count($model->variations)) ? $model->variations->first()->count_limit : null,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                    Display as: {!! Form::select('package_variation_display_as',
                                                                ['menu' => 'Menu','list' => 'List','popup' => "Pop up"],null,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                    Price per: {!! Form::select('package_variation_price_per',['product' => 'Product','item' => 'Item'],null,['class' => 'form-control price_per']) !!}
                </div>
                <div class="col-md-2">
                    <div class="product_price">
                        Price : {!! Form::text("package_variation_price",
                                                                ($model && count($model->variations)) ? $model->variations->first()->price : null,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-primary pull-right add-package-item"
                            type="button">
                        <i class="fa fa-plus"></i> Add new
                    </button>
                </div>
            </div>
        </div>
        <table class="table table-style table-bordered mt-2" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Item</th>
                <th>Qty</th>
                <th>Image</th>
                <th class="package_price hide">Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="package-variation-box">
            @if($model && count($model->variations))
                @foreach($model->variations as $package_variation)
                    @include('admin.inventory._partials.variation_package_item')
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>


