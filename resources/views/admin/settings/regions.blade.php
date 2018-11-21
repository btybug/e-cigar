@extends('layouts.admin')
@section('content-header')

@stop
@section('content')

    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Accounts</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_regions') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Regions</a>
            </li>
        </ul>
        <div class="tab-pane fade in" id="admin_settings_regions">


            {!! Form::open(['id'=>'sites']) !!}
            <div class="panel panel-default">
                <div class="panel-heading">Site 1</div>
                <div class="panel-body form-horizontal">
                    {{--top 3 inputs--}}
                    <div class="row mb-20">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="siteName" class="col-sm-3 text-right">Site Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="siteLink" class="col-sm-3 text-right">Site Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="icon" class="col-sm-3 text-right">Icon</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>

                    {{--languages--}}
                    <div class="mb-20 languages">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="languages" class="col-sm-3 text-right">Languages</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary add-more-language">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{--currency--}}
                    <div class="mb-20 currency">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="currency" class="col-sm-3 text-right">Currency</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-primary add-more-currency">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            {{--add new item btn--}}
            <div class="text-right">
                <button class="btn btn-primary" id="add-new-panel"><i class="fa fa-plus"></i>&nbsp;Add new item</button>
            </div>
        </div>

    </div>
    <script type="template" id="language">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="col-sm-7 col-sm-offset-3">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-danger">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</script>
    <script type="template" id="currency">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="col-sm-7 col-sm-offset-3">
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
</script>
    <script type="template" id="site-form">
        <div class="panel panel-default">
            <div class="panel-heading">Site 1</div>
            <div class="panel-body form-horizontal">
                {{--top 3 inputs--}}
                <div class="row mb-20">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="siteName" class="col-sm-3 text-right">Site Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="siteLink" class="col-sm-3 text-right">Site Link</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="icon" class="col-sm-3 text-right">Icon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>

                {{--languages--}}
                <div class="mb-20 languages">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="languages" class="col-sm-3 text-right">Languages</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary add-more-language">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                {{--currency--}}
                <div class="mb-20 currency">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="currency" class="col-sm-3 text-right">Currency</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary add-more-currency">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </script>
@stop
@section('js')
    <script>
        $(function () {
            $('#add-new-panel').on('click', function () {
                let html = $('#site-form').html();
                $('#sites').append(html);
            });
            $('body').on('click','.add-more-language',function () {
                let html = $('#language').html();
                $(this).closest('.languages').append(html) ;
            });
            $('body').on('click','.add-more-currency',function () {
                let html = $('#currency').html();
                $(this).closest('.currency').append(html) ;
            });
        })
    </script>
@stop