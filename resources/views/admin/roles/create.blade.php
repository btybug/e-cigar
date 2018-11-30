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

            <form action="">
                <!-- Password input-->
                <div class="form-group row">
                    <label class="col-md-2" for="passwordinput">Title</label>
                    <div class="col-md-6">
                        {!! Form::text('title',null,['class'=>'form-control input-md']) !!}
                    </div>
                </div>
                <!-- Password input-->
                <div class="form-group row">
                    <label class="col-md-2" for="passwordinput">Type</label>
                    <div class="col-md-6">
                        {!! Form::select('type',['backend'=>'Admin Panel','frontend'=>'Front Site'],null,['class'=>'form-control input-md']) !!}
                    </div>
                </div>

                <!-- Password input-->
                <div class="form-group row">
                    <label class="col-md-2" for="passwordinput">Description</label>
                    <div class="col-md-6">
                        {!! Form::textarea('description',null,['class'=>'form-control input-md']) !!}
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group row text-right">
                    <div class="col-md-6">
                        <button id="singlebutton" class="btn btn-info save-role">Save</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-12">
            <legend>Pages</legend>

            <div id="treeview_json"></div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-12">
            <legend>Forms</legend>

            <div id="treeview_json2"></div>
            <div class="clearfix"></div>
        </div>
    </div>


</div>

@stop

@section("css")
    <link rel="stylesheet" href="http://laraframe.codemen.org/backend/assets/css/admin_lte.css">
    <link rel="stylesheet" href="http://laraframe.codemen.org/common/vendors/iCheck/flat/_all.css">
@stop


@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-treeview/1.2.0/bootstrap-treeview.min.js"></script>
    <script>
        var tree =[{!! getModuleRoutes('GET','admin')->toJson(1) !!}]
        let html = (data) =>   `<div class="checkbox checkbox-success checkbox-compact row">
                        <div class="col-lg-3 col-md-12" style="margin-bottom: 20px;"><div class="icheckbox_flat-green checked" aria-checked="true" aria-disabled="false" style="position: relative;"><input class="sub-module flat-red task module_action_application_managements module_action_application_managements_admin_settings" id="${data.url}" data-id="admin_settings" name="task" type="checkbox" value="1" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                        <label class="disable-text-select" for="${data.url}">${data.text}</label></div>
                    </div>` 
        let html2 = (data2) => `<div class="col-lg-9 col-md-12" style="margin-bottom:20px; border-bottom:1px solid #3c8dbc; padding-bottom: 10px">
                    <div class="row dc-clear">
                        ${data2}
                        
                    </div>
                    </div>`
        let html3 = (data) => `<div class="col-lg-3 col-md-3 col-sm-6" style="margin-bottom: 20px;">
                            <div class="checkbox checkbox-success checkbox-inline checkbox-compact">
                                <div class="icheckbox_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input class="route-item flat-red module_action_user_managements task_action_users" id="${data.text}" name="roles[user_managements][users][]" type="checkbox" value="${data.text}" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                <label class="disable-text-select" for="${data.text}">${data.text}</label>
                            </div>
                        </div>`
        function MakeChekbox(aaa) {
            let treeNodes = Object.values(tree[0].nodes)
            treeNodes.forEach(item => {
                let item2 = $(html(item))
                if (item.nodes) {
                    let temp =  ""
                    Object.values(item.nodes).forEach(elm => {
                        temp += html3(elm)
                    })
                    item2.append(html2(temp))
                }
                $("#treeview_json").append(item2)
            })
        }
        MakeChekbox()
         var tree2 =[{!! getModuleRoutes('POST','admin',[])->toJson(1) !!}]
         $('#treeview_json').treeview({
             data: tree,
             showCheckbox: true,
             onNodeChecked: function(event, node) {
                 if(typeof node.parentId !== "undefined") {
                     checkParent(node.parentId, "#treeview_json")
                 }},
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
             let currentNode = $('#treeview_json').treeview('getNode', id);
             $(selecetor).treeview('uncheckNode', [ id, { silent: true } ]);
             if (currentNode.nodes){
                Object.values(currentNode.nodes).forEach(item => unCheckChildren(item.nodeId))
            }


        }
        $("form").on("submit", function (e) {
            e.preventDefault()
            let formData = $("form").serializeArray();
            let treeData = $('#treeview_json').data('treeview').getChecked();
            let treeData2 = $('#treeview_json2').data('treeview').getChecked();
            treeData= $.merge(treeData,treeData2)
            AjaxCall("{!! route('post_admin_create_role') !!}", {formData, treeData}, function(res) {
                if(!res.error){
                   window.location.href='{!! route('admin_role_membership') !!}'
                };
            });
        })

    </script>
@stop