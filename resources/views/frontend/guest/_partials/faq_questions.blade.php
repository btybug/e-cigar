@foreach($category->faqs as $faq)
    <div class="card card-accordion faq-page-card-wrapper">
        <div class="card-header d-flex flex-wrap justify-content-between"
                                        data-toggle="collapse"
                                        data-target="#collapseOne-{{ $faq->id }}-content"
                                        id="collapseOne-{{ $faq->id }}-header" aria-expanded="false"
                                        aria-controls="collapseOne-{{ $faq->id }}-content">

            <span>{{ $faq->question }}</span>
            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
{{--        <div class="collapse" id="collapseOne-{{ $faq->id }}-content"--}}
{{--             aria-labelledby="collapseOne-{{ $faq->id }}-header" data-parent="#accordion-2" style="">--}}
{{--            <div class="card-body">{!! $faq->answer !!}--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endforeach
