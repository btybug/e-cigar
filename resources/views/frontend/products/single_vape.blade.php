@extends('layouts.frontend')
@section('content')
    <div class="container container--vape">
        <div class="row mb-5">
            <div class="col-md-4">
                <a href="#" class="d-inline-block woocommerce-main-image zoom mb-3">
                    <img width="100%" src="{!! $vape->image !!}" class="attachment-single-product-thumb wp-post-image" alt="">
                </a>
                <ul class="single-product_btns pl-0 mb-0 d-md-flex justify-content-md-between">
                    <li><a href="#" class="btn btn-outline-dark"><i class="fa fa-heart-o mr-2"></i>Add To</a></li>
                    <li class="single-product_btns_share"><a href="#" class="btn btn-outline-dark">share</a>
                        <div id="share" class="share-social"></div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h1 class="product_title entry-title mb-4 p-0">{!! $vape->name !!}</h1>
                <p>
                    {!! $vape->long_description !!}
                </p>
            </div>
            <div class="col-md-4">
                <form>
                    <h2 class="mb-4">Price Calculator</h2>
                    <input type="hidden" value="{{ $vape->id }}" id="vpid">
                    @include("admin.inventory._partials.render_price_form",['model' => $vape])

                    <a href="javascript:void(0)" class="btn btn-outline-dark btn-success add-to-cart">Add To Cart</a>
                </form>
            </div>
        </div>

        <ul class="nav nav-tabs d-flex" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="feature-tab" data-toggle="tab" href="#feature" role="tab" aria-controls="home" aria-selected="true">Feature</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">Media</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="technical-tab" data-toggle="tab" href="#technical" role="tab" aria-controls="technical" aria-selected="false">Technical</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="extra-tab" data-toggle="tab" href="#extra" role="tab" aria-controls="extra" aria-selected="false">Extra</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content tab-content--features">
            <div class="tab-pane fade show active" id="feature" role="tabpanel" aria-labelledby="feature-tab">
                @if($vape->posters && count($vape->posters))
                    @foreach($vape->posters as $poster)
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="tab-content--features_left" style="background-image: url({{ $poster }});"></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    NO Posters
                @endif
            </div>

            <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                @if($vape->videos && count($vape->videos))
                    <div id="jssorVideos" class="media-slider">
                        <!-- Loading Screen -->
                        <div data-u="slides" class="media-slider_slides">
                            @foreach($vape->videos as $video)
                                <div>
                                    <div data-u="image">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                    <div data-u="thumb">
                                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Thumbnail Navigator -->
                        <div data-u="thumbnavigator" class="jssort101 media-slider_thumbnavigator" data-autocenter="1" data-scale-bottom="0.75">
                            <div data-u="slides">
                                <div data-u="prototype" class="p">
                                    <div data-u="thumbnailtemplate" class="t"></div>
                                    <svg viewbox="0 0 16000 16000" class="cv">
                                        <circle class="a" cx="8000" cy="8000" r="3238.1"></circle>
                                        <line class="a" x1="6190.5" y1="8000" x2="9809.5" y2="8000"></line>
                                        <line class="a" x1="8000" y1="9809.5" x2="8000" y2="6190.5"></line>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora106 media-slider_arrownavigator media-slider_arrownavigator--left" data-scale="0.75">
                            <svg viewbox="0 0 16000 16000" class="icon">
                                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                                <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora106 media-slider_arrownavigator media-slider_arrownavigator--right" data-scale="0.75">
                            <svg viewbox="0 0 16000 16000" class="icon">
                                <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                                <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                                <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                            </svg>
                        </div>
                    </div>
                @else
                    NO Videos
                @endif

            </div>
            <div class="tab-pane fade" id="technical" role="tabpanel" aria-labelledby="technical-tab">
                <div class="row">
                    <table class="table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>Attributes</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($vape->attrs))
                            @foreach($vape->attrs as $attr)
                                <tr>
                                    <td>{!! $attr->name !!}</td>
                                    <td>
                                        @if(count($attr->children))
                                            @foreach($attr->children as $option)
                                                <span class="badge badge-primary">{!! $option->name !!}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr colspan="2">
                                <td>No Attributes</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="extra" role="tabpanel" aria-labelledby="extra-tab">5</div>
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">6</div>
        </div>
    </div>


@stop

@section('css')
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/jssor-slider.css')}}">
@stop

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
    <script src="{{asset('public/frontend/js/jssor.slider-27.5.0.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            get_price();
            $("body").on('change','.select-variation-option',function () {
                get_price();
            })


            $("body").on('click','.add-to-cart',function () {
                var variationId = $("#variation_uid").val();

                if(variationId && variationId != ''){
                    $.ajax({
                        type: "post",
                        url: "/add-to-cart",
                        cache: false,
                        datatype: "json",
                        data: {  uid : variationId },
                        headers: {
                            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                        },
                        success: function(data) {
                            if(! data.error){
                                alert('added')
                            }else{
                                alert('error')
                            }
                        }
                    });
                }else{
                    alert('Select available variation');
                }
            })

        });

        function get_price(){
            var items = document.getElementsByClassName('select-variation-option');
            let options = {};
            for (var i = 0; i < items.length; i++){
                options[$(items[i]).data('name')] = $(items[i]).val();
            }
            if (JSON.stringify(options) !== "{}") {

                $.ajax({
                    type: "post",
                    url: "/products/get-price",
                    cache: false,
                    datatype: "json",
                    data: { options : options, uid : $("#vpid").val() },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function(data) {
                        if(! data.error){
                            $(".price-place").html(data.price);
                            $("#variation_uid").val(data.variation_id);
                        }else{
                            $(".price-place").html(data.message);
                            $("#variation_uid").val('');
                        }
                    }
                });
            }
        }


        $("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
        });


        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
                {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
                $AutoPlay: 0,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $ThumbnailNavigatorOptions: {
                    $Class: $JssorThumbnailNavigator$,
                    $SpacingX: 5,
                    $SpacingY: 5
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssorVideos", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };

        jssor_1_slider_init();
    </script>
@stop





