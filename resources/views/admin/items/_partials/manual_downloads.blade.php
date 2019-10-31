<div class="col-md-12 d-flex flex-wrap manual-code mt-5" data-id="{!! $item->id !!}">
    {!! Form::hidden('manual_codes[]',$item->id) !!}
    <div class="col-md-3">
        {!! $item->name !!}
    </div>
    <div class="col-md-6">
        <img src="{!! $item->image !!}" width="200px" />
    </div>
    <div class="col-md-3">
        <a class="btn btn-success" href="{{ route("admin_items_download_code",[$item->id,'manual',($model)?$model->name: null]) }}">Download</a>
        <a class="btn btn-danger delete-manual-code" href="javascript:void(0)">Delete</a>
    </div>
</div>

