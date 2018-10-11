@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="col-md-6">
        {!! Form::open(['class'=>'form-horizontal']) !!}

        <fieldset>

            <!-- Form Name -->
            <legend>Create Role</legend>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Title</label>
                <div class="col-md-4">
                    {!! Form::text('title',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Type</label>
                <div class="col-md-4">
                    {!! Form::select('type',['Admin Panel'=>'backend','Front Site'=>'frontend'],null,['class'=>'form-control input-md']) !!}
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Description</label>
                <div class="col-md-4">
                    {!! Form::textarea('description',null,['class'=>'form-control input-md']) !!}
                </div>
            </div>
            <!-- Button -->
            <div class="form-group">
                <div class="col-md-4">
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Save</button>
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}

    </div>
    <div class="col-md-6">
    <div id="treeview_json"></div>
    </div>
@stop
@section('js')
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
<script>
    var tree =[{!! getModuleRoutes('GET','admin')->toJson(1) !!}]
    $('#treeview_json').treeview({
        data: tree,
        showCheckbox: true,
        onNodeChecked: function(event, node) {
            console.log(1)
            // $('#checkable-output').prepend('<p>' + node.text + ' was checked</p>');
        },
        onNodeUnchecked: function (event, node) {
            console.log(111)
            // $('#checkable-output').prepend('<p>' + node.text + ' was unchecked</p>');
        }
});

</script>
@stop