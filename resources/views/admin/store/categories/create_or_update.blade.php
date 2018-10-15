@if($model)
    {!! Form::model($model,['url' => route('admin_store_categories_delete')]) !!}
    {!! Form::hidden('id',null) !!}
    <div class="form-group">
        {!! Form::submit('delete',['class' => 'btn btn-danger']) !!}
    </div>
@endif
{!! Form::close() !!}

{!! Form::model($model,['url' => route('admin_store_categories_new_or_update')]) !!}
{!! Form::hidden('id',null) !!}
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#en">EN</a></li>
    <li><a data-toggle="tab" href="#ru">RU</a></li>
    <li><a data-toggle="tab" href="#am">AM</a></li>
</ul>

<div class="tab-content">
    <div id="en" class="tab-pane fade in active">
        <div class="form-group">
            <label>Category Name</label>
            {!! Form::text('translatable[en][name]',get_translated($model,'en','name'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label>Description</label>
            {!! Form::textarea('translatable[en][description]',get_translated($model,'en','description'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div id="ru" class="tab-pane fade">
        <div class="form-group">
            <label>Category Name</label>
            {!! Form::text('translatable[ru][name]',get_translated($model,'ru','name'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label>Description</label>
            {!! Form::textarea('translatable[ru][description]',get_translated($model,'ru','description'),['class'=>'form-control']) !!}
        </div>
    </div>
    <div id="am" class="tab-pane fade">
        <div class="form-group">
            <label>Category Name</label>
            {!! Form::text('translatable[am][name]',get_translated($model,'am','name'),['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            <label>Description</label>
            {!! Form::textarea('translatable[am][description]',get_translated($model,'am','description'),['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <label>Parent</label>
    {!! Form::select('parent_id',[''=>'No Parent'] + get_pluck($allCategories,'id','name'),null,['class'=>'form-control']) !!}
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

@if(is_enabled_media_modal())
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="{!! url('public/admin_theme/media/js/lightbox.js') !!}"></script>
    <script src="{!! url('public/admin_theme/media/js/jstree.min.js') !!}"></script>
    <script src="{!! url('public/admin_theme/media/js/custom.js') !!}"></script>
    <script src="{!! url('public/admin_theme/fileinput/js/fileinput.min.js') !!}"></script>
    <script>
        $("#input-ru").fileinput({
            language: "ru",
            uploadUrl: "/file-upload-batch/2",
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
@endif