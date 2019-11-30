@extends('layouts.frontend',['page_name'=>'about_us'])
@section('content')
    <h3>About US</h3>

    <div>
        {!! @$model->description !!}
    </div>
@stop
