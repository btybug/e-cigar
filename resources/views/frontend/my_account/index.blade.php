@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account'])
            </div>
            <div class="col-md-8">

            </div>
        </div>

    </div>

@stop