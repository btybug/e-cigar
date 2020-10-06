@extends('layouts.frontend')
@section('content')
    <main class="main-content">
        <div class="news-wrap change-display-wrap display-grid">
            <div class="container main-max-width">
                <div class="row justify-content-md-start justify-content-center">
                    @foreach($brands as $brand)
                        <a href="{!! route('brand_single',$brand->slug) !!}" class="news-wrap_col">
                            <span class="news-card main-transition position-relative">
                                <span class="news-card_view d-block position-relative">
                                    <!--news main image-->
                                        <img class="card-img-top"  src="{!! $brand->image !!}" alt="{!! $brand->name !!}" title="{!! $brand->name !!}">
                                    <!--share icon-->
                                    <span class="like-icon news-card_share-icon d-inline-block pointer main-transition position-absolute">
                                    <svg iewBox="0 0 20 21" width="20px" height="21px">
                                        <path fill-rule="evenodd"  opacity="0.6" fill="rgb(255, 255, 255)" d="M16.364,13.881 C15.393,13.881 14.480,14.252 13.793,14.925 C13.603,15.111 13.438,15.316 13.296,15.533 L7.014,11.799 C7.181,11.392 7.275,10.948 7.275,10.484 C7.275,10.018 7.181,9.576 7.015,9.168 L13.298,5.461 C13.944,6.454 15.074,7.116 16.364,7.116 C18.368,7.116 19.999,5.518 19.999,3.555 C19.999,1.592 18.368,-0.006 16.364,-0.006 C14.359,-0.006 12.728,1.592 12.728,3.555 C12.728,4.002 12.817,4.430 12.971,4.823 L6.678,8.535 C6.028,7.565 4.910,6.923 3.639,6.923 C1.635,6.923 0.004,8.519 0.004,10.484 C0.004,12.447 1.635,14.045 3.639,14.045 C4.910,14.045 6.028,13.402 6.678,12.431 L12.969,16.172 C12.813,16.573 12.728,17.001 12.728,17.442 C12.728,18.393 13.106,19.289 13.793,19.960 C14.480,20.633 15.393,21.003 16.364,21.003 C17.335,21.003 18.247,20.633 18.934,19.960 C19.621,19.289 19.999,18.393 19.999,17.442 C19.999,16.491 19.621,15.598 18.934,14.925 C18.247,14.252 17.335,13.881 16.364,13.881 L16.364,13.881 Z"/>
                                    </svg>
                                </span>

                                </span>
                                <span class="news-card_body">
                                    <span class="news-card_body-text d-block">
                                        <span class="d-inline-block card-title font-21 font-sec-bold text-main-clr underlined-on-hover" title="{{ $brand->title }}">{!! str_limit($brand->name,30) !!}</span>
                                        <span class="card-text d-block font-main-light font-15 text-light-clr" title="{{ $brand->description }}">
                                            {!! str_limit($brand->description,100) !!}
                                        </span>
                                    </span>
                                </span>

                            </span>
                        </a>


                    {{--<strong>{!! BBgetDateFormat($post->created_at,'d') !!}</strong>{!! BBgetDateFormat($post->created_at,'M') !!}--}}
                @endforeach
                <!-- The END -->
                </div>
            </div>
        </div>

        <!--scroll top button-->
        <button id="scrollTopBtn" class="scroll-top-btn d-flex align-items-center justify-content-center pointer">
            <svg viewBox="0 0 17 10" width="17px" height="10px">
                <path fill-rule="evenodd" fill="rgb(124, 124, 124)" d="M0.000,8.111 L1.984,10.005 L8.498,3.789 L15.010,10.005 L16.995,8.111 L8.498,0.001 L0.000,8.111 Z"></path>
            </svg>
        </button>
    </main>
@stop
@section("js")

    <script>
        // $("body").on("click", ".change-view-blog", function (e) {
        //     e.preventDefault()
        //     $(".change-view-blog").removeClass("active")
        //     $(this).addClass("active")
        //     if($(this).attr("id") === "list_news"){
        //         localStorage.setItem('testObject',"list_news");
        //         $(".blogs").addClass("blogs-list")
        //     }else {
        //         localStorage.setItem('testObject',"cube");
        //         $(".blogs").removeClass("blogs-list")
        //     }
        // })

        // localStorage.setItem('testObject', JSON.stringify(testObject));

        // Retrieve the object from storage
        // var retrievedObject = localStorage.getItem('testObject');

    </script>

@stop
