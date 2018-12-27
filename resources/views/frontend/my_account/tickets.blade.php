@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="d-flex h-100">
    @include('frontend._partials.left_bar')
    <div class="main-right-wrapp">
        <div class="container mt-5">
            <div class="my-4">
                <a class="btn btn-primary" href="{!! route('my_account_tickets_new') !!}">Open ticket</a>
            </div>
            <table class="table table-bordered table-striped table-responsive-lg order-table">
                <thead>
                <tr>
                    <th class="text-capitalize">ticket ID</th>
                    <th class="text-capitalize">submited</th>
                    <th class="text-capitalize">updated on</th>
                    <th class="text-capitalize">status</th>
                    <th class="text-capitalize">action</th>
                </tr>
                </thead>
                <tbody>
                @if(count($tickets))
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>#{{ $ticket->id }}</td>
                            <td>{!! BBgetDateFormat($ticket->created_at) . ' ' . BBgetTimeFormat($ticket->created_at); !!}</td>
                            <td>{!! BBgetDateFormat($ticket->updated_at) . ' ' . BBgetTimeFormat($ticket->updated_at); !!}</td>
                            <td>
                                <span style="background: {{ ($ticket->status->color)??'cornflowerblue' }}"
                                      class="btn order-table_btn order-table_btn--status">{!! $ticket->status->name !!} </span>
                            </td>
                            <td>
                                <div class="mb-2">
                                    <a href="{!! route('my_account_tickets_view',$ticket->id) !!}"
                                       class="btn btn-dark order-table_btn">View</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No Tickets</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="col-md-12 my-4">
                {!! $tickets->links() !!}
            </div>

        </div>
    </div>
            @include('frontend.my_account._partials.verify_bar')

        </div>
    </main>
@stop