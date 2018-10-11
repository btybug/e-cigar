@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="row">
        <div class="col-md-4">
        <div id="tree1"></div>
        </div>
        <div class="col-md-8">
            <div class="button-area">
            <a class="btn btn-primary pull-right" href="{!! route('admin_store_categories_new') !!}">Add new</a></div>
            
            <div class="content-area">
                {!! Form::model(null) !!}
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">EN</a></li>
                    <li><a data-toggle="tab" href="#menu1">RU</a></li>
                    <li><a data-toggle="tab" href="#menu2">AM</a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="form-group">
                            <label>Category Name</label>
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <div class="form-group">
                            <label>Category Name</label>
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="form-group">
                            <label>Category Name</label>
                            {!! Form::text('name',null,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Parent</label>
                    {!! Form::select('parent_id',[''=>'No Parent'],null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Image</label>
                    {!! Form::file('image',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="https://mbraak.github.io/jqTree/tree.jquery.js"></script>
    <script>
        window.AjaxCall = function postSendAjax(url, data, success, error) {
  $.ajax({
    type: "post",
    url: url,
    cache: false,
    datatype: "json",
    data: data,
    headers: {
      "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
    },
    success: function(data) {
      if (success) {
        success(data);
      }
      return data;
    },
    error: function(errorThrown) {
      if (error) {
        error(errorThrown);
      }
      return errorThrown;
    }
  });
};

var data = [
  {
    name: "node1",
    id: 1,
    children: [{ name: "child1", id: 2 }, { name: "child2", id: 3 }]
  },
  {
    name: "node2",
    id: 4,
    children: [{ name: "child3", id: 5 }]
  }
];
$("#tree1").tree({
  data: data,
  //   dataUrl: {
  //     url: '/example_data.json',
  //     headers: {'abc': 'def'}
  // },
  autoOpen: true,
  saveState: true,
  dragAndDrop: true,
  onDragStop: function(e, node) {
    var tree_json = $("#tree1").tree("toJson");
    AjaxCall("/url", tree_json, function(res) {
      console.log(res);
    });
  }
});

$("#tree1").bind("tree.click", function(e) {
  var node = e.node;
  AjaxCall("/url", node.id, function(res) {
    console.log(res);
  });
});

        $(function () {
            $('#categories-table').DataTable({
                ajax:  "{!! route('dt_all_categories') !!}",
                "processing": true,
                "serverSide": true,
                "bPaginate": true,
                columns: [
                    {data: 'id',name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'description',name: 'description'},
                    {data: 'image', name: 'image'},
                    {data: 'icon', name: 'icon'},
                    {data: 'created_at', name: 'created_at'}
                ]
            });
        });

    </script>
@stop
@section("css")
<link rel="stylesheet" href="https://mbraak.github.io/jqTree/jqtree.css">
@stop