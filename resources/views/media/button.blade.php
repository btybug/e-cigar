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
            <input type="text" name="{!! $name !!}"
                   value="{!! ($model)?((isset($model->$name))?$model->$name:null):null !!}" placeholder="file name"
                   class="modal-input-path {!! $uniqId !!}" readonly>
        @endif
        <button type="button" data-multiple="{!! ($multiple)?'true':'false' !!}" id="{!! $uniqId !!}"
                class="btn btn-lg " data-toggle="modal" data-target="#myModal">Open
            Modal
        </button>
    </div>
</div>