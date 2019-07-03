@php
    $isModelExists = ($model && isset($v) && count($v)) ? true : false;
    $main_unique = ($isModelExists) ? $v->first()->variation_id :uniqid();
    $main = ($isModelExists) ? $v->first() : null;
@endphp
<div class="card panel panel-default stock-page" data-unqiue="{{ $main_unique }}">
    <div class="card-header panel-heading clearfix d-flex pr-0 stock-page--head">
        <div class="col-md-6 d-flex head-left">
            <div class="col-md-3">
                {!! Form::text("variations[$main_unique][title]",($main) ? $main->title : null,['class' => 'form-control mr-1','placeholder' => 'Enter title ...']) !!}
            </div>
            <div class="col-md-9">
                <div class="col-md-6">
                    {!! Form::select("variations[$main_unique][type]",['' => 'Select','package_product' => 'Multiple items','filter' => 'Filters','single' => 'Single item'
           ],($main) ? $main->type : null,
           ['class' => 'form-control variation-product-select']) !!}
                </div>
                <div class="col-md-6 filter-option {{ ($main && $main->type =='filter') ? '' : 'hide' }}">
                    {!! Form::select("variations[$main_unique][filter_category_id]",['' => 'Select Filter']+$filters,($main) ? $main->filter_category_id : null,
                    ['class' => 'form-control filter-select']) !!}
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex pr-0">
            <div class="col-md-6 multi-option {{ ($main && $main->type =='package_product') ? '' : 'hide' }}">
                <div class="row">
                    <div class="col-md-6">
                        Min Limit : {!! Form::number("variations[$main_unique][min_count_limit]",
                                (($main) ? $main->min_count_limit : null),['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                        How Many items user can select : {!! Form::number("variations[$main_unique][count_limit]",
                                ($main) ? $main->count_limit : null,['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex pr-0 head-right justify-content-end">
                {!! Form::hidden("variations[$main_unique][is_required]",$required) !!}
                <button type="button" class="btn btn-danger delete-v-option"><i class="fa fa-times"></i></button>
            </div>
        </div>

</div>
<div class="card-body panel-body">
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
</div>


