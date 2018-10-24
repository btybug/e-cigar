<div class="bestbetter-modal">
    <!-- Trigger the modal with a button -->
    <div class="bestbetter-modal-open">
        @if($multiple)
            @if(isset($model->$name) && is_array($model->$name))
                <input type="text" data-name="{!! $name !!}[]"
                       value="{!! count(array_filter($model->$name)) !!} selected" placeholder="file count"
                       class="modal-input-path {!! $uniqId !!}" readonly>
                @foreach($model->$name as $image)
                    @if($image)
                        <input type="hidden" name="{!! $name !!}[]"
                               value="{!! $image !!}" placeholder="file name"
                               class="modal-input-path multipale-hidden-inputs {!! $uniqId !!}" readonly>
                    @endif
                @endforeach
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
            @if(isset($model->$name) && is_array($model->$name))
                @foreach($model->$name as $image)
                    @if($image)
                        <div class="img-thumb-container" style="margin: 10px;">
                            <div class="inner"><img src="{{ $image }}" width=200>
                                    <span data-src="{{ $image }}" class="remove-thumb-img"
                                                                                   data-is-multiple="true"><i
                                            class="fa fa-trash"></i> </span></div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    @endif
</div>