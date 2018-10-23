@extends('layouts.frontend')
@section('content')
    <div class="container vapes_page">
        <div class="row">
            <div class="col-md-3">
                <div class="filters">
                    <div class="card">
                        <!--id="headingOne"-->
                        <div class="card-header">
                            <h2 class="title">
                                Filters </h2>
                        </div>
                        <div class="block">
                            <div class="card-title">Price</div>
                            <div class="card-body">
                                <div id="slider-range"
                                     class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"><span
                                                class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    </div>
                                    <div id="slider-values">
                                        <div class="slider-value-0">$<input type="text" readonly="" id="min_price_show">
                                        </div>
                                        <div class="slider-value-1">$<input type="text" readonly="" id="max_price_show">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="card-title ">Colors</div>
                            <div class="card-body">
                                <ul class="list">
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Brown" checked="">
                                                Brown
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Cream" checked="">
                                                Cream
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Blue">
                                                Blue
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Multi">
                                                Multi
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Black">
                                                Black
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Grey">
                                                Grey
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="White">
                                                White
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Purple">
                                                Purple
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Navy">
                                                Navy
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Hollywood Cream">
                                                Hollywood Cream
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Colors[]"
                                                       type="checkbox" value="Vintage Silver">
                                                Vintage Silver
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="block">
                            <div class="card-title ">Size</div>
                            <div class="card-body">
                                <ul class="list">
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="Small">
                                                Small
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="Medium">
                                                Medium
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="Large">
                                                Large
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="Extra Large">
                                                Extra Large
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="7D">
                                                7D
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="8D">
                                                8D
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="8.5D">
                                                8.5D
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="9D">
                                                9D
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="24">
                                                24
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="25">
                                                25
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="26">
                                                26
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="27">
                                                27
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="28">
                                                28
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="29">
                                                29
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="30">
                                                30
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="New Born">
                                                New Born
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="3 Mos">
                                                3 Mos
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="6 Mos">
                                                6 Mos
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="9 Mos">
                                                9 Mos
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="King">
                                                King
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="Full">
                                                Full
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="15&quot;x20&quot;">
                                                15"x20"
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="22&quot;x22&quot;">
                                                22"x22"
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="3T">
                                                3T
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Size[]"
                                                       type="checkbox" value="4T">
                                                4T
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="block">
                            <div class="card-title ">Waist</div>
                            <div class="card-body">
                                <ul class="list">
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Waist[]"
                                                       type="checkbox" value="28W">
                                                28W
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Waist[]"
                                                       type="checkbox" value="30W">
                                                30W
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Waist[]"
                                                       type="checkbox" value="32W">
                                                32W
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Waist[]"
                                                       type="checkbox" value="34W">
                                                34W
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Waist[]"
                                                       type="checkbox" value="36W">
                                                36W
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Waist[]"
                                                       type="checkbox" value="38W">
                                                38W
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Waist[]"
                                                       type="checkbox" value="40W">
                                                40W
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="block">
                            <div class="card-title  last ">Length</div>
                            <div class="card-body">
                                <ul class="list">
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Length[]"
                                                       type="checkbox" value="30L">
                                                30L
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Length[]"
                                                       type="checkbox" value="32L">
                                                32L
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input filters_box" name="Length[]"
                                                       type="checkbox" value="34L">
                                                34L
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="alret alert-danger" id="filter_required">
                        </div>

                        <div class="button">
                            <a href="#" class="btn btn-dark" id="apply_options"> Reset </a>
                            <button type="button" class="btn btn-secondary" id="apply_options_btn"> Apply</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="products_all">
                    <div class="toolbar mb-3">
                        <div class="form-inline">
                            <div class="form-group col-12 col-md-4">
                                <label class="col-sm-12 col-lg-5 col-form-label">Display</label>
                                <div class="col-sm-12 col-lg-7 btn-group">
                                    <a href="javascript:void(0);" id="grid_news"
                                       class="btn btn-default active change-view-blog"> <i class="fa fa-th-large"
                                                                                           aria-hidden="true"></i> </a>
                                    <a href="javascript:void(0);" id="list_news"
                                       class="btn btn-default change-view-blog"> <i
                                                class="fa fa-list" aria-hidden="true"></i> </a>
                                </div>
                            </div>
                            <div class="form-group col-12 col-md-4 center">
                                <label class="col-sm-12 col-lg-4 col-form-label">Sort</label>
                                <select class="col-sm-12 col-lg-6 form-control sortbynews" name="type">
                                    <option value="desc" selected="">Newest</option>
                                    <option value="asc">Oldest</option>
                                    <option value="atoz">A - Z</option>
                                    <option value="ztoa">Z - A</option>
                                </select>
                            </div>
                            <div class="form-group col-12 col-md-4">
                                <label class="col-sm-12 col-lg-4 col-form-label">Limit</label>
                                <select class="col-sm-12 col-lg-4 form-control sortbynews" name="limit">
                                    <option value="16" selected="">16</option>
                                    <option value="32">32</option>
                                    <option value="64">64</option>
                                </select>
                                <label class="col-sm-12 col-lg-4 col-form-label">per page</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pagin mt-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

@stop