$("body").on('click', '.select-products', function () {
  let arr = [];
  $(".get-all-products-tab")
      .children()
      .each(function () {
          arr.push($(this).attr("data-id"));
      });
  AjaxCall("/admin/get-stocks", {arr: arr, promotion: 0}, function (res) {
      if (!res.error) {
          $("#productsModal .modal-body .all-list").empty();
          res.data.forEach(item => {
            let html = `<li data-id="${item.id}" class="option-elm-modal">
                          <div class="btn btn-primary add-related-event searchable" data-name="${item.name}"
                            data-id="${item.id}"><input type="checkbox" class="select_product_js"/>
                          </div>
                          <a href="#">${item.name}</a>
                        </li>`;
            $("#productsModal .modal-body .all-list").append(html);
          });
          $("#productsModal").modal();
      }
  });
});

$('body').on('change', '.all_select_products_js', function(ev) {
  let flag;

  $(ev.target).prop('checked') ? (flag = true) : (flag = false);
  $('#productsModal .all-list').find('.select_product_js').each(function(index, product) {
    const $product = $(product);
    flag ? $product.prop('checked', true) : $product.prop('checked', false);
  });
});

$('body').on('change', '.select_product_js', function(ev) {
  let flag = 0;
  const length = $('.select_product_js').length;
  $('.select_product_js').each(function(index, product) {
    const $product = $(product);
    if($product.prop('checked')) {
      flag += 1;
    }
  });
  if(flag < length) {
    $('.all_select_products_js').prop('checked', false);
  } else if(flag === length) {
    $('.all_select_products_js').prop('checked', true);
  }
});

// $("body").on("click", ".add-related-event", function () {
//   let id = $(this).data("id");
//   let name = $(this).data("name");
//   $(".get-all-products-tab")
//       .append(`<li style="display: flex" data-id="${id}" class="option-elm-attributes"><a
//                   href="#">${name}</a>
//                   <div class="buttons">
//                   <a href="javascript:void(0)" class="remove-all-attributes btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
//                   </div>
//                   <input type="hidden" name="related_products[]" value="${id}" />
//                   </li>`);
//   $(this)
//       .parent()
//       .remove();
// });

