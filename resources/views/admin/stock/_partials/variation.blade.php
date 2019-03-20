@php
    $isModelExists = ($model && isset($v) && count($v)) ? true : false;
    $main_unique = ($isModelExists) ? $v->first()->variation_id :uniqid();
    $main = ($isModelExists) ? $v->first() : null;
@endphp
<div class="card panel panel-default stock-page" data-unqiue="{{ $main_unique }}">
    <div class="card-header panel-heading clearfix d-flex">
        <div class="col-md-6 d-flex">
            <label class="col-md-3">Product Type</label>
            <div class="col-md-3">
                {!! Form::select("variations[$main_unique][type]",['' => 'Select','simple_product'=>'Single Product','package_product' => 'Multiple items'
                ],($main) ? $main->type : null,
                ['class' => 'form-control variation-product-select']) !!}
            </div>
        </div>
        <div class="col-md-6 d-flex">
            {!! Form::select("variations[$main_unique][is_required]",[0 => 'Optional',1 => 'Required'],($main) ? $main->is_required : null,['class' => 'form-control']) !!}
            <button type="button" class="btn btn-danger delete-v-option"><i class="fa fa-trash"></i></button>
        </div>
    </div>
    <div class="card-body panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="sipmle-product-wall product-wall {{ ($main && $main->type =='simple_product') ? '' : 'hide' }}">
                    @include('admin.stock._partials.simple_item')
                </div>

                <div class="packge-product-wall product-wall {{ ($main && $main->type =='package_product') ? '' : 'hide' }}">
                    <div class="package-box">
                        @include('admin.stock._partials.package_item')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--<div class="col-sm-12">--}}
    {{--<div class="form-group">--}}
        {{--<div class="row">--}}
            {{--<label class="col-md-1">Product Type</label>--}}
            {{--<div class="col-md-3">--}}
                {{--{!! Form::select('type',['' => 'Select','simple_product'=>'Single Product','package_product' => 'Multiple items'--}}
                {{--],null,--}}
                {{--['id'=>'variation-product-select','class' => 'form-control']) !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}


