@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="m-0">Create Role</h2>
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                {!! Form::model($role,['class'=>'']) !!}
                {!! Form::hidden('id',$role->id) !!}

                    <!-- Password input-->
                    <div class="form-group row">
                        <label class="col-md-2 control-label" for="passwordinput">Title</label>
                        <div class="col-md-10">
                            {!! Form::text('title',null,['class'=>'form-control input-md']) !!}
                        </div>
                    </div>
                    <!-- Password input-->
                    <div class="form-group row">
                        <label class="col-md-2 control-label" for="passwordinput">Type</label>
                        <div class="col-md-10">
                            {!! Form::select('type',['backend'=>'Admin Panel','frontend'=>'Front Site'],null,['class'=>'form-control input-md']) !!}
                        </div>
                    </div>

                    <!-- Password input-->
                    <div class="form-group row">
                        <label class="col-md-2 control-label" for="passwordinput">Description</label>
                        <div class="col-md-10">
                            {!! Form::textarea('description',null,['class'=>'form-control input-md']) !!}
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <button id="singlebutton" class="btn btn-info save-role">Save</button>
                        </div>
                    </div>
                {!! Form::close() !!}

            </div>
            <div class="col-md-6">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="m-0">Pages</h3>
                        </div>
                        <div class="panel-body">
                            <div id="treeview_json"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="m-0">Forms</h3>
                        </div>
                        <div class="panel-body">
                            <div id="treeview_json2"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
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
        var tree =[{!! getModuleRoutes('GET','admin',$role->permissions->pluck('slug','slug'))->toJson(1) !!}]
        var tree2 =[{!! getModuleRoutes('POST','admin',$role->permissions->pluck('slug','slug'))->toJson(1) !!}]
        $('#treeview_json').treeview({
            data: tree,
            showCheckbox: true,
            onNodeChecked: function(event, node) {
                if(typeof node.parentId !== "undefined") {
                    checkParent(node.parentId, "#treeview_json")
                }
            },
            onNodeUnchecked: function (event, node) {
                unCheckChildren(node.nodeId, "#treeview_json")
            }
        });
        $('#treeview_json2').treeview({
            data: tree2,
            showCheckbox: true,
            onNodeChecked: function(event, node) {
                if(typeof node.parentId !== "undefined") {
                    checkParent(node.parentId, "#treeview_json2")
                }
            },
            onNodeUnchecked: function (event, node) {
                unCheckChildren(node.nodeId, "#treeview_json2")
            }
        });
        function checkParent(id, selecetor) {
            let parrentId = id;
            $(selecetor).treeview('checkNode', [ parrentId, { silent: true } ]);
            if(parrentId){
                let parent = $('#treeview_json').treeview('getNode', parrentId);
                let pId = parent.parentId
                checkParent(pId)
            }

        }
        function unCheckChildren(id, selecetor){
            console.log($(selecetor))
            let currentNode = $('#treeview_json').treeview('getNode', id);
            $(selecetor).treeview('uncheckNode', [ id, { silent: true } ]);
            if (currentNode.nodes){
                Object.values(currentNode.nodes).forEach(item => unCheckChildren(item.nodeId, selecetor))
            }


        }
        $("form").on("submit", function (e) {
            e.preventDefault()
            let formData = $("form").serializeArray();
            let treeData = $('#treeview_json').data('treeview').getChecked();
            let treeData2 = $('#treeview_json2').data('treeview').getChecked();
            treeData= $.merge(treeData,treeData2)
            AjaxCall("{!! route('post_admin_edit_role') !!}", {formData, treeData}, function(res) {
                if(!res.error){
                     window.location.href='{!! route('admin_role_membership') !!}'
                };
            });
        })

    </script>
@stop