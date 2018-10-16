@extends('layouts.frontend')
@section('content')
        <div id="gp-inner-container" style="transform: none;">
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
                                   <div class="gp-share-icons" style="display: inline-block">
                                        <div id="share"></div>
                                       <!-- <a href="#" title="Twitter" class="gp-share-twitter"></a>
                                       <a href="#" title="Facebook" class="gp-share-facebook"></a>
                                       <a href="#" title="Google+" class="gp-share-google-plus"></a>
                                       <a href="#" title="LinkedIn" class="gp-share-linkedin"></a>
                                       <a href="#" class="gp-share-tumblr"></a>
                                       <a href="" title="Email" class="gp-share-email"></a> -->
                                   </div>
                                   <div class="hide-icons" style="display: inline-block; float: right; margin-top: 10px;">
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
                                <div id="respond" class="comment-respond">
                                    <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small>
                                            <a rel="nofollow" id="cancel-comment-reply-link" href="/featured-news/dale-webster-takes-a-break-after-14642-consecutive-days/#respond" style="display:none;">Cancel Reply</a></small>
                                    </h3>
                                    <form method="post" id="commentform" class="comment-form">
                                        <p class="comment-notes">
                                            Your email address will not be published. Required fields are marked <span class="required">*</span></p>
                                        <p class="comment-form-comment">
                                            <label for="comment">Comment</label>
                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                        </p>
                                        <p class="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes:
                                            <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;s&gt; &lt;strike&gt; &lt;strong&gt;
                                            </code>
                                        </p>
                                        <p class="comment-form-author">
                                            <input id="author" name="author" type="text" value="" size="30" placeholder="Name *" aria-required="true"></p>
                                        <p class="comment-form-email"><input id="email" name="email" type="text" value="" size="30" placeholder="Email *" aria-required="true"></p>
                                        <p class="comment-form-url">
                                            <input id="url" name="url" type="text" value="" size="30" placeholder="Website"></p>
                                        <p class="form-submit">
                                            <input name="submit" type="submit" id="submit" class="submit" value="Post Comment">
                                            <input type="hidden" name="comment_post_ID" value="3513" id="comment_post_ID">
                                            <input type="hidden" name="comment_parent" id="comment_parent" value="0"></p>
                                        <p style="display: none;">
                                            <input type="hidden" id="akismet_comment_nonce" name="akismet_comment_nonce" value="c69e824df6">
                                        </p>
                                        <input type="hidden" id="ak_js" name="ak_js" value="1539328157045">
                                    </form>
                                </div>
                            </div>
                            <div id="comments-container"></div>
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
   </style>
@stop

@section("js")
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="http://viima.github.io/jquery-comments/demo/js/jquery-comments.js"></script>
    <script>
        var commentsArray = [
{
   "id": 1,
   "parent": null,
   "created": "2015-01-01",
   "modified": "2015-01-01",
   "content": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.",
   "pings": [],
   "creator": 6,
   "fullname": "Simon Powell",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": false,
   "upvote_count": 3,
   "user_has_upvoted": false,
   "is_new": false
},
{
   "id": 2,
   "parent": null,
   "created": "2015-01-02",
   "modified": "2015-01-02",
   "content": "Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.",
   "pings": [],
   "creator": 5,
   "fullname": "Administrator",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": true,
   "created_by_current_user": false,
   "upvote_count": 2,
   "user_has_upvoted": false,
   "is_new": false
},
{
   "id": 3,
   "parent": null,
   "created": "2015-01-03",
   "modified": "2015-01-03",
   "content": "@Hank Smith sed posuere interdum sem.\nQuisque ligula eros ullamcorper https://www.google.com/ quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget #velit.",
   "pings": [3],
   "creator": 1,
   "fullname": "You",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": true,
   "upvote_count": 2,
   "user_has_upvoted": true,
   "is_new": false
},
{
   "id": 4,
   "parent": 3,
   "created": "2015-01-04",
   "modified": "2015-01-04",
   "file_url": "http://www.w3schools.com/html/mov_bbb.mp4",
   "file_mime_type": "video/mp4",
   "creator": 4,
   "fullname": "Todd Brown",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": false,
   "upvote_count": 0,
   "user_has_upvoted": false,
   "is_new": true
},
{
   "id": 5,
   "parent": 4,
   "created": "2015-01-05",
   "modified": "2015-01-05",
   "content": "Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.",
   "pings": [],
   "creator": 3,
   "fullname": "Hank Smith",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": false,
   "upvote_count": 0,
   "user_has_upvoted": false,
   "is_new": true
},
{
   "id": 6,
   "parent": 1,
   "created": "2015-01-06",
   "modified": "2015-01-06",
   "content": "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.",
   "pings": [],
   "creator": 2,
   "fullname": "Jack Hemsworth",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": false,
   "upvote_count": 1,
   "user_has_upvoted": false,
   "is_new": false
},
{
   "id": 7,
   "parent": 1,
   "created": "2015-01-07",
   "modified": "2015-01-07",
   "content": "Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.",
   "pings": [],
   "creator": 5,
   "fullname": "Administrator",
   "profile_picture_url": "https://app.viima.com/static/media/user_profiles/admin-user-icon.png",
   "created_by_admin": true,
   "created_by_current_user": false,
   "upvote_count": 0,
   "user_has_upvoted": false,
   "is_new": false
},
{
   "id": 8,
   "parent": 6,
   "created": "2015-01-08",
   "modified": "2015-01-08",
   "content": "Sed posuere interdum sem. Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu.",
   "pings": [],
   "creator": 1,
   "fullname": "You",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": true,
   "upvote_count": 0,
   "user_has_upvoted": false,
   "is_new": false
},
{
   "id": 9,
   "parent": 8,
   "created": "2015-01-09",
   "modified": "2015-01-10",
   "content": "Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.",
   "pings": [],
   "creator": 7,
   "fullname": "Bryan Connery",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": false,
   "upvote_count": 0,
   "user_has_upvoted": false,
   "is_new": false
},
{
   "id": 10,
   "parent": 9,
   "created": "2015-01-10",
   "modified": "2015-01-10",
   "content": "Quisque ligula eros ullamcorper quis, lacinia quis facilisis sed sapien. Mauris varius diam vitae arcu. Sed arcu lectus auctor vitae, consectetuer et venenatis eget velit.",
   "pings": [],
   "creator": 1,
   "fullname": "You",
   "profile_picture_url": "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png",
   "created_by_admin": false,
   "created_by_current_user": true,
   "upvote_count": 0,
   "user_has_upvoted": false,
   "is_new": false
}
]

var usersArray = [
   {
      id: 1,
      fullname: "Current User",
      email: "current.user@viima.com",
      profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
   },
   {
      id: 2,
      fullname: "Jack Hemsworth",
      email: "jack.hemsworth@viima.com",
      profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
   },
   {
      id: 3,
      fullname: "Hank Smith",
      email: "hank.smith@viima.com",
      profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
   },
   {
      id: 4,
      fullname: "Todd Brown",
      email: "todd.brown@viima.com",
      profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
   },
   {
      id: 5,
      fullname: "Administrator",
      email: "administrator@viima.com",
      profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
   },
   {
      id: 6,
      fullname: "Simon Powell",
      email: "simon.powell@viima.com",
      profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
   },
   {
      id: 7,
      fullname: "Bryan Connery",
      email: "bryan.connery@viima.com",
      profile_picture_url: "https://viima-app.s3.amazonaws.com/media/public/defaults/user-icon.png"
   }
]

$('#comments-container').comments({
    getComments: function(success, error) {
        
        success(commentsArray);
    }
});
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