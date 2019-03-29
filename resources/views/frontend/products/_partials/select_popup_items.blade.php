<div class="modal-header">
  <div class="col-sm-12 d-flex align-items-center">
    <div class="col-sm-4">
      <h4 class="modal-title text-white">Select Items</h4>
    </div>
    <div class="col-sm-6 d-flex align-items-center">
      <label for="select_items" class="text-white">
        Search
      </label>
      {!! Form::select('filters[]',$stickers,null,
       ['id' => "searchStickers",'class' => 'select-2 main-select main-select-2arrows select2-hidden-accessible','style' => 'width:100%',
       'multiple' => true]) !!}
    </div>
    <div class="col-sm-2">
      <button type="button" class="close b_close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">×</span></button>
    </div>
  </div>
</div>
<div class="modal-body">
  <ul class="row">
    @include("frontend.products._partials.select_popup_item_render")
  </ul>
  <div class="row selected-items_popup">

  </div>
</div>
<div class="modal-footer bord-top">
  <button type="button" class="btn btn-primary b_save" data-section-id="">Add selected options</button>
</div>




