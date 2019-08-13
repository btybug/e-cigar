<div class="col-sm-12">
    <table class="table table-bordered table--order-dtls order-table">
        <thead>
        <tr>
            <td></td>
            <td class="text-left">Product</td>
            <td>
                <div class="head-stock-price">
                    <div>
                        Stocks
                    </div>
                    <div>
                        Price
                    </div>
                </div>
            </td>
            <td class="text-right">Quantity</td>
            <td class="text-right">Unit Price</td>
        </tr>
        </thead>
        <tbody>
        @if(count($items))
            @foreach($items as $key => $item)
                @php
                    $main = $item[$key];
                    unset($item[$key]);
                    $stock = $main->attributes->item;
                @endphp
                <tr>
                    <td class="w-5" align="center">
                        <a data-uid="{{ $main->id }}" href="javascript:void(0)"
                           class="btn btn-danger btn-sm remove-from-cart"><i
                                    class="fa fa-times"></i></a>
                    </td>
                    <td class="text-left w-20">
                        <div class="product-name">
                            <img src="{{ $stock->image }}"
                                 alt="{{ $stock->name }}">
                            <div class="name">{{ $stock->name }}</div>
                        </div>
                    </td>
                    <td class="stock-price">
                        <div class="stock-row">
                            <div class="left">
                                <div class="stock-name">
                                    <span>{{ $stock->name }}</span>
                                </div>
                                <div class="right">
                                    <div class="stock-count">
                                        <span>${{ $main->price }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="Qty w-8" align="center">
                        <div class="input-group">
                          <span data-condition="{{ false }}" data-uid="{{ $main->id }}"
                                class="qtycount">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                          </span>
                            <input name="quantity[]" type="text" readonly
                                   value="{{ $main->quantity }}"
                                   class="form-control qty" style="width: 70px;">
                            <span data-condition="{{ true }}" data-uid="{{ $main->id }}"
                                  class="qtycount">
                                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                              </span>
                        </div>
                    </td>
                    <td class="w-8" align="center"> ${{ \App\Services\CartService::getPriceSum($main->id) }}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

</div>
