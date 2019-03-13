@foreach($model->variations as $variation)
<div class="d-flex align-items-center product-single-info_colors-outer">
    <label class="product-single-info_label text-uppercase mb-0 col-sm-2 pl-0 mr-0">{!! $variation->name !!}</label>
    <div class="col-sm-10 px-sm-3 px-0">
        <div class="product-single-colors">
            <div class="d-flex flex-wrap">
                
            </div>
        </div>
    </div>
</div>
@endforeach
