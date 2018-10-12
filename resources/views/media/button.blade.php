<div class="bestbetter-modal">
    <!-- Trigger the modal with a button -->
    <div class="bestbetter-modal-open">
        <input type="text" name="{!! $name !!}" value="{!! ($model)?((isset($model->$name))?$model->$name:null):null !!}" placeholder="file name" class="modal-input-path">
        <button type="button" class="btn btn-lg " data-toggle="modal" data-target="#myModal">Open Modal</button>
    </div>
</div>