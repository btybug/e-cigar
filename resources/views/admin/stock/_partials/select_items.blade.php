<div class="modal-body">
    <ul class="all-list modal-stickers--list">
        @if(count($items))
            @foreach($items as $item)
                <li data-id="{{ $item->id }}" class="col-lg-2 col-md-3 col-sm-6 option-elm-modal">
                    <div class="single-item">
                        <div class="img-item">
                            <img src="{{ (media_image_tmb($item->image)) }}" class="img-fluid" alt="img">
                        </div>
                        <div class="name-item">
                            <span>{{ $item->name }}</span>
                        </div>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-primary add-package-items" data-section-id="{{ $uniqueId }}">Add</button>
</div>
