<div class="row">
    <div class="col-xl-3">
        QR CODE
    </div>
    <div class="col-xl-6">
        {!! \DNS2D::getBarcodeHTML('https://kaliony.com/landings/'.$code, "QRCODE") !!}
    </div>
    <div class="col-xl-3">
        <a class="btn btn-success" href="{{ route("admin_items_download_code",[$code,'qr',($model)?$model->name: null]) }}">Download QR code</a>
    </div>
</div>
<div class="row mt-5">
    <div class="col-xl-3">
       BARCODE
    </div>
    <div class="col-xl-6">
        @if(strlen($code) == 13)
            <img src="{!! url('public/barcodes/'.$code.'.png') !!}" />
        @else
            Barcode is invalid, need to be 13 numbers
        @endif
    </div>

    <div class="col-xl-3">
        @if(strlen($code) == 13)
            <a class="btn btn-success" href="{{ route("admin_items_download_code",[$code,'barcode',($model)?$model->name: null]) }}">Download Barcode</a>
        @endif
    </div>
</div>

