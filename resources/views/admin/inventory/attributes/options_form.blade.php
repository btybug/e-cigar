<div class="col-xs-12">
    <div class="col-md-6 pull-left"><a class="btn btn-sm btn-primary attr-option" data-item-id="" data-parent-id="{!! $model->id !!}" href="javascript:void(0)">Add Option </a></div>
</div>
{!! Form::model($optionModel,['url' => route('admin_store_attributes_options',$model->id)]) !!}
{!! Form::hidden('id',null) !!}
{!! Form::hidden('parent_id',$model->id) !!}
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#enOption">EN</a></li>
    <li><a data-toggle="tab" href="#ruOption">RU</a></li>
    <li><a data-toggle="tab" href="#amOption">AM</a></li>
</ul>

<div class="tab-content">
    <div id="enOption" class="tab-pane fade in active">
        <div class="form-group">
            <label>Option Name</label>
            {!! Form::text('translatable[en][name]',get_translated($optionModel,'en','name'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div id="ruOption" class="tab-pane fade">
        <div class="form-group">
            <label>Option Name</label>
            {!! Form::text('translatable[ru][name]',get_translated($optionModel,'ru','name'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div id="amOption" class="tab-pane fade">
        <div class="form-group">
            <label>Option Name</label>
            {!! Form::text('translatable[am][name]',get_translated($optionModel,'am','name'),['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-10">
            <label>Icon</label>
            {!! Form::text('icon',null,['class'=>'form-control icon-picker']) !!}
        </div>
        <div class="col-md-2">
            <i id="font-show-area"></i>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Image</label>
    {!! media_button('image',$model) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
</div>
{!! Form::close() !!}


