@extends('layouts.frontend')
@section('content')
    <main class="main-content">
        <div class="container main-max-width">
                <div class="stores-page--wrapper">
                    @foreach($stores as $stor)
                    <div class="store-block">
                        <h3 class="font-sec-reg text-tert-clr font-36 text-uppercase store-title">{!! $stor->title !!}</h3>
                        <div class="row">
                            <div class="col-lg-3 col-sm-4">
                                <div class="store-left-block">
                                    <div class="store-photo">
                                        <img src="{!! url($stor->image) !!}" alt="{!! $stor->title !!}">
                                    </div>
                                    <div class="container store-info">
                                        <div class="row form-group border border-bottom">
                                            <div class="col-sm-3 pl-sm-1 pl-2">
                                                <div class="store-info-title">
                                                    CEO:
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="store-info-content">
                                                    {!! $stor->director !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row form-group border border-bottom">
                                            <div class="col-sm-3 pl-sm-1 pl-2">
                                                <div class="store-info-title">
                                                    Address:
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="store-info-content">
                                                    {!! $stor->address !!}
                                                </div>
                                            </div>
                                        </div>
                                        @foreach($stor->emails as $email)
                                        <div class="row form-group border border-bottom">
                                            <div class="col-sm-3 pl-sm-1 pl-2">
                                                <div class="store-info-title">
                                                    {!! $email->title !!}:
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="store-info-content">
                                                    {!! $email->contact !!}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @foreach($stor->phones as $phone)
                                        <div class="row form-group border border-bottom">
                                            <div class="col-sm-3 pl-sm-1 pl-2">
                                                <div class="store-info-title">
                                                    {!! $phone->title !!}:
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="store-info-content">
                                                    {!! $phone->contact !!}
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-sm-5">
                                <div class="store-content">
                                    <p>{!! $stor->description !!}</p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-3">
                                <div class="store-map">
                                    <iframe src="https://maps.google.com/maps?q={!! $stor->lat !!},{!! $stor->long !!}&hl=es&z=14&amp;output=embed" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
        </div>
    </main>
@stop
