@extends('layouts.frontend')
@section('content')
    <main class="main-content position-relative">
        <div class="d-flex">
            {{--@include('frontend._partials.left_bar')--}}

            {{--acoount sidebar--}}
            <div class="profile-sidebar profile-sidebar--inner-pages d-flex flex-column align-items-center">
                @include('frontend.my_account._partials.left_bar')
                <div class="mt-auto">
                    {!! Form::open(['url'=>route('logout')]) !!}
                    <div class="text-center">
                        <button type="submit"
                                class="profile-sidebar_logout-btn d-inline-flex align-items-center justify-content-center font-14 text-uppercase text-white pointer">
                            Logout
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="profile-inner-pg-right-cnt ticket__tab-wrapper">
                <div class="profile-inner-pg-right-cnt_inner h-100">
                    <div class="d-flex flex-wrap">
                        <div class="ticket__tab-wrapper-left-col">
                            <div class="ticket__tab-wrapper-left">
                                <div class="d-flex flex-wrap ticket__tab-top-wrap">
                                    <div class="ticket__tab-top-left">
                                        <div class="d-flex flex-wrap align-items-center ticket__tab-top-head">
                                            <a class="ticket__tab-top-head-back"
                                               href="{!! route('my_account_tickets') !!}">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="10px" height="13px" viewBox="0 0 10 13">
                                                    <path fill-rule="evenodd" fill="rgb(53, 53, 53)"
                                                          d="M-0.000,7.000 L10.000,13.000 C10.000,13.000 10.000,11.738 10.000,10.000 C9.031,9.578 4.000,7.000 4.000,7.000 C4.000,7.000 9.156,3.553 10.000,3.000 C10.000,1.262 10.000,-0.000 10.000,-0.000 L-0.000,7.000 Z"/>
                                                </svg>
                                            </a>
                                            <h1 class="font-sec-reg font-28 lh-1 text-tert-clr ticket__tab-top-head-title mb-0">
                                                Order is not received </h1>
                                            <span
                                                class="font-main-bold font-16 lh-1 bg-red-clr text-sec-clr ticket__tab-top-head-status">Urgent</span>
                                        </div>
                                        <div class="d-flex flex-wrap ticket__tab-top-left-content-wrap">
                                            <div class="ticket__tab-top-left-user">
                                                <img src="/public/img/user-girl.jpg" alt="user"
                                                     class="ticket__tab-top-left-user-photo">
                                                <div class="text-center ticket__tab-top-left-user-info">
                                                    <p class="font-16 ticket__tab-top-left-user-by">Submitted by</p>
                                                    <h3 class="font-main-bold font-20 lh-1 ticket__tab-top-left-user-title">
                                                        User Name</h3>
                                                </div>

                                            </div>
                                            <div class="d-flex flex-column ticket__tab-top-left-content">
                                                <p class="font-main-light font-16 ticket__tab-top-left-content-txt">Best
                                                    knowm as the Tesla TPOD, this vape pod system changes the pod kit
                                                    game.
                                                    This all-in-one vape is easy to use and features ceramic coil pod
                                                    cartridges that work with oil concentrates and e-liquids.
                                                    This premium pod kit makes a great oil vaporizer or salt nic vape.
                                                    The
                                                    T-POD battery mod.</p>
                                                <div class="mt-auto attachments">
                                                <span class="title">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        width="21px" height="41px" viewBox="0 0 21 41">
<path fill-rule="evenodd" fill="rgb(53, 53, 53)"
      d="M20.150,27.150 C19.681,27.150 19.300,26.768 19.300,26.296 L19.300,10.555 C19.300,5.677 15.353,1.708 10.500,1.708 C5.647,1.708 1.699,5.677 1.699,10.555 L1.699,17.203 C1.699,17.203 1.699,17.203 1.699,17.203 L1.699,33.434 C1.699,36.664 4.313,39.292 7.526,39.292 C10.739,39.292 13.353,36.664 13.353,33.434 L13.353,24.447 L13.353,17.203 L13.353,11.714 C13.353,10.167 12.100,8.908 10.561,8.908 C9.021,8.908 7.769,10.167 7.769,11.714 L7.769,24.447 C7.769,24.918 7.388,25.301 6.919,25.301 C6.450,25.301 6.069,24.918 6.069,24.447 L6.069,11.714 C6.069,9.225 8.084,7.199 10.561,7.199 C13.037,7.199 15.052,9.225 15.052,11.714 L15.052,17.202 C15.052,17.202 15.052,17.203 15.052,17.203 L15.052,33.434 C15.052,37.606 11.676,41.000 7.526,41.000 C3.376,41.000 0.000,37.606 0.000,33.434 L0.000,26.297 C0.000,26.296 -0.000,26.296 -0.000,26.296 L-0.000,10.555 C-0.000,4.735 4.710,-0.000 10.500,-0.000 C16.290,-0.000 21.000,4.735 21.000,10.555 L21.000,26.296 C21.000,26.768 20.619,27.150 20.150,27.150 Z"/>
</svg>
                                                </span>
                                                    <ul>
                                                        @if(count($ticket->attachments))
                                                            @foreach($ticket->attachments as $attachment)
                                                                @if($attachment->type == 'image')
                                                                    <li class="item-attach">
                                                                        <img src="{{ $attachment->file_path }}" alt="">
                                                                    </li>
                                                                @elseif($attachment->type == 'document')
                                                                    <li class="item-attach">
                                                                        <iframe src="{{ $attachment->file_path }}"
                                                                                style="width: 100%;height: 100%;border: none;"></iframe>
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                            {{--<li class="item-attach">--}}
                                                            {{--<audio controls>--}}
                                                            {{--<source src="https://www.computerhope.com/jargon/m/example.mp3" />--}}
                                                            {{--</audio>--}}
                                                            {{--</li>--}}
                                                        @else
                                                            <li>No Attachments</li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ticket__tab-top-right">
                                        <div class="card card account-card rounded-0 border-left-0">
                                            <div
                                                class="d-flex align-items-center justify-content-center card-title font-20">
                                                {{--                                            <span class="d-inline-block mb-3"> {{ $ticket->subject }}</span>--}}
                                                <span class="icon">
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    width="19px" height="15px" viewBox="0 0 19 15">
<path fill-rule="evenodd" fill="rgb(255, 255, 255)"
      d="M6.045,11.866 L1.511,7.164 L-0.000,8.731 L6.045,15.000 L19.000,1.567 L17.488,-0.000 L6.045,11.866 Z"/>
</svg>
                                            </span>
                                                {!! Form::open(['url' => route('my_account_tickets_mark_completed',$ticket->id)]) !!}
                                                {!! Form::submit('Mark as completed',['class' => 'ntfs-btn']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="panel-body card-body">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 pr-0">
                                                        <span>Category:</span>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                    <span
                                                        class="font-main-bold text-tert-clr">{{ $ticket->category->name }}</span>
                                                    </div>
                                                </div>
                                                @if($ticket->category && $ticket->category->slug == 'order')
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 pr-0">
                                                            <span>Order Number:</span>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                        <span
                                                            class="font-main-bold text-tert-clr">{{ $ticket->order->order_number }}</span>
                                                        </div>
                                                    </div>
                                                @elseif($ticket->category && $ticket->category->slug == 'product')
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 pr-0">
                                                            <span>Product</span>
                                                        </div>
                                                        <div class="col-sm-6 ">
                                                        <span
                                                            class="font-main-bold text-tert-clr">{{ $ticket->product->name }}</span>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="form-group row">
                                                    <div class="col-sm-6 pr-0">
                                                        <span>Status:</span>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                    <span
                                                        class="font-main-bold text-green-clr">{{ $ticket->status->name }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 pr-0">
                                                        <span>Responsible:</span>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                    <span
                                                        class="font-main-bold ">{{ ($ticket->staff) ? $ticket->staff->name : 'not assigned yet' }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 pr-0">
                                                        <span>Created:</span>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                    <span
                                                        class="font-main-bold ">{!! time_ago($ticket->created_at) !!}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 pr-0">
                                                        <span>Last Update:</span>
                                                    </div>
                                                    <div class="col-sm-6 ">
                                                    <span
                                                        class="font-main-bold">{!! time_ago($ticket->updated_at) !!}</span>
                                                    </div>
                                                </div>
                                                {{--                                            <p>--}}
                                                {{--                                                <strong>Owner</strong>: {{ $ticket->author->name }}--}}
                                                {{--                                            </p>--}}

                                                {{--                                            @if($ticket->priority)--}}
                                                {{--                                                <p>--}}
                                                {{--                                                    <strong>Priority</strong>:--}}
                                                {{--                                                    <span class="badge"--}}
                                                {{--                                                          style="color: #069900">{{ $ticket->priority->name }}</span>--}}
                                                {{--                                                </p>--}}
                                                {{--                                            @endif--}}


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments__wrapper">
                                    <div class="comment-block">
                                        <div class="comment-block-inner new__scroll">
                                            <div class="d-flex comment-first">
                                                <div class="user-photo">
                                                    <svg width="39px" height="39px" viewBox="0 0 39 39">
                                                        <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                                              d="M33.289,25.211 C31.165,23.087 28.637,21.515 25.879,20.563 C28.833,18.529 30.773,15.124 30.773,11.273 C30.773,5.057 25.716,-0.000 19.500,-0.000 C13.284,-0.000 8.227,5.057 8.227,11.273 C8.227,15.124 10.167,18.529 13.121,20.563 C10.363,21.515 7.835,23.087 5.711,25.211 C2.028,28.895 -0.000,33.791 -0.000,39.000 L3.047,39.000 C3.047,29.928 10.428,22.547 19.500,22.547 C28.572,22.547 35.953,29.928 35.953,39.000 L39.000,39.000 C39.000,33.791 36.972,28.895 33.289,25.211 ZM19.500,19.500 C14.964,19.500 11.273,15.810 11.273,11.273 C11.273,6.737 14.964,3.047 19.500,3.047 C24.036,3.047 27.727,6.737 27.727,11.273 C27.727,15.810 24.036,19.500 19.500,19.500 Z"/>
                                                    </svg>
                                                </div>
                                                <div class="comment-first-info">
                                                    <div
                                                        class="d-flex justify-content-between font-16 comment-info-head comment-first-info-head">
                                                        <span>Admin, 15:36</span>
                                                        <span class="comment-first-info-date">11/07/2019</span>
                                                    </div>

                                                    <div class="bg-blue-clr comment-info-text-wrap">
                                                        <p class="mb-0 lh-1 font-16">Your ticket is already under
                                                            process</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-infos text-center">
                                                <div class="d-inline-flex align-items-center comment-infos-inner">
                                            <span class="icon">
                                                <img src="/public/img/comment-repeat-icon.png" alt="icon">
                                            </span>
                                                    <p class="font-main-bold font-16 mb-0 lh-1">10/07/2019, Admin has
                                                        Resigned responsibility to Vahag</p>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end comment-second">
                                                <div class="comment-second-info">
                                                    <div
                                                        class="d-flex font-16 comment-info-head comment-first-info-head">
                                                        <span>User Name, 12:15</span>
                                                    </div>

                                                    <div class="comment-info-text-wrap">
                                                        <p class="mb-0 lh-1 font-16">My order number is AMO-C2A7046</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-send-block">
                                        {!! Form::open(['url' => 'admin_tickets_reply']) !!}
                                        {!! Form::hidden('ticket_id',$ticket->id) !!}
                                        <div class="comment-send-block-user-img">
                                            <img src="/public/images/male.png" alt="user">
                                        </div>
                                        <div class="area-wrap">
                                        <textarea name="reply" id="" rows="0"
                                                  placeholder="Your reply"
                                                  class="add-comment_field form-control w-100"></textarea>
                                            <span class="icon">
<svg
    xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink"
    width="16px" height="38px" viewBox="0 0 16 38">
<path fill-rule="evenodd" opacity="0.769" fill="rgb(53, 53, 53)"
      d="M15.353,25.164 C14.995,25.164 14.705,24.809 14.705,24.372 L14.705,9.783 C14.705,5.261 11.697,1.583 8.000,1.583 C4.303,1.583 1.295,5.261 1.295,9.783 L1.295,15.944 C1.295,15.944 1.295,15.944 1.295,15.945 L1.295,30.988 C1.295,33.981 3.286,36.417 5.734,36.417 C8.182,36.417 10.173,33.981 10.173,30.988 L10.173,22.658 L10.173,15.945 L10.173,10.857 C10.173,9.423 9.219,8.256 8.046,8.256 C6.873,8.256 5.919,9.423 5.919,10.857 L5.919,22.658 C5.919,23.095 5.629,23.450 5.272,23.450 C4.914,23.450 4.624,23.095 4.624,22.658 L4.624,10.857 C4.624,8.550 6.159,6.673 8.046,6.673 C9.933,6.673 11.468,8.550 11.468,10.857 L11.468,15.943 C11.468,15.944 11.468,15.944 11.468,15.945 L11.468,30.988 C11.468,34.855 8.896,38.000 5.734,38.000 C2.572,38.000 0.000,34.855 0.000,30.988 L0.000,24.373 C0.000,24.372 -0.000,24.372 -0.000,24.372 L-0.000,9.783 C-0.000,4.389 3.589,0.000 8.000,0.000 C12.411,0.000 16.000,4.389 16.000,9.783 L16.000,24.372 C16.000,24.809 15.710,25.164 15.353,25.164 Z"/>
</svg>
                                        </span>
                                        </div>

                                        <span
                                            class="error-box invalid-feedback comment"></span>

                                        <button type="button"
                                                class="btn font-18 text-uppercase ntfs-btn add-comment-btn rounded-0">
                                            Send
                                        </button>

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-md-6">--}}

                            {{--                                    <div class="col-md-12">--}}
                            {{--                                        <div class="tickets-comments">--}}
                            {{--                                            <div class="row user-comment-img user-commmet-add">--}}
                            {{--                                                <div class="comments_wall">--}}
                            {{--                                                    <h2 class="ticket-reply-title font-25 mb-4">Reply</h2>--}}
                            {{--                                                    <div class="divider"></div>--}}
                            {{--                                                    <div class="user-add-comment mb-4">--}}
                            {{--                                                        <div class="row">--}}
                            {{--                                                            <div class="col-sm-2">--}}

                            {{--                                                            </div>--}}
                            {{--                                                            <div class="col-sm-10">--}}
                            {{--                                                                <div class="add-comment">--}}

                            {{--                                                                </div>--}}
                            {{--                                                            </div>--}}
                            {{--                                                        </div>--}}
                            {{--                                                    </div>--}}
                            {{--                                                    <div class="comments-refresh">--}}
                            {{--                                                        @include('admin.ticket._partials.comments')--}}
                            {{--                                                    </div>--}}
                            {{--                                                </div>--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}

                            {{--                                <div class="col-md-3">--}}
                            {{--                                    <div class="col-md-12">--}}
                            {{--                                        <p></p>--}}
                            {{--                                        <p>{!! $ticket->summary !!}</p>--}}
                            {{--                                        <p></p>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                        <div class="ticket__tab-wrapper-right-col">
                            <div class="ticket__tab-wrapper-right">
                                <a href="#" class="d-block">
                                    <img src="/public/img/temp/ads-product-2.jpg" alt="ads" class="ads-img">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{--@include('frontend.my_account._partials.verify_bar.blade_old.php')--}}

        </div>
    </main>
@stop

@section('css')
    <style>
        .attachments {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top: auto;
        }

        .attachments span.title {
            margin-right: 15px;
            font-weight: bold;
        }

        .attachments ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .attachments ul .item-attach {
            width: 90px;
            height: 70px;
            border: 1px solid #ccc;
            box-shadow: 0 0 2px #b3b1b1;
            overflow: hidden;
            margin-right: 5px;
            margin-bottom: 3px;
        }

        .attachments ul .item-attach > * {
            width: 100%;
        }

        .attachments ul .item-attach img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('body').on('click', '.cancel-comment', function (event) {
                $(this).parents('form:first')[0].reset();
            });

            $('body').on('click', '.cancel-reply', function (event) {
                $(this).parents('.user-add-comment').remove();
            });

            $('body').on('click', '.add-comment-btn', function (event) {
                event.preventDefault();
                var form = $(this).parents('form:first');
                var data = form.serialize();
                $.ajax({
                    url: "{!! route('admin_tickets_reply') !!}",
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        $('.error-box').html('');
                        if (data.success == false) {
                            $.map(data.errors, function (k, v) {
                                form.find('.' + v).text(k[0]);
                            });
                        } else {
                            form[0].reset();
                            $(".user-add-comment-secondry").remove();

                            $("#msgModal .message-place").text(data.message);
                            $("#msgModal").modal();

                            $(".comments-refresh").html(data.html);
                        }
                    },
                    error: function (data) {
                        // alert(data.err);
                    }
                });
            });


            $('body').on('click', '.reply', function (e) {
                e.preventDefault();
                $(".user-add-comment-secondry").remove();
                var parentID = $(this).data('id');
                var data = '<div class="user-add-comment user-add-comment-secondry w-100 mt-md-5 my-4">\n' +
                    '                                    <div class="row m-0">\n' +
                    '                                        <div class="col-sm-12">\n' +
                    '                                            <div class="add-comment">\n' +
                    '                                            {!! Form::open(["route" => "admin_tickets_reply"]) !!}\n' +
                    '                            {!! Form::hidden("ticket_id",$ticket->id) !!}\n' +
                    '                        <input type="hidden" name="parent_id" value="' + parentID + '" />\n' +
                    '\n' +
                    '                        <textarea name="reply" id="" rows="0"\n' +
                    '                                  placeholder="Your reply"></textarea>\n' +
                    '                        <span class="error-box invalid-feedback comment"></span>\n' +
                    '                        <div class="row mt-1">\n' +
                    '                            <div class="col-sm-6">\n' +
                    '<button type="button" class="btn btn-outline-warning btn-block cancel-reply">Cancel </button>\n' +
                    '                            </div>\n' +
                    '                            <div class="col-sm-6 text-right">\n' +
                    '                                <button type="button"\n' +
                    '                                        class="btn btn-outline-warning add-comment-btn">\n' +
                    '                                    Submit\n' +
                    '                                </button>\n' +
                    '                            </div>\n' +
                    '                        </div>\n' +
                    '{!! Form::close() !!}\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>';
                $(this).closest(".user-comment-img").append(data);
                $(this).closest(".user-comment-img").addClass("user-commmet-add")

            })
        });
    </script>
@stop
