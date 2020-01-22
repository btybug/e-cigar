@extends('layouts.frontend')

@section('content')
    <div class="main-content">
        <div class="faq-single-page-wrapper">
            <div class="container main-max-width">
                <div class="row">
                    <div class="col-md-3">
                        <div class="faq-single-ads">
                            <img src="http://webneel.com/daily/sites/default/files/images/project/creative-advertisement%20(13).jpg" alt="ads">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="faq-single-content">
                            <h1 class="font-sec-reg font-36 text-main-clr faq-single-main-title">{!! $faq->question !!}</h1>
                            <div class="faq-single-desc">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Ab aperiam consequuntur deleniti ducimus earum enim, eos et eum explicabo fugit iure minima modi natus obcaecati perspiciatis quam recusandae repellendus rerum.
                            </div>

                        </div>
                        
                        <h5 class="font-sec-bold font-20 text-uppercase text-tert-clr mb-4">{!! __('comments') !!}</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="comments-wrapper">
                                    <div class="comment-list comment-list-wrapper">
                                        <div class="user-add-comment">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    @if(Auth::check())
                                                        <div class="add-comment">
                                                            {!! Form::open(['route' => 'comment_create_post']) !!}
                                                            {!! Form::hidden('post_id',$faq->id) !!}
                                                            <div class="main-comment-wrap-img">
                                                                <div class="user-imges">
                                                                    <img src="{{ user_avatar() }}"
                                                                         alt="user">
                                                                </div>
                                                                <textarea name="comment" id="" rows="0"
                                                                          placeholder="Your comments"></textarea>
                                                            </div>

                                                            <span class="error-box invalid-feedback comment"></span>
                                                            <div class="d-flex button-comment-wrap justify-content-end">

                                                                <div class="button-comment">
                                                                    <button type="button"
                                                                            class="btn btn-block add-comment-btn">
                                                                        <span class="post-title">{!! __('post_comment') !!}</span>
                                                                        <span class="icon">
<svg
    xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink"
    width="22px" height="9px">
<path fill-rule="evenodd" opacity="0.8" fill="rgb(255, 255, 255)"
      d="M0.002,5.617 L16.071,5.617 L16.071,9.000 L21.996,4.500 L16.071,0.000 L16.071,3.383 L0.002,3.383 L0.002,5.617 Z"/>
</svg>
                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comments-refresh">
                                            {{--                                                @include('frontend.blog.single_post_comments')--}}
                                        </div>
                                        <div class="message-place">

                                        </div>
                                        <!-- First Comment -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="faq-single-ads">
                            <img src="http://webneel.com/daily/sites/default/files/images/project/creative-advertisement%20(13).jpg" alt="ads">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/faq-page.css?v='.rand(111,999))}}">
    <link rel="stylesheet" href="{{asset('public/css/comments.css?v='.rand(111,999))}}">
    <style>

        #gp-inner-container {
            height: calc(100% - 100px);
            overflow: auto;
        }

        .hide-icons {
            cursor: pointer;
        }

        .comments {
            font-family: 'SF-UI-Text-Medium_1';
            font-size: 16px;
        }

        .comments .user-comment-img .user-img img {
            width: 100%;
            max-height: 65px;
            object-fit: cover;
        }

        .comments .user-comment-img .user-comment {
            flex: 1;
            height: 100%;
        }

        .comments .user-comment-img .user-comment .content-reply {
            font-family: 'SF-UI-Text-Light_1';
            margin-top: auto;
            padding-bottom: 10px;
        }

        .comments .user-comment-img .user-comment .content-reply .reply {
            color: #1c8379;
            text-decoration: none;
        }

        .comments .user-comment-img .user-title h6 {
            color: #3a3b3b;

        }

        .comments .user-comment-img .user-title span {
            color: #cbcbcb;
        }

        .comments .user-add-comment {
            font-family: 'SF-UI-Text-Light_1';
        }

        .comments .user-add-comment img {
            width: 100%;
            max-height: 65px;
            object-fit: cover;
        }

        .comments .user-add-comment textarea {
            border: none;
            border-bottom: 1px solid #26a69a;
            resize: none;
            outline: none;
            padding: 0;
            overflow: hidden;
            width: 100%;
            margin-top: 10px;
        }

        .comments .user-add-comment input {
            display: block;
            width: 100%;
            padding: .375rem 0;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            border: none;
            background-clip: padding-box;
            border-bottom: 1px solid #27a59a;
            outline: none;
        }

        .comments .user-add-comment button {
            color: #27a59a;
            border-color: #27a59a;
        }

        .comments .user-add-comment button:hover {
            background-color: #27a59a;
            border-color: #27a59a;
            color: #ffffff;
        }
    </style>
@stop
@section('js')

@stop
