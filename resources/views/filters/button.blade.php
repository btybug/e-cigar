<button type="button" id="{!! $uniqId !!}" class="btn btn-primary" data-toggle="modal" data-name="{!! $name.(($is_multiple)?'[]':null) !!}" data-multiple="{!! $is_multiple !!}" data-target="#wizardViewModal" data-action="{!! $category->id !!}">{!! $text !!}</button>
<div class="{!! $uniqId !!}"></div>
