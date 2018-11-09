@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link " id="info-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                           aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                           aria-controls="accounts" aria-selected="true" aria-expanded="true">Accounts</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="admin_settings_general">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Basics</div>
                                    <div class="panel-body">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="SiteName">Site Name</label>
                                                <input type="text" class="form-control" id="SiteName" aria-describedby="name" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="siteLogo">Site Logo</label>
                                                <input type="file" class="form-control" id="siteLogo">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea  class="form-control" id="description"  rows="5" aria-describedby="description" placeholder="Enter description"></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-default social-profile-page">
                                    <div class="panel-heading">Social Profile</div>
                                    <div class="panel-body">
                                        <div class="form-group d-flex flex-wrap align-items-center social-media-group">
                                            {{Form::label('social_media', 'Social Media', array('class' => 'col-sm-3 pl-0 col-form-label'))}}
                                            <div class="col-sm-6 p-0">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-secondary dark_blue_gradient-cl dropdown-toggle"
                                                                type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                            <i class="fa fa-facebook-f icon-blue"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item active" href="javascript:void(0);">
                                                                <i class="fa fa-facebook icon-green"></i>
                                                                <span class="name">Facebook</span>
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i class="fa fa-twitter icon-green"></i>
                                                                <span class="name">Twitter</span>
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i class="fa fa-yahoo icon-purple"></i>
                                                                <span class="name">Yahoo</span>
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);">
                                                                <i class="fa fa-google icon-red"></i>
                                                                <span class="name">Google</span>
                                                            </a>
                                                        </div>

                                                    </div>
                                                    {!! Form::text('social_media[0][url]', null, ['class' => 'form-control','id' => 'socialMedia','placeholder' => 'Profile URL','aria-label' => 'Text input with dropdown button']) !!}
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <span class="plus-icon add-new-social-input"><i class="fa fa-plus"></i></span>
                                            </div>


                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">Address</div>
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="firstAddress">1st line address</label>
                                                <input type="text" class="form-control" id="firstAddress" aria-describedby="firstAddress" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="secondAddress">2nd line address</label>
                                                <input type="text" class="form-control" id="secondAddress" aria-describedby="secondAddress" placeholder="Enter Address">
                                            </div>
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <select id="city" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select id="country" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="postCode">Post Code</label>
                                                <input type="text" class="form-control" id="postCode" aria-describedby="postCode" placeholder="Enter Post Code">
                                            </div>

                                        </div>
                                        <div class="col-md-offset-1 col-md-6">
                                            <div class="settings-map-outer"></div>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">Oppening Hours</div>
                                    <div class="panel-body form-inline">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label for="weekday">Weekday</label>
                                                                <select id="weekday" class="form-control">
                                                                    <option selected>Choose...</option>
                                                                    <option>...</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <strong>From</strong>
                                                                <div class="input-group bootstrap-timepicker timepicker">
                                                                    <input id="timepicker1" type="text" class="form-control input-small">
                                                                    <label class="input-group-addon" for="timepicker1"><i class="glyphicon glyphicon-time"></i></label>
                                                                </div>

                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <strong>To</strong>
                                                                <div class="input-group bootstrap-timepicker timepicker">
                                                                    <input id="timepicker2" type="text" class="form-control input-small">
                                                                    <label class="input-group-addon" for="timepicker2"><i class="glyphicon glyphicon-time"></i></label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i></button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">Holidays</div>
                                    <div class="row">
                                        <div class="col-md-7">
                                            <table class="table">
                                                <tr>
                                                    <td>
                                                        <label for="calendar">Calendar</label>
                                                    </td>
                                                    <td>
                                                        <input class=form-control type="text" id="calendar">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" placeholder="Christmas">
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Heading</div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label for="dateFormat">Date Format</label>
                                            <select id="dateFormat" class="form-control">
                                                <option selected>Choose...</option>
                                                <option>MM/DD/YY</option>
                                                <option>DD/MM/YY</option>
                                                <option>YY/MM/DD</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="timeFormat">Time Format</label>
                                            <select id="timeFormat" class="form-control">
                                                <option selected>Choose...</option>
                                                <option>dd hh:mm</option>
                                                <option>dd hh:mm:ss.s</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
        </div>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('public/admin_theme/plugins/timepicker/bootstrap-timepicker.css')}}">
@stop


@section('js')
    {!! Html::script("public/admin_theme/plugins/timepicker/bootstrap-timepicker.js")!!}
    <script>
        $( function() {
            $( "#calendar" ).datepicker();
            $('#timepicker1').timepicker();
            $('#timepicker2').timepicker();


            $("body").on("click", ".add-new-social-input", function () {
                var uid = Math.random().toString(36).substr(2, 9);
                var html = "\n  <div class=\"clearfix\"></div><div class=\"d-flex align-items-center w-100 social-container mt-3\">\n  <div class=\"col-sm-3 pl-0 col-form-label\"></div>\n\n  <div class=\"col-sm-6 p-0\">\n                                  <div class=\"input-group\">\n                                      <div class=\"input-group-prepend\">\n                                          <button class=\"btn btn-outline-secondary dark_blue_gradient-cl dropdown-toggle\"\n                                                  type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"\n                                                  aria-expanded=\"false\"><i class=\"fa fa-facebook-f icon-blue\"></i>\n                                          </button>\n                                          <div class=\"dropdown-menu\">\n                                              <a class=\"dropdown-item active\"  href=\"javascript:void(0);\">\n                                                  <i class=\"fa fa-facebook icon-green\"></i>\n                                                  <span class=\"name\">Facebook</span>\n                                              </a>\n                                              <a class=\"dropdown-item\" href=\"javascript:void(0);\">\n                                                  <i class=\"fa fa-twitter icon-green\"></i>\n                                                  <span class=\"name\">Twitter</span>\n                                              </a>\n                                              <a class=\"dropdown-item\" href=\"javascript:void(0);\">\n                                                  <i class=\"fa fa-yahoo icon-purple\"></i>\n                                                  <span class=\"name\">Yahoo</span>\n                                              </a>\n                                              <a class=\"dropdown-item\" href=\"javascript:void(0);\">\n                                                  <i class=\"fa fa-google icon-red\"></i>\n                                                  <span class=\"name\">Google</span>\n                                              </a>\n                                          </div>\n                                             <input name=\"social_media[" + uid + "][social]\" value=\"fab fa-facebook icon-green\" type=\"hidden\" class=\"social_type\">\n                                      </div>\n                                      <input name=\"social_media[" + uid + "][url]\" type=\"text\" class=\"form-control\"\n                                             aria-label=\"Text input with dropdown button\" placeholder=\"Profile URL\"> \n                                  </div>\n                                </div>\n                                <div class=\"col-sm-3\">\n                                    <span class=\"plus-icon remove-new-social-input\"><i class=\"fa fa-minus\"></i></span>\n                                </div>\n                                </div>\n  ";
                $(".social-media-group").append(html);
            });

            $("body").on("click", ".remove-new-social-input", function () {
                $(this).closest(".social-container").remove();
            });

            $("body").on("click", ".social-profile-page .dropdown-item", function () {
                var parent = $(this).closest(".input-group-prepend").find(".dropdown-toggle").find("i");

                var classList = $(this).find("i").attr("class");

                parent.attr("class", "").addClass(classList);
                $(this).closest(".input-group-prepend").find('.social_type').val(classList);
                $(this).parent().children().removeClass('active')
                $(this).addClass('active')
            });
        } );
    </script>
@stop