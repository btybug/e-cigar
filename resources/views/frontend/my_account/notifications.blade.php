@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="d-flex h-100">
            @include('frontend._partials.left_bar')
            <div class="main-right-wrapp">
                <div class="container mt-5">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Date</th>
                            <th scope="col">Notification</th>
                            <th scope="col">Type</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                        <tr>
                            <th scope="row"><input type="checkbox"></th>
                            <td>{!! $message->updated_at !!}</td>
                            <td>{!! $message->subject !!}</td>
                            <td>{!! $message->type !!}</td>
                            <td><button class="btn btn-info __modal" data-toggle="modal" data-id="{!! $message->id !!}"><i class="fa fa-eye"></i></button></td>
                        </tr>
                        @endforeach

                        {{-- Modal --}}
                        <div class="modal" id="notif_modal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title">Modal Heading</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <div class="modal-body">

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>


                        </tbody>
                    </table>
                </div>
            </div>
            @include('frontend.my_account._partials.verify_bar')

        </div>
    </main>
@stop

@section("js")
    <script src={{asset("public/js/my-account/notifications.js")}}></script>

@stop