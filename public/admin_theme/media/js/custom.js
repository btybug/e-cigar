$(document).ready(function() {
    var url = {
        getFolderCildrens: "/api/api-media/get-folder-childs",
        jsTree: "/api/api-media/jstree"
    };
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
            var i,
                j,
                r = [];
            for (i = 0, j = data.selected.length; i < j; i++) {
                r = data.instance.get_node(data.selected[i]).id;
            }
            var jsondata = { folder_id: r, files: 1, access_token: "string" };
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
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr(
                            "content"
                        )
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
        $.each(data, function(k, v) {
            var folder = $("#media-modal-files").html();
            folder = folder.replace("{name}", v.real_name);
            folder = folder.replace("{relative_path}", v.relativeUrl);
            folder = folder.replace(/{url}/g, v.url);

            $(".media-modal-main-content").append(folder);
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
        e.preventDefault();
        $(".item-for-upload").removeClass("active");
        $(this).addClass("active");
        $("body")
            .find(".file-realtive-url")
            .val($(this).attr("data-relative-url"));
    });
    $("body").on("click", ".open-btn", function(e) {
        e.preventDefault();
        let value = $("body")
            .find(".file-realtive-url")
            .val();
        $("body")
            .find(".modal-input-path")
            .val(value);
        $("#myModal").modal("hide");
    });
    // $("#input-ru").fileinput({
    //     browseLabel: 'Select Folder...',
    //     previewFileIcon: '<i class="fa fa-file"></i>',
    //     allowedPreviewTypes: null, // set to empty, null or false to disable preview for all types
    //     previewFileIconSettings: {
    //         'doc': '<i class="fa fa-file-word-o text-primary"></i>',
    //         'xls': '<i class="fa fa-file-excel-o text-success"></i>',
    //         'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
    //         'jpg': '<i class="fa fa-file-photo-o text-warning"></i>',
    //         'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
    //         'zip': '<i class="fa fa-file-archive-o text-muted"></i>',
    //         'htm': '<i class="fa fa-file-code-o text-info"></i>',
    //         'txt': '<i class="fa fa-file-text-o text-info"></i>',
    //         'mov': '<i class="fa fa-file-movie-o text-warning"></i>',
    //         'mp3': '<i class="fa fa-file-audio-o text-warning"></i>',
    //     },
    //     previewFileExtSettings: {
    //         'doc': function(ext) {
    //             return ext.match(/(doc|docx)$/i);
    //         },
    //         'xls': function(ext) {
    //             return ext.match(/(xls|xlsx)$/i);
    //         },
    //         'ppt': function(ext) {
    //             return ext.match(/(ppt|pptx)$/i);
    //         },
    //         'jpg': function(ext) {
    //             return ext.match(/(jp?g|png|gif|bmp)$/i);
    //         },
    //         'zip': function(ext) {
    //             return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
    //         },
    //         'htm': function(ext) {
    //             return ext.match(/(php|js|css|htm|html)$/i);
    //         },
    //         'txt': function(ext) {
    //             return ext.match(/(txt|ini|md)$/i);
    //         },
    //         'mov': function(ext) {
    //             return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
    //         },
    //         'mp3': function(ext) {
    //             return ext.match(/(mp3|wav)$/i);
    //         },
    //     }
    // });
});
