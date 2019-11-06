<!-- Modal -->
<div class="modal fade" id="wizardViewModal" tabindex="-1" role="dialog" aria-labelledby="wizardViewLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg wizardViewModal--new" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wizardViewLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="wizardAll-tab" data-toggle="tab" href="#wizardAll" role="tab" aria-controls="wizardAll" aria-selected="true">All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="wizardItem1-tab" data-toggle="tab" href="#wizardItem1" role="tab" aria-controls="wizardItem1" aria-selected="false">Item 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="wizardItem2-tab" data-toggle="tab" href="#wizardItem2" role="tab" aria-controls="wizardItem2" aria-selected="false">Item 2</a>
                    </li>
                </ul>
                <div class="tab-content main-scrollbar" id="myTabContent">
                    <div class="tab-pane fade show active" id="wizardAll" role="tabpanel" aria-labelledby="wizardAll-tab">
                        <div class="shopping-cart_wrapper p-0">
                            <div class="content-wrap shoping-card">
                                <ul class="row content">
                                    <li class="col-md-3" data-id="1">
                                        <div class="item-content">
                                            <div class="item-photo">
                                                <img src="https://www.enca.com/sites/default/files/2019-09/Vaping.jpg" alt="photo">
                                            </div>
                                            <div class="item-title">
                                                <span>Nicotine salt 20mg</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-3" data-id="2">
                                        <div class="item-content">
                                            <div class="item-photo">
                                                <img src="https://www.enca.com/sites/default/files/2019-09/Vaping.jpg" alt="photo">
                                            </div>
                                            <div class="item-title">
                                                <span>Throat hit 12mg</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="col-md-3" data-id="3">
                                        <div class="item-content">
                                            <div class="item-photo">
                                                <img src="https://www.enca.com/sites/default/files/2019-09/Vaping.jpg" alt="photo">
                                            </div>
                                            <div class="item-title">
                                                <span>Throat hit 18mg</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="wizardItem1" role="tabpanel" aria-labelledby="wizardItem1-tab">Item1</div>
                    <div class="tab-pane fade" id="wizardItem2" role="tabpanel" aria-labelledby="wizardItem2-tab">Item2</div>
                </div>
            </div>
            <div class="modal-footer bord-top d-flex justify-content-between popup-modal-footer py-0">
                <div class="d-flex selected-items_popup w-100 main-scrollbar">
                    <ul class="d-flex flex-wrap footer-list">
                        <li class="footer-list-item">
                            <span class="title">Item name 1</span>
                            <span class="close-icon"><i class="fa fa-times"></i></span>
                        </li>
                        <li class="footer-list-item">
                            <span class="title">Item name 2</span>
                            <span class="close-icon"><i class="fa fa-times"></i></span>
                        </li>
                        <li class="footer-list-item">
                            <span class="title">Item name 3</span>
                            <span class="close-icon"><i class="fa fa-times"></i></span>
                        </li>
                        <li class="footer-list-item">
                            <span class="title">Item name 1</span>
                            <span class="close-icon"><i class="fa fa-times"></i></span>
                        </li>
                        <li class="footer-list-item">
                            <span class="title">Item name 2</span>
                            <span class="close-icon"><i class="fa fa-times"></i></span>
                        </li>
                        <li class="footer-list-item">
                            <span class="title">Item name 3</span>
                            <span class="close-icon"><i class="fa fa-times"></i></span>
                        </li>
                    </ul>
                </div>
                <button type="button" class="btn btn-primary b_save ml-2" data-section-id="">
                    Add selected
                </button>
            </div>
        </div>
    </div>
</div>
{{--<div class="modal fade" id="wizardViewModal" tabindex="-1" role="dialog" aria-labelledby="wizardViewLabel"--}}
{{--     aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="wizardViewLabel">Modal title</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="shopping-cart_wrapper">--}}
{{--                    <div class="shopping-cart-head">--}}
{{--                        <ul class="nav nav-pills">--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="contents-wrapper">--}}
{{--                        <div class="content-wrap shoping-card">--}}
{{--                            <ul class="d-flex flex-wrap content">--}}

{{--                            </ul>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex justify-content-between align-items-center border-top pt-2 footer-buttons">--}}
{{--                            <div class="back-item">--}}
{{--                                <button class="btn btn-secondary back-btn d-none">Back</button>--}}
{{--                            </div>--}}
{{--                            <div class="row selected-items_filter w-100 main-scrollbar mx-1">--}}

{{--                            </div>--}}
{{--                            <div class="next-item">--}}
{{--                                <button class="btn btn-secondary next-btn">Next</button>--}}
{{--                                <button class="btn btn-primary add-items-btn d-none"><i--}}
{{--                                            class="fa fa-plus"></i><span--}}
{{--                                            class="ml-1">Add selected items</span></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{!! Form::hidden('first_category_id',(isset($category))?$category->id:null,['category_id']) !!}

