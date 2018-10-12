@extends('layouts.admin')
@section('content')
    <section class="settings_lang">

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listing All Languages </h3>
                        <div class="box-tools pull-right">
                            <a href="{!! route('admin_settings_languages_new') !!}" type="button" class="btn btn-block btn-primary">Add</a>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                            </div>
                        </div>

                        <div class="row default-div hidden">
                            <div class="col-xs-12">
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    Default language has been changed successfully!
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Default</th>
                                        <th>Language</th>
                                        <th>Icon</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="languages_id" value="1"  class="default_language"  >
                                            </label>
                                        </td>
                                        <!--<td>1</td>-->
                                        <td>English</td>
                                        <td><img src="http://demo0.laravelcommerce.com//resources/assets/images/language_flags/1486556365.503984030_english.jpg" width="25px" alt=""></td>
                                        <td>en</td>
                                        <td>
                                            <a data-toggle="tooltip" data-placement="bottom" title=" English" href="#" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                            <a data-toggle="tooltip" data-placement="bottom" title=" English" id="deleteLanguageId" languages_id ="1" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="languages_id" value="6"  class="default_language"  >
                                            </label>
                                        </td>
                                        <!--<td>6</td>-->
                                        <td>Indonesia</td>
                                        <td><img src="http://demo0.laravelcommerce.com//" width="25px" alt=""></td>
                                        <td>in</td>
                                        <td>
                                            <a data-toggle="tooltip" data-placement="bottom" title=" Indonesia" href="#" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>


                                            <a data-toggle="tooltip" data-placement="bottom" title=" Indonesia" id="deleteLanguageId" languages_id ="6" class="badge bg-red"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="languages_id" value="8"  class="default_language"  checked  >
                                            </label>
                                        </td>
                                        <!--<td>8</td>-->
                                        <td>Español</td>
                                        <td><img src="http://demo0.laravelcommerce.com//" width="25px" alt=""></td>
                                        <td>es</td>
                                        <td>
                                            <a data-toggle="tooltip" data-placement="bottom" title=" Español" href="#" class="badge bg-light-blue"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="col-xs-12 text-right">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')

@stop