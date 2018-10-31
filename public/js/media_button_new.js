const shortAjax = function(URL, obj = {}, cb) {
    fetch(URL, {
        method: "post",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": $('input[name="_token"]').val()
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify(obj)
    })
        .then(function(response) {
            return response.json();
        })
        .then(function(json) {
            return cb(json);
        })
        .catch(function(error) {
            console.log(error);
        });
};
/*
Helpers 
  **TYPES**
  data-type="main-container" || Main container,  for applying all content
  **EVNTS**
  bb-media-click="fodler" || Get current folder item if bb-media-type="folder"
*/
function App() {
    var self = this;
    var globalFolderId = 1;
    this.htmlMaker = {
        makeFolder: function(data) {
            return `<div draggable="true"  data-id="${data.id}"  class="file ">
            <a href="#"  data-id="${
                data.id
            }" bb-media-type="folder" bb-media-click="get_folder_items" data-media="getitem">
                <span class="corner"></span>
        
                <div class="icon">
                    <i class="fa fa-folder"></i>
                </div>
                <div class="file-name">
                    ${data.title}
                    <br>
                    <small>Added: ${data.updated_at}</small>
                </div>
                <div class"file-actions">
                  <button bb-media-click="remove_folder"><i class="fa fa-trash"></i></button>
                  <button><i class="fa fa-cog"></i></button>
                  <button><i class="fa fa-pencil"></i></button>
                </div>
            </a>
        </div>`;
        },
        makeImage: function(data) {
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
            <div class"file-actions">
              <button bb-media-click="remove_image"><i class="fa fa-trash"></i></button>
              <button ><i class="fa fa-cog"></i></button>
              <button bb-media-click="edit_image"><i class="fa fa-pencil"></i></button>
          </div>
        </a>
    </div>`;
        },
        makeTreeFolder: function(data) {
            return `<li  bb-media-type="tree-folder" data-trre-id="${
                data.id
            }" data-id="${
                data.id
            }" style="display: flex; justify-content: space-between;">  
                  <div><i tree-type="close" class="fa fa-folder"></i></div>
                  <div>
                  <span data-id="${
                      data.id
                  }" bb-media-click="get_folder_items" >${data.title}</span>
                  </div>
                  <div>
                    <button bb-media-click="remove_tree_folder"><i class="fa fa-trash"></i></button>
                    <button><i class="fa fa-cog"></i></button>
                    <button><i class="fa fa-pencil"></i></button>
                  </div>
                </li>`;
        },
        makeBreadCrumbsItem(item) {
            return ` <li class="bread-crumbs-list-item disabled" data-crumbs-id="${
                item.id
            }" data-id="${item.id}" bb-media-click="get_folder_items" >/${
                item.slug
            }</li>`;
        },
        editNameModal(id, name) {
            return `<div class="modal fade show" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Change title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input class="form-control edit-title-input" value="${name}">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" data-id=${id} class="btn btn-primary" bb-media-click="save_edited_title">Save changes</button>
              </div>
            </div>
          </div>
        </div>`;
        }
    };
    this.helpers = {
        makeBreadCrumbs(id) {
            let check = false;
            let breadCrumbsListItems = document.querySelectorAll(
                ".bread-crumbs-list-item"
            );
            let singleItem = document.querySelector(`[data-crumbs-id="${id}"]`);
            breadCrumbsListItems.forEach((item, index) => {
                if (check) {
                    item.remove();
                    return;
                }
                if (breadCrumbsListItems.length - 1 !== index) {
                    item.classList.add("active");
                    item.classList.remove("disabled");
                } else {
                    item.classList.add("disabled");
                    item.classList.remove("active");
                }
                if (item == singleItem) {
                    check = true;
                }
            });
        },
        showUploaderContainer() {
            document
                .querySelector(".uploader-container")
                .classList.toggle("d-none");
        },
        makeDnD() {
            document
                .querySelectorAll(
                    `[data-type="main-container"] [draggable="true"]`
                )
                .forEach(elm => {
                    elm.addEventListener("dragstart", function(e) {
                        let crt = this.cloneNode(true);
                        crt.className += " start";
                        crt.style.position = "absolute";
                        crt.style.top = "-10000px";
                        crt.style.right = "-10000px";
                        document.body.appendChild(crt);
                        let id = this.getAttribute("data-id");
                        e.dataTransfer.setDragImage(crt, 0, 0);
                        // e.dataTransfer.effectAllowed = "copy"; // only dropEffect='copy' will be dropable
                        e.dataTransfer.setData("node_id", id); // required otherwise doesn't work
                        // setTimeout(() => (this.className = "invisible"), 0);
                    });
                });

            document.querySelectorAll(".folder-container").forEach(folder => {
                folder.addEventListener("dragover", function(e) {
                    if (e.preventDefault) e.preventDefault(); // allows us to drop
                    e.dataTransfer.dropEffect = "copy";
                    this.classList.add("over");
                    return false;
                });
                folder.addEventListener("dragleave", function(e) {
                    if (e.preventDefault) e.preventDefault(); // allows us to drop
                    this.classList.remove("over");
                    return false;
                });
                folder.addEventListener("drop", function(e) {
                    this.classList.remove("over");
                    let nodeId = e.dataTransfer.getData("node_id");
                    let parrentId = e.target
                        .closest(".file")
                        .getAttribute("data-id");
                    self.requests.transferImage(
                        {
                            item_id: Number(nodeId),
                            folder_id: Number(parrentId),
                            access_token: "string"
                        },
                        false
                    );
                });
            });
        }
    };
    this.requests = {
        drawingItems(
            obj = {
                folder_id: globalFolderId,
                files: true,
                access_token: "string"
            },
            tree = true,
            cb
        ) {
            shortAjax("/api/api-media/get-folder-childs", obj, res => {
                if (!res.error) {
                    let mainContainer = document.querySelector(
                        `[data-type="main-container"]`
                    );
                    let breadCrumbsList = document.querySelector(
                        ".bread-crumbs-list"
                    );
                    breadCrumbsList.innerHTML += self.htmlMaker.makeBreadCrumbsItem(
                        res.settings
                    );
                    mainContainer.innerHTML = "";
                    let treeFolderContainer = document.querySelector(
                        ".folder-list"
                    );
                    treeFolderContainer.innerHTML = "";

                    res.data.items.forEach((image, index) => {
                        let html = `<div class="file-box">${self.htmlMaker.makeImage(
                            image
                        )}</div>`;
                        mainContainer.innerHTML += html;
                    });
                    res.data.childs.forEach((folder, index) => {
                        let html = `<div class="file-box folder-container">${self.htmlMaker.makeFolder(
                            folder
                        )}</div>`;
                        mainContainer.innerHTML += html;
                        if (tree) {
                            treeFolderContainer.innerHTML += self.htmlMaker.makeTreeFolder(
                                folder
                            );
                        } else {
                            cb(self.htmlMaker.makeTreeFolder(folder));
                        }
                    });
                    globalFolderId = res.settings.id;
                    self.helpers.makeBreadCrumbs(res.settings.id);
                    self.helpers.makeDnD();
                    cb ? cb() : null;
                }
            });
        },
        removeTreeFolder(obj = {}, cb) {
            shortAjax("/api/api-media/get-remove-folder", obj, res => {
                if (!res.error) {
                    cb();
                    self.requests.drawingItems();
                }
            });
        },
        editImage(obj = {}, cb) {
            shortAjax("/api/api-media/rename-item", obj, res => {
                if (!res.error) {
                    cb(res);
                }
            });
        },
        transferImage(obj = {}, cb) {
            shortAjax("/api/api-media/transfer-item", obj, res => {
                if (!res.error) {
                    self.requests.drawingItems();
                }
            });
        },
        addNewFolder(obj = {}, cb) {
            shortAjax("/api/api-media/get-create-folder-child", obj, res => {
                if (!res.error) {
                    self.requests.drawingItems();
                }
            });
        }
    };

    this.getInitailData = function() {
        this.requests.drawingItems();
    };
    this.init = function() {
        $("#uploader")
            .fileinput({
                uploadAsync: false,
                maxFileCount: 5,
                uploadExtraData: function() {
                    return {
                        _token: $("meta[name='csrf-token']").attr("content"),
                        folder_id: globalFolderId
                    };
                }
            })
            .on("filebatchselected", function(event, files) {
                $("#uploader").fileinput("upload");
            })
            .on("filebatchuploadsuccess", function(event, files) {
                console.log(11111);
                console.log("File batch upload success");

                self.requests.drawingItems();
            });
        this.getInitailData();
    };
    this.events = {
        remove_tree_folder(elm, e) {
            e.stopPropagation();
            e.preventDefault();
            let id = elm.closest("li").attr("data-id");
            self.requests.removeTreeFolder(
                {
                    folder_id: Number(id),
                    trash: 0,
                    access_token: "string"
                },
                () => elm.closest("li").remove()
            );
        },
        remove_folder(elm, e) {
            e.stopPropagation();
            e.preventDefault();
            let id = elm.closest(".file").attr("data-id");
            self.requests.removeTreeFolder(
                {
                    folder_id: Number(id),
                    trash: 0,
                    access_token: "string"
                },
                () => elm.closest("li").remove()
            );
        },
        get_folder_items(elm, e) {
            let id = elm[0].getAttribute("data-id");
            self.requests.drawingItems(
                {
                    folder_id: Number(id),
                    files: true,
                    access_token: "string"
                },
                true,
                res => {
                    // document
                    //     .querySelector(`[data-trre-id="${id}"]`)
                    //     .querySelector("[tree-type]")
                    //     .setAttribute("class", "fa fa-folder-open");
                }
            );
        },
        add_new_folder(elm, e) {
            let name = document.querySelector(".new-folder-input").value;
            self.requests.addNewFolder(
                {
                    folder_id: globalFolderId,
                    folder_name: name,
                    access_token: "string"
                },
                true
            );
        },
        select_item(elm, e) {
            e.target.closest(".file-box").classList.toggle("active");
        },
        remove_image(elm, e) {
            e.preventDefault();
            e.stopPropagation();
            let id = e.target.closest(".file").getAttribute("data-id");
            self.requests.transferImage(
                {
                    item_id: Number(id),
                    folder_id: 2,
                    access_token: "string"
                },
                false
            );
        },
        edit_image(elm, e) {
            console.log(111);
            e.preventDefault();
            e.stopPropagation();
            let id = e.target.closest(".file").getAttribute("data-id");
            console.log(id);
            let name = e.target
                .closest(".file")
                .querySelector(".file-name")
                .textContent.trim();
            document.body.innerHTML += self.htmlMaker.editNameModal(id, name);
        },
        save_edited_title(elm, e) {
            let itemId = e.target.getAttribute("data-id");
            let name = document.querySelector(".edit-title-input").value;
            self.requests.editImage(
                {
                    item_id: Number(itemId),
                    item_name: name,
                    access_token: "string"
                },
                false,
                res => {
                    console.log(res);
                    // document
                    //     .querySelector(`[data-trre-id="${id}"]`)
                    //     .querySelector("[tree-type]")
                    //     .setAttribute("class", "fa fa-folder-open");
                }
            );
        },
        show_uploader(elm, e) {
            self.helpers.showUploaderContainer();
        }
    };
}
const app = new App();
app.init();
$("body").on("click", `[bb-media-click]`, function(e) {
    let attr = $(this).attr("bb-media-click");
    app.events[attr]($(this), e);
});
