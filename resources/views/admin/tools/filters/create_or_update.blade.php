<div class="del-save--btn">
    @if($model)
        <div class="form-group m-r-5">
            <a class="btn btn-danger delete-button text-white" data-key="{{ $model->id }}" data-href="#">Delete</a>
        </div>
    @endif
        @ok('admin_store_categories_form')
    <div class="form-group">
        {!! Form::submit('Save',['class' => 'btn btn-info btn-submit-form']) !!}
    </div>
    @endok
</div>

{!! Form::model($model,['url'=>route('post_admin_tools_filters'),'class' => 'updated-form']) !!}
{!! Form::hidden('id',null) !!}
@if(count(get_languages()))
    <ul class="nav nav-tabs">
    @foreach(get_languages() as $language)
            <li class="nav-item"><a class="nav-link @if($loop->first) active @endif" data-toggle="tab" href="#{{ strtolower($language->code) }}">
                    <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}</a></li>
    @endforeach
    </ul>
@endif


<div class="tab-content">
    @if(count(get_languages()))
        @foreach(get_languages() as $language)
            <div id="{{ strtolower($language->code) }}" class="tab-pane fade  @if($loop->first) in active show @endif">
                <div class="form-group row mt-10">
                    <label class="col-md-2 col-xs-12">Filter Name</label>
                    <div class="col-md-10">
                        {!! Form::text('translatable['.strtolower($language->code).'][name]',get_translated($model,strtolower($language->code),'name'),['class'=>'form-control','required'=>true]) !!}
                    </div>

                </div>
            </div>
        @endforeach
    @endif
</div>

    <div class="card panel panel-default mt-20 releted__products-panel">
        <div class="card-header panel-heading d-flex justify-content-between align-items-center">
                                        <span>
                                            Related Products
                                        </span>
            <button type="button" class="btn btn-primary select-products"><i class="fa fa-plus fa-sm mr-10"></i>Add Product</button>
        </div>
        <div class="card-body panel-body product-body">
            <ul class="get-all-attributes-tab row">

            </ul>
        </div>
    </div>
{!! Form::close() !!}

