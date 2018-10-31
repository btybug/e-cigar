<div class="row">
    <div class="col-md-4">
        @php
            $payment_options = ($geoZone) ? json_decode($geoZone->payment_options,true) : [];
        @endphp
        @if(count($payment_options))
            <ul class="payment_methods methods">
                @if(in_array('cash',$payment_options))
                    <li class="payment_method_bacs">
                        <input id="payment_method_bacs" type="radio" class="input-radio"
                               name="payment_method" value="bacs" checked="checked"
                               data-order_button_text="">

                        <label for="payment_method_bacs">
                            Direct Bank Transfer </label>
                        <div class="payment_box payment_method_bacs">
                            <p>Make your payment directly into our bank account. Please use your Order
                                ID as the payment reference. Your order won’t be shipped until the funds
                                have cleared in our account.</p>
                        </div>
                    </li>
                @endif
                @if(in_array('stripe',$payment_options))
                    <li class="payment_method_cheque">
                        <input id="payment_method_cheque" type="radio" class="input-radio"
                               name="payment_method" value="cheque" data-order_button_text="">

                        <label for="payment_method_cheque">
                            Stripe </label>
                        <div class="payment_box payment_method_cheque" style="display:none;">
                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store
                                State / County, Store Postcode.</p>
                        </div>
                    </li>
                @endif
                @if(in_array('paypal',$payment_options))
                    <li class="payment_method_paypal">
                        <input id="payment_method_paypal" type="radio" class="input-radio"
                               name="payment_method" value="paypal"
                               data-order_button_text="Proceed to PayPal">

                        <label for="payment_method_paypal">
                            PayPal <img
                                    src="https://www.paypalobjects.com/webstatic/mktg/Logo/AM_mc_vs_ms_ae_UK.png"
                                    alt="PayPal Acceptance Mark"><a
                                    href="https://www.paypal.com/gb/webapps/mpp/paypal-popup"
                                    class="about_paypal">What is PayPal?</a> </label>
                        <div class="payment_box payment_method_paypal" style="display:none;">
                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                PayPal account.</p>
                        </div>
                    </li>
                @endif
            </ul>
        @endif
    </div>
    <div class="col-md-8">

    </div>
</div>