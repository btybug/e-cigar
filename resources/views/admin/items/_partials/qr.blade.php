<div class="col-md-6">
    <div class="col-md-12">
        {!! \DNS2D::getBarcodeHTML('https://kaliony.com/landings/'.$code, "QRCODE") !!}
    </div>
    <div class="col-md-12">
        <a class="btn btn-success" href="{{ route("admin_items_download_code",[$code]) }}">Download QR code</a>
    </div>
</div>
<div class="col-md-6">
    <div class="col-md-12">
        @if(strlen($code) == 13)
            <img src="{!! \App\Services\EAN13render::get($code,public_path('BARCODE.png'),200,100) !!}" />
        @else
            Barcode is invalid, need to be 13 numbers
        @endif
    </div>
    @if(strlen($code) == 13)
    <div class="col-md-12">
        <a class="btn btn-success" href="{{ route("admin_items_download_code",[$code,'barcode']) }}">Download Barcode</a>
    </div>
    @endif
</div>
