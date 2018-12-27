@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="d-flex h-100">
    @include('frontend._partials.left_bar')
    <div class="main-right-wrapp">
        <div class="container mt-5">
            <div class="row">
                @foreach(Auth::user()->favorites as $favorite)
                    <div class="col-sm-4 items">
                        <div class="view-fav-item mb-4">
                            <button class="btn btn-danger view-fav-item_btn-dlt pull-right remove-from-favorite"
                                    data-id="{!! $favorite->id !!}" href="#"><i class="fa fa-trash"></i></button>
                            <a href="{!!  route('product_single',[$favorite->type,$favorite->slug]) !!}"
                               class="text-center  px-5 py-3 d-flex flex-column d-block">
                        <span class="d-inline-block mb-3 view-fav-item_img-outer">
                            <img class="img-fluid"
                                 src="{!! url($favorite->image) !!}"
                                 alt="{!! $favorite->name !!}">
                        </span>
                                <span class="text-my-yellow">{!! $favorite->name !!}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
            @include('frontend.my_account._partials.verify_bar')

        </div>
    </main>
@stop
@section('js')
    <script>
        $(function () {
            $('.remove-from-favorite').on('click', function () {

                let data = {'id': $(this).attr('data-id')}
                $(this).closest(".items").remove();
                $.ajax({
                    type: "POST",
                    url: "{!! route('product_remove_from_favorites') !!}",
                    datatype: "json",
                    data: data,
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {


                        }
                    }
                });
            })
        })
    </script>
@stop