<button type="button" id="{!! $uniqId !!}" data-type="{!! $type !!}" class="btn btn-primary" data-toggle="modal" data-group="{!! $group !!}" data-name="{!! $name.(($is_multiple)?'[]':null) !!}" data-multiple="{!! $is_multiple !!}" data-target="#wizardViewModal" data-action="{!! $category->id !!}">{!! $text !!}</button>
<div class="{!! $uniqId !!}"></div>
