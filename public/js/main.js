$(function () {
    heightBlock('.main-left-tabs .nav', '.main-left-tabs .nav a');
    $(window).resize(function () {
        heightBlock('.main-left-tabs .nav', '.main-left-tabs .nav a');
    });


    // // remove cart-info from cart sidbar
    // $('.cart-item-close').on('click', function (e) {
    //     e.stopPropagation();
    //     $(this).parent($('.cart-aside-item')).remove();
    //     if(!$('.cart-aside-item').length) {
    //     $('#cartSidebarEmptyMsg').show();
    //         $('#headerShopCartBtn').removeClass('active')
    // } else {
    //         $('#cartSidebarEmptyMsg').hide();
    //     }
    // });

    // product-slider
    $(".carousel_1").carousel({
        pagination: false,
        controls: false
    });
    $(".carousel_2").carousel({
        controls: false,
        pagination: false,
        autoAdvance: true,
        show: {
            "0px": 1,
            "500px": 2,
            "980px": 3
        }
    });

    // product range
    $('body').on('change', '.product-range input', function () {
        $(this).closest('.product-range').children().removeClass('active line-none');
        if ($(this).is(":checked")) {
            $(this).parent().addClass('active');
            $(this).parent().prevAll().addClass('active');
            $(this).parent().addClass('line-none');
        }
    });
    // search for mobile
    $('body').on('click', '.header-bottom .search-mobile-icon', function () {
        $(this).closest('.header-bottom').find('.cat-search').addClass('opened-full');
    });

});




//new

    $('.currency--select-2').select2({
            minimumResultsForSearch: Infinity,
           dropdownCssClass: "currency-dropdown"
    });

    $('.select_with-tag').select2();

    $('#accounts--selects').select2({
        dropdownParent: $('.my-account--selects'),
        minimumResultsForSearch: Infinity
    });

$('.select-2--no-search').select2({
    minimumResultsForSearch: Infinity
});

$(document).ready(function() {
    $("#loading").fadeOut("slow",function() {
        $(this).removeClass('d-flex').addClass('d-none'); // Optional if it's going to only be used once.
        $( "#singleProductPageCnt" ).removeClass('d-none').addClass('d-flex');
        $(".video--carousel").carousel({
            pagination: false,
            controls: false,
        });

        $(".video--carousel-thumb").carousel({
            controls: false,
            pagination: false,
//                show: 4,
            matchWidth:false
        });
        $(".product-card-thumbs--single").carousel({
            controls: true,
            pagination: false,
            matchWidth:false
        });
        $('.video-carousel-wrap iframe[src*="https://www.youtube.com/embed/"]').addClass("youtube-iframe");

        $('.video-carousel-wrap .video-item-thumb').on('itemClick.carousel', function() {
//                console.log($(".youtube-iframe"),'---')
            $('body .youtube-iframe').each(function(index){
                $(".youtube-iframe")[index].contentWindow.postMessage(
                    '{"event":"command","func":"' + "stopVideo" + '","args":""}',
                    "*"
                );
                return true;
            });

        });
    });


    $('body').on('keypress', '.continue-shp-wrapp_qty .field-input', function () {
        return false;
    });

    $( "#singleProductPageCnt" ).fadeIn(function() {

        //set hidden optional section which set in argument
        //         const hideOptionalSection = (el) => {
        //             const info_row = el.closest('.product-single-info_row');
        //             if(!isReq(el) && !isCheckedOptional(info_row)) {
        //                 info_row.find('.wall--wrapper').addClass('none-select');
        //                 info_row.find('.product-single-info_row-items').addClass('none-select');
        //             }
        //         };
        //set show optional section which set in argument

        // const showOptionalSection = (el) => {
        //     console.log(el, 'el');
        //     const info_row = el.closest('.product-single-info_row');
        //     if(!isReq(el) && isCheckedOptional(info_row)) {
        //         info_row.find('.wall--wrapper').removeClass('none-select');
        //         info_row.find('.product-single-info_row-items').removeClass('none-select');
        //     }
        //     if(!isReq(el) && !isSection(el)) {
        //         el.find('select').trigger($.Event('select2:select', {
        //             params: {
        //                 id: '17'
        //             }
        //         }));
        //     };
        // };

        //add per_price of required product section on $per_price_value
        //         const productTypeReqPerPrice = (data_el) => {
        //             if(data_el.attr('data-per-price') === "product") {
        //                 if(data_el.attr('data-req') === "1") {
        //                     per_price_value += Number(data_el.attr('data-price'));
        //                 } else {
        //                     data_el.closest('.product-single-info_row').find('.req_check').is(':checked') && (per_price_value += Number(data_el.attr('data-price')));
        //                 }
        //             }
        //         };

        // $('[data-req="0"]').each(function() {
        //     hideOptionalSection($(this));
        // });

        // $('body').on('change', '.req_check', function() {
        //     const parent = $(this).closest('.product-single-info_row ');
        //     const data_attr = parent.find('[data-per-price]');
        //     const hide_el = parent.find('.wall--wrapper');
        //
        //     if($(this).is(':checked')) {
        //         if(data_attr.attr('data-per-price') === "product") {
        //             const price = data_attr.attr('data-price');
        //             parent.find('.price-placee').html(`$${price}`);
        //
        //             per_price_value += Number(data_attr.attr('data-price'));
        //
        //             // $total.html(per_price_value); //delete
        //
        //         }
        //         showOptionalSection(hide_el);
        //     } else {
        //         if(data_attr.attr('data-per-price') === "product") {
        //             const price = data_attr.attr('data-price');
        //             parent.find('.price-placee').html(`Nothing selected`);
        //
        //             per_price_value -= Number(data_attr.attr('data-price'));
        //
        //             // $total.html(per_price_value); //delete
        //
        //         }
        //         hideOptionalSection(hide_el);
        //     }
        //
        // });

        const addDataKey = {};

//all required sections value
        let per_price_value = 0;

//item price
        let item_price = 0;

//section price
        let section_price = 0;

//counts qty for group
        const new_qty = function(group, popup) {
            let qty = 0;
            if(!popup) {
                group.closest('.product-single-info_row').find('.product-qty').each(function() {
                    qty += Number($(this).val());
                });
            } else {
                $('.selected-items_popup').find('.popup_field-input').each(function() {
                    qty += Number($(this).val());
                });
            }
            return qty;
        };

//event default
        const eventInitialDefault = (ev) => {
            ev.preventDefault();
            ev.stopImmediatePropagation();
        };

// return true if argument is checked
        const isChecked = (checkbox) => {
            return checkbox.is(':checked');
        };

//return true if argument is required
        const isReq = (el) => {
            return Number(el.closest('[data-req]').attr('data-req'));
        };

//return true if arguments is section and false if arguments is item
        const isSection = (el) => {
            return el.closest('[data-per-price]').attr('data-per-price') === "product";
        };

//return true if argument is single select
        const isSingle = (select) => {
            if(select.attr('id')) {
                return select.attr('id').includes('single');
            }
        };

//pass element and get row
        const getRow = (el) => {
            return $(el).closest('product-single-info_row');
        };

//set select2 max limit
        const select2MaxLimit = (section, limit) => {
            section.select2({maximumSelectionLength:
                    Number(limit)
                    - Number(new_qty(section))
                    + section.closest('.product-single-info_row').find('input[name="qty"]').length
            });
        };

//product-count-minus event callback
        const handleProductCountMinus = (minus_button, section, type, limit) => {
            const counter = $(minus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]);

            Number(counter.val()) > 1 && counter.val(Number(counter.val()) - 1);
            new_qty(section);

            if(type === 'select') {
                select2MaxLimit(section, limit);
            } else if(type === 'checkbox') {

            }

            const price = minus_button.closest('[data-price]').attr('data-price');
            minus_button.closest('[data-price]').find('.price-placee').html(`$${price*Number(counter.val())}`);
        };

//product-count-plus event callback
        const handleProductCountPlus = (plus_button, section, type, limit) => {
            const counter = $(plus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]);

            new_qty(section);
            Number(counter.val()) < Number(limit) - Number(new_qty(section)) +
            Number($(plus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val()) && counter.val(Number(counter.val()) + 1);
            new_qty(section);
            if(type === 'select') {
                select2MaxLimit(section, limit);
            }

            const price = plus_button.closest('[data-price]').attr('data-price');
            plus_button.closest('[data-price]').find('.price-placee').html(`$${price*Number(counter.val())}`);

        };

        const countPrices = (modal) => {
            section_price = 0;
            item_price = 0;
            $(`${modal ? '#extraModal' : '.single-product-dtls-wrap'} [data-per-price]`).each(function() {
                const $this = $(this);
                console.log($this);
                if($this.attr('data-per-price') === 'product') {
                    section_price += Number($this.attr('data-price'));
                } else if($this.attr('data-per-price') === 'item') {
                    $this.closest('.product-single-info_row').find('.product-qty').length !== 0
                        && $this.closest('.product-single-info_row').find('.product-qty').each(function() {
                            const $product_qty_input = $(this);
                            const qty = Number($product_qty_input.val());
                            const price = Number($product_qty_input.closest('[data-price]').attr('data-price'));
                            item_price = item_price + (qty * price);
                        });
                }
            });
            return section_price + item_price;
        };

        const setTotalPrice = (modal) => {
            const total_price_count = Number($('.product-qty-select').val());
            //total price element
            const $total = modal ? $('.modal-price-place-summary') : $('.price-place-summary');
            $total.html(`$${countPrices(modal)*total_price_count}`);
        };

        const makeSelectedItem = (data_group) => {
            $(`.package_product[data-group-id="${data_group}"]`).closest('.product-single-info_row').find('.menu-item-selected').each(function() {
                console.log($(this).find('.product-qty').val(), 'val')
                $('#popUpModal').find(`.single-item-wrapper[data-id="${$(this).attr('data-id')}"]`).find('.single-item').click();
                $(`.selected-item_popup[data-id-popup="${$(this).attr('data-id')}"]`).find('.selected-item-popup_qty-select').val(Number($(this).find('.product-qty').val()));
            });
        };

        setTotalPrice();

        let initCount = 0;
        // const select2_products = $('.product-pack-select');

        const productsInit = (modal, modalType = 'all') => {
            const getParentId = modal ? '#extraModal' : '#requiredProducts';
//--------------------------------select start
            const selectInit = () => {
                (function() {
                    $(`${getParentId} .product-pack-select`) && $(`${getParentId} .product-pack-select`).each(function (i, e) {
                        const products_id = $(e).attr('data-id');
                        const select = $(e);
                        console.log('-------------------------')
                        fetch("/products/get-package-type-limit", {
                            method: "post",
                            headers: {
                                "Content-Type": "application/json",
                                Accept: "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-Token": $('input[name="_token"]').val()
                            },
                            credentials: "same-origin",
                            body: JSON.stringify({id: products_id})
                        })
                            .then(function (response) {
                                return response.json();

                            })
                            .then(function (json) {
                                const limit = Number(json.limit);

                                select.select2({
                                    minimumResultsForSearch: Infinity,
                                    maximumSelectionLength: isSingle(select) ? Infinity : Number(json.limit),
                                    placeholder: 'Select an option'
                                });

                                select.closest('.product-single-info_row').on('click', '.product-count-minus', function (ev) {
                                    eventInitialDefault(ev);
                                    handleProductCountMinus($(this), select, 'select', limit);
                                    setTotalPrice(modal);
                                });

                                select.closest('.product-single-info_row').on('click', '.product-count-plus', function (ev) {
                                    eventInitialDefault(ev);
                                    handleProductCountPlus($(this), select, 'select', limit);
                                    setTotalPrice(modal);
                                });

                                select.on('select2:select', function (e) {
                                    const $this = $(this);
                                    const current_item_id = $(e.params.data.element).attr('data-select2-id');

                                    new_qty(select);

                                    fetch("/products/get-variation-menu-raw", {
                                        method: "post",
                                        headers: {
                                            "Content-Type": "application/json",
                                            Accept: "application/json",
                                            "X-Requested-With": "XMLHttpRequest",
                                            "X-CSRF-Token": $('input[name="_token"]').val()
                                        },
                                        credentials: "same-origin",
                                        body: JSON.stringify({
                                            id: e.params.data.id,
                                            selectElementId: current_item_id
                                        })
                                    })
                                        .then(function (response) {
                                            return response.json();
                                        })
                                        .then(function (json) {
                                            if (isSingle(select)) {
                                                !isSection(select) && ($this.closest('.product-single-info_row').find('.selected-menu-options').html(json.html));
                                            } else {
                                                $this.closest('.product-single-info_row').find('.product-single-info_row-items').append(json.html);
                                            }
                                            setTotalPrice(modal);

                                            $('.delete-menu-item').on('click', function () {
                                                const $this = $(this);
                                                const s_id = $this.attr('data-el-id');
                                                $(`.select2-selection__choice[data-select2-id="${s_id}"].select2-selection__choice__remove`).click();
                                                $(`#multi_v_select_${products_id} option[data-select2-id="${s_id}"]`);
                                                const deleted = $this.closest('.menu-item-selected').attr('data-id');
                                                const values = select.val().filter((value) => value !== deleted);
                                                select.val(values).trigger('change.select2');
                                                $this.closest('.menu-item-selected').remove();
                                                new_qty(select);
                                                select2MaxLimit(select, limit);
                                                setTotalPrice(modal);
                                            });
                                        })
                                        .catch(function (error) {
                                            console.log(error);
                                        });
                                });

                                isSingle(select) && select.ready(function (e) {
                                    const current_item_id = select.children().first().attr('data-select2-id');

                                    fetch("/products/get-variation-menu-raw", {
                                        method: "post",
                                        headers: {
                                            "Content-Type": "application/json",
                                            Accept: "application/json",
                                            "X-Requested-With": "XMLHttpRequest",
                                            "X-CSRF-Token": $('input[name="_token"]').val()
                                        },
                                        credentials: "same-origin",
                                        body: JSON.stringify({
                                            id: select.children().first().attr('value'),
                                            selectElementId: current_item_id
                                        })
                                    })
                                        .then(function (response) {
                                            return response.json();
                                        })
                                        .then(function (json) {
                                            if (isSingle(select)) {
                                                !isSection(select) && (item_price += select.closest('.product-single-info_row').find('.menu-item-selected').find('[data-price]'));
                                            } else {
                                                select.closest('.product-single-info_row').find('.product-single-info_row-items').append(json.html);
                                            }

                                            setTotalPrice(modal);
                                        })
                                        .catch(function (error) {
                                            console.log(error);
                                        });
                                });

                                $(`#multi_v_select_${products_id}`).on('select2:unselect', function (e) {
                                    $(this).closest('.product-single-info_row').find(`.menu-item-selected[data-id="${e.params.data.id}"]`).remove();
                                    setTimeout(function () {
                                        new_qty(select);
                                        select2MaxLimit(select, limit);
                                        setTotalPrice(modal);
                                    }, 0);
                                });
                            })
                            .catch(function (error) {
                                console.log(error);
                            });

                    });
                })();
            };
//--------------------------------select end

//--------------------------------list start
            const listInit = () => {
                (function() {
                    const hasQtyCounter = (qty_section) => {
                        return qty_section.children().length !== 0;
                    };

                    const counterHtml = (id) => {
                        return (`<div class="continue-shp-wrapp_qty position-relative product-counts-wrapper w-100">
                                    <span class="d-flex align-items-center h-100 pointer position-absolute product-count-minus">
                                        <svg viewBox="0 0 20 3" width="20px" height="3px">
                                            <path fill-rule="evenodd" fill="rgb(214, 217, 225)" d="M20.004,2.938 L-0.007,2.938 L-0.007,0.580 L20.004,0.580 L20.004,2.938 Z"></path>
                                        </svg>
                                    </span>
                                    <input name="qty" data-id="${id}" min="1" value="1" type="number" class="field-input w-100 h-100 font-23 text-center border-0 form-control product-qty"/>
                                    <span  class="d-flex align-items-center h-100 pointer position-absolute product-count-plus">
                                        <svg viewBox="0 0 20 20" width="20px" height="20px">
                                            <path fill-rule="evenodd" fill="rgb(211, 214, 223)" d="M20.004,10.938 L11.315,10.938 L11.315,20.000 L8.696,20.000 L8.696,10.938 L-0.007,10.938 L-0.007,8.580 L8.696,8.580 L8.696,0.007 L11.315,0.007 L11.315,8.580 L20.004,8.580 L20.004,10.938 Z"></path>
                                        </svg>
                                    </span>
                                </div>`);
                    };

                    $(`${getParentId} .products-list-wrap`).each(function (index, data_el) {
                        const products_id = $(data_el).attr('data-id');
                        const limit = Number($(data_el).attr('data-limit'));

                        $(`#products-list_${products_id}`).on('click', '.package_checkbox_label', function (event) {
                            eventInitialDefault(event);
                            const checkbox = $(event.target).closest('.checkbox-wrap').find('.package_checkbox')[0];
                            const id = $(checkbox).val();
                            const counter_wrap = $($(event.target).closest('.product-list-item').find('.list-qty')[0]);
                            const price = $(counter_wrap[0]).closest('[data-price]').attr('data-price');

                            if (new_qty(counter_wrap) === limit && !isChecked($(checkbox))) {
                                return false;
                            }
                            if (!hasQtyCounter(counter_wrap)) {
                                $(counter_wrap[0]).append(counterHtml(id));
                                setTotalPrice(modal);
                            } else {
                                $(counter_wrap[0]).closest('[data-price]').find('.price-placee').html(`$${price}`);
                                $(counter_wrap[0]).empty();
                                setTotalPrice(modal);
                            }
                            $(this).closest('div').find('.package_checkbox')[0].click();
                        });

                        $(`#products-list_${products_id}`).on('click', '.product-count-minus', function (ev) {
                            eventInitialDefault(ev);
                            handleProductCountMinus($(this), $(`#products-list_${products_id}`), 'checkbox', limit);
                            setTotalPrice(modal);
                        });

                        $(`#products-list_${products_id}`).on('click', '.product-count-plus', function (ev) {
                            eventInitialDefault(ev);
                            handleProductCountPlus($(this), $(`#products-list_${products_id}`), 'checkbox', limit);
                            setTotalPrice(modal);
                        });
                    });
                })();
            };
//--------------------------------list end

//--------------------------------popup start
            const popupInit = () => {
                (function() {

                    $(`${getParentId} .popup-select`).each(function() {
                        const data_group_id = $(this).closest('.package_product').attr('data-group-id');
                        let limit = 0;

                        $("body").on('click', `.popup-select[data-group="${data_group_id}"]`,function () {
                            const $this = $(this);
                            limit = $this.closest('.limit').attr('data-limit');
                            console.log(limit, 1111)
                            $.ajax({
                                type: "post",
                                url: "/products/select-items",
                                cache: false,
                                data: {
                                    group: data_group_id
                                },
                                headers: {
                                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                                },
                                success: function (data) {
                                    if (!data.error) {
                                        $("#popUpModal .modal-content").html(data.html);
                                        $('#popUpModal .title_popup').text(`You can add ${limit} product`);
                                        makeSelectedItem(data_group_id);
                                        $("#popUpModal").attr('data-group', data_group_id);
                                        $("#popUpModal").modal();
                                    } else {
                                        alert("error");
                                    }
                                }
                            });
                        });

                        $("body").on('click', `#popUpModal[data-group="${data_group_id}"] .single-item-wrapper .single-item`, function(ev) {
                            console.log('-----------------------------', data_group_id)
                            const id = $(this).closest(".single-item-wrapper").attr('data-id');
                            const title = $(this).find('.name-item').text().trim();
                            if(limit > new_qty(null, true) && !$(this).closest(".single-item-wrapper").hasClass('active')) {
                                $(this).closest(".single-item-wrapper").addClass('active');
                                $(this).closest('.modal').find('.selected-items_popup')
                                    .append(`<div class="col-md-2 col-sm-3 selected-item_popup" data-id-popup="${id}">
                              <div class="d-flex justify-content-between selected-item_popup-wrapper">
                                <div class="align-self-center text-truncate">
                                  ${title}
                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                  <div class="mr-1">Qty</div>
                                  <div class="continue-shp-wrapp_qty position-relative mr-0">
                                    <!--minus qty-->
                                    <span class="d-flex align-items-center pointer position-absolute selected-item-popup_qty-minus qty-count">
                                                    <svg viewBox="0 0 20 3" width="12px" height="3px">
                                                        <path fill-rule="evenodd" fill="rgb(214, 217, 225)"
                                                              d="M20.004,2.938 L-0.007,2.938 L-0.007,0.580 L20.004,0.580 L20.004,2.938 Z"></path>
                                                    </svg>
                                                </span>
                                    <input class="popup_field-input w-100 h-100 font-23 text-center border-0 selected-item-popup_qty-select" min="number" name=""
                                           type="number" value="1">
                                    <!--plus qty-->
                                    <span class="d-flex align-items-center pointer position-absolute selected-item-popup_qty-plus qty-count">
                                                    <svg viewBox="0 0 20 20" width="15px" height="15px">
                                                        <path fill-rule="evenodd" fill="rgb(211, 214, 223)"
                                                              d="M20.004,10.938 L11.315,10.938 L11.315,20.000 L8.696,20.000 L8.696,10.938 L-0.007,10.938 L-0.007,8.580 L8.696,8.580 L8.696,0.007 L11.315,0.007 L11.315,8.580 L20.004,8.580 L20.004,10.938 Z"></path>
                                                    </svg>
                                                </span>
                                  </div>
                                  <div>
                                    <a href="javascript:void(0)" data-el-id="${id}" class="btn btn-sm delete-menu-item_popup text-danger"><i class="fa fa-times"></i></a>
                                </div>
                                </div>
                              </div>
                            </div>`);
                            } else if($(this).closest(".single-item-wrapper").hasClass('active')) {
                                $(`[data-id-popup="${id}"]`).remove();
                                $(this).closest(".single-item-wrapper").removeClass('active');
                            }
                        });

                        $('body').on('click', '.delete-menu-item_popup', function() {
                            const id = $(this).attr('data-el-id');

                            $(this).closest('.modal').find(`.single-item-wrapper[data-id="${id}"]`).removeClass('active');
                            $(this).closest('.selected-item_popup').remove();
                        });

                        $('body').on('click', `#popUpModal[data-group="${data_group_id}"] .selected-item-popup_qty-plus` , function (ev) {
                            eventInitialDefault(ev);
                            if(limit > new_qty(null, true)) {
                                $(this).siblings(".popup_field-input").val(Number($(this).siblings(".popup_field-input").val()) + 1);
                            }
                        });

                        $('body').on('click', `#popUpModal[data-group="${data_group_id}"] .selected-item-popup_qty-minus` , function (ev) {
                            eventInitialDefault(ev);
                            $(this).siblings(".popup_field-input").val() > 1 && $(this).siblings(".popup_field-input").val(Number($(this).siblings(".popup_field-input").val()) - 1);
                        });

                        $('#popUpModal').on('click', '.b_close', function() {
                            $(".single-item-wrapper").removeClass('active');
                        });

                        $("body").on('click', `#popUpModal[data-group="${data_group_id}"] .modal-footer .b_save`, function() {
                            const items_value_array = [];
                            const items_array = [];
                            console.log(999999)
                            $('#popUpModal .modal-footer').find('.selected-item_popup').each(function() {
                                items_value_array.push({
                                    id: $(this).attr('data-id-popup'),
                                    value: $(this).find('.selected-item-popup_qty-select').val()
                                });
                                items_array.push($(this).attr('data-id-popup'));
                            });
                            console.log(items_array)
                            fetch("/products/get-variation-menu-raws", {
                                method: "post",
                                headers: {
                                    "Content-Type": "application/json",
                                    Accept: "application/json",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-Token": $('input[name="_token"]').val()
                                },
                                credentials: "same-origin",
                                body: JSON.stringify({
                                    ids: items_array,
                                    items: items_value_array
                                })
                            })
                                .then(function (response) {
                                    return response.json();
                                })
                                .then(function (json) {
                                    const selected_product_wrapper = $(`[data-group="${data_group_id}"]`).closest('.product-single-info_row').find('.product-single-info_row-items');

                                    selected_product_wrapper.empty();
                                    selected_product_wrapper.append(json.html);

                                    json.items.map((item) => {
                                        const item_price = Number(selected_product_wrapper.find(`.menu-item-selected[data-id="${item.id}"]`).attr('data-price'));
                                        selected_product_wrapper.find(`.menu-item-selected[data-id="${item.id}"]`).find('.product-qty').val(Number(item.value));
                                        selected_product_wrapper.find(`.menu-item-selected[data-id="${item.id}"]`).find('.price-placee').html(`$${item_price * Number(item.value)}`);
                                    });

                                    setTotalPrice(modal);

                                    $('#popUpModal').modal('hide');

                                    $(`[data-group="${data_group_id}"]`).closest('.product-single-info_row').on('click', '.delete-menu-item', function() {
                                        $(this).closest('.menu-item-selected').remove();
                                        setTotalPrice(modal);
                                    });

                                    $(`[data-group="${data_group_id}"]`).closest('.product-single-info_row').on('click','.product-count-minus', function(ev){
                                        eventInitialDefault(ev);
                                        const limit = $(this).closest('.product-single-info_row').find('.limit[data-limit]').attr('data-limit');

                                        console.log(limit, 222);
                                        handleProductCountMinus($(this), $(`[data-group="${data_group_id}"]`), 'popup', limit);
                                        setTotalPrice(modal);
                                    });

                                    $(`[data-group="${data_group_id}"]`).closest('.product-single-info_row').on('click','.product-count-plus', function(ev){
                                        eventInitialDefault(ev);
                                        const limit = $(this).closest('.product-single-info_row').find('.limit[data-limit]').attr('data-limit');

                                        console.log(limit, 333);
                                        handleProductCountPlus($(this), $(`[data-group="${data_group_id}"]`), 'popup', limit);
                                        setTotalPrice(modal);
                                    });
                                });
                        });
                    });

                })();
            };
//--------------------------------popup end
            if(!modal && initCount === 0) {
                selectInit();
                listInit();
                popupInit();
                initCount++;
            } else if(modal) {
                console.log(modalType)
                switch (modalType) {
                    case 'menu': selectInit();
                        break;
                    case 'list': listInit();
                        break;
                    default: selectInit(); listInit(); popupInit();
                }
            }

        };

        AjaxCall("/products/get-extra-content", {id:$("#vpid").val()}, function (res) {
            if (!res.error) {
                $("#extraModal .modal-body").html(res.html);
                productsInit(true);
                $("#extraModal").modal();
            }
        });

        $("body").on('click',".select-extra",function () {
            $("#extraModal").find(".select-extra").removeClass("active");
            $(this).addClass("active");
            AjaxCall("/products/get-extra-item", {id:$(this).attr('data-id'),group:$(this).attr('data-group')}, function (res) {
                if (!res.error) {
                    $("#extraModal").find(".extra-main-content").html(res.html);
                    productsInit(true, res.type);
                    // $("#extraModal .modal-price-place-summary").html('$0');
                }
            });
        });

        $("body").on('click', '#extraModal .product-card_btn', function() {
            $.ajax({
                type: "post",
                url: "/add-extra-to-cart",
                cache: false,
                datatype: "json",
                data: {key: addDataKey.key,product_id: addDataKey.product_id, variations: $("#vpid").val()},
                headers: {
                    "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                },
                success: function (data) {
                    if (!data.error) {
                        // $(".cart-count").html(data.count)
                        // $('#cartSidebar').html(data.headerHtml)
                        // $("#headerShopCartBtn").trigger('click');
                        alert(data);
                    } else {

                    }
                }
            });
        });

        $('#extraModal').on('hidden.bs.modal', function () {
            $(this).find('.extra-main-content').empty();
            $("#extraModal .modal-price-place-summary").html('$0');
        });

        productsInit();

        $("body").on('click', '.btn-add-to-cart', function () {
            var variationId = $(this).data("id");
            let all_validation = false;
            console.log($('.product-qty-select').val())
            let item_validation = 0;
            $('#requiredProducts .limit').each(function (index, gr) {
                const $group = $(gr);
                const group_id = Number($group.attr('data-id'));
                const group_limit = Number($group.attr('data-limit'));
                const group_min_limit = Number($group.attr('data-min-limit'));
                let qty = 0;

                $group.closest('.product-single-info_row').find('.product-qty').each(function (index, i_qty) {
                    const $item_qty = $(i_qty)

                    qty += Number($item_qty.val());
                });

                console.log('group_id', group_id, 'qty', qty, 'group_limit', group_limit)
                if (group_limit >= qty && group_min_limit <= qty) {
                    item_validation += 1;
                }
            });
            // item_validation === $('#requiredProducts .limit').length && (all_validation = true)
            all_validation = true
            $('.product-qty').toArray().map(function (el) {
                return {
                    id: $(el).attr('data-id'),
                    qty: $(el).val()
                };
            });

            if (all_validation) {
//
                const product_id = $('#vpid').val();
                const product_qty = $('.product-qty-select').val();
                const variations = $('#requiredProducts [data-group-id]').toArray().map(function (el) {
                    const group_id = $(el).attr('data-group-id');
                    const products = [];
                    $(`[data-group-id="${group_id}"]`).toArray().map(function (gr) {
                        if ($(gr).closest('.product-single-info_row').find('.product-qty').length !== 0) {
                            $(gr).closest('.product-single-info_row').find('.product-qty').toArray().map(function (qt) {
                                products.push({
                                    id: $(qt).attr('data-id'),
                                    qty: $(qt).val()
                                });
                            });
                        } else if ($(gr).find('.custom-control-input').length === 0 || $(gr).find('.custom-control-input').is(':checked')) {
                            products.push({
                                id: $($(gr).find('[data-id]')[0]).attr('data-id'),
                                qty: 1
                            })
                        }
                    });
                    return {
                        group_id,
                        products
                    }
                });

                const filtered_variations = variations.filter((variation) => {
                    return variation.products.length > 0;
                });
                const product_data = {
                    product_id,
                    product_qty,
                    variations: filtered_variations
                };

                console.log(product_data);

                AjaxCall("/products/get-extra-content", {id:$("#vpid").val()}, function (res) {
                    if (!res.error) {
                        $("#extraModal .modal-body").html(res.html);
                        productsInit();
                        $("#extraModal").modal();
                    }
                });


                $.ajax({
                    type: "post",
                    url: "/add-to-cart",
                    cache: false,
                    datatype: "json",
                    data: product_data,
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        console.log(data);
                        if (!data.error) {
                            $(".cart-count").html(data.count);
                            $('#cartSidebar').html(data.headerHtml);
                            $("#headerShopCartBtn").trigger('click');
                            $("#extraModal").modal();
                            addDataKey.key = data.key;
                            addDataKey.product_id = data.product_id;
                        } else {

                        }
                    }
                });
            } else {
                alert('Select available variation');
            }
        });
    });
});



// my account select start
    $('#accounts--selects').on('select2:select', function (e) {
        var locUrl = e.params.data.id;
        window.location.replace(locUrl);
    });
    // my account select end

    // header search for mobile
    $('body').on('click', '.search-icon-mobile .icon', function () {
        $(this).closest('.header-bottom').find('.cat-search').toggleClass('closed');
    });


    $('.nav-item.nav-item--has-dropdown').hover(
        function () {
            let darkBg = $(this).closest('body').find('.dark-bg_body');
            if ($('body').hasClass('show-filter')) {
                $('body').removeClass('show-filter');
            } else {
                darkBg.addClass('show');
            }

        }, function () {
            let darkBg = $(this).closest('body').find('.dark-bg_body');
            if (!$('.top-filters .nav-item--has-dropdown_dropdown').hasClass('open')) {
                darkBg.removeClass('show');
            } else {
                $('body').addClass('show-filter');
            }
        }
    );
// filter show
    $('body').on('click', '.top-filters .arrow-wrap .arrow-filters', function () {
        let darkBg = $(this).closest('body').find('.dark-bg_body');
        if (darkBg.hasClass('show')) {
            darkBg.removeClass('show')
        } else {
            darkBg.addClass('show')
        }
        $(this).find('.arrow').toggleClass('opened');
        // console.log(55)
        $(this).closest('.top-filters').find('.main-filters').toggleClass('closed-mobile');
        $(this).closest('.arrow-wrap').find('.nav-item--has-dropdown_dropdown').toggleClass('open');

        $(this).closest('body').toggleClass('show-filter');
    })

    // range
    // $('.range-steps_item.active').nextAll($('.range-steps_item')).addClass('line-none');


    // cards change display
    $('body').on('click', '.display-icon', function (e) {
        e.preventDefault();
        $('.display-icon').removeClass('active');
        $(this).addClass('active');
        if ($(this).attr('id') === 'dispGrid') {
            localStorage.setItem('display-grid',"grid");
            $('.change-display-wrap').addClass('display-grid');
        } else {
            localStorage.setItem('display-grid',"list");
            $('.change-display-wrap').removeClass('display-grid');
        }
    });

    localStorage.getItem('display-grid') == "list" && $('#displVertBtn').click();


    // scroll top button
    $('#scrollTopBtn').on('click', function () {

        if ($('#singleProductPageCnt').length) {
            $('#singleProductPageCnt').animate({
                scrollTop: 0
            }, 800);
        } else {
            $('html, body').animate({
                scrollTop: 0
            }, 800);
        }

    });

    // product range count
    $('body').on('click ', ' .range-steps input', function () {
        $(this).closest('.range-steps').find('.range-steps_item').removeClass('active line-none');
        if ($(this).is(":checked")) {
            $(this).parent().addClass('active');
            $(this).parent().addClass('line-none');
            $(this).parent().nextAll($('.range-steps_item')).addClass('line-none');
        }
    });


    $('body').on('click', '.range-steps_count', function () {
        let rangeItem = $(this).closest('.range-steps_item');
        $(this).closest('.range-steps').find('input').removeAttr('checked');
        // if(!rangeItem.find('input').is(":checked")){
        console.log("check, div");
        $(this).closest('.range-steps').find('.range-steps_item').removeClass('active line-none');
        rangeItem.find('input').removeAttr('checked');
        $(this).closest('.range-steps_item').addClass('active').nextAll().addClass('line-none');
        // }

    })

    // cookies: change content top styles
    changeHeaderWhenIsCookie();


    // display filter for mobile
    // $('body').on('click', '.filters-for-mobile .btn--filter', function () {
    //     $(this).closest('.top-filters').find('.main-filters').toggleClass('closed-mobile');
    // });


    // menu click mobile
    $('body').on('click', '.header-top .nav-item--has-dropdown', function () {
        $(this).toggleClass('active');
        $('body').find('.dark-bg_body').removeClass('show');
    });

    // hidden sidebars slide from right
    openSidebar($('#ptofileBtn'), $('#profileSidebar'));
    openSidebar($('#headerShopCartBtn'), $('#cartSidebar'));

    // my account select make fixed when scrolled
    $(window).scroll(function () {
        var wScroll = $(this).scrollTop();


        if (wScroll > 0) {
            $('.my-account--selects').addClass('pos-fixed');
        } else {
            $('.my-account--selects').removeClass('pos-fixed');
        }
    });




function openSidebar(btn, sidebar) {
    btn.on('click', function (e) {

        e.stopPropagation();
        $('body').addClass('body-over-hidden')
        $(this).toggleClass('active');

        if (($('.hidden-sidebar')).removeClass('show')) {
            ($('.hidden-sidebar')).removeClass('show')
        }

        sidebar.toggleClass('show');

        $('.dark-bg_body').addClass('show');

    });

    $('body').on('click', function (e) {
        if (btn.hasClass('active')) {
            btn.removeClass('active')
        }
        if (!$(e.target).closest(sidebar).length) {
            sidebar.removeClass('show');
            $('body').removeClass('body-over-hidden')
            $('.dark-bg_body').removeClass('show');
        }
    });

}

function changeHeaderWhenIsCookie() {
    if ($('.js-cookie-consent.cookie-consent').css('display') !== 'none') {
        var cookieHeight = $('.js-cookie-consent.cookie-consent').height();

        $('.main-header .header-top').css('top', cookieHeight);

        var headerPaddingTop = parseInt($('.main-header').css('padding-top'));
        var headerPaddingTopNew = headerPaddingTop + cookieHeight + 'px';

        $('.main-header').css('padding-top', headerPaddingTopNew);

        var headerHeight = $('.header-top').height();
        var accountSelectPaddingTop = headerHeight + cookieHeight;

        $('.my-account--selects').css('top', accountSelectPaddingTop);

        $('.js-cookie-consent-agree').on('click', function () {
            var resetHeaderPaddingTop =  headerPaddingTop + 'px';
            $('.main-header').css('padding-top', resetHeaderPaddingTop);
            $('.main-header .header-top').css('top', 0);

            $('.my-account--selects').css('top', headerHeight);

        })


    }
}

function heightBlock(mainDiv, element) {
    let countElement = 0;
    $(element).each(function () {
        countElement += $(this).outerHeight();
    });
    if ($(mainDiv).outerHeight() < countElement) {
        $(mainDiv).css('display', 'block')
    } else {
        $(mainDiv).css('display', 'flex')
    }
}


