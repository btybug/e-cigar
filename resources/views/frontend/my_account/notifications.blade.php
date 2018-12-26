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
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>30/10/1988</td>
                            <td>Otto</td>
                            <td><button class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>30/10/1988</td>
                            <td>Thornton</td>
                            <td><button class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>30/10/1988</td>
                            <td>the Bird</td>
                            <td><button class="btn btn-info"><i class="fa fa-eye"></i></button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@stop