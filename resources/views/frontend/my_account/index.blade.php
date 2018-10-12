@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="tabs-outer">
                    <div class="text-center tabs-top">
                        <div class="img-outer">
                            <img src="http://demo0.laravelcommerce.com/resources/views/admin/images/admin_profile/1539074891.42792796_2710973195795309_228747741981835264_n.png" alt="">
                        </div>
                        <h4 class="mb-3">Name</h4>
                        <h5 class="font-weight-normal">Position</h5>
                    </div>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="{!! route('my_account_profile') !!}" role="tab" aria-controls="home">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#pp" role="tab" aria-controls="profile">Password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Logs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="{!! route('my_account_favourites') !!}" role="tab" aria-controls="settings">Favourites</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">..1..</div>
                    <div class="tab-pane" id="profile" role="tabpanel">..2..</div>
                    <div class="tab-pane" id="messages" role="tabpanel">..3..</div>
                    <div class="tab-pane" id="settings" role="tabpanel">..4..</div>
                </div>
            </div>
        </div>

    </div>

@stop