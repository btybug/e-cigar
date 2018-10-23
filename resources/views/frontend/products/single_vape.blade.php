@extends('layouts.frontend')
@section('content')
    <div class="container container--vape">
        <div class="row mb-5">
            <div class="col-md-4">
                <a href="#" class="d-inline-block woocommerce-main-image zoom mb-3">
                    <img width="100%" src="http://ukprintplus.co.uk/wp-content/uploads/2015/08/2-side-appointment-400-400x300.jpg" class="attachment-single-product-thumb wp-post-image" alt="">
                </a>
                <ul class="single-product_btns pl-0 mb-0 d-md-flex justify-content-md-between">
                    <li><a href="#" class="btn btn-outline-dark"><i class="fa fa-heart-o mr-2"></i>Add To</a></li>
                    <li class="single-product_btns_share"><a href="#" class="btn btn-outline-dark">share</a>
                        <div id="share" class="share-social"></div>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h1 class="product_title entry-title col-md-6 mb-5 p-0">Product Title</h1>
            </div>
            <div class="col-md-4">
                <form>
                    <h2 class="mb-4">Price Calculator</h2>
                    <div class="form-group row align-items-center">
                        <div class="col-md-4">
                            <label for="quantity" class="mb-0"><span class="text-danger">*</span>Quantity</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control" id="quantity" placeholder="50">
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-md-4">
                            <label for="sides" class="mb-0"><span class="text-danger">*</span>Sides</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="sides" id="sides">
                                <option value="1 Side">1 Side</option>
                                <option value="2 Sides">2 Sides</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-md-4">
                            <label for="orientation" class="mb-0"><span class="text-danger">*</span>Orientation</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="orientation" id="orientation">
                                <option value="Landscape">Landscape</option>
                                <option value="Portrait">Portrait</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center mb-0">
                        <div class="col-md-4">
                            <label for="paperQuantity" class="mb-0"><span class="text-danger">*</span>Paper Quality</label>
                        </div>
                        <div class="col-md-8">
                            <select class="form-control" name="paperQuantity" id="paperQuantity">
                                <option value="300gsm Silk">300gsm Silk</option>
                                <option value="300gsm Silk 2">300gsm Silk 2</option>
                            </select>
                        </div>
                    </div>
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
                <div class="row mb-2">
                    <div class="col-md-8">
                        <div class="tab-content--features_left" style="background-image: url(http://laravelcommerce.com/resources/assets/images/news_images/1531930664.blog-img-2.jpg);"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="tab-content--features_right d-flex flex-column align-items-center justify-content-center h-100">Feature 1</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content--features_left" style="background-image: url(http://laravelcommerce.com/resources/assets/images/news_images/1531930697.blog-img-3.jpg);"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="tab-content--features_right d-flex flex-column align-items-center justify-content-center h-100">Feature 2</div>
                    </div>
                </div>
            </div>


            <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
                <div id="jssorVideos" class="media-slider">
                    <!-- Loading Screen -->
                    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:580px;overflow:hidden;">
                        <div>
                            <div data-u="image">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/j2G1IUpRiPY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div data-u="thumb">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/j2G1IUpRiPY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div>
                            <div data-u="image">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Ujc3yhN9E5Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                <</div>
                            <div data-u="thumb">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Ujc3yhN9E5Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                <</div>
                        </div>
                        <div>
                            <div data-u="image">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FE7Ea0ffqOg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div data-u="thumb">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FE7Ea0ffqOg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div>
                            <div data-u="image">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/j2G1IUpRiPY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div data-u="thumb">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/j2G1IUpRiPY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div>
                            <div data-u="image">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Ujc3yhN9E5Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <</div>
                            <div data-u="thumb">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Ujc3yhN9E5Y" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                <</div>
                        </div>
                        <div>
                            <div data-u="image">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FE7Ea0ffqOg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                            <div data-u="thumb">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FE7Ea0ffqOg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                    <!-- Thumbnail Navigator -->
                    <div data-u="thumbnavigator" class="jssort101" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;background-color:#000;" data-autocenter="1" data-scale-bottom="0.75">
                        <div data-u="slides">
                            <div data-u="prototype" class="p" style="width:190px;height:90px;">
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
                    <div data-u="arrowleft" class="jssora106" style="width:55px;height:55px;top:258px;left:30px;" data-scale="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                            <polyline class="a" points="7930.4,5495.7 5426.1,8000 7930.4,10504.3 "></polyline>
                            <line class="a" x1="10573.9" y1="8000" x2="5426.1" y2="8000"></line>
                        </svg>
                    </div>
                    <div data-u="arrowright" class="jssora106" style="width:55px;height:55px;top:258px;right:30px;" data-scale="0.75">
                        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                            <circle class="c" cx="8000" cy="8000" r="6260.9"></circle>
                            <polyline class="a" points="8069.6,5495.7 10573.9,8000 8069.6,10504.3 "></polyline>
                            <line class="a" x1="5426.1" y1="8000" x2="10573.9" y2="8000"></line>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">3</div>
            <div class="tab-pane fade" id="technical" role="tabpanel" aria-labelledby="technical-tab">4</div>
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





