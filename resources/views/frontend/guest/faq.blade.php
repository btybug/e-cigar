@extends('layouts.frontend')

@section('content')
    <div class="faq-page">

        <section class="section novi-background breadcrumb-classic">
            <div class="container section-34 section-sm-50">
                <div class="d-flex flex-wrap align-items-xl-center">
                    {{--<div class="col-xl-5 d-none d-xl-block text-xl-left">--}}
                        {{--<h2><span class="big">Faq</span></h2>--}}
                    {{--</div>--}}
                    <ul class="list-inline list-inline-dashed p">
                        <li class="list-inline-item"><a href="#">FAQ </a></li>
                        <li class="list-inline-item"><a href="#">Contact us </a></li>
                        </li>
                    </ul>
                    {{--<div class="col-xl-2 d-none d-md-block text-center"><span><i class="fa fa-question-circle"></i></span></div>--}}
                    {{--<div class="offset-top-0 offset-md-top-10 col-xl-5 offset-xl-top-0 small text-xl-right">--}}
                        {{--<ul class="list-inline list-inline-dashed p">--}}
                            {{--<li class="list-inline-item"><a href="#">Home /</a></li>--}}
                            {{--<li class="list-inline-item"><a href="#">Pages /</a></li>--}}
                            {{--<li class="list-inline-item">Faq--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>

        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="buttons">
                        <h4>General Questions
                            <small class="text-muted">(4)</small>
                        </h4>
                        <p>All you need to know about Intense design studio and how to get Support.</p>
                        <button type="button" class="btn btn-primary"> WHAT DOES ...</button>
                        <button type="button" class="btn btn-primary"> WHAT DOES ...</button>
                        <button type="button" class="btn btn-primary"> WHAT DOES ...</button>
                        <button type="button" class="btn btn-primary"> WHAT DOES ...</button>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="accord">
                        <div class="offset-top-66 offset-lg-top-0">
                            <h3>Other Questions
                                <small class="text-muted">(7)</small>
                            </h3>
                            <p>The answers on most common questions are described bellow.</p>
                            <div class="mt-5">
                                <!-- Bootstrap Accordion-->
                                <div class="accordion offset-top-0" role="tablist" aria-multiselectable="true"
                                     id="accordion-2">
                                    <div class="card card-accordion"><a class="card-header collapsed" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseOne-2-content"
                                                                        id="collapseOne-2-header" aria-expanded="false"
                                                                        aria-controls="collapseOne-2-content">
                                            What does
                                            Intense offer for my marketing needs?</a>
                                        <div class="collapse" id="collapseOne-2-content"
                                             aria-labelledby="collapseOne-2-header" data-parent="#accordion-2" style="">
                                            <div class="card-body">Intense has effective instruments for your marketing
                                                campaigns. Its package contains a number of landing and newsletter templates
                                                designed with proven marketing tactics in mind.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-accordion"><a class="card-header collapsed" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseTwo-2-content"
                                                                        id="collapseTwo-2-header" aria-expanded="false"
                                                                        aria-controls="collapseTwo-2-content">What pages
                                            would Intense have in its full package?</a>
                                        <div class="collapse" id="collapseTwo-2-content"
                                             aria-labelledby="collapseTwo-2-header" data-parent="#accordion-2" style="">
                                            <div class="card-body">Intense gives an access to 250+ ready-made pages for
                                                multiple purposes. Among them, there are 10+ homepages, 10+ one-page
                                                designs, 20+ header and 10+ footer styles, 20+ extra pages, 10+ event
                                                templates, 20+ portfolio layouts, 20+ blog templates, and many others.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-accordion"><a class="card-header collapsed" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseThree-2-content"
                                                                        id="collapseThree-2-header" aria-expanded="false"
                                                                        aria-controls="collapseThree-2-content">Can I edit
                                            flash template in Swish?</a>
                                        <div class="collapse" id="collapseThree-2-content"
                                             aria-labelledby="collapseThree-2-header" data-parent="#accordion-2">
                                            <div class="card-body">Quis detracto in vel, ad mucius equidem mel, vis cu
                                                melius alienum inciderint. Convenire mnesarchum definitionem duo ut, in sea
                                                quot magna ceteros, ex his quando corpora splendide. Purto zril nobis ne
                                                est, eu assum platonem intellegebat qui. Ex ridens nominati partiendo quo,
                                                mei eu tota verear adversarium.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-accordion"><a class="card-header collapsed" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseFour-2-content"
                                                                        id="collapseFour-2-header" aria-expanded="false"
                                                                        aria-controls="collapseFour-2-content">Is Intense an
                                            eCommerce-ready solution?</a>
                                        <div class="collapse" id="collapseFour-2-content"
                                             aria-labelledby="collapseFour-2-header" data-parent="#accordion-2">
                                            <div class="card-body">Yes, you can use Intense to give a head start to a web
                                                store. It is integrated with a shopping cart and includes 10+ eCommerce
                                                templates for building different store pages.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-accordion"><a class="card-header collapsed" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseFive-2-content"
                                                                        id="collapseFive-2-header" aria-expanded="false"
                                                                        aria-controls="collapseFive-2-content">What is
                                            Intense Wizard all about?</a>
                                        <div class="collapse" id="collapseFive-2-content"
                                             aria-labelledby="collapseFive-2-header" data-parent="#accordion-2">
                                            <div class="card-body">This smart tool can generate the most suitable template
                                                for each user. Based on his / her interests and needs, this tool identifies
                                                the right topic and compiles a set of necessary pages.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-accordion"><a class="card-header collapsed" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseSix-2-content"
                                                                        id="collapseSix-2-header" aria-expanded="false"
                                                                        aria-controls="collapseSix-2-content">Are there any
                                            plugins in the package of Intense?</a>
                                        <div class="collapse" id="collapseSix-2-content"
                                             aria-labelledby="collapseSix-2-header" data-parent="#accordion-2">
                                            <div class="card-body">Intense comes integrated with 20+ premium plugins for
                                                different purposes. Whether you want to add an event calendar or mail form
                                                to your site, you choose the right plugin from the template’s pack.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-accordion"><a class="card-header collapsed" href="#"
                                                                        data-toggle="collapse"
                                                                        data-target="#collapseSeven-2-content"
                                                                        id="collapseSeven-2-header" aria-expanded="false"
                                                                        aria-controls="collapseSeven-2-content">What does
                                            LTS mean for me?</a>
                                        <div class="collapse" id="collapseSeven-2-content"
                                             aria-labelledby="collapseSeven-2-header" data-parent="#accordion-2">
                                            <div class="card-body">LTS (long-term support) means that your design
                                                opportunities will grow for free. Intense will get regular updates in the
                                                form of new child themes, pages, and features, which will let you keep pace
                                                with all the web innovations.
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
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('public/frontend/css/faq-page.css?v='.rand(111,999))}}">
@stop