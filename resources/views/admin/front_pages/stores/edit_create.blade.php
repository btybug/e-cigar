@extends('layouts.admin')
@section('content')
    {!! Form::model(null,['url' => route('admin_new_post'), 'id' => 'post_form','files' => true]) !!}
    <div class="card panel panel-default bg-transparent border-0">
        <div class="card-header panel-heading d-flex flex-wrap justify-content-between align-items-center">
            <h2 class="m-0">{{"Add Store" }}</h2>
            <div class="btn-save mt-1">
                {!! Form::submit('Save',['class' => 'btn btn-info']) !!}
            </div>
        </div>
        <div class="card-body panel-body px-0">


            <div class="tab-content tabs_content">
                <div id="info" class="tab-pane tab_info fade in active show">
                    {!! Form::hidden('id',null) !!}
                    <div class="row sortable-panels">
                        <div class="col-lg-8 col-md-7 col-sm-8">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="card mb-3">
                                            <div class="card-header">
                                                Main
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    @if(count(get_languages()))
                                                        <ul class="nav nav-tabs tab_lang_horizontal">
                                                            @foreach(get_languages() as $language)
                                                                <li class="nav-item"><a class="nav-link @if($loop->first) active @endif" data-toggle="tab"
                                                                                        href="#{{ strtolower($language->code) }}">
                                                                        <span class="flag-icon flag-icon-{{ strtolower($language->code) }}"></span> {{ $language->code }}
                                                                    </a></li>
                                                            @endforeach
                                                        </ul>
                                                    @endif

                                                    <div class="tab-content">
                                                        @if(count(get_languages()))
                                                            @foreach(get_languages() as $language)
                                                                <div id="{{ strtolower($language->code) }}"
                                                                     class="tab-pane fade  @if($loop->first) in active show @endif">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-2 col-form-label">Title</label>
                                                                        <div class="col-md-10">
                                                                            {!! Form::text('translatable['.strtolower($language->code).'][title]',get_translated($shop,strtolower($language->code),'title'),['class'=>'form-control']) !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        {{Form::label('address', 'Address',['class'=>'col-md-2 col-form-label'])}}
                                                                        <div class="col-md-10">
                                                                            {{Form::text('translatable['.strtolower($language->code).'][address]', get_translated($shop,strtolower($language->code),'address'),['class' =>'form-control','id'=>'address','placeholder' => 'Enter address ...'])}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-2 col-form-label">Description</label>
                                                                        <div class="col-md-10">
                                                                            {!! Form::textarea('translatable['.strtolower($language->code).'][description]',get_translated($shop,strtolower($language->code),'description'),['class'=>'form-control','cols'=>30,'rows'=>2]) !!}
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-md-2 col-form-label">Director full name</label>
                                                                        <div class="col-md-10">
                                                                            {!! Form::textarea('translatable['.strtolower($language->code).'][director]',get_translated($shop,strtolower($language->code),'director'),['class'=>'form-control tinyMcArea','cols'=>30,'rows'=>10]) !!}

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                        <div class="form-group row">
                                                            {{Form::label('lang', 'Longitude ',['class'=>'col-md-2 col-form-label'])}}
                                                            <div class="col-md-10">
                                                                {{Form::text('long', null,['class' =>'form-control','id'=>'long','placeholder' => '45.038189'])}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{Form::label('lat', 'Latitude ',['class'=>'col-md-2 col-form-label'])}}
                                                            <div class="col-md-10">
                                                                {{Form::text('lat', null,['class' =>'form-control','id'=>'lat','placeholder' => '40.069099'])}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{Form::label('lat', 'Image ',['class'=>'col-md-2 col-form-label'])}}
                                                            <div class="col-md-10">
                                                                {!! media_button('image',$shop) !!}
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            {{Form::label('status', 'Status',['class' => 'col-md-2 col-form-label'])}}
                                                            <div class="col-xl-9">
                                                                {!! Form::select('status',[0 => 'Draft',1 => 'Published'],null,
                                                                            ['class' => 'form-control','id'=> 'status']) !!}
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-4">
                            <div class="view-product-wall mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        Panel
                                    </div>
                                    <div class="card-body">
                                        <div class="author-wall wall border-0 bg-transparent p-0">
                                            <div class="row">
                                                {{Form::label('author', 'Author',['class' => 'col-xl-3'])}}
                                                <div class="col-xl-9">
                                                    {!! Form::select('user_id',[],null,
                                                                ['class' => 'form-control','id'=> 'status']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="status-wall wall border-0 bg-transparent p-0">
                                            <div class="row">
                                                {{Form::label('', 'Contact Type',['class' => 'col-xl-3'])}}
                                                <div class="col-xl-9">
                                                    {!! Form::select('contacts[type][]',[0 => 'Draft',1 => 'Published'],null,
                                                                ['class' => 'form-control','id'=> 'status']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wall wall border-0 bg-transparent p-0">
                                            <div class="row">
                                                {{Form::label('comment', 'Enable comment',['class' => 'col-xl-3'])}}
                                                <div class="col-xl-9">
                                                    YES {!! Form::radio('comment_enabled',1,true,['class' => '']) !!}
                                                    NO {!! Form::radio('comment_enabled',0,null,['class' => '']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
