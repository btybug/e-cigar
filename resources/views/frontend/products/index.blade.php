@extends('layouts.frontend')
@section('content')
    <main class="page-main-content">
        <div class="product-page">
            <div class="d-flex flex-wrap">
                @foreach($categories as $category)
                <div class="col-sm-4">
                    <div class="product-single vape-product d-flex flex-column text-center">
                        <h2 class="title"><a style="text-decoration: none;color: black;" href="{!! route('product_type',$category->slug) !!}" class="item-link">{{ $category->name }}</a></h2>
                        <div class="images">
                            @if($category->image)
                                <img src="{!! $category->image !!}" alt="{{ $category->name }}">
                            @else
                                <img src="/public/images/no_image.jpg" alt="{{ $category->name }}">
                            @endif

                        </div>
                        <ul class="info list-unstyled">
                            @foreach($category->children as $child)
                            <li>
                                <a href="{!! route('product_type',[$category->slug,$child->slug]) !!}" class="item-link">
                                    {{ $child->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
@stop

@section("js")

<script>

</script>

@stop