@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_tickets'])
            </div>
            <div class="col-md-8">
                <div class="col-md-12 mb-4">
                    <a class="btn btn-primary" href="{!! route('my_account_tickets') !!}">Back</a>
                </div>
                <div class="col-md-12">
                    <div class="content">
                        <div class="card well well-sm mb-5">
                            <h2 class="header card-header">
                                {{ $ticket->subject }}
                                <span class="pull-right">
                                    <a href="#"
                                       class="btn btn-success">Mark Complete</a>
                                                                </span>
                            </h2>
                            <div class="panel-body card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Owner</strong>: {{ $ticket->author->name }}</p>
                                        <p>
                                            <strong>Status</strong>:
                                            <span style="color: #e69900">{{ $ticket->status->name }}</span>

                                        </p>
                                        <p>
                                            <strong>Priority</strong>:
                                            <span style="color: #069900">{{ $ticket->priority->name }}</span>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Responsible</strong>: {{ ($ticket->staff) ? $ticket->staff->name : 'not assigned yet' }}</p>
                                        <p>
                                            <strong>Category</strong>:
                                            <span style="color: #0014f4">{{ $ticket->category->name }}</span>
                                        </p>
                                        <p><strong>Created</strong>: {!! time_ago($ticket->created_at) !!}</p>
                                        <p><strong>Last Update</strong>: {!! time_ago($ticket->updated_at) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--files--}}
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <a href="#" class="ticket-file-holder ticket-file-holder--img d-inline-block w-100 border">
                                    <img src="https://images.pexels.com/photos/236111/pexels-photo-236111.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="#" class="ticket-file-holder ticket-file-holder--img d-inline-block w-100 border">
                                    <img src="https://images.pexels.com/photos/236111/pexels-photo-236111.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="#" class="ticket-file-holder ticket-file-holder--img d-inline-block w-100 border">
                                    <img src="https://images.pexels.com/photos/236111/pexels-photo-236111.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="row user-comment-img user-commmet-add">
                            <div class="col-lg-1 col-md-1 hidden-xsd-none d-sm-block">
                                <figure class="thumbnail">
                                    <img class="img-fluid" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png">
                                    <figcaption class="text-center">User</figcaption>
                                </figure>
                            </div>
                            <div class="col-lg-11 col-md-11 comment-list">
                                <div class="card arrow arrow--ticket left mb-3">
                                    <div class="card-body">
                                        <header class="text-left">
                                            <div class="comment-user">
                                                <i class="fa fa-user">

                                                </i> That Guy
                                            </div>
                                            <time class="comment-date" datetime="2018-11-07 15:41:35"><i class="fa fa-clock-o"></i> 18 hours ago</time>
                                        </header>
                                        <div class="comment-post">
                                            <p>sedrth</p>
                                        </div>
                                        <p class="text-right">
                                            <a href="#" data-id="1" class="btn btn-secondary btn-sm reply">
                                                <i class="fa fa-reply"></i> reply</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="user-add-comment user-add-comment-secondry w-100">
                                <div class="row m-0">
                                    <div class="col-sm-12">
                                        <div class="add-comment card">
                                            <div class="card-body">
                                                <form method="POST" action="http://e-cigar.loc/add-comment" accept-charset="UTF-8">
                                                    <input name="_token" type="hidden" value="L5ACrwtj2dwIYk11ETP1ehp6xB1x7YHOlsjrfkVE">
                                                    <input name="post_id" type="hidden" value="1">
                                                    <input type="hidden" name="parent_id" value="1">

                                                    <textarea name="comment" id="" rows="5" placeholder="Your Reply"></textarea>
                                                    <span class="error-box invalid-feedback comment"></span>
                                                    <div class="row mt-1">
                                                        <div class="col-sm-6">
                                                            <button type="button" class="btn btn-outline-warning btn-block cancel-reply">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <button type="button" class="btn btn-outline-warning btn-block add-comment-btn">
                                                                Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <p></p>
                            <p>{!! $ticket->summary !!}</p>
                            <p></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@stop