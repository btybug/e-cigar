@extends('layouts.frontend')
@section('content')
        <div id="gp-inner-container">
            <div class="container">
                <div id="gp-left-column">
                    <div id="gp-content">
                        <article>
                           <div id="gp-post-navigation">
                        <div id="gp-breadcrumbs">
                            <span>
                                <span><a href="http://socialize.ghostpool.com/">Home</a> / <span>
                            <a href="#">Featured News</a> / <span class="breadcrumb_last">Dale Webster takes a break after 14642 consecutive days</span></span></span>
                            </span>
                        </div>
                               <div id="gp-post-links">
                                   <a href="#" rel="prev"></a>
                                   <a href="#" rel="next"></a>
                                   <a href="#" class="gp-share-button"></a>
                               </div>
                               <div id="gp-share-icons-hide" style="display: none">
                                   <h3>Share This Post</h3>
                                   <div class="gp-share-icons d-inline-block">
                                        <div id="share"></div>
                                       <!-- <a href="#" title="Twitter" class="gp-share-twitter"></a>
                                       <a href="#" title="Facebook" class="gp-share-facebook"></a>
                                       <a href="#" title="Google+" class="gp-share-google-plus"></a>
                                       <a href="#" title="LinkedIn" class="gp-share-linkedin"></a>
                                       <a href="#" class="gp-share-tumblr"></a>
                                       <a href="" title="Email" class="gp-share-email"></a> -->
                                   </div>
                                   <div class="hide-icons d-inline-block float-right mt-2">
                                    <i class="fa fa-times"></i>
                                   </div>
                               </div>
                               <div class="gp-clear"></div>
                           </div>
                            <header class="gp-entry-header">
                                <div class="gp-entry-cats">
                                    <a href="#">Sport</a>
                                </div>
                                <h1 class="gp-entry-title">{!! $post->title !!}</h1>
                                <div class="gp-entry-meta"> <span class="gp-post-meta gp-meta-avatar">
                                    <a href="http://socialize.ghostpool.com/author/socialize/">
                                        <img alt="" src="http://socialize.ghostpool.com/wp-content/uploads/avatars/2/31d53749448a096b43df20db6fdb94a8-bpthumb.jpg" srcset="http://socialize.ghostpool.com/wp-content/uploads/avatars/2/31d53749448a096b43df20db6fdb94a8-bpfull.jpg 2x" class="avatar avatar-50 photo" height="50" width="50">
                                    </a>
                                    </span>
                                    <span class="gp-post-meta-rows">
                                        <span class="gp-post-meta-row-1">
                                            <span class="gp-post-meta gp-meta-author">
                                                By
                                                <a href="http://socialize.ghostpool.com/author/socialize/">{{$post->author->name}}</a>
                                            </span>
                                            on
                                            <time class="gp-post-meta gp-meta-date" itemprop="datePublished" datetime="2015-06-07T14:18:24+00:00">{!! BBgetDateFormat(@$post->created_at) !!}</time>
                                        </span>
                                        <span class="gp-post-meta-row-2">
                                            <span class="gp-post-meta gp-meta-views">4282 views</span> </span> </span>
                                </div>
                            </header>
                            <div class="gp-entry-content gp-image-above">
                                <div class="gp-entry-text" itemprop="text">
                                    {!! $post->long_description !!}
                                </div>
                            </div>
                            <div class="gp-entry-tags">
                                <a href="http://socialize.ghostpool.com/tag/sport/" rel="tag">sport</a>
                                <a href="http://socialize.ghostpool.com/tag/surf/" rel="tag">surf</a>
                            </div>
                            <div id="gp-share-icons">
                                <h3>Share This Post</h3>
                                <div class="gp-share-icons-on-footer">
                                    <!-- <a href="#" title="Twitter" class="gp-share-twitter"></a>
                                    <a href="#" title="Facebook" class="gp-share-facebook"></a>
                                    <a href="#" title="Google+" class="gp-share-google-plus"></a>
                                    <a href="#" title="Pinterest" class="gp-share-pinterest" target="_blank"></a>
                                    <a href="#" title="Tumblr" class="gp-share-tumblr"></a>
                                    <a href="" title="Email" class="gp-share-email"></a> -->
                                </div>
                            </div>
                            <div class="gp-author-info">
                                <img alt="" src="http://socialize.ghostpool.com/wp-content/uploads/avatars/2/31d53749448a096b43df20db6fdb94a8-bpfull.jpg" srcset="http://socialize.ghostpool.com/wp-content/uploads/avatars/2/31d53749448a096b43df20db6fdb94a8-bpfull.jpg 2x" class="avatar avatar-110 photo" height="110" width="110">
                                <div class="gp-author-meta"><div class="gp-author-name">
                                        <a href="#">GhostPool</a>
                                    </div>
                                    <div class="gp-author-desc">
                                        Credibly embrace multidisciplinary paradigms and synergistic services. Phosfluorescently fabricate customer directed technologies after value-added infrastructures.
                                    </div>
                                    <div class="gp-author-social-icons">

                                    </div>
                                </div>
                            </div>
                            <div id="comments">
                                <div class="comment-area container">
                                    <div class="comment-heading">
                                        <h3>{{ $post->totalCommentCount() }} Thoughts</h3>
                                    </div>
                                    @if(count($post->comments))
                                        @foreach($post->comments  as $comment)
                                            <div class="single-comment">
                                                <div class="media">
                                                    <div class="media-left text-center">
                                                        <a href="#">
                                                            <img class="media-object img" src="{!! url('public/images/other.png') !!}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="media-heading">
                                                            <h3 class="text-uppercase">
                                                                <span>{{ $comment->user->name }}</span>
                                                                <a href="#" class="pull-right reply-btn">reply</a>
                                                            </h3>
                                                        </div>
                                                        <p class="comment-date">
                                                            {{ BBgetDateFormat($comment->created_at) }}
                                                        </p>
                                                        <p class="comment-p">
                                                            {{ $comment->comment }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            @if(count($comment->childrens))
                                                @foreach($comment->childrens as $child)
                                                    <div class="single-comment single-comment-reply">
                                                        <div class="media">
                                                            <div class="media-left text-center">
                                                                <a href="#"> <img class="media-object" src="http://www.sheebamagazine.com/wp-content/uploads/2016/03/2016-15-VOL-I-A-Bieber-WEB-620x805.jpg" alt=""></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <h3 class="text-uppercase"><a href="#">{{ $child->user->name }}</a></h3>
                                                                </div>
                                                                <p class="comment-date">
                                                                    {{ BBgetDateFormat($child->created_at) }}
                                                                </p>
                                                                <p class="comment-p">
                                                                    {{ $child->comment }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif

                                </div>
                                <div class="leave-comment">
                                    <h4>Leave a reply</h4>
                                    {!! Form::open(['class' => 'form-horizontal contact-form','route' => 'comment_create_post']) !!}
                                        {!! Form::hidden('post_id',$post->id) !!}
                                        {!! Form::hidden('author_id',Auth::id()) !!}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="6" name="comment" placeholder="Write Massage" required=""></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn send-btn">Post Comment</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </article>
                    </div>
                </div>

                </div>
        </div>

@stop
@section('css')
    <link href={{asset("public/frontend/css/blog-single.css?v=".rand(111,999))}} rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="http://viima.github.io/jquery-comments/demo/css/jquery-comments.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
   <style>
   .hide-icons {
       cursor: pointer;
   }



   .top-comment {
       padding: 30px;
       background-color: #fff;
       color: #444;
       margin-bottom: 20px;
       border: 1px solid #eee;
       overflow: hidden;
   }

   .top-comment img {
       margin-right: 15px;
       width: 109px;
       height: 109px;
       object-fit: cover;
   }

   .top-comment p {
       line-height: 24px;
   }

   .top-comment h4 a:hover {
       color: #da521e;
   }

   .top-comment .social-share {
       margin-bottom: 0;
       margin-top: -5px;
   }

   .top-comment .social-share li {
       margin-bottom: 0;
   }

   .top-comment .social-share li a {
       color: #c2c2c2;
   }

   .top-comment .social-share li a:hover {
       color: #da521e;
   }

   .comment-area {
       background: #fff;
       border-radius: 4px;
       border: 1px solid #e2e2e2;
       margin-bottom: 60px;
       padding: 50px;
   }

   .comment-area .comment-heading h3 {
       font-size: 18px;
       padding-bottom: 14px;
   }

   .comment-area .single-comment {
       padding-bottom: 25px;
   }

   .comment-area .single-comment .media {
       margin-top: 0;
   }

   .comment-area .single-comment .media-left {
       padding-right: 15px;
       float: left;
   }

   .comment-area .single-comment .media-left img {
       width: 60px;
       height: 60px;
       object-fit: cover;
   }

   .comment-area .single-comment .media-body h3 {
       font-size: 14px;
       margin: 0;
       padding-bottom: 5px;
   }

   .comment-area .single-comment .media-body h3 .reply-btn {
       background: #eee;
       color: #777;
       display: inline-block;
       font-size: 12px;
       height: 30px;
       line-height: 30px;
       text-align: center;
       width: 60px;
   }

   .comment-area .single-comment .media-body h3 .reply-btn:hover {
       background: #da521e;
       color: #fff;
   }

   .comment-area .single-comment .media-body .comment-date {
       color: #888888;
   }

   .comment-area .single-comment .media-body .comment-p {
       font-size: 14px;
       line-height: 24px;
   }

   .comment-area .single-comment-reply {
       margin-left: 30px;
   }

   .leave-comment {
       background-color: #fff;
       border: 1px solid #e2e2e2;
       margin-bottom: 60px;
       padding: 20px;
       color: #212121;
   }

   .leave-comment h4 {
       color: #444;
       font-size: 14px;
       text-transform: uppercase;
       font-weight: 700;
   }

   .leave-comment .contact-form .form-control {
       background-color: #FAFAFA;
       color: #999999;
       border-radius: 0;
       font-size: 14px;
       line-height: 28px;
       padding: 20px;
       border-color: #eee;
       -webkit-box-shadow: inset 0 0 0 rgba(0, 0, 0, 0.075);
       box-shadow: inset 0 0 0 rgba(0, 0, 0, 0.075);
   }

   .leave-comment .contact-form .form-control:focus {
       box-shadow: none;
       border-color: #da521e;
   }

   .leave-comment .send-btn {
       background: #333;
       color: #fff;
       font-family: "Oswald", sans-serif;
       letter-spacing: 1px;
       text-transform: uppercase;
       -webkit-transition: all .33s;
       transition: all .33s;
       border-radius: 0;
   }

   .leave-comment .send-btn:hover {
       background: #da521e;
   }
   </style>
@stop

@section("js")
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="http://viima.github.io/jquery-comments/demo/js/jquery-comments.js"></script>
    <script>

         window.AjaxCall = function postSendAjax(url, data, success, error) {
            $.ajax({
                type: "post",
                url: url,
                cache: false,
                datatype: "json",
                data: data,
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    if (success) {
                        success(data);
                    }
                    return data;
                },
                error: function(errorThrown) {
                    if (error) {
                        error(errorThrown);
                    }
                    return errorThrown;
                }
            });
        };


const  comment = {
     init: function(data){
         $('#comments-container').comments({
             getComments: function(success, error) {
                 AjaxCall(`/get-comments`, data, function(res){
                     if (!res.error) {
                         success(res.data);
                     }

                 })
             }
         });
     }
}
// comment.init({
//     'comentable':'Posts',
//     'id':'1'
// })


document.querySelector(".jquery-comments .save").addEventListener("click", function(e){
    e.stopPropagation();
    const user = {auth: false}
    if (user.auth) {
        let container = document.querySelector(".jquery-comments .textarea");
        let text = container.textContent;
        container.innerHTML = "";    
    }else {
        alert("you need register")
    }
    

})
    </script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
$("#share").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
});
$(".gp-author-social-icons").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
});
$(".gp-share-icons-on-footer").jsSocials({
            shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "whatsapp"]
});
$("body").on("click", ".gp-share-button, .hide-icons", function(){
    $("#gp-share-icons-hide").toggle()
})
</script>

@stop