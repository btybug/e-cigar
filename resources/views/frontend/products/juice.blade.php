@extends('layouts.frontend')
@section('content')
<main class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-unstyled list-group list-group--juice">
                    @if(count($categories->children))
                        @foreach($categories->children as $child)
                            <li class="list-group-item {{ ($category && $category->id == $child->id) ? 'active' : '' }}">
                                <a href="{!! url('products/juice',$child->slug) !!}" class="d-inline-block w-100 text-center">{{ $child->name }}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-md-9">
                @if($category)
                    <div class="card juice-poster juice-poster--type-1 mb-5 bg-light">
                        <div class="row no-gutters">
                            <div class="col-md-5">
                                <h3 class="card-title text-center mb-0 p-2 text-white">{{ $category->name }}</h3>
                                <div class="img-outer card-img-outer p-4">
                                    @if($category->image)
                                        <img class="card-img-top" src="{{ $category->image }}" alt="{!! getImage($category->image)->seo_alt !!}">
                                    @else
                                        <img class="card-img-top" src="/public/media/drive/3f44266c7fa59df324ec315e97e8579c.jpg" alt="">
                                    @endif

                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="card-body p-0 h-100 d-flex flex-column">
                                    <div class="text-right">
                                        <a href="#" class="btn btn-primary">View more</a>
                                    </div>
                                    <div class="pt-4 px-3 text-justify">
                                        <p class="card-text mb-3">{{ $category->description }}</p>
                                    </div>

                                    <div class="row no-gutters mt-auto">
                                        <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 1">
                                            <img class="img-fluid main-transition" src="https://images.pexels.com/photos/70746/strawberries-red-fruit-royalty-free-70746.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                        </div>
                                        <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 2">
                                            <img class="img-fluid main-transition" src="https://images.pexels.com/photos/41957/banana-fruit-healthy-yellow-41957.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                        </div>
                                        <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 3">
                                            <img class="img-fluid main-transition" src="https://images.pexels.com/photos/70746/strawberries-red-fruit-royalty-free-70746.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                        </div>
                                        <div class="col-md-3 flavor-img-outer p-3" data-title="Flavor 4">
                                            <img class="img-fluid main-transition" src="https://images.pexels.com/photos/41957/banana-fruit-healthy-yellow-41957.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(count($category->children))
                        <ul class="nav nav-tabs d-flex" role="tablist">
                            @foreach($category->children as $item)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="tab-{{ $item->id }}" data-toggle="tab" href="#subTab{{ $item->id }}" role="tab" aria-controls="subTab{{ $item->id }}" aria-selected="true">{{ $item->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($category->children as $item)
                                <div class="tab-pane fade p-4 {{ $loop->first ? ' show active' : '' }}" id="subTab{{ $item->id }}" role="tabpanel" aria-labelledby="tab-{{ $item->id }}">
                                    <ul class="list-unstyled row juice-tabs-items">
                                        @if(count($products))
                                            @foreach($products as $product)
                                                @if($product->categories()->where('categories.id',$item->id)->first())
                                                    <li class="col-md-3 mb-3">
                                                        <div class="shadow p-3 bg-light">
                                                            <div class="mb-3 img-outer">
                                                                @if($product->image)
                                                                    <img class="card-img-top" src="{{ $product->image }}" alt="{!! getImage($product->image)->seo_alt !!}">
                                                                @else
                                                                    <img class="card-img-top" src="/public/images/no_image.jpg" alt="">
                                                                @endif

                                                            </div>
                                                            <h4 class="text-center"><a href="{{ route('product_single_juice',[$category->slug,$product->id]) }}">{{ $product->name }}</a></h4>
                                                        </div>
                                                    </li>
                                                @endif
                                            @endforeach
                                        @else
                                            NO products
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        </div>

                    @endif

                @endif
            </div>
        </div>


    </div>
</main>
@stop
