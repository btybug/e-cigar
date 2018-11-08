@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_tickets'])
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
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
                                    <span style="background: {{ ($ticket->status->color)??'cornflowerblue' }}" class="btn order-table_btn order-table_btn--status">{!! $ticket->status->name !!} </span>
                                </td>
                                <td>
                                    <div class="mb-2">
                                        <button type="button" class="btn btn-dark order-table_btn">View</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">No Tickets</td>
                        </tr>
                    @endif
                    <tr>
                        <td>#4949</td>
                        <td>12/10/09</td>
                        <td>13/10/09</td>
                        <td>
                            <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                        </td>
                        <td>
                            <div class="mb-2">
                                <button type="button" class="btn btn-dark order-table_btn">View</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#4949</td>
                        <td>12/10/09</td>
                        <td>13/10/09</td>
                        <td>
                            <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                        </td>
                        <td>
                            <div class="mb-2">
                                <button type="button" class="btn btn-dark order-table_btn">View</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>#4949</td>
                        <td>12/10/09</td>
                        <td>13/10/09</td>
                        <td>
                            <button type="button" class="btn btn-success order-table_btn order-table_btn--status">Completed</button>
                        </td>
                        <td>
                            <div class="mb-2">
                                <button type="button" class="btn btn-dark order-table_btn">View</button>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

@stop