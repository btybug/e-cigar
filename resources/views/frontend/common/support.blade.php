@extends('layouts.frontend')
@section('content')
<div class="container">
    <section class="qcbox_section">
        <div class="product-introduce">
            <h1 class="mb-5 text-uppercase text-my-yellow">Support</h1>
            <div class="row">
                <div class="col-sm-3">
                    <a href="{!! route('faq') !!}" class="text-center mb-4 px-5 py-4 d-flex flex-column d-block shadow-sm bg-white">
                        <span class="d-inline-block mb-3"><i class="fa fa-5x fa-file-text" aria-hidden="true"></i></span>
                        <strong>FAQ</strong>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                    </a>
                </div>

                <div class="col-sm-3">
                    <a href="{!! route('knowledge_base') !!}" class="text-center mb-4 px-5 py-4 d-flex flex-column d-block shadow-sm bg-white">
                        <span class="d-inline-block mb-3"><i class="fa fa-5x fa-book" aria-hidden="true"></i></span>
                        <strong>Knowledge base</strong>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                    </a>
                </div>

               <div class="col-sm-3">
                   <a href="{!! route('manuals') !!}" class="text-center mb-4 px-5 py-4 d-flex flex-column d-block shadow-sm bg-white">
                       <span class="d-inline-block mb-3"><i class="fa fa-5x fa-cogs" aria-hidden="true"></i></span>
                       <strong>Manuals</strong>
                       <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                   </a>
               </div>

                <div class="col-sm-3">
                    <a href="{!! route('ticket') !!}" class="text-center mb-4 px-5 py-4 d-flex flex-column d-block shadow-sm bg-white">
                        <span class="d-inline-block mb-3"><i class="fa fa-5x fa-ticket" aria-hidden="true"></i></span>
                        <strong>Ticket</strong>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                    </a>
                </div>

                <div class="col-sm-3">
                    <a href="{!! route('terms_conditions') !!}" class="text-center mb-4 px-5 py-4 d-flex flex-column d-block shadow-sm bg-white">
                        <span class="d-inline-block mb-3"><i class="fa fa-5x fa-list" aria-hidden="true"></i></span>
                        <strong>Terms & conditions</strong>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                    </a>
                </div>

                <div class="col-sm-3">
                    <a href="{!! route('delivery') !!}" class="text-center mb-4 px-5 py-4 d-flex flex-column d-block shadow-sm bg-white">
                        <span class="d-inline-block mb-3"><i class="fa fa-5x fa-paper-plane" aria-hidden="true"></i></span>
                        <strong>Delivery</strong>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                    </a>
                </div>

                <div class="col-sm-3">
                    <a href="{!! route('whole_sellers') !!}" class="text-center mb-4 px-5 py-4 d-flex flex-column d-block shadow-sm bg-white">
                        <span class="d-inline-block mb-3"><i class="fa fa-5x fa-users" aria-hidden="true"></i></span>
                        <strong>Whole sellers </strong>
                        <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, sequi..</span>
                    </a>
                </div>

            </div>
        </div>
    </section>
</div>
@stop