<div class="col-sm-10 pl-0">
    @if(! $vSettings->is_required)
        {!! Form::checkbox('checkbox',1,null) !!}
    @endif
</div>
<div class="col-sm-2 pl-sm-3 p-0 text-sm-center">

    <span class="d-inline-block font-35 font-sec-bold text-uppercase ml-auto price-place"></span>
</div>
