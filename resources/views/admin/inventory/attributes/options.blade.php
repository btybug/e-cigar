<div class="col-md-3">
    @if(count($model->children))
        @foreach($model->children as $item)
            <div class="col-md-12">
                <div class="col-md-6">
                    {!! $item->name !!}
                </div>
                <div class="col-md-6">
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" data-item-id="{!! $item->id !!}"><i class="fa fa-trash"></i></a>
                    <a href="javascript:void(0)" data-item-id="{!! $item->id !!}" data-parent-id="{!! $model->id !!}"
                       class="btn btn-sm btn-warning attr-option"><i class="fa fa-pencil"></i></a>
                </div>
            </div>
        @endforeach
    @else
        No Options
    @endif
</div>
<div class="col-md-9 options-form">
    @include('admin.inventory.attributes.options_form')
</div>


