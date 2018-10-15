@extends('layouts.frontend')
@section('content')
    <div class="container blog-area">
        <div class="row">
            <div class="toolbar mb-3">
                <div class="form-inline">
                    <div class="form-group col-12 col-md-4">
                        <label class="col-sm-12 col-lg-5 col-form-label">Display</label>
                        <div class="col-sm-12 col-lg-7 btn-group">
                            <a href="javascript:void(0);" id="grid_news" class="btn btn-default active change-view-blog"> <i class="fa fa-th-large" aria-hidden="true"></i> </a>
                            <a href="javascript:void(0);" id="list_news" class="btn btn-default change-view-blog"> <i class="fa fa-list" aria-hidden="true"></i> </a>
                        </div>
                    </div>
                    <div class="form-group col-12 col-md-4 center">
                        <label class="col-sm-12 col-lg-4 col-form-label">Sort</label>
                        <select class="col-sm-12 col-lg-6 form-control sortbynews" name="type">
                            <option value="desc" selected="">Newest</option>
                            <option value="asc">Oldest</option>
                            <option value="atoz">A - Z</option>
                            <option value="ztoa">Z - A</option>
                        </select>
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label class="col-sm-12 col-lg-4 col-form-label">Limit</label>
                        <select class="col-sm-12 col-lg-4 form-control sortbynews" name="limit">
                            <option value="16" selected="">16</option>
                            <option value="32">32</option>
                            <option value="64">64</option>
                        </select>
                        <label class="col-sm-12 col-lg-4 col-form-label">per page</label>
                    </div>
                </div>
            </div>
            <div class="blogs blogs-4x" id="listing-news" style="">

                @foreach($posts as $post)
                <div class="blog-post">
                    <article>
                        <a href="{!! post_url($post) !!}" class="d-block blog-post_link">
                            <span href="http://e-cigar.loc/blog/test" class="d-inline-block blog-thumb">

                            <span class="blog-date">
                                <strong>{!! BBgetDateFormat($post->created_at,'d') !!}</strong>{!! BBgetDateFormat($post->created_at,'M') !!}
                            </span>

                                <img class="img-fluid" src="http://demo.laravelcommerce.com/resources/assets/images/news_images/1504015363.about_contact_pages.svg" alt="About &amp; Contact Pages">
                            </span>

                            <span class="d-block blog-block">
                                <span class="blog-title">{!! $post->post_title !!} </span>


                                <span class="d-block blog-text">
                                    <span class="txt">{!! $post->short_description !!}</span>
                                </span>
                                <span class="blog-link">Readmore</span>
                            </span>
                        </a>
                    </article>
                </div>
                @endforeach
            </div>
            <div class="mx-auto pt-5">
                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                      <span class="page-link">
                        2
                            <span class="sr-only">(current)</span>
                        </span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    @stop

@section("js")
<script>
    $("body").on("click", ".change-view-blog", function (e) {
        e.preventDefault()
        $(".change-view-blog").removeClass("active")
        $(this).addClass("active")
        if($(this).attr("id") === "list_news"){
            $(".blogs").addClass("blogs-list")
        }else {
            $(".blogs").removeClass("blogs-list")
        }
    })
</script>

@stop