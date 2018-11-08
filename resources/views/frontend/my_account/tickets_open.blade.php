@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_tickets'])
            </div>
            <div class="col-md-8">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Sorry!</strong> There were more problems with your equest.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {!! Form::model(null,['url' => route('my_account_tickets_new_post'), 'id' => 'ticket_form','files' => true]) !!}
                {!! Form::hidden('id',null) !!}
                <div class="text-right btn-save">
                    {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
                </div>
                <div class="row sortable-panels">
                    <div class="col-md-9 ">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            {!! Form::text('subject',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <label>Summary</label>
                                            {!! Form::textarea('summary',null,['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label class="col-sm-3">Attachments</label>
                                            <div class="col-sm-9">
                                                {!! Form::file('attachments[]',['multiple' => true]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="view-product-wall">
                            <div class="tag-wall wall">
                                <div class="row">
                                    <label class="col-sm-3 control-label" for="input-category"><span
                                                data-toggle="tooltip" title=""
                                                data-original-title="Choose all products under selected category.">Tags</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="" value="" placeholder="Tags"
                                               id="input-tags" class="form-control" autocomplete="off">
                                        <ul class="dropdown-menu"></ul>
                                        <div id="coupon-category" class="well well-sm view-coupon">
                                            <ul class="coupon-tags-list">
                                                @if(isset($model) && $model->tags)
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
                                <div class="row">
                                    {{Form::label('category_id', 'Category',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {!! Form::select('category_id',$categories,null,
                                                    ['class' => 'form-control','id'=> 'category']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="status-wall wall">
                                <div class="row">
                                    {{Form::label('priority_id', 'Priority',['class' => 'col-sm-3'])}}
                                    <div class="col-sm-9">
                                        {!! Form::select('priority_id',$priorities,null,
                                                    ['class' => 'form-control','id'=> 'priority']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.css">
    <link rel="stylesheet" href="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/custom.css?v='.rand(111,999))}}">
@stop
@section('js')

    <script src="https://phppot.com/demo/bootstrap-tags-input-with-autocomplete/typeahead.js"></script>
    <script src="{{asset('public/admin_theme/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="/public/admin_theme/blog_new.js"></script>
@stop