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
                    basicData: { q: query },
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
    // $(basicData.input).on("beforeItemAdd", function(event) {
    //     event.cancel = true;
    //     let valueCatergorayName = $(basicData.inputValues).val();
    //     if (!valueCatergorayName.includes(event.item)) {
    //         $(basicData.containerForAppend).append(makeSearchHtml(event.item));
    //         if (
    //             $(basicData.inputValues)
    //                 .val()
    //                 .trim()
    //         ) {
    //             let arr = JSON.parse($(basicData.inputValues).val());
    //             arr.push(event.item);
    //             $(basicData.inputValues).val(JSON.stringify(arr));
    //             return;
    //         }
    //         let elm = [event.item];
    //         $(basicData.inputValues).val(JSON.stringify(elm));
    //         return;
    //     }
    // });

    function makeSearchHtml(data) {
        return `<li><span class="remove-search-tag"><i class="fa fa-minus-circle"></i></span>${data}</li>`;
    }
}

$("body").on("click", ".get-all-attributes-tab-event", function() {
    let arr = [];
    $(".get-all-attributes-tab")
        .children()
        .each(function() {
            arr.push($(this).attr("data-id"));
        });
    AjaxCall("/admin/inventory/attributes/get-all", { arr }, function(res) {
        if (!res.error) {
            $("#attributesModal .modal-body .all-list").empty();
            res.data.forEach(item => {
                let html = `<li data-id="${item.id}" class="option-elm-modal"><a
                                                href="#">${
                                                    item.name
                                                }</a> <a class="btn btn-primary add-attribute-event" data-id="${
                    item.id
                }">ADD</a></li>`;
                $("#attributesModal .modal-body .all-list").append(html);
            });
            $("#attributesModal").modal();
        }
    });
});

$("body").on("click", ".add-attribute-event", function() {
    let id = $(this).data("id");
    AjaxCall("/admin/inventory/attributes/get-attribute", { id: id }, function(
        res
    ) {
        if (!res.error) {
            let id = res.data.id;
            AjaxCall(
                "/admin/inventory/attributes/get-options-by-id",
                { id },
                function(res2) {
                    if (!res2.error) {
                        $(".get-all-attributes-tab")
                            .append(`<li style="display: flex" data-id="${
                            res.data.id
                        }" class="option-elm-attributes"><a
                                                href="#">${res.data.name}</a>
                                                <div class="buttons">
                                                <button class="btn btn-sm btn-success"><i class="fa fa-money"></i></button>
                                                <button  class="remove-all-attributes btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                                </div>
                                                </li>`);
                        $(".choset-attributes").append(
                            `<div style="height: 50px" class="attributes-container-${id} main-attr-container"></div>`
                        );
                        console.log(res2.data);
                        let value = "";
                        res2.data.forEach(item => {
                            value += item.name + ",";
                            let html = `<li class="btn btn-primary attributes-item">
                                          <a href="#" class="title-attr">${
                                              item.name
                                          }</a>
                                           <span class="restore-item badge"><i class="fa fa-trash" ></i></span>
                                        </li>`;
                        });
                        $(`.attributes-container-${id}`).append(
                            `<input class="attributes-item-input-${id}"  value="${value}"> `
                        );
                        // Tags
                        makeSearchItem({
                            input: `.attributes-item-input-${id}`,
                            name: "name",
                            url:
                                "/admin/inventory/attributes/get-options-by-id",
                            title: "Attributes",
                            inputValues: "#tags-names",
                            containerForAppend: ".coupon-tags-list"
                        });
                    }
                }
            );
        }
    });
    $(this)
        .parent()
        .remove();
});
$("body").on("click", ".remove-all-attributes", function() {
    let id = $(this)
        .closest("li")
        .attr("data-id");
    $("body")
        .find(`.attributes-container-${id}`)
        .remove();
    $(this)
        .closest("li")
        .remove();
});

$("body").on("click", ".get-all-attributes", function() {
    let arr = [];
    $(".attribute-list-items")
        .children()
        .each(function() {
            arr.push($(this).attr("data-id"));
        });
    AjaxCall("/admin/inventory/attributes/get-all", { arr }, function(res) {
        if (!res.error) {
            $("#attributesModal .modal-body .all-list").empty();
            res.data.forEach(item => {
                let html = `  <li data-id="${
                    item.id
                }" class="option-elm-modal"><a
                                                href="#">${
                                                    item.name
                                                }</a> <a class="btn btn-primary add-attribute" data-id="${
                    item.id
                }">ADD</a></li>`;
                $("#attributesModal .modal-body .all-list").append(html);
            });
            $("#attributesModal").modal();
        }
    });
});

$("body").on("click", ".add-attribute", function() {
    let id = $(this).data("id");
    AjaxCall("/admin/inventory/attributes/get-attribute", { id: id }, function(
        res
    ) {
        if (!res.error) {
            $(".attribute-list-items").append(`<li data-id="${
                res.data.id
            }" class="option-elm-variations"><a
                                                href="#">${
                                                    res.data.name
                                                }</a></li>`);
        }
    });
    $(this)
        .parent()
        .remove();
});

$("body").on("click", ".option-elm-attributes", function() {
    let id = $(this).attr("data-id");
    AjaxCall("/admin/inventory/attributes/get-options-by-id", { id }, function(
        res
    ) {
        if (!res.error) {
            $(".list-attributes-options").empty();
            res.data.forEach(item => {
                let html = `<li class="badge attributes-item"><a href="#">${
                    item.name
                }</a></li>`;
                $(".list-attributes-options").append(html);
            });
        }
    });
});

$("body").on("click", ".option-elm-variations", function() {
    let id = $(this).attr("data-id");
    AjaxCall(
        "/admin/inventory/attributes/get-variations-table",
        { id },
        function(res) {
            if (!res.error) {
                $(".variations-table")
                    .empty()
                    .append(res.html);
            }
        }
    );
});

// $("body").on("click", ".attributes-item", function () {
//     // AJax petqa
//     let text = $(this).children().text()

//     $(".choset-attributes").append(`<li>${text} <span class="restore-item"><i class="fa fa-trash"></i></span> </li>`)
//     $(this).remove()
// })

$("body").on("click", ".restore-item", function() {
    // let text = $(this).parent().text()
    $(this)
        .closest("li")
        .remove();
    // let html = `<li class="badge attributes-item"><a href="#">${text}</a></li>`
    // $(".list").append(html)
});

var discount_row = 3;

function addDiscount() {
    html = '<tr id="discount-row' + discount_row + '">';
    html +=
        '  <td class="text-left"><select name="product_discount[' +
        discount_row +
        '][customer_group_id]" class="form-control">';
    html += '    <option value="1">Default</option>';
    html += "  </select></td>";
    html +=
        '  <td class="text-right"><input type="text" name="product_discount[' +
        discount_row +
        '][quantity]" value="" placeholder="Quantity" class="form-control" /></td>';
    html +=
        '  <td class="text-right"><input type="text" name="product_discount[' +
        discount_row +
        '][priority]" value="" placeholder="Priority" class="form-control" /></td>';
    html +=
        '  <td class="text-right"><input type="text" name="product_discount[' +
        discount_row +
        '][price]" value="" placeholder="Price" class="form-control" /></td>';
    html +=
        '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' +
        discount_row +
        '][date_start]" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
    html +=
        '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' +
        discount_row +
        '][date_end]" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
    html +=
        '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' +
        discount_row +
        '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += "</tr>";

    $("#discount tbody").append(html);

    $("#tab-discount .date").datetimepicker({});

    discount_row++;
}

$("#tab-discount .date").datetimepicker({
    language: "en-gb"
});
