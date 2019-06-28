@extends('layouts.admin')
@section('content-header')
@stop
@section('content')
    <div class="admin-find-wrapper">
        <div class="form-group row border-bottom pb-2">
            <label for="find" class="col-sm-2 col-form-label">Find</label>
            <div class="col-sm-4">
                {!! Form::select('find',$options,null,['class' => 'form-control','id' => 'find']) !!}
            </div>
        </div>
        <div class="find-form">

        </div>
        <div class="find-wrapper-results mt-5">
            <h3 class="border-bottom pb-2">Results</h3>
            <div class="find-wrapper-results-content row">

            </div>

        </div>
    </div>
@stop
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@stop
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        function call_find(option){
            AjaxCall("/admin/find/call-find", {key: option}, function (res) {
                if (!res.error) {
                    $(".find-form").html(res.form);
                    if(option == 'products'){
                        call_products();
                    }else if(option == 'orders'){

                    }
                }
            });
        }


        $(document).ready(function () {

            var option = $("#find").val();
            call_find(option);

            $("body").on('change','#find',function () {
                $(".find-wrapper-results-content").html("");

                call_find($(this).val());
            })


            $("body").on("change","#findForm", function() {
                $(this).closest('form').data('changed', true);
                doSubmitForm()
            });
        });

        function call_products() {
            $("body").find(".categories").select2();
            $("body").find(".brands").select2();
        }

        function doSubmitForm() {
            $('.find-wrapper-results-content').html('<div id="loading" class="justify-content-center align-items-center my-5 d-flex">\n' +
                '            <div class="lds-dual-ring"></div>\n' +
                '        </div>');
            let form = $("#findForm");
            let serializeValue = form.serialize();

            let url = form.attr('action');
            // let url = "/products/" + category;
            // console.log(typeof serializeValue)
            // console.log(window.location.origin + window.location.pathname + '?' + serializeValue + `&sort_by=${sort_by}&q=${search_text}`)
            // window.location.replace(window.location.origin + window.location.pathname + '?' + form);

            $.ajax({
                type: "post",
                url: url,
                cache: false,
                datatype: "json",
                data: `${serializeValue}`,
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (!data.error) {
                        $(".find-wrapper-results-content").html(data.html);
                    }
                },
                error: function() {
                    $(".find-wrapper-results-content").html('Error')
                }
            });
        }
    </script>
@stop
