<div class="filters-select-wizard" id="{!! $uniqId !!}" data-type="{!! $type !!}"  data-toggle="modal" data-group="{!! $group !!}" data-name="{!! $name.(($is_multiple)?'[]':null) !!}" data-multiple="{!! $is_multiple !!}"  data-action="{!! $category->id !!}">

{!! Form::open(['id'=>'filter-form']) !!}
<div class="d-flex flex-wrap justify-content-center mb-2">
    <div class="col-sm-3">
        <div class="form-group row">
            <label class="col-md-4 col-xs-12">{!! $category->name !!}</label>
            <div class="col-md-8">
                {!! Form::select('filters[]',[null=>'Select Parent']+$category->filters()->get()->pluck('name','id')->toArray(),null,['class'=>'form-control filter-select','required'=>true]) !!}
            </div>

        </div>
    </div>
    <div class="col-sm-6">
        <div class="filter-children-selects row">

        </div>
    </div>
</div>
{!! Form::close() !!}
<div class="releted__products-panel">
    <div>

        <div class="product-body">
            <ul class="get-all-attributes-tab row filter-children-items">

            </ul>
        </div>

    </div>
</div>
</div>
@push('javascript')
    <script>
        (function() {
            $("body").on('change', '.filter-select', function () {
                let data = $('form#filter-form').serialize();
                AjaxCall("/filters", data, function (res) {
                    if (!res.error) {
                        switch (res.type) {
                            case 'filter':
                                $('.filter-children-items').empty();
                                $('.filter-children-selects').html(res.html);
                                break;
                            case 'items':
                                $('.filter-children-selects').html(res.html);
                                $('.filter-children-items').html(res.items_html);
                                $('#view-result .modal-footer').html('<div class="d-flex flex-wrap justify-content-between mb-1">\n' +
                                    '<button type="button" class="btn btn-primary"><i class="fa fa-plus fa-sm mr-10"></i>Add</button>\n' +
                                    '</div>');
                                break;
                        }
                    }
                });
            });
        })()
    </script>
@endpush
