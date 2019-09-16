@extends('layouts.frontend')
@section('content')
   @foreach($items as $item)
    <div class="col-md-12">
        <img src="{{ $item->image }}" width="200px" />
        {{ $item->name }}
    </div>
    @endforeach
@endsection
@section('css')
@stop
@section('js')

@stop
