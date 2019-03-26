<div class="basic-center basic-wall" data-id="{{ $main_unique }}">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    How Many items user can select : {!! Form::number("variations[$main_unique][count_limit]",
                                ($main) ? $main->count_limit : null,['class' => 'form-control']) !!}
                </div>
                <div class="col-md-2">
                    Price per: {!! Form::select("variations[$main_unique][price_per]",['product' => 'Product','item' => 'Item'],($main) ? $main->price_per : null,['class' => 'form-control price_per']) !!}
                </div>
                <div class="col-md-2">
                    <div class="product_price @if($main && $main->price_per == 'item') hide @endif">
                        Price : {!! Form::text("variations[$main_unique][common_price]",
                                                                ($main) ? $main->common_price : null,['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary pull-right select-items"
                            type="button">
                        <i class="fa fa-plus"></i> Add new
                    </button>
                    {{--add-package-item--}}
                </div>
            </div>
        </div>
        <table class="table table-style table-bordered mt-2" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>Item</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Image</th>
                <th class="package_price @if($main && $main->price_per == 'product') hide @endif">Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="filter-variation-box">
            @if($main && count($v))
                @foreach($v as $package_variation)
                    @include('admin.inventory._partials.variation_package_item')
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>


