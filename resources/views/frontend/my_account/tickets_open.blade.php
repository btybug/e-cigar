@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_tickets'])
            </div>
            <div class="col-md-8">
               {!! Form::open() !!}
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
                            {!! Form::file('image',['multyple' => true]) !!}
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@stop