<input type="hidden" id="core-folder" value="{!! @get_media_folder()->id !!}">
<div class="bestbetter-modal">
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Header</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="content ">
            <div class="left">
            <div class="folder-list media__folder-list" id="folder-list2" data-media="folder" data-menudata="">
                  <div class="media-tree_leaf-wrapper" style="display: flex; justify-content: space-between;">
                    <ol class="first-branch">
                      <li class="tree_leaf leaf filter" data-id="1" data-name="Drive" id="item_1" bb-media-type="folder">
                        <div class="tree_leaf_content active" bb-media-click="get_folder_items" draggable="true">
                            <span class="icon-folder-opening"></span>
                            <span class="icon-folder-name"><i class="fa fa-folder"></i></span>
                            Drive2
                        </div>
                      
                        <ol class="tree_branch" id="fff">

                        </ol>
                      </li>
                    </ol>
                  </div>
                </div>
            </div>
            <div class="media_modal_right_content">
              <div class="content-upload media-modal-content-upload d-none">
                <div class="upload-content">
                  <div class="uploader-container">
                    <input id="uploader" class="file-loading" data-folder-id="{!! 1 !!}" multiple name="item[]"
                           type="file" data-upload-url="{!!route('media_upload') !!}">
                  </div>
                  <!-- <button type="button" class="btn btn-default mb-20" data-role="btnUploader" bb-media-click="show_uploader">Uploader</button> -->
                </div>
              </div>
              <div class="img">
                <div class="lds-dual-ring"></div>
              </div>
              <div class="m-0 d-flex flex-wrap folderitems w-100 main-content media-modal-main-content modal_img_container" style="position: relative;" data-media="folderitem" data-type="main-container">
                <!-- <div class="icon"> 
                    <i class="fa fa-folder" aria-hidden="true"></i>
                    <ul class="list-unstyled list-inline text-center icons">
                        <li class="text-center"><a href="#"><i class="fa fa-info" aria-hidden="true"></i></a></li>
                        <li class="text-center"><a href="#" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
                        <li class="text-center"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
                    </ul>
                </div> -->
              </div>
            </div>


          </div>


        </div>
      </div>
      <div class="modal-footer" style="pointer-events: initial;">
        <input type="text" class="pull-left file-realtive-url" placeholder="upload file name" style="display: none">
        <button type="button" class="btn btn-info" bb-media-click="folder_level_up"><i class="fa fa-level-up"
                                                                                       aria-hidden="true"></i></button>
        <button type="button" class="btn btn-success upload-btn __btn_upload" bb-media-click="open_uploader">Upload
        </button>
        <button type="button" class="btn btn-info open-btn" bb-media-click="open_images" data-dismiss="modal">Open
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</div>


<script type="template" id="media-modal-folder">
  <div class="icon">
    <i class="fa fa-folder" aria-hidden="true"></i>
    <span>{name}</span>
    <ul class="list-unstyled list-inline text-center icons ">
      <li class="text-center"><a href="#"><i class="fa fa-info" aria-hidden="true"></i></a></li>
      <li class="text-center"><a href="#" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></li>
      <li class="text-center"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
    </ul>
  </div>
</script>


@push("javascript")
<script>
  $(document).ready(function () {
    $(".__btn_upload").click(function () {
      $('.media_modal_right_content').animate({
        scrollTop: 0
      }, 1);
    })
  })
</script>

@endpush

{{--upload-content--}}

<!-- <script type="template" id="media-modal-files">
    <div class="img">
        <a href="#" >
            <img src="{url}" alt="">
        </a>
        <ul class="list-unstyled list-inline text-center icons item-for-upload" data-item-id={data-item-id} data-relative-url="{relative_path}">
            <li class="text-center"><a href="#"><i class="fa fa-info" aria-hidden="true"></i></a></li>
            <li class="text-center">
                <a href="{url}" target="_blank" data-lightbox="folder-set" data-title="{name}">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </a>
            </li>
            <li class="text-center"><a href="#" data-item-id={data-item-id} class="remove-item-for-media"><i class="fas fa-exchange-alt"></i></a></li>
        </ul>
    </div>
</script> -->



