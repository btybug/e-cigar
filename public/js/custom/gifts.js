const HTML = {
    product: `<div class="select-product wall-select">
<div class="form-group">
    <div class="">
        <label class="col-md-3 control-label">Select Product</label>
        <div class="col-md-9">
            <select name="" id="select-product-option" class="form-control">
                <option value="">1</option>
                <option value="">2</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="">
        <label class="col-md-3 control-label">Count</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="1">
        </div>
    </div>
</div>
</div>`,

    order_amount: `<div class="select-amount wall-select">
<div class="form-group">
    <div class="">
        <label class="col-md-3 control-label">Select Amount</label>
        <div class="col-md-9">
            <input type="text" class="form-control" placeholder="ex.-30$">
        </div>
    </div>
</div>
</div>`,
    promo_code: `<div class="select-promocode wall-select">
  <div class="form-group">
      <div class="col-md-12">
          Promocode
      </div>
  </div>
</div>`
};

$("#based-on").on("change", function() {
    let value = $(this).val();
    $(".based-on-container")
        .empty()
        .append(HTML[value]);
    if (value === "product") {
        console.log(111);
        $("#select-product-option").select2();
    }
});

if ($("#select-product-option").length) {
    $("#select-product-option").select2();
}

$("body").on("click", `[name="optradio"]`, function() {
    console.log(111);
});
