@extends('layouts.frontend')
@section('content')
    <div class="container vapes_page">
        <div class="row">
            <div class="col-md-3">
                <div class="filters">
                    <div class="">
                        <!--id="headingOne"-->
                        <div class="bg-secondary p-2 text-white">
                            <h2 class="title">
                                Filters </h2>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header">
                                Price
                            </div>
                            <div class="card-body">
                                <div 
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
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-header">
                                Colors
                            </div>
                            <div class="card-body ">
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
                        <div class="card mt-2">
                            <div class="card-header">
                                Size
                            </div>
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
                                <select class="col-sm-12 col-lg-6 form-control sortbynews" name="orderBy">
                                    <option value="" disabled selected>Order by</option>
                                    <option value="'id', 'asc'">Id (Asc)</option>
                                    <option value="'id', 'desc'">Id (Desc)</option>
                                    <option value="'name', 'asc'">Name (A - Z)</option>
                                    <option value="'name', 'desc'">Name (Z - A)</option>
                                    <option value="'updated_at', 'asc'">Date (Asc)</option>
                                    <option value="'updated_at', 'desc'">Date (Desc)</option>
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
                    <div class="products products-3x" id="listing-products">
                        @foreach($products as $product)
                        <div class="product">
                            <article>
                                <div class="thumb"><img class="img-fluid"
                                                        src="{!! url($product->image) !!}"
                                                        alt="CLASSIC FIT SOFT-TOUCH POLO"></div>
                                <div class="block-panel mt-4">
                                    <h2 class="title">{!! $product->title !!}</h2>
                                    <div class="description">
                                        <p class="read-more"></p>
                                    </div>
                                    <div class="block-inner">
                                        <div class="price">
                                            ${!! rand(10,99) !!}
                                        </div>

                                        {{--<div class="buttons">--}}
                                        {{--<button type="button" class="btn btn-secondary btn-round cart" products_id="1">Add to Cart</button>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>


                                <div class="product-hover">
                                    <div class="icons">
                                        <div class="icon-liked">
                                            <span products_id='1' class="fa  fa-heart-o  is_liked"><span
                                                        class="badge badge-secondary">13</span></span>
                                        </div>
                                        <a href="http://demo.laravelcommerce.com/product-detail/classic-fit-soft-touch-polo"
                                           class="fa fa-eye"></a>
                                    </div>

                                    <div class="buttons">

                                        <button type="button" class="btn btn-block btn-secondary cart" products_id="1">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </article>
                        </div>
                            @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
        <div class="pagin mt-3">
            {!! $products->links() !!}
        </div>
            </div>
        </div>
    </div>

@stop