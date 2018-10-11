<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! env('SITE_NAME','ADMIN') !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
{!! Html::style("public/admin_theme/bower_components/bootstrap/dist/css/bootstrap.min.css") !!}
<!-- Font Awesome -->
{!! Html::style("public/admin_theme/bower_components/font-awesome/css/font-awesome.min.css") !!}
<!-- Ionicons -->
{!! Html::style("public/admin_theme/bower_components/Ionicons/css/ionicons.min.css") !!}
<!-- Theme style -->
{!! Html::style("public/admin_theme/dist/css/AdminLTE.min.css") !!}
<!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
{!! Html::style("public/admin_theme/dist/css/skins/_all-skins.min.css") !!}
<!-- Morris chart -->
{!! Html::style("public/admin_theme/bower_components/morris.js/morris.css") !!}

<!-- Date Picker -->
{!! Html::style("public/admin_theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css") !!}
<!-- Daterange picker -->
{!! Html::style("public/admin_theme/bower_components/bootstrap-daterangepicker/daterangepicker.css") !!}
<!-- bootstrap wysihtml5 - text editor -->
    {!! Html::style("public/admin_theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") !!}


    <link rel="stylesheet" href="{{asset('public/admin_assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/js/DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin_assets/css/jquery.datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin_assets/css/custom.css')}}">

    <!--Media Button Stiles-->

    @if(is_enabled_media_modal())
        {!! Html::style('public/admin_theme/media/css/styles.css') !!}
        {!! Html::style('public/admin_theme/media/css/style.css') !!}
        {!! Html::style('public/admin_theme/media/css/lightbox.css') !!}
        {!! Html::style('public/admin_theme/fileinput/css/fileinput.min.css') !!}
    @endif
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="{{asset('public/admin_assets/css/custom.css')}}">
    @yield('css')
    @stack('style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('admin._partials.header')
<!-- Left side column. contains the logo and sidebar -->
@include('admin._partials.left_menu')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content main-content">

            @if(Session::has('alert'))
                <div class="alert alert-messages alert-{!! Session::get('alert.class','success') !!} alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon {!! getAlertIconByClass(Session::get('alert.class')) !!}"></i> Alert!</h4>
                    {!! Session::get('alert.message') !!}
                </div>
                {!! Session::forget('alert') !!}
            @endif
            @yield('content')
        </section>

        <!-- /.content -->
    </div>
@if(is_enabled_media_modal())
    @include('media.modal')
@endif
<!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> beta
        </div>
        <strong>Copyright &copy; 2017-{{ date('Y') }} <a href="http://hook.am">HooK LLC</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
@include('admin._partials.right_sidebar')
<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<script type="template" id="alert-message-box">
    <div class="alert alert-messages alert-{className} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon {icon}"></i> Alert!</h4>
        {message}
    </div>
</script>
<!-- ./wrapper -->
<!-- jQuery 3 -->
{!! Html::script("public/admin_theme/bower_components/jquery/dist/jquery.min.js")!!}
<!-- jQuery UI 1.11.4 -->
{!! Html::script("public/admin_theme/bower_components/jquery-ui/jquery-ui.min.js")!!}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{!! Html::script("public/admin_theme/bower_components/bootstrap/dist/js/bootstrap.min.js")!!}
<!-- Morris.js charts -->
{!! Html::script("public/admin_theme/bower_components/raphael/raphael.min.js")!!}
{!! Html::script("public/admin_theme/bower_components/morris.js/morris.min.js")!!}
<!-- Sparkline -->
{!! Html::script("public/admin_theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js")!!}

<!-- jQuery Knob Chart -->
{!! Html::script("public/admin_theme/bower_components/jquery-knob/dist/jquery.knob.min.js")!!}
<!-- daterangepicker -->
{!! Html::script("public/admin_theme/bower_components/moment/min/moment.min.js")!!}
{!! Html::script("public/admin_theme/bower_components/bootstrap-daterangepicker/daterangepicker.js")!!}
<!-- datepicker -->
{!! Html::script("public/admin_theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")!!}
<!-- Bootstrap WYSIHTML5 -->
{!! Html::script("public/admin_theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")!!}
<!-- Slimscroll -->
{!! Html::script("public/admin_theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")!!}
<!-- FastClick -->
{!! Html::script("public/admin_theme/bower_components/fastclick/lib/fastclick.js")!!}
<!-- AdminLTE App -->
{!! Html::script("public/admin_theme/dist/js/adminlte.min.js")!!}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
{!! Html::script("public/admin_theme/dist/js/demo.js")!!}


<script src="{{asset('public/js/DataTables/datatables.min.js')}}"></script>

{{--{!! Html::script("public/admin_assets/js/helpers.js")!!}--}}

{!! Html::script("public/admin_assets/js/jquery.datetimepicker.full.min.js")!!}






<!--Media Button JS-->
@if(is_enabled_media_modal())
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="{!! url('public/admin_theme/media/js/lightbox.js') !!}"></script>
    <script src="{!! url('public/admin_theme/media/js/jstree.min.js') !!}"></script>
    {{--<script src="{!! url('public/admin_theme/media/js/custom.js') !!}"></script>--}}
    <script src="{!! url('public/admin_theme/fileinput/js/fileinput.min.js') !!}"></script>
    <script>
        $("#input-ru").fileinput({
            language: "ru",
            uploadUrl: "/file-upload-batch/2",
            allowedFileExtensions: ["jpg", "png", "gif"]
        });
    </script>
@endif

<script src="{{asset('public/admin_assets/js/custom.js')}}"></script>
@yield('js')
@stack('javascript')
</body>
</html>
