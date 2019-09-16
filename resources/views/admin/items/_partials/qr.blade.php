<div class="col-md-12">
    {!! \DNS2D::getBarcodeHTML(env('APP_URL').'/landings/'.$code, "QRCODE") !!}
</div>
<div class="col-md-12">
    <a class="btn btn-success" href="{{ route("admin_items_download_code",[$code]) }}">Download QR code</a>
    <a class="btn btn-success" href="{{ route("admin_items_download_code",[$code,'barcode']) }}">Download Barcode</a>
</div>

