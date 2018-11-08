@extends('layouts.admin')
@section('content-header')
@stop
@section('content')
    <section class="content tickets-edit-page">
        <h2>Edit ticket</h2>
        {!! Form::model($model,['url' => route('admin_tickets_new_save'), 'id' => 'ticket_form','files' => true]) !!}
        {!! Form::hidden('id',null) !!}
        <div class="text-right btn-save">
            {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
        </div>
        <div class="row">
            <div class="col-md-9 ">
                <div class="subject-wall">
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <div class="user-image-name">
                                <div class="user-image">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRXrKQMyhxBra3SmOe6uPCmVHW_N3Xx2egM1P12VV3xC2fRrUXJ"
                                         alt="user">
                                </div>
                                <div class="user-name">
                                    User Name
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-xs-12">
                            <div class="user-content">
                                <h3>Subject here</h3>
                                <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A consequuntur
                                    dignissimos
                                    fuga incidunt nam quas sit voluptatibus, voluptatum. Amet, animi consequuntur dicta
                                    fugit illum incidunt itaque labore maxime molestias nesciunt nobis placeat possimus
                                    quam saepe sint sit voluptatem? Autem consequatur cum esse facilis perferendis
                                    possimus saepe tempore? Asperiores blanditiis commodi consectetur cumque cupiditate
                                    doloremque dolorum earum error excepturi fuga incidunt ipsa natus nihil nostrum
                                    numquam optio placeat praesentium quasi quidem quo quod reiciendis rem repellendus
                                    sed similique, sit soluta tenetur, totam ut vel. Incidunt maxime odit veniam!
                                    Adipisci aperiam dignissimos eos iusto magnam officiis quasi quibusdam veritatis!
                                    Adipisci, nemo sunt?</p>
                                <div class="attachments">
                                    <span class="title">Attachments</span>
                                    <ul>
                                        <li class="item-attach">
                                            <img src="http://dqudrat.com/wp-content/uploads/2018/08/25-1-10.jpg" alt="">
                                        </li>
                                        <li class="item-attach">
                                            <iframe src="https://eloquentjavascript.net/Eloquent_JavaScript.pdf" style="width: 100%;height: 100%;border: none;"></iframe>
                                        </li>
                                        <li class="item-attach">
                                            <audio controls>
                                                <source src="https://www.computerhope.com/jargon/m/example.mp3" />
                                            </audio>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line"></div>
                    <div class="subject-reply">
                        <div class="row">
                            <div class="col-md-3 col-xs-12">
                                <div class="title">
                                    Reply
                                </div>

                            </div>
                            <div class="col-md-9 col-xs-12">
                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="view-product-wall">
                    <div class="author-wall wall">
                        <div class="row form-group">
                            {{Form::label('author', 'Author',['class' => 'col-sm-3'])}}
                            <div class="col-sm-9">
                                Username
                            </div>
                        </div>
                    </div>
                    <div class="status-wall wall">
                        <div class="row form-group">
                            {{Form::label('status', 'Status',['class' => 'col-sm-3'])}}
                            <div class="col-sm-9">
                                {!! Form::select('status_id',$statuses,null,
                                            ['class' => 'form-control','id'=> 'status']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="tag-wall wall">
                        <div class="row form-group">
                            <label class="col-sm-3 control-label" for="input-category"><span
                                        data-toggle="tooltip" title=""
                                        data-original-title="Choose all products under selected category.">Tags</span></label>
                            <div class="col-sm-9">
                                <input type="text" name="" value="" placeholder="Tags"
                                       id="input-tags" class="form-control" autocomplete="off">
                                <ul class="dropdown-menu"></ul>
                                <div id="coupon-category" class="well well-sm view-coupon">
                                    <ul class="coupon-tags-list">
                                        @if($model && $model->tags)
                                            @php
                                                $tags = json_decode($model->tags, true);
                                            @endphp

                                            @foreach($tags as $tag)
                                                <li><span class="remove-search-tag"><i
                                                                class="fa fa-minus-circle"></i></span>{{ $tag }}
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                {!! Form::hidden('tags',null,['id' => 'tags-names','class' => 'search-hidden-input']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="status-wall wall">
                        <div class="row form-group">
                            {{Form::label('category_id', 'Category',['class' => 'col-sm-3'])}}
                            <div class="col-sm-9">
                                {!! Form::select('category_id',$categories,null,
                                            ['class' => 'form-control','id'=> 'category']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="status-wall wall">
                        <div class="row form-group">
                            {{Form::label('priority_id', 'Priority',['class' => 'col-sm-3'])}}
                            <div class="col-sm-9">
                                {!! Form::select('priority_id',$priorities,null,
                                            ['class' => 'form-control','id'=> 'priority']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="status-wall wall">
                        <div class="row form-group">
                            {{Form::label('staff', 'Responsible staff',['class' => 'col-sm-3'])}}
                            <div class="col-sm-9">
                                {!! Form::select('staff_id',$staff,null,
                                            ['class' => 'form-control','id'=> 'staff']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@stop
@section('css')
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')
@stop