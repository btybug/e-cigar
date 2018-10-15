<div class="col-md-3">
    @if(count($model->children))
        @foreach($model->children as $item)
            <div class="col-md-12">
                <div class="col-md-6">
                    {!! $item->name !!}
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" data-item-id="{!! $item->id !!}"><i class="fa fa-trash"></i></a>
                    <a href="javascript:void(0)" data-item-id="{!! $item->id !!}" data-parent-id="{!! $model->id !!}"
                       class="btn btn-sm btn-warning attr-option"><i class="fa fa-pencil"></i></a>
                </div>
            </div>
        @endforeach
    @else
        No Options
    @endif
    <div class="col-md-12">
        {!! Form::model($optionModel,['url' => route('admin_store_attributes_options',$model->id)]) !!}
        {!! Form::hidden('id',null) !!}
        {!! Form::hidden('parent_id',$model->id) !!}
        <div class="col-md-8">
            {!! Form::text('translatable['.strtolower(get_default_language()->code).'][name]',null,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-4">
            {!! Form::submit('Add',['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

<div class="col-md-9 options-form">
    {{--@include('admin.inventory.attributes.options_form')--}}
</div>


