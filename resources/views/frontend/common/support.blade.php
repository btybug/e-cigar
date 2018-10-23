@extends('layouts.frontend')
@section('content')
<div class="container">
    <section class="qcbox_section">
        <div class="product-introduce">
            <h1 class="mb-5 text-uppercase" style="color: #F0CA4D">Support</h1>
            <div class="row">
                <a href="{!! route('faq') !!}" class="col-sm-3 text-center mb-4 px-5 d-flex flex-column d-block">
                        <span class="d-inline-block mb-3"><i class="fa fa-5x fa-file-text" aria-hidden="true"></i></span>
                        <strong>FAQ</strong>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                </a>
                <a href="{!! route('knowledge_base') !!}" class="col-sm-3 text-center mb-3 px-5 d-flex flex-column d-block">
                    <span class="d-inline-block mb-3"><i class="fa fa-5x fa-book" aria-hidden="true"></i></span>
                    <strong>Knowledge base</strong>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                </a>
                <a href="{!! route('manuals') !!}" class="col-sm-3 text-center mb-3 px-5 d-flex flex-column d-block">
                    <span class="d-inline-block mb-3"><i class="fa fa-5x fa-cogs" aria-hidden="true"></i></span>
                    <strong>Manuals</strong>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                </a>
                <a href="{!! route('ticket') !!}" class="col-sm-3 text-center mb-3 px-5 d-flex flex-column d-block">
                    <span class="d-inline-block mb-3"><i class="fa fa-5x fa-ticket" aria-hidden="true"></i></span>
                    <strong>Ticket</strong>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                </a>
                <a href="{!! route('terms_conditions') !!}" class="col-sm-3 text-center mb-3 px-5 d-flex flex-column d-block">
                    <span class="d-inline-block mb-3"><i class="fa fa-5x fa-list" aria-hidden="true"></i></span>
                    <strong>Terms & conditions</strong>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                </a>
                <a href="{!! route('delivery') !!}" class="col-sm-3 text-center mb-3 px-5 d-flex flex-column d-block">
                    <span class="d-inline-block mb-3"><i class="fa fa-5x fa-paper-plane" aria-hidden="true"></i></span>
                    <strong>Delivery</strong>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                </a>
                <a href="{!! route('whole_sellers') !!}" class="col-sm-3 text-center mb-3 px-5 d-flex flex-column d-block">
                    <span class="d-inline-block mb-3"><i class="fa fa-5x fa-users" aria-hidden="true"></i></span>
                    <strong>Whole sellers </strong>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                </a>

            </div>
            <div class="clearbox"></div>
        </div>
    </section>
</div>
@stop