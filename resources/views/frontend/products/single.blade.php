@extends('layouts.frontend')
@section('content')
 <div class="container">
  <div class="row mb-5">
   <div class="col-md-3">
    <a href="#" class="d-inline-block woocommerce-main-image zoom">
     <img width="100%" src="http://ukprintplus.co.uk/wp-content/uploads/2015/08/2-side-appointment-400-400x300.jpg" class="attachment-single-product-thumb wp-post-image" alt="">
    </a>
   </div>
   <h1 class="product_title entry-title col-md-6">Product Title</h1>
   <div class="col-md-3">
    <div class="single_product_col2">
     <ul class="single-product_btns text-right">
      <li class="mb-2"><a href="#" class="btn btn-outline-dark"><i class="fa fa-heart-o mr-2"></i>Add To</a></li>
      <li class="single-product_btns_share"><a href="#" class="btn btn-outline-dark">share</a>
       <div id="share" class="share-social"></div>
      </li>
     </ul>
    </div>
   </div>
  </div>


   <ul class="nav nav-pills nav-fill ml-0" role="tablist" id="singleProductTab">
    <li class="nav-item">
     <a class="nav-link active" id="features-tab" data-toggle="tab" href="#features" role="tab" aria-controls="features" aria-selected="true" aria-expanded="true">Features</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" id="technical-tab" data-toggle="tab" href="#technical" role="tab" aria-controls="technical" aria-selected="false">Technical</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" id="pricingDelivery-tab" data-toggle="tab" href="#pricingDelivery" role="tab" aria-controls="pricingDelivery" aria-selected="false">Pricing & Delivery</a>
    </li>
    <li class="nav-item">
     <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews <span>(2)</span></a>
    </li>
   </ul>
   <div class="tab-content">
    <div class="tab-pane fade active in show" id="features" role="tabpanel" aria-labelledby="features-tab">
     ..1..
    </div>
    <div class="tab-pane fade" id="technical" role="tabpanel" aria-labelledby="technical-tab">
     ..2..
    </div>
    <div class="tab-pane fade" id="pricingDelivery" role="tabpanel" aria-labelledby="pricingDelivery-tab">
     ..3..
    </div>
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
     ..4..
    </div>
  </div>
 </div>
@stop
@section('css')
 <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
 <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
@stop

@section("js")
 <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
 <script>
 $("#share").jsSocials({
 shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
 });
 </script>
@stop