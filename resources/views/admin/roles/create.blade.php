@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="col-md-3">
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
    <div class="col-md-9">
    <div id="treeview_json"></div>
    </div>
@stop
@section('js')
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
<script>
    var tree = [
  {
    text: "Parent 1",
    nodes: [
      {
        text: "Child 1",
        nodes: [
          {
            text: "Grandchild 1"
          },
          {
            text: "Grandchild 2"
          }
        ]
      },
      {
        text: "Child 2"
      }
    ]
  },
  {
    text: "Parent 2"
  },
  {
    text: "Parent 3"
  },
  {
    text: "Parent 4"
  },
  {
    text: "Parent 5"
  }
]
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