<div class="order-summary">
    <table class="table">
        <thead>
        <tr>
            <th align="left" colspan="2">Order Summary</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td align="left"><span>Sub Total</span></td>
            <td align="right" id="subtotal">
                ${!! (isset($user) && $user) ? \Cart::session($user->id)->getSubTotal() : 0 !!}
            </td>
        </tr>
        <tr>
            <td align="left"><span>Tax</span></td>
            <td align="right" id="subtotal">$0</td>
        </tr>
        <tr>
            @php
                $shipping = (isset($user) && $user && $geoZone) ? \Cart::getCondition($geoZone->name) : null;
            @endphp
            <td align="left"><span>Shipping {!! ($shipping) ? '('.$shipping->getAttributes()->courier->name.')' : '' !!}</span></td>
            <td align="right" id="subtotal">${!! ($shipping) ? $shipping->getValue() : 0 !!}</td>
        </tr>
        <tr>
            <td align="left"><span>Discount (Coupon)</span></td>
            <td align="right" id="discount">$0</td>
        </tr>
        <tr>
            <td class="last" align="left"><span>Total</span></td>
            <td class="last" align="right" id="total_price">
                ${!! (isset($user) && $user) ? \Cart::session($user->id)->getTotal() : 0 !!}
            </td>
        </tr>
        </tbody>
    </table>
</div>