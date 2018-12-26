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
                            <td><button class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@stop