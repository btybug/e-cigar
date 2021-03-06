<div class="row">
    <div class="col-md-4">
        @inject('settings','\App\Models\Settings')
        @php
            $payment_options = ($geoZone) ? $geoZone->payment_options : [];
            $active_payments_gateways = $settings->getEditableData('active_payments_gateways');
        @endphp
        @if(count($payment_options))
            <ul class="payment_methods methods">
                @if(in_array('cash',$payment_options) && $active_payments_gateways->cash)
                    @php
                        $cash = $settings->getEditableData('payments_gateways_cash');
                    @endphp
                    @if($cash)
                        <li class="payment_method_bacs">
                            <input id="payment_method_bacs" type="radio" class="input-radio payment-method"
                                   name="payment_method" value="cash" checked="checked"
                                   data-order_button_text="">

                            <label for="payment_method_bacs">
                                {{ $cash->name }}</label>
                            <div class="payment_box payment_method_bacs">
                                <p>{{ $cash->description }}</p>
                            </div>
                        </li>
                    @else
                        <li class="payment_method_bacs">
                            Cash method not configured
                        </li>
                    @endif
                @endif
                @if(in_array('stripe',$payment_options) && $active_payments_gateways->stripe)
                    @php
                        $stripe = $settings->getEditableData('payments_gateways');
                    @endphp
                    @if($stripe)
                        <li class="payment_method_cheque">
                            <input id="payment_method_cheque" type="radio" class="input-radio payment-method"
                                   name="payment_method" value="stripe" data-order_button_text="">

                            <label for="payment_method_cheque">
                                {{ $stripe->stripe_payment_name }} </label>
                            <div class="payment_box payment_method_cheque" style="display:none;">
                                <p>{{ $stripe->description }}</p>
                            </div>
                        </li>
                    @else
                        <li class="payment_method_bacs">
                            Stripe method not configured
                        </li>
                    @endif
                @endif
                @if(in_array('paypal',$payment_options)  && $active_payments_gateways->paypal)
                    <li class="payment_method_paypal">
                        <input id="payment_method_paypal" type="radio" class="input-radio payment-method"
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
        @if(count($payment_options))
            @if(in_array('cash',$payment_options) && $active_payments_gateways->cash)
                <div id="cash-method" class="payment-method-data">
                    <button class="btn btn-primary submit-cash">Submit Cash</button>
                </div>
            @endif
            @if(in_array('stripe',$payment_options) && $active_payments_gateways->stripe)
                <div id="stripe-method" class="d-none payment-method-data">
                    <script src="https://js.stripe.com/v3/"></script>
                    <form action="/stripe-charge" method="post" id="payment-form">
                        {!! csrf_field()!!}
                        <div class="form-row">
                            <label for="card-element">

                            </label>
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button class="btn btn-info ">Submit Payment</button>
                    </form>
                </div>
            @endif
            @if(in_array('paypal',$payment_options) && $active_payments_gateways->paypal)
                <div id="paypal-method" class="d-none payment-method-data">
                    paypal
                </div>
            @endif
        @endif
    </div>
    <div class="col-md-12">
        <button class="btn btn-light back-step">Back</button>
    </div>
</div>