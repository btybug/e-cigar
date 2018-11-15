@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-12 mb-4">
                    <a class="btn btn-primary" href="{!! route('my_account_tickets') !!}">Back</a>
                </div>
                <div class="col-md-12">
                    <div class="content">
                        <div class="attachments mb-2">
                            <span class="title">Attachments</span>
                            <ul>
                                @if(count($ticket->attachments))
                                    @foreach($ticket->attachments as $attachment)
                                        @if($attachment->type == 'image')
                                            <li class="item-attach">
                                                <img src="{{ $attachment->file_path }}" alt="">
                                            </li>
                                        @elseif($attachment->type == 'document')
                                            <li class="item-attach">
                                                <iframe src="{{ $attachment->file_path }}" style="width: 100%;height: 100%;border: none;"></iframe>
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
                        <div class="row user-comment-img user-commmet-add">
                            <div class="comments_wall">
                                <h2>Reply</h2>
                                <div class="divider"></div>
                                <div class="user-add-comment mt-md-5 my-4">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="user-img">
                                                <img src="/public/images/male.png" alt="">
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="add-comment">
                                                {!! Form::open(['url' => 'admin_tickets_reply']) !!}
                                                {!! Form::hidden('ticket_id',$ticket->id) !!}
                                                <textarea name="reply" id="" rows="0"
                                                          placeholder="Your reply"></textarea>
                                                <span class="error-box invalid-feedback comment"></span>
                                                <div class="row mt-1">
                                                    <div class="col-sm-6">
                                                        {{--<button type="button"--}}
                                                        {{--class="btn btn-outline-warning btn-block cancel-comment">--}}
                                                        {{--Cancel--}}
                                                        {{--</button>--}}
                                                    </div>
                                                    <div class="col-sm-6 text-right">
                                                        <button type="button"
                                                                class="btn btn-outline-warning add-comment-btn">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comments-refresh">
                                    @include('admin.ticket._partials.comments')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="col-md-12">
                    <p></p>
                    <p>{!! $ticket->summary !!}</p>
                    <p></p>
                </div>

                <div class="card well well-sm mb-5">
                    <h2 class="header card-header">
                        {{ $ticket->subject }}
                        {!! Form::open(['url' => route('my_account_tickets_mark_completed',$ticket->id)]) !!}
                            {!! Form::submit('Mark Complete',['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                    </h2>
                    <div class="panel-body card-body">
                        <p>
                            <strong>Owner</strong>: {{ $ticket->author->name }}
                        </p>
                        <p>
                            <strong>Status</strong>:
                            <span class="badge" style="color: #e69900">{{ $ticket->status->name }}</span>

                        </p>
                        <p>
                            <strong>Priority</strong>:
                            <span class="badge" style="color: #069900">{{ $ticket->priority->name }}</span>
                        </p>
                        <p><strong>Responsible</strong>: {{ ($ticket->staff) ? $ticket->staff->name : 'not assigned yet' }}</p>
                        <p>
                            <strong>Category</strong>:
                            <span class="badge" style="color: #0014f4">{{ $ticket->category->name }}</span>
                        </p>
                        <p><strong>Created</strong>: {!! time_ago($ticket->created_at) !!}</p>
                        <p><strong>Last Update</strong>: {!! time_ago($ticket->updated_at) !!}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('css')
    <style>
        .attachments {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-top:auto;
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
        .attachments ul .item-attach >*{
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