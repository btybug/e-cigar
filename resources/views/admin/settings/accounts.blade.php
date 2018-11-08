@extends('layouts.admin')
@section('content-header')

@stop
@section('content')
    {!! Form::open() !!}
    <div class="container-fluid">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item ">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_general') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " id="general-tab" href="{!! route('admin_settings_accounts') !!}" role="tab"
                   aria-controls="general" aria-selected="true" aria-expanded="true">Accounts</a>
            </li>
        </ul>
        <div class="tab-pane fade in" id="admin_settings_accounts">
            <div class="panel panel-default">
                <div class="panel-heading">Sending Email
                    <button type="submit" class="
btn btn-success pull-right">Save</button></div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <table class="table froms-table">
                            <tr>
                                <td>
                                    <label for="sendingEmail">E-Mail Address</label>

                                </td>
                                <td>
                                    {!! Form::hidden('new[type][]') !!}
                                    <input type="new[email][]" class="form-control" id="sendingEmail" aria-describedby="sendingEmail" placeholder="Enter E-Mail Address">
                                </td>
                                <td>
                                    <label for="sendingEmailDesc">Description</label>

                                </td>
                                <td>
                                    <textarea rows="5" class="form-control" name="new[description][]" aria-describedby="sendingEmailDesc" placeholder="Enter Description"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary pull-right add-more-from"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Reseiving Emails</div>
                <div class="panel-body">
                    <div class="col-md-9">
                        <table class="table table-to">
                            <tr>
                                <td>
                                    <label for="sendingEmail">E-Mail Address</label>

                                </td>
                                <td>
                                    <input type="email" class="form-control" id="reseivingEmail" aria-describedby="reseivingEmail" placeholder="Enter E-Mail Address">
                                </td>
                                <td>
                                    <label for="sendingEmailDesc">Description</label>

                                </td>
                                <td>
                                    <textarea rows="5" class="form-control" id="reseivingEmailDesc" aria-describedby="reseivingEmailDesc" placeholder="Enter Description"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary pull-right add-more-too"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {!! Form::close() !!}
@stop
@section('js')
    <script>
        $(function () {
$('body').on('click','.add-more-from',function () {
    $(this).removeClass('add-more-from').addClass('remove-line');
    $(this).removeClass('btn-primary').addClass('btn-warning');
    $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
  let html='<tr><td><label for="sendingEmail">E-Mail Address</label>' +
      '</td><td><input type="hidden" name="new[type][]">' +
      '<input type="new[email][]" class="form-control" id="sendingEmail" aria-describedby="sendingEmail" placeholder="Enter E-Mail Address"> ' +
      '</td><td><label for="sendingEmailDesc">Description</label></td> <td> ' +
      '<textarea rows="5" class="form-control" name="new[description][]" aria-describedby="sendingEmailDesc" placeholder="Enter Description"></textarea> ' +
      '</td><td><button type="button" class="btn btn-primary pull-right add-more-from"><i class="fa fa-plus"></i></button> </td></tr>';
  $('.froms-table').append(html)
})
            $('body').on('click','.add-more-too',function () {
    $(this).removeClass('add-more-from').addClass('remove-line');
    $(this).removeClass('btn-primary').addClass('btn-warning');
    $(this).find('i').removeClass('fa-plus').addClass('fa-minus');
  let html='<tr><td><label for="sendingEmail">E-Mail Address</label>' +
      '</td><td><input type="hidden" name="new[type][]">' +
      '<input type="new[email][]" class="form-control" id="sendingEmail" aria-describedby="sendingEmail" placeholder="Enter E-Mail Address"> ' +
      '</td><td><label for="sendingEmailDesc">Description</label></td> <td> ' +
      '<textarea rows="5" class="form-control" name="new[description][]" aria-describedby="sendingEmailDesc" placeholder="Enter Description"></textarea> ' +
      '</td><td><button type="button" class="btn btn-primary pull-right add-more-too"><i class="fa fa-plus"></i></button> </td></tr>';
  $('.table-to').append(html)
})
        })
    </script>
    @stop