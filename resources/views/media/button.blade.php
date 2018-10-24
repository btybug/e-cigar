<div class="bestbetter-modal">
    <!-- Trigger the modal with a button -->
    <div class="bestbetter-modal-open">
        @if($multiple)
            @if(isset($model->$name) && is_array($model->$name))
                @foreach($model->$name as $image)
                    <input type="text" name="{!! $name !!}[]"
                           value="{!! $image !!}" placeholder="file name"
                           class="modal-input-path {!! $uniqId !!}" readonly>
                @endforeach
            @else
                <input type="text" name="{!! $name !!}[]"
                       value="" placeholder="file name"
                       class="modal-input-path {!! $uniqId !!}" readonly>
            @endif
        @else
            @if($model && is_array($model))
                <input type="text" name="{!! $name !!}"
                       value="{!! (isset($model[$name]))?$model[$name]:null !!}" placeholder="file name"
                       class="modal-input-path {!! $uniqId !!}" readonly>
            @else
                <input type="text" name="{!! $name !!}"
                       value="{!! ($model)?((isset($model->$name))?$model->$name:null):null !!}" placeholder="file name"
                       class="modal-input-path {!! $uniqId !!}" readonly>
            @endif


        @endif
        <button type="button" data-multiple="{!! ($multiple)?'true':'false' !!}" id="{!! $uniqId !!}"
                class="btn btn-lg " data-toggle="modal" data-target="#myModal">Open
            Modal
        </button>
    </div>
    @if($multiple)
    <div class="multiple-image-placeholder">
        {{--<div class="img-thumb-container"  style="margin: 10px;"><div class="inner"><img src="${item}" width=200 > <span data-src="${item}" class="remove-thumb-img" data-is-multiple="${multiple}"><i  class="fa fa-trash"></i> </span></div></div>--}}
    </div>
    @endif
</div>