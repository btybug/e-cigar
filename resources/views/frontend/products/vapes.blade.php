@extends('layouts.frontend')
@section('content')
    {!! Form::open(['method'=>'GET']) !!}

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
                        @foreach($attributes as $attribute)
                            <div class="card mt-2">
                                <div class="card-header">
                                    {!! $attribute->name !!}
                                </div>
                                <div class="card-body">
                                    <ul class="list">
                                        @if($attribute->display_as=='select')
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label"> </label>
                                                    {!! Form::select($attribute->name,$attribute->children->pluck('name','id'),null,['class'=>'filters_box form-control']) !!}
                                                    {{--<input class="form-check-input filters_box" name="Size[]"--}}
                                                    {{--type="checkbox" value="Small">--}}
                                                </div>
                                            </li>
                                        @elseif ($attribute->display_as=='checkbox')
                                            <li>
                                                    @foreach($attribute->children as $option)
                                                <div class="form-check">
                                                        <label class="form-check-label">
                                                            {!! Form::checkbox($attribute->name.'[]',$option->name,null,['class'=>'form-check-input filters_box']) !!}
                                                            {!! $option->name !!} </label>
                                                </div>
                                                        @endforeach
                                            </li>
                                            @elseif($attribute->display_as=='radio')
                                            <li>
                                                    @foreach($attribute->children as $option)
                                                <div class="form-check">
                                                        <label class="form-check-label">
                                                            {!! Form::radio($attribute->name,$option->name,null,['class'=>'form-check-input filters_box']) !!}
                                                            {!! $option->name !!} </label>
                                                </div>
                                                    @endforeach
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach

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
                                <select class="col-sm-12 col-lg-6 form-control sortbynews" name="orderBy" selected="">
                                    <option value="" @if($orderBy==null)selected @endif  disabled>Order by</option>
                                    <option value="id,asc" @if($orderBy=="id,asc")selected @endif>Asc</option>
                                    <option value="id,desc" @if($orderBy=="id,desc")selected @endif>Desc</option>
                                    <option value="name,asc" @if($orderBy=="name,asc")selected @endif>A - Z</option>
                                    <option value="name,desc" @if($orderBy=="name,desc")selected @endif>Z - A</option>
                                    <option value="updated_at,asc" @if($orderBy=="updated_at,asc")selected @endif>Date
                                        (Asc)
                                    </option>
                                    <option value="updated_at,desc" @if($orderBy=="updated_at,desc")selected @endif>Date
                                        (Desc)
                                    </option>
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
                                                            src="{!! $product->image !!}"
                                                            alt="CLASSIC FIT SOFT-TOUCH POLO"></div>
                                    <div class="block-panel mt-4">
                                        <h2 class="title">{!! $product->name !!}</h2>
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
                                            <a href="{!! route('product_single_vape',$product->id) !!}"
                                               class="fa fa-eye"></a>
                                        </div>

                                        <div class="buttons">

                                            <button type="button" class="btn btn-block btn-secondary cart"
                                                    products_id="1">
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
    {!! Form::close() !!}

@stop
@section('js')
    <script>
        $(function () {
            $('form select').on('change', function () {
                $('form').submit();
            })
        })
    </script>
@stop