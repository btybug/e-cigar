const selectProductModalInit = function () {
  const search = $('#search-product');
  const brands = $('#brand_select');
  const categories = $('#category_select');

  if($('.search_option_js').val() === 'general') {
      brands.removeClass('d-inline');
      brands.addClass('d-none');
      categories.removeClass('d-inline');
      categories.addClass('d-none');
      search.removeClass('d-none');
      search.addClass('d-inline');
      search.val('');
      var value = '';
      $("ul.all-list .option-elm-modal").filter(function() {
          $(this).toggle($(this).find('div.searchable').data('name').toLowerCase().indexOf(value) > -1)
      });
  } else if($('.search_option_js').val() === 'brand') {
    search.removeClass('d-inline');
    search.addClass('d-none');
    categories.removeClass('d-inline');
    categories.addClass('d-none');
    brands.removeClass('d-none');
    brands.addClass('d-inline');
    $(brands.find('option')[0]).prop('selected', true);
    var value = '';
    $("ul.all-list .option-elm-modal").filter(function() {
        $(this).toggle($(this).find('div.searchable').data('name').toLowerCase().indexOf(value) > -1)
    });
  } else if($('.search_option_js').val() === 'category') {
    search.removeClass('d-inline');
    search.addClass('d-none');
    brands.removeClass('d-inline');
    brands.addClass('d-none');
    categories.removeClass('d-none');
    categories.addClass('d-inline');
    $(categories.find('option')[0]).prop('selected', true)
    var value = '';
    $("ul.all-list .option-elm-modal").filter(function() {
        $(this).toggle($(this).find('div.searchable').data('name').toLowerCase().indexOf(value) > -1)
    });
  }
}

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
            let categories_ids = '-';
            item.categories.map((cat) => {
              categories_ids = categories_ids + cat.id + '-';
            })
            let html = `<li data-id="${item.id}" class="option-elm-modal">
                          <div class="btn btn-primary add-related-event searchable" data-name="${item.name}" data-brand-id="${item.brand_id}" data-categories-ids="${categories_ids}"
                            data-id="${item.id}"><input type="checkbox" class="select_product_js"/>
                          </div>
                          <a href="#">${item.name}</a>
                        </li>`;
            $("#productsModal .modal-body .all-list").append(html);
          });
          $('#category_select').append(`<option value="" disabled selected>Select Category</option>`)
          res.categories.forEach(category => {
            let html = `<option value="${category.id}">${category.name}</option>`;
            $('#category_select').append(html)
          });
          $('#brand_select').append(`<option value="" disabled selected>Select Brand</option>`)
          res.brands.forEach(brand => {
            let html = `<option value="${brand.id}">${brand.name}</option>`;
            $('#brand_select').append(html)
          });
          selectProductModalInit();
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

$('body').on('change', '.search_option_js', function() {
  selectProductModalInit();
});

$("body").on("keyup", '.search-attr', function() {
  console.log($(this).val())
  var value = $(this).val().toLowerCase();
  $("ul.all-list .option-elm-modal").filter(function() {
      $(this).toggle($(this).find('div.searchable').data('name').toLowerCase().indexOf(value) > -1)
  });
});

$('body').on('change', '#brand_select', function() {
  var value = $(this).val();
  $("ul.all-list .option-elm-modal").filter(function() {
    console.log(Number($(this).find('div.searchable').data('brand-id')), Number(value))
      $(this).toggle(Number($(this).find('div.searchable').data('brand-id')) === Number(value))
  });
});

$('body').on('change', '#category_select', function() {
  var value = $(this).val();
  $("ul.all-list .option-elm-modal").filter(function() {
      $(this).toggle($(this).find('div.searchable').data('categories-ids').indexOf('-' + value + '-') > -1)
  });
});



$("body").on("click", ".done_select_product_js", function () {
  $('.select_product_js').each(function(index, product) {
    if($(product).prop('checked')) {
        const id = $(product).closest('.add-related-event').data('id');
        const name =  $(product).closest('.add-related-event').data('name');
        $(".get-all-products-tab")
        .append(`<li style="display: flex" data-id="${id}" class="option-elm-attributes"><a
                    href="#">${name}</a>
                    <div class="buttons">
                    <a href="javascript:void(0)" class="remove-all-attributes btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                    <input type="hidden" name="related_products[]" value="${id}" />
                    </li>`);
    }
  })
});

