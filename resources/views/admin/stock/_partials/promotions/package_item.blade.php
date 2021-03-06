<div class="package-box" style="    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: -4px 4px 18px 7px #ada9a9;
    overflow: hidden;
    clear: both;">
    <div class="basic-center basic-wall" data-id="{{ $main_unique }}">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        Display as: {!! Form::select("variations[$main_unique][display_as]",
                        ['menu' => 'Menu','list' => 'List','popup' => "Pop up"],($main) ? $main->display_as : null,['class' => 'form-control display-change']) !!}
                    </div>
                    <div class="col-md-2">
                        <div class="section_price">
                            Price
                            per: {!! Form::select("variations[$main_unique][price_per]",['product' => 'Section','item' => 'Item'],($main) ? $main->price_per : null,['class' => 'form-control price_per']) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="section_price product_price @if($main && $main->price_per == 'item') hide @endif">
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
                    <th class="package_price @if(! $main || ($main && $main->price_per == 'product')) hide @endif">Price</th>
                </tr>
                </thead>
                <tbody class="package-variation-box">
                @if($main && count($v))
                    @foreach($v as $package_variation)
                        @include('admin.stock._partials.promotions.variation_package_item')
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
