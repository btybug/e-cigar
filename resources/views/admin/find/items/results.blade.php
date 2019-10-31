<div class="d-flex flex-wrap">
    @if(count($products))
        @foreach($products as $product)
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="row no-gutters h-100">
                        <div class="col-md-4">
                            <img
                                src="{{ $product->image }}"
                                class="card-img" alt="{{ $product->name }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p>

                                    <!--Price-->
                                    <span
                                        class="product-card_price d-inline-block font-sec-bold font-24 text-tert-clr lh-1 ml-auto">
                                                                   {{ convert_price($product->default_price,'usd', false) }}
                                                                </span>
                                </p>
                                <p class="card-text">
                                    {!! $product->short_description !!}
                                </p>
                                <p>
                                    <a href="{{ route('product_single', ['type' =>"vape", 'slug' => $product->slug]) }}"
                                       class="btn btn-primary"><i class="fa fa-eye"></i> View</a>
                                </p>
                                <p>
                                    <a href="{{ route('admin_items_edit', $product->id) }}" target="_blank"
                                       class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        No Results
    @endif
</div>
