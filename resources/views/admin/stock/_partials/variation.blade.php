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
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        {!! Form::select("variations[$main_unique][type]",['' => 'Select','simple_product'=>'Single Product','package_product' => 'Multiple items','filter' => 'Filters'
               ],($main) ? $main->type : null,
               ['class' => 'form-control variation-product-select']) !!}
                    </div>
                    <div class="col-md-6 filter-option {{ ($main && $main->type =='filter') ? '' : 'hide' }}">
                        {!! Form::select("variations[$main_unique][filter_category_id]",['' => 'Select Filter']+$filters,($main) ? $main->filter_category_id : null,
                        ['class' => 'form-control filter-select']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex pr-0 head-right justify-content-end">
                {!! Form::select("variations[$main_unique][is_required]",[0 => 'Optional',1 => 'Required'],($main) ? $main->is_required : null,['class' => 'form-control mr-1 h-100 w-25']) !!}

            <button type="button" class="btn btn-danger delete-v-option"><i class="fa fa-times"></i></button>

        </div>
    </div>
    <div class="card-body panel-body">
        <div class="row">
            <div class="col-sm-12 type-place">
                <div class="product-wall">
                    @if($main && $main->type =='simple_product')
                        @include('admin.stock._partials.simple_item')
                    @elseif($main && $main->type =='package_product')
                        @include('admin.stock._partials.package_item')
                    @elseif($main && $main->type =='filter')
                        @include('admin.stock._partials.filter_item')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


