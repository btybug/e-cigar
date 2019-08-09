<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! env('SITE_NAME','ADMIN') !!}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{asset('public/css/invoice.css?v='.rand(111,999))}}">
    <style>
        @font-face {
            font-family: 'Oswald-Regular';
            src: {{ url('/public/fonts/Oswald-Regular.eot') }};
            src: {{ url('/public/fonts/Oswald-Regular.eot?#iefix') }} format('embedded-opentype'),
            {{ url('/public/fonts/Oswald-Regular.woff2') }} format('woff2'),
            {{ url('/public/fonts/Oswald-Regular.woff') }} format('woff'),
            {{ url('/public/fonts/Oswald-Regular.ttf') }} format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Roboto-Regular';
            src: {{ url('/public/fonts/Roboto-Regular.eot') }};
            src: {{ url('/public/fonts/Roboto-Regular.eot?#iefix') }} format('embedded-opentype'),
        {{ url('/public/fonts/Roboto-Regular.woff2')  }} format('woff2'),
            {{url('/public/fonts/Roboto-Regular.woff')  }} format('woff'),
            {{ url('/public/fonts/Roboto-Regular.ttf')  }} format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Roboto-Medium';
            src: {{url('/public/fonts/Roboto-Medium.eot')}};
            src: {{url('/public/fonts/Roboto-Medium.eot?#iefix')}} format('embedded-opentype'),
            {{url('/public/fonts/Roboto-Medium.woff2')}} format('woff2'),
            {{url('/public/fonts/Roboto-Medium.woff')}} format('woff'),
            {{url('/public/fonts/Roboto-Medium.ttf')}} format('truetype');
            font-weight: 500;
            font-style: normal;
        }
    </style>
</head>
<body>
<div class="invoice__wrapper">

    <div class="invoice__wrapper-header"></div>

    <div class="invoice__wrapper-main-content clearfix">
        <div class="invoice__content-logo clearfix">
                                        <span class="icon">
                   <img src="{{ url(get_site_logo()) }}" alt="logo">
                </span>
        </div>
        <div
            class="invoice__content-info">
            <div class="invoice__content-info-left">
                <p class="title">To:</p>
                <p class="bold-title">Customer Name</p>
                <p>Wilkinson Way, Blackburn</p>
                <p>BB1 2EH, London</p>
                <p>United Kingdom</p>
            </div>
            <div class="invoice__content-info-right">
                <p>The Vapors Hub Ltd, GM</p>
                <p>Wilkinson Way, Blackburn</p>
                <p>Lancashire, BB1 2EH</p>
                <p>London, UK</p>
                <p>Company number: 47655666</p>
                <p>VAT number: 978886765766</p>
            </div>
        </div>
        <h1 class="main-title">INVOICE</h1>
        <div class="invoice__table-wrap">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" class="product-th">Product</th>
                        <th scope="col">Description</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">VAT</th>
                        <th scope="col" class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="product-td">Kangertech Vola 23 100W Premium Vape
                        </td>
                        <td class="desc-td">
                            <div class="single-item">
                                <span class="single-item-name">Pods Gold Edition</span>
                                <span class="single-item-price">$28</span>
                            </div>
                            <div class="single-item">
                                <span class="single-item-name">Gold Tobacco Nic.Salts 18mg</span>
                                <span class="single-item-price">$55</span>
                            </div>
                        </td>
                        <td class="qty-td text-center">
                            <span>x 1</span>
                        </td>
                        <td class="vat-td text-center">
                            <span>£18 (21%)</span>
                        </td>
                        <td class="total-td text-center">
                            <span class="price">£83,00</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="product-td">Kangertech Vola 23 100W Premium Vape
                        </td>
                        <td class="desc-td">
                            <div class="single-item">
                                <span class="single-item-name">Pods Gold Edition</span>
                                <span class="single-item-price">$28</span>
                            </div>
                            <div class="single-item">
                                <span class="single-item-name">Gold Tobacco Nic.Salts 18mg</span>
                                <span class="single-item-price">$55</span>
                            </div>
                        </td>
                        <td class="qty-td text-center">
                            <span>x 1</span>
                        </td>
                        <td class="vat-td text-center">
                            <span>£18 (21%)</span>
                        </td>
                        <td class="total-td text-center">
                            <span class="price">£83,00</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="invoice__content-paid-price">
            <div class="invoice__content-paid">
                <img src="{{ url('/public/img/temp/paid-invoice.png') }}" alt="paid">
            </div>
            <div class="invoice__content-price">
                <div class="invoice__content-price-item clearfix">
                    <span class="name">Sub Total</span>
                    <span class="price">£18,00</span>
                </div>
                <div class="invoice__content-price-item clearfix">
                    <span class="name">Total VAT</span>
                    <span class="price">£08,00</span>
                </div>
                <div class="invoice__content-price-item clearfix">
                    <span class="name">Shipping</span>
                    <span class="price">£10,00</span>
                </div>
                <div class="invoice__content-price-item total-amount-wall clearfix">
                    <span class="name total-name">Total Amount</span>
                    <span class="price total-price">
                        <span>£86,</span>
                        <span class="sec-price">95</span>
                    </span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="invoice__wrapper-footer clearfix">
        <ul class="left-list">
            <li>The Vapors Hub Ltd, GM</li>
            <li>Wilkinson Way, Blackburn</li>
            <li>Lancashire, BB1 2EH</li>
            <li>London, UK</li>
        </ul>
        <ul class="right-list">
            <li>TheVaporsHub.com</li>
            <li>Info@TheVaporsHub.com</li>
            <li>Tel: +32 456 586 56</li>
        </ul>
    </div>
</div>

</body>
</html>



