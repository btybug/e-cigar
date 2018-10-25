@extends('layouts.frontend')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                @include('frontend.my_account._partials.left_menu',['activeItem' => 'my_account_favourites'])
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="view-fav-item mb-4">
                            <button class="btn btn-danger view-fav-item_btn-dlt pull-right" href="#"><i class="fa fa-trash"></i></button>
                            <a href="http://e-cigar.loc/products/vape/10"  class="text-center  px-5 py-3 d-flex flex-column d-block">
                                <span class="d-inline-block mb-3 view-fav-item_img-outer">
                                    <img class="img-fluid"
                                         src="http://e-cigar.loc/public/media/drive/53b44d8993ca974c87170c051232bada.jpg"
                                         alt="CLASSIC FIT SOFT-TOUCH POLO">
                                </span>
                                <span class="text-my-yellow">Product Name</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="view-fav-item mb-4">
                            <button class="btn btn-danger view-fav-item_btn-dlt pull-right" href="#"><i class="fa fa-trash"></i></button>

                            <a href="http://e-cigar.loc/products/vape/7"  class="text-center  px-5 py-3 d-flex flex-column d-block">
                                <span class="d-inline-block mb-3 view-fav-item_img-outer">
                                    <img class="img-fluid"
                                         src="http://e-cigar.loc/public/media/drive/af1d8604163611f0cf6da924324acc7a.jpg"
                                         alt="CLASSIC FIT SOFT-TOUCH POLO">
                                </span>
                                <span class="text-my-yellow">Product Name</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="view-fav-item mb-4">
                            <button class="btn btn-danger view-fav-item_btn-dlt pull-right" href="#"><i class="fa fa-trash"></i></button>

                            <a href="http://e-cigar.loc/products/vape/6" class="text-center  px-5 py-3 d-flex flex-column d-block">
                                <span class="d-inline-block mb-3 view-fav-item_img-outer">
                                    <img class="img-fluid"
                                         src="http://e-cigar.loc/public/media/drive/4e86f817e1de91452bfaf79824c4205c.jpg"
                                         alt="CLASSIC FIT SOFT-TOUCH POLO">
                                </span>
                                <span class="text-my-yellow">Product Name</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="view-fav-item mb-4">
                            <button class="btn btn-danger view-fav-item_btn-dlt pull-right" href="#"><i class="fa fa-trash"></i></button>

                            <a href="http://e-cigar.loc/products/vape/10"  class="text-center  px-5 py-3 d-flex flex-column d-block">
                                <span class="d-inline-block mb-3 view-fav-item_img-outer">
                                    <img class="img-fluid"
                                         src="http://e-cigar.loc/public/media/drive/53b44d8993ca974c87170c051232bada.jpg"
                                         alt="CLASSIC FIT SOFT-TOUCH POLO">
                                </span>
                                <span class="text-my-yellow">Product Name</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="view-fav-item mb-4">
                            <button class="btn btn-danger view-fav-item_btn-dlt pull-right" href="#"><i class="fa fa-trash"></i></button>

                            <a href="http://e-cigar.loc/products/vape/7"  class="text-center  px-5 py-3 d-flex flex-column d-block">
                                <span class="d-inline-block mb-3 view-fav-item_img-outer">
                                    <img class="img-fluid"
                                         src="http://e-cigar.loc/public/media/drive/af1d8604163611f0cf6da924324acc7a.jpg"
                                         alt="CLASSIC FIT SOFT-TOUCH POLO">
                                </span>
                                <span class="text-my-yellow">Product Name</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="view-fav-item mb-4">
                            <button class="btn btn-danger view-fav-item_btn-dlt pull-right" href="#"><i class="fa fa-trash"></i></button>

                            <a href="http://e-cigar.loc/products/vape/6" class="text-center  px-5 py-3 d-flex flex-column d-block">
                                <span class="d-inline-block mb-3 view-fav-item_img-outer">
                                    <img class="img-fluid"
                                         src="http://e-cigar.loc/public/media/drive/4e86f817e1de91452bfaf79824c4205c.jpg"
                                         alt="CLASSIC FIT SOFT-TOUCH POLO">
                                </span>
                                <span class="text-my-yellow">Product Name</span>
                            </a>
                        </div>
                    </div>




                </div>

            </div>
        </div>

    </div>

@stop