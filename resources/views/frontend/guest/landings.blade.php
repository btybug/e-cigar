@extends('layouts.frontend')
@section('content')
    @php
        $file = ltrim($landing->content, '/');
        $html = (File::exists($file)) ? File::get($file) : "";
    @endphp
    <div>
        {!! $html !!}
    </div>
@endsection
@section('css')
@stop
@section('js')

@stop
