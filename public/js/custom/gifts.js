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
        $("#select-product-option").select2();
    }
});

if ($("#select-product-option").length) {
    $("#select-product-option").select2();
}

$("body").on("click", `[name="optradio"]`, function() {
    $(".radio-wall-container")
        .empty()
        .append(HTML[value]);
});

$("body").on("click", ".add-more-query", function(e) {
    $(this)
        .find("i")
        .attr("class", "fa fa-trash");
    e.preventDefault();
    $(this).attr("class", "btn btn-danger btn-sm remove-more-query");

    let html = `<tr>
  <td>Were</td>
  <td>
     <select name="" class="form-control">
        <option value="">Colum</option>
        <option value="">2</option>
        <option value="">3</option>
     </select>
  </td>
  <td>
     <select name="" class="form-control">
        <option value="">Condition</option>
        <option value="">2</option>
        <option value="">3</option>
     </select>
  </td>
  <td><input type="text" class="form-control"></td>
  <td>
     <button class="btn btn-info btn-sm add-more-query"><i class="fa fa-plus"></i></button>
  </td>
</tr>`;

    $(".query-tbody").append(html);
});

$("body").on("click", ".remove-more-query", function() {
    $(this)
        .closest("tr")
        .remove();
});
