var _global_folder_id = 1;
var url = {
    getFolderCildrens: "/api/api-media/get-folder-childs",
    jsTree: "/api/api-media/jstree"
};
var globalArr = [];
var multiple = false;
var inputId = "";
$("body").on("click", ".bestbetter-modal-open button", function() {
    let value = $(this).attr("data-multiple");
    id = $(this).attr("id");
    multiple = JSON.parse(value);
    $(".img").removeClass("active");
});
postSendAjax = function(url, data, success, error) {
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

$("#jstree_html")
    .on("changed.jstree", function(e, data) {
        console.log(data);
        var i,
            j,
            r = [];
        for (i = 0, j = data.selected.length; i < j; i++) {
            r = data.instance.get_node(data.selected[i]).id;
        }
        $(`[name="folder_id"]`).val(r);
        var jsondata = { folder_id: r, files: 1, access_token: "string" };
        _global_folder_id = r;
        console.log(url.getFolderCildrens);
        postSendAjax(url.getFolderCildrens, jsondata, getfolder);
    })
    .jstree({
        core: {
            data: {
                type: "POST",
                url: url.jsTree,
                dataType: "json", // needed only if you do not supply JSON headers
                data: { folder_id: 1 },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function(data) {
                    $(".media-modal-main-content").empty();
                    listFolders(data.children);
                    listFiles(data.items);
                }
            }
        }
    });
var getfolder = function(data) {
    lists(data.data);
};

function listFolders(data) {
    $.each(data, function(k, v) {
        var folder = $("#media-modal-folder").html();
        folder = folder.replace("{name}", v.name);
        $(".media-modal-main-content").append(folder);
    });
}

function listFiles(data) {
    function makeImage(data) {
        return `<div draggable="true" data-id="${data.id}" class="file">
    <a  bb-media-click="select_item" >
        <span class="corner"></span>

        <div class="icon">
            <img width="180px" data-lightbox="image" src="${data.url}">
            <i class="fa fa-file"></i>
        </div>
        <div class="file-name">
            ${data.real_name}
            <br>
            
        </div>
        <small>Added: ${data.updated_at}</small>
        <div class="file-actions">
          <button bb-media-click="remove_image" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
          <button class="btn btn-sm btn-primary"><i class="fa fa-cog"></i></button>
          <button bb-media-click="edit_image" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></button>
      </div>
    </a>
</div>`;
    }
    $.each(data, function(k, v) {
        // var folder = $("#media-modal-files").html();
        // folder = folder.replace("{name}", v.real_name);
        // folder = folder.replace(/{data-item-id}/g, v.id);
        // folder = folder.replace("{relative_path}", v.relativeUrl);
        // folder = folder.replace(/{url}/g, v.url);

        $(".media-modal-main-content").append(makeImage(v));
    });
}

function lists(data) {
    $(".media-modal-main-content").empty();
    listFolders(data.childs);
    listFiles(data.items);
}

$(".upload-btn").click(function() {
    $(".media-modal-content-upload").css("display", "block");
    $(".media-modal-main-content").css("display", "none");
});

$("body").on("click", ".item-for-upload", function(e) {
    let tempStr = "";

    globalArr = [];
    e.preventDefault();
    if (multiple) {
        $(this)
            .closest(".img")
            .toggleClass("active");
    } else {
        $(".img").removeClass("active");
        $(this)
            .closest(".img")
            .addClass("active");
    }

    $(".img.active").each(function() {
        let value = $(this)
            .find(".item-for-upload")
            .attr("data-relative-url");
        tempStr += value + ",";
        globalArr.push(value);
    });
    $("body")
        .find(".file-realtive-url")
        .val(tempStr);
});
const makePreviewImgThumb = (item, multiple) => {
    return `<div class="img-thumb-container"  style="margin: 10px;"><div class="inner"><img src="${item}" width=200 > <span data-src="${item}" class="remove-thumb-img" data-is-multiple="${multiple}"><i  class="fa fa-trash"></i> </span></div></div>`;
};
$("body").on("click", ".open-btn", function(e) {
    e.preventDefault();

    if (multiple) {
        let realInput = $(`.${id}`);
        let name = realInput.attr("data-name");
        let parrent = realInput.parent();
        globalArr.forEach(item => {
            parrent.append(
                `<input type="hidden" class="multipale-hidden-inputs" name="${name}" value="${item}">`
            );
            $(".multiple-image-box-" + `${id}`).append(
                makePreviewImgThumb(item, multiple)
            );
            var cn = +realInput.attr("data-count") + 1;
            realInput.val(cn + " selected");
            realInput.attr("data-count", cn);
        });
    } else {
        $(`.${id}`).val(globalArr[0]);
    }

    $("#myModal").modal("hide");
});

$("body").on("click", ".remove-thumb-img", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    let realInput = $(`.${id}`);

    let src = $(this).attr("data-src");
    $(".multipale-hidden-inputs").each(function() {
        if ($(this).val() === src) {
            $(this).remove();
        }
    });

    var cn = realInput.attr("data-count") - 1;
    realInput.val(cn + " selected");
    realInput.attr("data-count", cn);

    $(this)
        .closest(".img-thumb-container")
        .remove();
});

// $("body").on("click", ".remove-item-for-media", function() {
//     let id = $(this).attr("data-item-id");
//     postSendAjax(
//         "/api/api-media/transfer-item",
//         { folder_id: 2, item_id: id, slug: "trush" },
//         function(res) {}
//     );
// });
