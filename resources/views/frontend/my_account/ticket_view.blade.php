@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_tickets'])
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                    <a class="btn btn-primary" href="{!! route('my_account_tickets') !!}">Back</a>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="content">
                                <h2 class="header">
                                    {{ $ticket->subject }}
                                    <span class="pull-right">
                                                <a href="#"
                                                   class="btn btn-success">Mark Complete</a>
                                                                            </span>
                                </h2>
                                <div class="panel well well-sm">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <p><strong>Owner</strong>: {{ $ticket->author->name }}</p>
                                                <p>
                                                    <strong>Status</strong>:
                                                    <span style="color: #e69900">{{ $ticket->status->name }}</span>

                                                </p>
                                                <p>
                                                    <strong>Priority</strong>:
                                                    <span style="color: #069900">{{ $ticket->priority->name }}</span>
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Responsible</strong>: {{ ($ticket->staff) ? $ticket->staff->name : 'not assigned yet' }}</p>
                                                <p>
                                                    <strong>Category</strong>:
                                                    <span style="color: #0014f4">{{ $ticket->category->name }}</span>
                                                </p>
                                                <p><strong>Created</strong>: {!! time_ago($ticket->created_at) !!}</p>
                                                <p><strong>Last Update</strong>: {!! time_ago($ticket->updated_at) !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <p></p>
                                    <p>{!! $ticket->summary !!}</p>
                                    <p></p>
                                </div>
                            </div>
                            <form method="POST" action="http://ticketit.kordy.info/tickets/77" accept-charset="UTF-8"
                                  id="delete-ticket-77"><input name="_method" type="hidden" value="DELETE"><input
                                        name="_token" type="hidden" value="K3wrQ9J2zgKkUW4trZieebgr7geVah1LWvkNQGi2">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop