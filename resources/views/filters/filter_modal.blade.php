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
                            <div class="row selected-items_popup w-100 main-scrollbar mx-1">

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
{!! Form::hidden('first_category_id',$category->id,['category_id']) !!}
@push('javascript')
    <script>
        const filter = [];
        $('[data-target="#wizardViewModal"]').on('click', function (e) {
            $('body').on('click', '.shopping-cart_wrapper .item-content', function () {
                $('.shopping-cart_wrapper .item-content').removeClass('active');
                $(this).addClass('active');

            });
            $('body').on('click', '.shopping-cart_wrapper .content-wrap .wrap-item', function () {
                if(Number($('[data-target="#wizardViewModal"]').attr('data-multiple'))===1){
//                    $(this).toggleClass('active');
                }else{
//                    $('.shopping-cart_wrapper .wrap-item').removeClass('active');
//                    $(this).addClass('active');
                }
            });

            const first_category_id = $(this).attr('data-action');
            let selectMoreItems = [];
            let selectSingelItems;
            let self = $(this)
            $('body').on('click', '.add-items-btn', function (e) {
                e.stopImmediatePropagation();
                if (Number(self.attr('data-multiple')) === 1) {
                    $(this).closest('.contents-wrapper').find('.wrap-item.active').each(function () {
                        selectMoreItems.push($(this).attr('data-id'));
                    })
                    selectMoreItems.forEach((item) => {
                        let inputHidden = document.createElement('input');
                        $(inputHidden).attr({
                            type:'hidden',
                            name:self.attr('data-name'),
                            value:item
                        })
//                        $('body').find(`.${self.attr('id')}`).append($('body').find(`[data-id="${item}"]`).closest('li'))
                        $('body').find(`.${self.attr('id')}`).append($(inputHidden))
                    })
                } else {
                    let inputHidden = document.createElement('input');

                    selectSingelItems = $(this).closest('.contents-wrapper').find('.wrap-item.active').attr('data-id')
                    $(inputHidden).attr({
                        type:'hidden',
                        name:self.attr('data-name'),
                        value:selectSingelItems
                    })
//                    $('body').find(`.${self.attr('id')}`).append($('body').find(`[data-id="${selectSingelItems}"]`).closest('li'))
                    $('body').find(`.${self.attr('id')}`).append($(inputHidden))
                }


                $('#wizardViewModal').modal('hide')
            });

            $.ajax({
                type: "post",
                url: "/filters",
                cache: false,
                data: {
                    group: self.attr('data-group'),
                    category_id: first_category_id,
                    filters: filter
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (!data.error) {
//                        console.log(data.wizard);
                        $('.shopping-cart-head .nav-pills').empty()
                        $('.shopping-cart-head .nav-pills').append(data.wizard);
                        if (data.type === "filter") {
                            $('.contents-wrapper .content').html(data.filters);
                        } else if (data.type === "items") {
                            $('.contents-wrapper .content').html(data.items_html);
                            $('.shopping-cart_wrapper .next-btn').addClass('d-none')
                            $('.shopping-cart_wrapper .add-items-btn').removeClass('d-none')
                        }
//                        console.log(filter);
                    } else {
                        alert("error");
                    }
                },
                error: function (error) {
                    filter.pop();
                }
            })

            $('body').on('click', '.shopping-cart_wrapper .next-btn', function (e) {
                e.stopImmediatePropagation();
                e.preventDefault();
                let active = $('.content-wrap').toArray().find(function (contentWrap) {
                    return !$(contentWrap).hasClass('d-none')
                });
//            console.log(active)
                $(active).find('.active').toArray().map(function (actv) {
                    filter.push($(actv).closest('[data-id]').attr('data-id'))
                });
//            console.log(filter)
                $(active).find('.active').length === 0 ? alert('select item') : $.ajax({
                    type: "post",
                    url: "/filters",
                    cache: false,
                    data: {
                        group: self.attr('data-group'),
                        category_id: first_category_id,
                        filters: filter
                    },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {
//                            console.log(data.filters);
                            $('.shopping-cart-head .nav-pills').empty()
                            $('.shopping-cart-head .nav-pills').append(data.wizard);
                            $('.back-btn').removeClass('d-none')
                            if (data.type === "filter") {
                                $('.contents-wrapper .content').html(data.filters);
                            } else if (data.type === "items") {
                                $('.contents-wrapper .content').html(data.items_html);
                                $('.shopping-cart_wrapper .next-btn').addClass('d-none')
                                $('.shopping-cart_wrapper .add-items-btn').removeClass('d-none')
                            }
//                            console.log(filter);
                        } else {
                            alert("error");
                        }
                    },
                    error: function (error) {
                        filter.pop();
                    }
                })
                // $($('.shopping-cart-head').find('.active')[0]).addClass('visited');
                // $($($('.shopping-cart-head').find('.active')[0]).closest('li').next().find('.item')[0]).addClass('active');
                // $($('.shopping-cart-head').find('.active')[0]).removeClass('active');
                //
                // $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[0]).next().removeClass('d-none');
                // $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[0]).addClass('d-none');
                //
                // !$('.content-wrap').last().hasClass('d-none') && $('.next-btn').addClass('d-none');
                // $('.back-btn').removeClass('d-none');
            });
            $('body').on('click', '.shopping-cart_wrapper .back-btn', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                filter.pop();
//                console.log('back',filter);

                $.ajax({
                    type: "post",
                    url: "/filters",
                    cache: false,
                    data: {
                        group: self.attr('data-group'),
                        category_id: first_category_id,
                        filters: filter
                    },
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        if (!data.error) {

                            console.log(data.wizard);
                            $('.shopping-cart-head .nav-pills').empty()
                            $('.shopping-cart-head .nav-pills').append(data.wizard);
                            if (data.type === "filter") {
                                $('.contents-wrapper .content').html(data.filters);
                                $('.shopping-cart_wrapper .next-btn').removeClass('d-none')
                                $('.shopping-cart_wrapper .add-items-btn').addClass('d-none')
                            } else if (data.type === "items") {
                                $('.contents-wrapper .content').html(data.items_html);
                            }
                            if (filter.length === 0) {
//                                console.log(55);
                                $('.shopping-cart_wrapper .back-btn').addClass('d-none')
                            }
//                            console.log('back',filter);
                        } else {
                            alert("error");
                        }
                    },
                    error: function (error) {
                        console.log(error);
                    }
                })
                // $($('.shopping-cart-head').find('.active')[0]).removeClass('visited');
                // $($($('.shopping-cart-head').find('.active')[0]).closest('li').prev().find('.item')[0]).addClass('active');
                // $($('.shopping-cart-head').find('.active')[1]).removeClass('active');
                //
                // $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[0]).prev().removeClass('d-none');
                // $($(this).closest('.contents-wrapper').find('.content-wrap:not(.d-none)')[1]).addClass('d-none');
                //
                // !$('.content-wrap').first().hasClass('d-none') && $('.back-btn').addClass('d-none');
                // $('.next-btn').removeClass('d-none');
            });
        });
        $('#wizardViewModal').on('hidden.bs.modal', function (e) {
            filter.length = 0,
                $('.shopping-cart_wrapper .next-btn').removeClass('d-none')
                $('.shopping-cart_wrapper .back-btn').addClass('d-none')
            $('.shopping-cart_wrapper .add-items-btn').addClass('d-none')
        })

        //----------------new script-------------
        let dg = null;
        let filter_limit = 0;
        $("body").on('click','[data-target="#wizardViewModal"]',function () {
            dg = $(this).attr('data-group');
            let group = $(this).attr('data-group');
            filter_limit = $(this).closest('.limit').attr('data-limit');
            const selectedIds = $(this).closest('.product-single-info_row').find('.menu-item-selected').toArray().map(function(item) {
                console.log($(item).attr('data-id'));
                return $(item).attr('data-id');
            });
            console.log(group, 'selectedIds');
            $.ajax({
                type: "post",
                url: "/products/select-items",
                cache: false,
                data: {
                    group,
                    selectedIds
                },
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (!data.error) {
                        $("#wizardViewModal").modal();
                    } else {
                        alert("error");
                    }
                }
            });
        });

        const filter_qty = function() {
            let qty = 0;
            $('#wizardViewModal .selected-items_popup').find('.popup_field-input').each(function() {
                qty += Number($(this).val());
            });
            return qty;
        };

        $("body").on('click', "#wizardViewModal .shopping-cart_wrapper .wrap-item", function(ev) {
            const id = $(this).attr('data-id');
            const title = $(this).find('.name').text().trim();
            if(filter_limit > filter_qty() && !$(this).hasClass('active')) {
//                console.log($(this).closest(".single-item-wrapper"));
                $(this).addClass('active');
                $('.selected-items_popup')
                    .append(`<div class="col-md-2 col-sm-3 selected-item_popup" data-id-popup="${id}">
                              <div class="d-flex justify-content-between selected-item_popup-wrapper">
                                <div class="align-self-center text-truncate">
                                  ${title}
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                  <div class="mr-1">Qty</div>
                                  <div class="continue-shp-wrapp_qty position-relative mr-0">

                        <span data-type="minus"
                        class="d-flex align-items-center pointer position-absolute selected-item-popup_qty-minus qty-count">
                        <svg viewBox="0 0 20 3" width="12px" height="3px">
                        <path fill-rule="evenodd" fill="rgb(214, 217, 225)"
                        d="M20.004,2.938 L-0.007,2.938 L-0.007,0.580 L20.004,0.580 L20.004,2.938 Z"></path>
                        </svg>
                        </span>
                        <input class="popup_field-input w-100 h-100 font-23 text-center border-0 selected-item-popup_qty-select" min="number" name=""
                        type="number" value="1">
                        <span data-type="plus"
                        class="d-flex align-items-center pointer position-absolute selected-item-popup_qty-plus qty-count">
                        <svg viewBox="0 0 20 20" width="15px" height="15px">
                        <path fill-rule="evenodd" fill="rgb(211, 214, 223)"
                        d="M20.004,10.938 L11.315,10.938 L11.315,20.000 L8.696,20.000 L8.696,10.938 L-0.007,10.938 L-0.007,8.580 L8.696,8.580 L8.696,0.007 L11.315,0.007 L11.315,8.580 L20.004,8.580 L20.004,10.938 Z"></path>
                        </svg>
                        </span>
                        </div>
                        <div>
                        <a href="javascript:void(0)" data-el-id="28" class="btn btn-sm delete-menu-item text-danger"><i class="fa fa-times"></i></a>
                        </div>
                        </div>
                        </div>
                        </div>`);
                        } else if($(this).hasClass('active')) {
                $(`[data-id-popup="${id}"]`).remove();
                $(this).removeClass('active');
            }
        });

        $('body').on('click', '#wizardViewModal .selected-item-popup_qty-plus' , function (ev) {
            ev.stopImmediatePropagation();
            ev.preventDefault();
            if(filter_limit > filter_qty()) {
                $(this).siblings(".popup_field-input").val(Number($(this).siblings(".popup_field-input").val()) + 1);
                console.log('1');
            }
        });

        $('body').on('click', '#wizardViewModal .selected-item-popup_qty-minus' , function (ev) {
            ev.stopImmediatePropagation();
            ev.preventDefault();
            $(this).siblings(".popup_field-input").val() > 1 && $(this).siblings(".popup_field-input").val(Number($(this).siblings(".popup_field-input").val()) - 1);
        });


        //Vahag jan senc baner mi areq
        $('body').on('click', '#wizardViewModal .add-items-btn', function() {
            const items_array = [];

            $('#wizardViewModal .modal-body').find('.wrap-item').each(function() {
                $(this).hasClass('active') && (items_array.push($(this).attr('data-id')));
            });
            console.log(items_array);
            fetch("/products/get-variation-menu-raws", {
                method: "post",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": $('input[name="_token"]').val()
                },
                credentials: "same-origin",
                body: JSON.stringify({ids: items_array})
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (json) {
//                     console.log(json.html,'---------');
                    let prices = 0;
                    const limit = $($(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.limit')[0]).attr('data-limit');
                    let qty = 0;

                    const new_qty = function() {
                        qty = 0;
                        $(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.product-qty').each(function() {
                            qty += Number($(this).val());
                        });
                        console.log(qty, 'qty');
                    };

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').append(json.html);
                    const popup_items_qty = [];
                    $(`[data-id-popup].selected-item_popup`).find('.popup_field-input').each(function() {
                        popup_items_qty.push({
                            id: $(this).closest('.selected-item_popup').attr('data-id-popup'),
                            value: $(this).val()
                        });
                    });
                    console.log(popup_items_qty,'---------')
                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.field-input').each(function() {
                        const d_id = $(this).attr('data-id');
                        const value = popup_items_qty.find((el) => {
                            return el.id === d_id;
                        }).value;
                        $(this).val(value);
                        $(this).closest('.menu-item-selected').find('.price-placee')
                            .html('$'+ Number($(this).closest('.menu-item-selected').attr('data-price')) * Number($(this).val()));
                    });
                    $('#wizardViewModal').modal('hide');

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.menu-item-selected[data-price]').each(function(){
                        prices += Number($(this).attr('data-price'))*Number($(this).find('.field-input').val());
                    });
                    console.log($(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.menu-item-selected[data-price]'), prices)
                    const $total = $('.price-place-summary');
                    $total.html(`$${Number($total.text().trim().slice(1)) + prices}`);
                    console.log('dg', dg);
                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').on('click', '.delete-menu-item', function() {
                        $total.html(`$${Number($total.text().trim().slice(1)) - Number($(this).closest('[data-price]').attr('data-price'))}`);

                        $(this).closest('.menu-item-selected').remove();

                        // const prices_array = $('.product-qty').toArray().map(function(el) {
                        //     const price = $(el).closest('[data-price]').attr('data-price');
                        //     const count = $(el).val();
                        //     return price * count;
                        // });
                        // const price = prices_array.length !== 0 ? prices_array.reduce((accumulator, a) => {
                        //     return accumulator + a;
                        // }) : 0;
                        // const $total = $('.price-place-summary');
                        // $total.html(`$${single_product_price + price}`);
                    });

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').on('click','.product-count-minus', function(ev){
                        ev.preventDefault();
                        ev.stopImmediatePropagation();
                        const input = $($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]);
                        if(Number(input.val()) > 1) {
                            input.val(Number(input.val()) - 1);
                            const price = Number($(this).closest('[data-price]').attr('data-price'));
                            $(this).closest('[data-price]').find('.price-placee').html(`$${price * Number(input.val())}`);

                            const $total = $('.price-place-summary');
                            $total.html(`$${Number($total.text().trim().slice(1)) - price}`);
                        }

                        // group.select2({maximumSelectionLength: Number(limit) - Number(qty) + group.closest('.product-single-info_row').find('input[name="qty"]').length});
                        //



                        // const prices_array = $('.product-qty').toArray().map(function(el) {
                        //     const price = $(el).closest('[data-price]').attr('data-price');
                        //     const count = $(el).val();
                        //     return price * count;
                        // });
                        // const total_price = prices_array.length !== 0 ? prices_array.reduce((accumulator, a) => {
                        //     return accumulator + a;
                        // }) : 0;
                        // const $total = $('.price-place-summary');
                        // $total.html(`$${single_product_price + total_price}`);
                    });

                    //********************//
                    //*******+plus+*******//
                    //********************//

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').on('click','.product-count-plus', function(ev){
                        ev.preventDefault();
                        ev.stopImmediatePropagation();
                        new_qty();
                        const input = $($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]);
                        console.log(Number(input.val()), Number(limit), Number(qty), Number($($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val()));
                        if(Number(input.val()) < Number(limit) - Number(qty) +
                            Number($($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val())) {
                            input.val(Number(input.val()) + 1);
                            new_qty();
                            const price = Number($(this).closest('[data-price]').attr('data-price'));
                            $(this).closest('[data-price]').find('.price-placee').html(`$${price*Number(input.val())}`);


                            const $total = $('.price-place-summary');
                            $total.html(`$${Number($total.text().trim().slice(1)) + price}`);
                        };



                        // const prices_array = $('.product-qty').toArray().map(function(el) {
                        //     const price = $(el).closest('[data-price]').attr('data-price');
                        //     const count = $(el).val();
                        //     return price * count;
                        // });
                        // const total_price = prices_array.length !== 0 ? prices_array.reduce((accumulator, a) => {
                        //     return accumulator + a;
                        // }) : 0;
                        // const $total = $('.price-place-summary');
                        // $total.html(`$${single_product_price + total_price}`);
                    });
                });
        });

    </script>
@endpush

@push('style')
    <style>
        #wizardViewModal .continue-shp-wrapp_qty {
            padding: 3px 20px;
            width: 80px;
        }
        #wizardViewModal .selected-items_popup {
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

