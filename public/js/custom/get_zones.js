window.postSendAjax = function(url, data, success, error) {
    $.ajax({
        type: "post",
        url: url,
        cache: false,
        datatype: "json",
        data: data,
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
        },
        success: function(data) {
            if (success) {
                success(data);
            }
            return data;
        },
        error: function(errorThrown) {
            if (error) {
                error(errorThrown);
            }
            return errorThrown;
        }
    });
};

function makeSearchItem(basicData) {
    // basicData = {
    //     input: "input",
    //     name: "name",
    //     url: "url",
    //     title: "title",
    //     inputValues: "inputValues",
    //     containerForAppend: "containerForAppend",
    //     inputValues: "inputValues"
    // };
    var userList = null;
    $.ajax({
        url: basicData.url,
        type: "POST",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $("input[name='_token']").val()
        },
        success: function(data) {
            userList = data.map(item => item.name);
        }
    });
    $(basicData.input).tagsinput({
        maxTags: 5,
        confirmKeys: [13, 32, 44],
        typeaheadjs: {
            displayKey: basicData.name,
            valueKey: basicData.name,
            source: function(query, processSync, processAsync) {
                return $.ajax({
                    url: basicData.url,
                    type: "POST",
                    data: { q: query },
                    dataType: "json",
                    headers: {
                        "X-CSRF-TOKEN": $("input[name='_token']").val()
                    },
                    success: function(json) {
                        return processAsync(json);
                    }
                });
            },
            templates: {
                empty: [
                    '<div class="empty-message">',
                    "No results",
                    "</div>"
                ].join("\n"),
                header: `<h4>${basicData.title}</h4><hr>`,
                suggestion: function(data) {
                    return `<div class="user-search-result"><span> ${
                        data[basicData.name]
                    } </span></div>`;
                }
            }
        }
    });
    $(basicData.input).on("beforeItemAdd", function(event) {
        event.cancel = true;
        let valueCatergorayName = $(basicData.inputValues).val();
        if (
            !valueCatergorayName.includes(event.item) &&
            userList.includes(event.item)
        ) {
            $(basicData.containerForAppend).append(makeSearchHtml(event.item));
            if (
                $(basicData.inputValues)
                    .val()
                    .trim()
            ) {
                let arr = JSON.parse($(basicData.inputValues).val());
                arr.push(event.item);
                $(basicData.inputValues).val(JSON.stringify(arr));
                return;
            }
            let elm = [event.item];
            $(basicData.inputValues).val(JSON.stringify(elm));
            return;
        }
    });

    function makeSearchHtml(data) {
        return `<li><span class="remove-search-tag"><i class="fa fa-minus-circle"></i></span>${data}</li>`;
    }
}

$("body").on("input", "#region", function(e) {
    e.preventDefault();
    let country = $("#country").val();
    let val = $(this).val();
    $("#coupon-category").show();

    AjaxCall(
        "/admin/store/shipping-zones/find-region",
        { id: val, country: country },
        function(res) {
            if (!res.error) {
                $(".coupon-category-list").empty();
                console.log(res);
                Object.values(res.data).forEach(item => {
                    if (item !== null) {
                        $(".coupon-category-list").append(
                            `<li class="region-item">${item}</li>`
                        );
                    }
                });
            }
        }
    );
});

$("body").on("click", ".region-item", function() {
    let value = $(this).text();
    $("#region").val(value);
    $(".coupon-category-list").empty();
    $("#coupon-category").hide();
});

$("body").on("click", ".remove-ship-filed", function() {
    $(this)
        .closest("tr")
        .remove();
});

$("body").on("click", ".delete-all-option", function(e) {
    console.log();
    let id = $(this).attr("data-table-id");
    $("body")
        .find(`[data-table-id="${id}"]`)
        .closest(".container-for-table-remove")
        .remove();
});

$("body").on("change", "#ShippingZones", function(e) {
    console.log(1111);
    e.preventDefault();
    let val = $(this).val();
    let text = $(this)
        .closest("tr")
        .find("#ShippingZones :selected")
        .text();
    let id = $(this)
        .closest("tr")
        .attr("data-table-id");

    let html2 = `
<table class="table table-responsive table--store-settings container-for-table-remove" data-table-id="${id}">
      <tr class="bg-my-light-blue">
      <td>Shipping Zone - <span class="shipzone">${val}</span></td>
      <td colspan="3">Tax Rate - <span class="taxzone">${text}</span></td>
      <td colspan="2" class="text-right"><button type="button" data-table-id="${id}" class="btn btn-primary delete-all-option"><i class="fa fa-trash"></i></button></span></td>
          </tr>
          <tbody>

          <tr class="bg-my-light-pink">
              <th>Order Amount</th>
              <th>Courier</th>
              <th>Cost</th>
              <th colspan="3">Time</th>
          </tr>
          <tr>
              <td class="table--store-settings_vert-top">
                  <input type="number" min="1" max="5" class="form-control" style="display: inline-block; width: auto">
                  <span>To</span>
                  <input type="number" min="1" max="50" class="form-control" style="display: inline-block; width: auto">
              </td>
              <td>
                  <select id="PosType" class="form-control">
                      <option selected>Normal Post</option>
                      <option>...</option>
                  </select>
              </td>
              <td>
                  <span class="form-control">
                      5
                  </span>
              </td>
              <td>
                  <span class="form-control">
                      3 days
                  </span>
              </td>
              <td colspan="2" class="text-right">
                  <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
              </td>
          </tr>
          <tr>
              <td></td>
              <td>
                  <select id="dhl" class="form-control">
                      <option selected>DHL</option>
                      <option>...</option>
                  </select>
              </td>
              <td>
                  <span class="form-control">
                      5
                  </span>
              </td>
              <td>
                  <span class="form-control">
                      1 day
                  </span>
              </td>
              <td colspan="2" class="text-right">
                  <button type="button" class="btn btn-danger remove-ship-filed"><i class="fa fa-minus-circle"></i></button>
              </td>
          </tr>
          <tr class="add-new-ship-filed-container">
              <td colspan="6" class="text-right">
                  <button type="button" class="btn btn-primary add-new-ship-filed"><i class="fa fa-plus-circle"></i></button>
              </td>
          </tr>
          </tbody>
          <tfoot>
          <tr>
              <td colspan="5" class="text-center table--store-settings_add-options add-new-order-filed">
                  <span><i class="fa fa-plus"></i></span> Add more option
              </td>
          </tr>
          </tfoot>
      </table>`;

    // console.log($(`table[data-table-id="${id}"]`))
    // $(`table[data-table-id="${id}"]`).find('.shipzone').text(text);
    // console.log($(`table[data-table-id="${id}"]`).find('.shipzone').text())
    // $(`table[data-table-id="${id}"]`).find('.taxzone').text(val);
    $("#myTabContent").append(html2);
});

makeSearchItem({
    input: "#input-category",
    name: "name",
    url: "/admin/settings/store/shipping/search-payment-options",
    title: "Categoris",
    inputValues: "#category-names",
    containerForAppend: ".coupon-category-list"
});
