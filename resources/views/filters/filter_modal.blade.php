<!-- Modal -->
<div class="modal fade" id="wizardViewModal" tabindex="-1" role="dialog" aria-labelledby="wizardViewLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wizardViewLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="shopping-cart_wrapper">
                    <div class="shopping-cart-head">
                        <ul class="nav nav-pills">

                        </ul>
                    </div>
                    <div class="contents-wrapper">
                        <div class="content-wrap shoping-card">
                            <ul class="d-flex flex-wrap content">

                            </ul>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-2 footer-buttons">
                            <div class="back-item">
                                <button class="btn btn-secondary back-btn d-none">Back</button>
                            </div>
                            <div class="row selected-items_filter w-100 main-scrollbar mx-1">

                            </div>
                            <div class="next-item">
                                <button class="btn btn-secondary next-btn">Next</button>
                                <button class="btn btn-primary add-items-btn d-none"><i
                                            class="fa fa-plus"></i><span
                                            class="ml-1">Add selected items</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('first_category_id',(isset($category))?$category->id:null,['category_id']) !!}

@push('style')
    <style>
        #wizardViewModal .continue-shp-wrapp_qty {
            padding: 3px 20px;
            width: 80px;
        }
        #wizardViewModal .selected-items_filter {
            height: 62px;
            align-items: center;
        }
        #wizardViewModal .selected-item_popup-wrapper{
            margin-bottom: 5px;
        }
        #wizardViewModal .modal-dialog {
            max-width: 100%;
            margin: 0;
            height: 100%;
        }

        #wizardViewModal .wrap-item.active {
            border: 1px solid #000000;
            box-shadow: 0px 0 4px 3px #f39c12;
        }

        #wizardViewModal {
            padding: 0 !important;
            z-index: 999999;
        }

        #wizardViewModal .modal-content {
            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            border: none;
            height: 100%;
        }

        #wizardViewModal .shopping-cart_wrapper {
            padding: 15px;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        #wizardViewModal .modal-body {
            padding: 0;
        }

        #wizardViewModal .contents-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;

        }

        #wizardViewModal .content-wrap {
            flex: 1;
            overflow: auto;
            min-height: calc(100% - 146px);
            height: 10px;
        }

        #wizardViewModal .footer-buttons {
            margin-top: auto;
        }

        #wizardViewModal {

        }

        .item-link img {
            width: 100%;
        }
        .shopping-cart_wrapper .shoping-card .wrap-item .item-link{
            display: block;
        }
        .shopping-cart_wrapper .shoping-card .wrap-item .item-img{
            height: 150px;
            display: block;
        }
        .shopping-cart_wrapper .shoping-card .wrap-item .item-link .item-img img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .shopping-cart_wrapper .shoping-card .wrap-item {
            box-shadow: 0 0 4px #000;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        .shopping-cart_wrapper .shoping-card .wrap-item .name{
            padding: 5px 15px;
            border-top: 1px solid #ccc;
            font-weight: bold;
            display: block;
            color: #000000;
        }
        .shopping-cart_wrapper .form-control:focus {
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
        }

        .shopping-cart_wrapper .text-quatr-clr {
            color: #5184e5;
        }

        .shopping-cart_wrapper .shopping-cart-head {
            padding-right: 58px;
        }

        @media screen and (max-width: 992px) {
            .shopping-cart_wrapper .shopping-cart-head {
                padding-right: 6px;
            }
        }

        .shopping-cart_wrapper .shopping-cart-head .nav {
            margin-bottom: 53px;
        }

        .shopping-cart_wrapper .shopping-cart-head .nav-item {
            padding-left: 0;
            padding-right: 6px;
        }

        .shopping-cart_wrapper .shopping-cart-head .nav-item:first-of-type .item:before {
            display: none;
        }

        .shopping-cart_wrapper .shopping-cart-head .item {
            position: relative;
            display: block;
            color: #b9b7c1;
            background-color: #f2f1f5;
            height: 46px;
            padding: 0 5px 0 36px;
            line-height: 1;
            margin-bottom: 5px;
            border-top: none;
            cursor: default;
        }

        @media screen and (min-width: 768px) {
            .shopping-cart_wrapper .shopping-cart-head .item {
                margin-bottom: 0;
            }
        }

        .shopping-cart_wrapper .shopping-cart-head .item:after {
            content: "";
            position: absolute;
            right: -16px;
            width: 0;
            height: 0;
            border-top: 23px solid transparent;
            border-bottom: 23px solid transparent;
            border-left: 16px solid #f2f1f5;
            z-index: 7;
            top: 0;
        }

        .shopping-cart_wrapper .shopping-cart-head .item:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 0;
            height: 0;
            border-top: 23px solid transparent;
            border-bottom: 23px solid transparent;
            border-left: 16px solid #ffffff;
        }

        .shopping-cart_wrapper .shopping-cart-head .item .icon {
            opacity: 0;
        }

        .shopping-cart_wrapper .shopping-cart-head .item.visited .icon {
            opacity: 1;
        }

        .shopping-cart_wrapper .shopping-cart-head .item.active {
            color: #ffffff;
            background-color: #5184e5;
        }

        .shopping-cart_wrapper .shopping-cart-head .item.active:after {
            border-left: 16px solid #5184e5;
        }

        /*------------------------*/
        .shopping-cart_wrapper .content-wrap {
            margin-bottom: 5px;
        }

        .shopping-cart_wrapper .content-wrap > ul {
            padding: 0;
            list-style: none;
        }

        .shopping-cart_wrapper .content-wrap .item-content {
            box-shadow: 0 0 4px #000;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        .shopping-cart_wrapper .content-wrap .item-content .item-photo {
            height: 150px;
        }

        .shopping-cart_wrapper .content-wrap .item-content .item-title {
            padding: 5px 15px;
            border-top: 1px solid #ccc;
            font-weight: bold;
        }

        .shopping-cart_wrapper .content-wrap .item-content img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .shopping-cart_wrapper .content-wrap .item-content.active {
            border: 1px solid #000000;
            box-shadow: 0px 0 4px 3px #f39c12;
        }

        .shopping-cart_wrapper .content-wrap.confirm-wrapper .wrap-item .item-img {
            height: 250px;
        }

        .shopping-cart_wrapper .content-wrap.confirm-wrapper .wrap-item {
            margin-bottom: 15px;
        }

        .shopping-cart_wrapper .content-wrap.confirm-wrapper .wrap-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .shopping-cart_wrapper .content-wrap.confirm-wrapper .wrap-item .buttons {
            position: absolute;
            top: 0;
            right: 0;
        }

        .shopping-cart_wrapper .content-wrap.confirm-wrapper .wrap-item .name {
            text-align: center;
            display: block;
            background-color: #eee;
            padding: 8px;
            text-transform: uppercase;
            color: #000;
        }

        .shopping-cart_wrapper .content-wrap.confirm-wrapper .wrap-item.active {
            border: 1px solid #000000;
            box-shadow: 0px 0 4px 3px #f39c12;
        }
    </style>
@endpush

