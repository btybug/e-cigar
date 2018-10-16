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
       <ul class="share-social d-flex">
        <li>
         <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li>
        <li>
         <a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
        </li>
        <li>
         <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
       </ul>
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
 <style>
  .single-product_btns li .btn {
   min-width: 150px;
  }

  .single-product_btns_share {
   position: relative;
   display: inline-block;
  }

  .single-product_btns_share .share-social {
   top: 100%;
   right: 0;
   position: absolute;
   padding: 10px 60px;
   background: #fff;
   box-shadow: 0 5px 20px rgba(0,0,0,.2);
   opacity:0;
   visibility: hidden;

  }

  .single-product_btns_share .share-social i{
   font-size: 18px;

  }


  .single-product_btns_share .share-social li{
   margin-right: 10px;

  }


  .single-product_btns_share .share-social li:last-child {
   margin-right: 0;

  }

  .single-product_btns_share:hover .share-social {
   opacity:1;
   visibility: visible;
  }

  .single-product_btns_share .share-social:before {
   position: absolute;
   top: -10px;
   right: 10px;
   content: '';
   display: inline-block;
   width: 0;
   height: 0;
   border-style: solid;
   border-width: 0 5px 10px 5px;
   border-color: transparent transparent #fff transparent;
  }


  .single-product_btns_share:hover > a {
   background: #212529;
   color: #fff;
  }
 </style>
@stop

@section("js")

@stop