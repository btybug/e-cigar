@extends('layouts.frontend')
@section('content')


    <form action="/order-post" method="POST">
        {!! csrf_field() !!}
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{!! env('STRIPE_KEY') !!}"
                data-image="{!! url('images/logo.svg') !!}"
                data-name="Emma's Farm CSA"
                data-description="Subscription for 1 weekly box"
                data-amount="1000"
                data-currency="AMD"
                data-label="Sign Me Up!">
        </script>
    </form>
@stop