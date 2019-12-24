@php
    $isModelExists = ($model && isset($v) && count($v)) ? true : false;
    $main_unique = ($isModelExists) ? $v->first()->variation_id :uniqid();
    $main = ($isModelExists) ? $v->first() : null;
@endphp
<div class="form-group required-single_wall">


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="stockRequiredSettings-tab-{!! $k!!}" data-toggle="tab" href="#stockRequiredSettings-{!! $k!!}" role="tab" aria-controls="stockRequiredSettings-{!! $k!!}" aria-selected="true">Settings</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="stockRequiredItems-tab-{!! $k!!}" data-toggle="tab" href="#stockRequiredItems-{!! $k!!}" role="tab" aria-controls="stockRequiredItems-{!! $k!!}" aria-selected="false">Items</a>
        </li>
    </ul>

    <div class="card panel panel-default stock-page" data-unqiue="{{ $main_unique }}">
        <div class="card-header panel-heading clearfix d-flex pr-0 stock-page--head">
            <div class="col-sm-2 py-2">
                <div class="row">
                    <div class="col-md-3">
                        <label class="col-form-label">Ordering</label>
                    </div>
                    <div class="col-md-9">
                        {!! Form::number("variations[$main_unique][ordering]",($main) ? $main->ordering : null,
               ['class' => 'form-control','placeholder' => 'Sort']) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-1 ml-auto col d-flex pr-0 head-right justify-content-end">
                {!! Form::hidden("variations[$main_unique][is_required]",$required) !!}
                <button type="button" class="btn btn-danger delete-v-option"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="card-body panel-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="stockRequiredSettings-{!! $k!!}" role="tabpanel" aria-labelledby="stockRequiredSettings-tab-{!! $k!!}">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-wrap head-left px-0 py-2">
                            <div class="col-xl-3">
                                {!! Form::text("variations[$main_unique][title]",($main) ? $main->title : null,['class' => 'form-control mr-1','placeholder' => 'Enter title ...']) !!}
                            </div>
                            <div class="col-xl-6 my-xl-0 my-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        {!! Form::select("variations[$main_unique][type]",['' => 'Select','package_product' => 'Multiple items','filter' => 'Filters','single' => 'Single item'
                               ],($main) ? $main->type : null,
                               ['class' => 'form-control variation-product-select']) !!}
                                    </div>
                                    <div class="col-md-6 mt-md-0 mt-1 filter-option {{ ($main && $main->type =='filter') ? '' : 'hide' }}">
                                        {!! Form::select("variations[$main_unique][filter_category_id]",['' => 'Select Filter']+$filters,($main) ? $main->filter_category_id : null,
                                        ['class' => 'form-control filter-select']) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-5 d-flex justify-content-end p-0">
                            <div class="col-md-12 px-md-3 px-0 multi-option {{ ($main && ($main->type =='package_product' || $main->type =='filter' )) ? '' : 'hide' }}">
                                <div class="row h-100 align-items-center">
                                    <div class="col-lg-5">
                                        <div class="row">
                                            <label class="col-xl-6 col-form-label">
                                                Min Limit :
                                            </label>
                                            <div class="col-xl-6 align-self-center">
                                                {!! Form::number("variations[$main_unique][min_count_limit]",
                                                (($main) ? $main->min_count_limit : null),['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-7 mb-lg-0 mb-1">
                                        <div class="row">
                                            <div class="col-xl-8 col-form-label">
                                                How Many items user can select :
                                            </div>
                                            <div class="col-xl-4 align-self-center">
                                                {!! Form::number("variations[$main_unique][count_limit]",
                                                                                ($main) ? $main->count_limit : null,['class' => 'form-control']) !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 type-place">
                            <div class="product-wall">
                                @if($main && $main->type =='package_product')
                                    @include('admin.stock._partials.package_item')
                                @elseif($main && $main->type =='single')
                                    @include('admin.stock._partials.simple_item')
                                @elseif($main && $main->type =='filter')
                                    @include('admin.stock._partials.filter_item')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="stockRequiredItems-{!! $k!!}" role="tabpanel" aria-labelledby="stockRequiredItems-tab-{!! $k!!}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="product-wall">
                                <div class="text-right">
                                    <button class="btn btn-primary select-items"
                                            type="button">
                                        <i class="fa fa-plus"></i> Add new
                                    </button>
                                    {{--add-package-item--}}
                                </div>
                                <div class="w-100">
                                    <div class="table-responsive stock-items-tabs-main-wrapper">
{{--                                        <table class="table table-style table-bordered mt-2" cellspacing="0"--}}
{{--                                               width="100%">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th>Item</th>--}}
{{--                                                <th>Name</th>--}}
{{--                                                <th>Qty</th>--}}
{{--                                                <th>Image</th>--}}
{{--                                                <th class="package_price @if(! $main || ($main && $main->price_per == 'product')) hide @endif">Price Area</th>--}}
{{--                                                <th>Actions</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody class="@if($main && $main->type =='package_product') package-variation-box @elseif($main && $main->type =='single') package-variation-box @elseif($main && $main->type =='filter') filter-variation-box @endif">--}}
{{--                                            <tbody class="filter-variation-box ">--}}
{{--                                            @if($main && count($v))--}}
{{--                                                @foreach($v as $package_variation)--}}
{{--                                                    @include('admin.inventory._partials.variation_package_item')--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
                                        <div class="stock-items-tabs-wall-head">
                                            <div class="stock-items-tab-head-name">
                                                Item
                                            </div>
                                            <div class="stock-items-tab-head-price d-flex flex-wrap">
                                                <div class="col-lg-4">
                                                    <div class="section_price">
                                                        Price
                                                        per: {!! Form::select("variations[$main_unique][price_per]",['product' => 'Section','item' => 'Item'],($main) ? $main->price_per : null,['class' => 'form-control price_per']) !!}
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="section_price product_price @if($main && $main->price_per == 'item') hide @endif">
                                                        Price : {!! Form::text("variations[$main_unique][common_price]",
                                                                ($main) ? $main->common_price : null,['class' => 'form-control']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="stock-items-tab-head-action">
                                                Actions
                                            </div>
                                        </div>
                                       <div class="@if($main && $main->type =='package_product') package-variation-box @elseif($main && $main->type =='single') package-variation-box @elseif($main && $main->type =='filter') filter-variation-box @endif">
                                        @if($main && count($v))
                                            @foreach($v as $package_variation)
                                                @include('admin.inventory._partials.variation_package_item')
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{--<div class="card panel panel-default stock-page" data-unqiue="{{ $main_unique }}">--}}
{{--    <div class="card-header panel-heading clearfix d-flex pr-0 stock-page--head">--}}
{{--        <div class="col-sm-6 d-flex flex-wrap head-left px-0 py-2">--}}
{{--            <div class="col-xl-3">--}}
{{--                {!! Form::text("variations[$main_unique][title]",($main) ? $main->title : null,['class' => 'form-control mr-1','placeholder' => 'Enter title ...']) !!}--}}
{{--            </div>--}}
{{--            <div class="col-xl-6 my-xl-0 my-1">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        {!! Form::select("variations[$main_unique][type]",['' => 'Select','package_product' => 'Multiple items','filter' => 'Filters','single' => 'Single item'--}}
{{--               ],($main) ? $main->type : null,--}}
{{--               ['class' => 'form-control variation-product-select']) !!}--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 mt-md-0 mt-1 filter-option {{ ($main && $main->type =='filter') ? '' : 'hide' }}">--}}
{{--                        {!! Form::select("variations[$main_unique][filter_category_id]",['' => 'Select Filter']+$filters,($main) ? $main->filter_category_id : null,--}}
{{--                        ['class' => 'form-control filter-select']) !!}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-3">--}}
{{--                {!! Form::number("variations[$main_unique][ordering]",($main) ? $main->ordering : null,--}}
{{--                ['class' => 'form-control','placeholder' => 'Sort']) !!}--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-5 d-flex justify-content-end p-0">--}}
{{--            <div class="col-md-12 px-md-3 px-0 multi-option {{ ($main && ($main->type =='package_product' || $main->type =='filter' )) ? '' : 'hide' }}">--}}
{{--                <div class="row h-100 align-items-center">--}}
{{--                    <div class="col-lg-5">--}}
{{--                        <div class="row">--}}
{{--                            <label class="col-xl-6 col-form-label">--}}
{{--                                Min Limit :--}}
{{--                            </label>--}}
{{--                            <div class="col-xl-6 align-self-center">--}}
{{--                                {!! Form::number("variations[$main_unique][min_count_limit]",--}}
{{--                                (($main) ? $main->min_count_limit : null),['class' => 'form-control']) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="col-lg-7 mb-lg-0 mb-1">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xl-8 col-form-label">--}}
{{--                                How Many items user can select :--}}
{{--                            </div>--}}
{{--                            <div class="col-xl-4 align-self-center">--}}
{{--                                {!! Form::number("variations[$main_unique][count_limit]",--}}
{{--                                                                ($main) ? $main->count_limit : null,['class' => 'form-control']) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-sm-1 col d-flex pr-0 head-right justify-content-end">--}}
{{--            {!! Form::hidden("variations[$main_unique][is_required]",$required) !!}--}}
{{--            <button type="button" class="btn btn-danger delete-v-option"><i class="fa fa-times"></i></button>--}}
{{--        </div>--}}
{{--</div>--}}
{{--<div class="card-body panel-body">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-12 type-place">--}}
{{--    <div class="product-wall">--}}
{{--        @if($main && $main->type =='package_product')--}}
{{--            @include('admin.stock._partials.package_item')--}}
{{--        @elseif($main && $main->type =='single')--}}
{{--            @include('admin.stock._partials.simple_item')--}}
{{--        @elseif($main && $main->type =='filter')--}}
{{--            @include('admin.stock._partials.filter_item')--}}
{{--        @endif--}}
{{--    </div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


