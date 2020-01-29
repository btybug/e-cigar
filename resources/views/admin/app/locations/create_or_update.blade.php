<div class="card card-stats mt-0">
    <div class="card-header card-header-primary card-header-icon">


        <div class="card-icon float-right card_head_buttons">
            <div class="del-save--btn">
                @if(isset($model) && !$model->is_default)
                    <div class="form-group m-r-5 p-0 my-0">
                        <a class="btn btn-danger text-white delete-button text-white" data-key="{{ $model->id }}"
                           data-href="{{ route('admin_warehouses_categories_delete',$shop->id) }}">Delete</a>
                    </div>
                @endif
                @if(!isset($model) || !$model->is_default)
                <div class="form-group p-0 my-0">
                    {!! Form::submit('Save',['class' => 'btn btn-info text-white btn-submit-form']) !!}
                </div>
                    @endif
            </div>
        </div>



    </div>
    <div class="card-body">
        {!! Form::model($model,['url' => route('admin_app_locations_rack_new_or_update',$shop->id),'class' => 'updated-form']) !!}
        {!! Form::hidden('id',null) !!}
        {!! Form::hidden('warehouse_id',$shop->id) !!}

        <div class="form-group row mt-10">
            <label class="col-md-2 col-xs-12">Name</label>
            <div class="col-md-10">
                {!! Form::text('name',null,['class'=>'form-control','required'=>true]) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-xs-12">Description</label>
            <div class="col-md-10 col-xs-12">
                {!! Form::textarea('description',null,['class'=>'form-control','required'=>true]) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-xs-12">Slug</label>
            <div class="col-md-10 col-xs-12">
                {!! Form::text('slug',null,['class'=>'form-control','required'=>true]) !!}
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2 col-xs-12">Rack</label>
            <div class="col-md-10 col-xs-12">
                {!! Form::select('parent_id',[''=>'No Parent'] + get_pluck($allCategories,'id','name'),null,['class'=>'form-control']) !!}
            </div>
        </div>


        {!! Form::close() !!}
    </div>
</div>





