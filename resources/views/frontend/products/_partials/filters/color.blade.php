<div class="filter-wall colors">
    <h5 class="font-sec-bold font-16 text-uppercase">{{ $filter->name }}</h5>
    <div class="d-flex flex-wrap">
        @foreach($filter->stickers as $sticker)
            <div class="col-sm-3 single-wall">
                <div class="custom-control custom-radio custom-control-inline" >
                    <input type="radio" class="custom-control-input" name="colors{{ $filter->name }}"
                           id="customRadio{{ $filter->id.$sticker->id }}">
                    <label class="custom-control-label pointer"

                           for="customRadio{{ $filter->id.$sticker->id }}">{{ $sticker->name }}</label>
                </div>
            </div>
        @endforeach
    </div>
</div>