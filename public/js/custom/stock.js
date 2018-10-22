const attributesJson = {};
function makeSearchItem(basicData) {
    var userList = null;
    $.ajax({
        url: basicData.url,
        type: "POST",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $("input[name='_token']").val()
        },
        success: function(data) {
            userList = data;
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
        console.log(userList);
        checkUser = userList.some(item => {
            return item.name === event.item;
        });
        event.cancel = !checkUser;
        console.log(event.cancel);
    });
    $(basicData.input).on("itemAdded", function() {
        let id = $(this).attr("data-id");
        addAttributeToJSON(id);
    });
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

$(document).on('beforeItemRemove', 'input', function(event) {
    console.log(event.item);
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
                            .append(`<li style="display: flex" data-option-container="${id}" data-id="${
                            res.data.id
                        }" class="option-elm-attributes"><a
                                                href="#">${res.data.name}</a>
                                                <div class="buttons">
                                                <a href="javascript:void(0)" class="btn btn-sm all-option-add-variations btn-success"><i class="fa fa-money"></i></a>
                                                <a href="javascript:void(0)" class="remove-all-attributes btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </div>
                                                <input type="hidden" name="attributes[]" value="${id}">
                                                </li>`);
                        $(".choset-attributes").append(
                            `<div style="height: 50px" class="attributes-container-${id} main-attr-container"></div>`
                        );
                        console.log(res2.data);
                        let value = "";
                        let optionIds = "";
                        res2.data.forEach(item => {
                            value += item.name + ",";
                            optionIds += item.id + ",";
                            let html = `<li class="btn btn-primary attributes-item">
                                          <a href="#" class="title-attr">${
                                              item.name
                                          }</a>
                                           <span class="restore-item badge"><i class="fa fa-trash" ></i></span>
                                        </li>`;
                        });
                        $(`.attributes-container-${id}`).append(
                            `<input data-id=${id} class="attributes-item-input-${id}"  value="${value}">
                             <input type="hidden" name="options[${id}]" value="${optionIds}">`
                        );
                        // Tags
                        makeSearchItem({
                            input: `.attributes-item-input-${id}`,
                            name: "name",
                            url: `/admin/inventory/attributes/get-options-by-id/${id}`,
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

$("body").on("click", ".all-option-add-variations", function() {
    let id = $(this)
        .closest(".option-elm-attributes")
        .attr("data-id");
    if ($(this).hasClass("btn-success")) {
        $(this)
            .removeClass("btn-success")
            .addClass("btn-primary");
        addAttributeToJSON(id);
    } else {
        $(this)
            .removeClass("btn-primary")
            .addClass("btn-success");
        addAttributeToJSON(id, true);
    }
});

function addAttributeToJSON(id, remove = false) {
    let mainContainer = $("body").find(`[data-option-container="${id}"]`);
    let className = mainContainer
        .find(".all-option-add-variations")
        .hasClass("btn-primary");
    console.log(className);
    let text = mainContainer.find("a").text();
    let classInputContainer = `.attributes-container-${id}`;
    let inputOptions = $(classInputContainer).find(
        `.attributes-item-input-${id}`
    );
    let inputOptionsValue = inputOptions.val();

    if (!remove && className) {
        attributesJson[text] = inputOptionsValue.split(",");
    } else {
        delete attributesJson[text];
    }

    console.log(attributesJson);
}

function HTMLmakeSelectVaritionOptions(name, data, text = "") {
    let value = "";
    data.forEach(
        item =>
            (value += `<option ${
                text === item ? "selected" : ""
            }>${item}</option>`)
    );
    return `<div class="form-group">
        <label for="exampleFormControlSelect1">${name}</label>
        <select class="form-control" id="exampleFormControlSelect1">
          ${value}
        </select>
      </div>`;
}

$("body").on("click", ".get-variation", function() {
    let html = "";
    if (
        Object.keys(attributesJson).length === 0 ||
        $(".list-attrs-single-item").length ===
            nestedObjectToArray(attributesJson).length
    )
        return false;
    Object.entries(attributesJson).forEach(([key, val]) => {
        html += HTMLmakeSelectVaritionOptions(key, val);
    });
    $(".all-list-attrs").append(
        `<div class="list-attrs-single-item" style="display: flex; justify-content: space-between;"><div>
        <button class="variation-select"><i class="fa fa-list"></i></button>
     </div> ${html} <div><button class="remvoe-variations-select"><i class="fa fa-trash"></i></button></div> <div>`
    );
});

$("body").on("click", ".remvoe-variations-select", function() {
    $(this)
        .closest(".list-attrs-single-item")
        .remove();
});

$("body").on("click", ".get-all-variations", function() {
    $(".all-list-attrs").empty();
    AjaxCall(
        "/admin/inventory/stock/link-all",
        { data: attributesJson },
        function(res) {
            if (!res.error) {
                $(".all-list-attrs").html(res.html);
            }
            console.log(res);
        }
    );
});

$("body").on("click", ".variation-select", function() {
    var variationId = $(this).attr('variation-id');
    var data = $("body").find("#variation_"+variationId).val();
    AjaxCall("/admin/inventory/stock/variation-form", {variationId:variationId,data:data}, function(res) {
        if (!res.error) {
            $(".variation-settings")
                .empty()
                .append(res.html);
        }
    });
});

$("body").on("click", ".apply-variation", function() {
    var data = [];
    var variationId = $(this).attr('variation-id');
    var varationForm = $("#variation_form").serializeArray();
    // $.each(varationForm, function(key, val) {
    //     var name = val.name;
    //     data[name] = val.value;
    // });
    var obj = varationForm.reduce(function ( total, current ) {
        total[ current.name ] = current.value;
        return total;
    }, {});
    $("#variation_"+variationId).val(JSON.stringify(obj));
    $("#variation_form").remove();
});

// val.forEach((item, index) => {
//     // console.log(item)
//     // console.log(index)
//     // console.log(val)
//     html += HTMLmakeSelectVaritionOptions(key, val, item);
//     console.log(HTMLmakeSelectVaritionOptions(key, val, item));
// });
// // console.log(html);
// var discount_row = 3;

// function addDiscount() {
//     html = '<tr id="discount-row' + discount_row + '">';
//     html +=
//         '  <td class="text-left"><select name="product_discount[' +
//         discount_row +
//         '][customer_group_id]" class="form-control">';
//     html += '    <option value="1">Default</option>';
//     html += "  </select></td>";
//     html +=
//         '  <td class="text-right"><input type="text" name="product_discount[' +
//         discount_row +
//         '][quantity]" value="" placeholder="Quantity" class="form-control" /></td>';
//     html +=
//         '  <td class="text-right"><input type="text" name="product_discount[' +
//         discount_row +
//         '][priority]" value="" placeholder="Priority" class="form-control" /></td>';
//     html +=
//         '  <td class="text-right"><input type="text" name="product_discount[' +
//         discount_row +
//         '][price]" value="" placeholder="Price" class="form-control" /></td>';
//     html +=
//         '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' +
//         discount_row +
//         '][date_start]" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
//     html +=
//         '  <td class="text-left" style="width: 20%;"><div class="input-group "><input type="text" name="product_discount[' +
//         discount_row +
//         '][date_end]" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control date" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
//     html +=
//         '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' +
//         discount_row +
//         '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
//     html += "</tr>";

//     $("#discount tbody").append(html);

//     $("#tab-discount .date").datetimepicker({});

//     discount_row++;
// }

// $("#tab-discount .date").datetimepicker({
//     language: "en-gb"
// });

// HELPERSSSSSSSSSSSSSSSSS

function nestedObjectToArray(obj) {
    if (typeof obj !== "object") {
        return [obj];
    }
    var result = [];
    if (obj.constructor === Array) {
        obj.map(function(item) {
            result = result.concat(nestedObjectToArray(item));
        });
    }
    {
        Object.keys(obj).map(function(key) {
            if (obj[key]) {
                var chunk = nestedObjectToArray(obj[key]);
                chunk.map(function(item) {
                    result.push(key + "-" + item);
                });
            } else {
                result.push(key);
            }
        });
    }
    return result;
}

// MEDIAAAAAAAAAAAAAAAAAAAA

const HTMLyoutubeLinkToIframe = data => {
    let videoId = data.split("v=")[1];
    let ampersandPosition = videoId.indexOf("&");
    if (ampersandPosition != -1) {
        videoId = videoId.substring(0, ampersandPosition);
    }
    if ($(`[value="${videoId}"]`).length !== 0) return false;
    return `<div class="video-single-item" style="display: flex"><iframe width="200" height="200"
    src="https://www.youtube.com/embed/${videoId}">
    </iframe><div><button class="btn btn-danger remove-video-single-item"><i class="fa fa-trash"></i></button></div><input type="hidden" name="videos[]" value="${videoId}"> </div>`;
};

$("body").on("click", ".add-video-url", function() {
    let link = $(".video-url-link").val();
    $(".video-url-link").val("");
    $(".media-videos-preview").append(HTMLyoutubeLinkToIframe(link));
});

$("body").on("click", ".remove-video-single-item", function() {
    $(this)
        .closest(".video-single-item")
        .remove();
});
