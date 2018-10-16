@extends('layouts.frontend')
@section('content')
 <div class="container">
   <ul class="nav nav-pills nav-fill ml-0" role="tablist" id="singleProductTab">
    <li class="nav-item">
     <a class="nav-link active" id="pricing-tab" data-toggle="tab" href="#pricing" role="tab" aria-controls="pricing" aria-selected="true" aria-expanded="true">Pricing</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" id="designs-tab" data-toggle="tab" href="#designs" role="tab" aria-controls="designs" aria-selected="false">Designs</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" id="artWork-tab" data-toggle="tab" href="#artWork" role="tab" aria-controls="artWork" aria-selected="false">Art Work</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews <span>(2)</span></a>
    </li>
   </ul>
   <div class="tab-content">
    <div class="tab-pane fade active in show" id="pricing" role="tabpanel" aria-labelledby="pricing-tab">
     ..1..
    </div>
    <div class="tab-pane fade" id="designs" role="tabpanel" aria-labelledby="designs-tab">
     ..2..
    </div>
    <div class="tab-pane fade" id="artWork" role="tabpanel" aria-labelledby="artWork-tab">
     ..3..
    </div>
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
     ..4..
    </div>
  </div>
 </div>
@stop
@section('css')

@stop

@section("js")

@stop