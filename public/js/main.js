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




    $( "#singleProductPageCnt" ).fadeIn(function() {

//total price element
        const $total = $('.price-place-summary');

//all required sections value
        let per_price_value = 0;

//item price
        let item_price = 0;

//section price
        let section_price = 0;

//counts qty for group
        const new_qty = function(group) {
            let qty = 0;
            group.closest('.product-single-info_row').find('.product-qty').each(function() {
                qty += Number($(this).val());
            });
            return qty;
        };

//event default
        const eventInitialDefault = (ev) => {
            ev.preventDefault();
            ev.stopImmediatePropagation();
        };

//return true if optional is checked
//         const isCheckedOptional = (el) => {
//             return el.find('.req_check').is(':checked');
//         };

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
            const input = $(minus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]);

            Number(input.val()) > 1 && input.val(Number(input.val()) - 1);
            new_qty(section);

            if(type === 'select') {
                select2MaxLimit(section, limit);
            }

            const price = minus_button.closest('[data-price]').attr('data-price');
            minus_button.closest('[data-price]').find('.price-placee').html(`$${price*Number(input.val())}`);
        };
//product-count-plus event callback
        const handleProductCountPlus = (plus_button, section, type, limit) => {
            const input = $(plus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]);

            new_qty(section);
            Number(input.val()) < Number(limit) - Number(new_qty(section)) +
            Number($(plus_button.closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val()) && input.val(Number(input.val()) + 1);
            new_qty(section);
            if(type === 'select') {
                select2MaxLimit(section, limit);
            }

            const price = plus_button.closest('[data-price]').attr('data-price');
            plus_button.closest('[data-price]').find('.price-placee').html(`$${price*Number(input.val())}`);
        };


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

        const countPrices = () => {
            section_price = 0;
            item_price = 0;
            $('#requiredProducts [data-per-price]').each(function() {
                const $this = $(this);
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

        const setTotalPrice = () => {
            $total.html(`$${countPrices()}`);
        };

        setTotalPrice();
        const select2_products = $('.product-pack-select');



        select2_products && select2_products.each(function (i,e){
            const products_id = $(e).attr('data-id');
            const select = $(e);

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


                    $('body').on('keypress', '.continue-shp-wrapp_qty .field-input', function() {
                        return false;
                    });

                    select.closest('.product-single-info_row').on('click','.product-count-minus', function(ev){
                        eventInitialDefault(ev);
                        handleProductCountMinus($(this), select, 'select', limit);
                        setTotalPrice();
                    });

                    select.closest('.product-single-info_row').on('click','.product-count-plus', function(ev){
                        eventInitialDefault(ev);
                        handleProductCountPlus($(this), select, 'select', limit);
                        setTotalPrice();
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
                            body: JSON.stringify({id: e.params.data.id, selectElementId: current_item_id})
                        })
                            .then(function (response) {
                                return response.json();
                            })
                            .then(function (json) {
                                if(isSingle(select)) {
                                    !isSection(select) && ($this.closest('.product-single-info_row').find('.selected-menu-options').html(json.html));
                                } else {
                                    $this.closest('.product-single-info_row').find('.product-single-info_row-items').append(json.html);
                                }
                                setTotalPrice();

                                $('.delete-menu-item').on('click', function() {
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
                                    setTotalPrice();
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
                            body: JSON.stringify({id: select.children().first().attr('value'), selectElementId: current_item_id})
                        })
                            .then(function (response) {
                                return response.json();
                            })
                            .then(function (json) {
                                if(isSingle(select)) {
                                    !isSection(select) && (item_price += select.closest('.product-single-info_row').find('.menu-item-selected').find('[data-price]'));
                                } else {
                                    select.closest('.product-single-info_row').find('.product-single-info_row-items').append(json.html);
                                }

                                setTotalPrice();
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    });

                    $(`#multi_v_select_${products_id}`).on('select2:unselect', function (e) {
                        $(this).closest('.product-single-info_row').find(`.menu-item-selected[data-id="${e.params.data.id}"]`).remove();
                        setTimeout(function() {
                            new_qty(select);
                            select.select2({maximumSelectionLength: Number(limit) - Number(new_qty(select)) + select.closest('.product-single-info_row').find('input[name="qty"]').length});
                            setTotalPrice();
                        }, 0);

                    });
                })
                .catch(function (error) {
                    console.log(error);
                });

        });
//--------------------------------List

        $('.products-list-wrap').each(function(index, list) {
            const list_id = $(list).attr('data-id');
            const limit = Number($(list).attr('data-limit'));
            const per_price = $(list).attr('data-per-price') === 'product';
            console.log($(list),7777);

            // hideOptionalSection($(list));

            let qty;
            $(`#products-list_${list_id}`).on('click', '.package_checkbox_label', function (event) {
                eventInitialDefault(event)
                const input = $(event.target).closest('.checkbox-wrap').find('.package_checkbox')[0];
                const id = $(input).val();
                const qty_input = $($(event.target).closest('.product-list-item').find('.list-qty')[0]);
                qty = 0;
                $(`#products-list_${list_id} .field-input`).each(function (i, e) {
                    qty += Number($(e).val());
                });
                if (qty === limit && !$(input).is(':checked')) {
                    qty = 0;
                    return false;
                } else if ($(input).is(':checked')) {
                    $(this).closest('div').find('.package_checkbox')[0].click();
                    qty_input.empty();
                    const price = $(this).closest('[data-price]').attr('data-price');
                    $(this).closest('[data-price]').find('.price-placee').html(`$${price}`);
                } else {
                    qty_input.children().length === 0 && $(qty_input[0]).append(`<div class="continue-shp-wrapp_qty position-relative product-counts-wrapper w-100">
                    <span class="d-flex align-items-center h-100 pointer position-absolute product-count-minus">
                    <svg viewBox="0 0 20 3" width="20px" height="3px">
                    <path fill-rule="evenodd" fill="rgb(214, 217, 225)" d="M20.004,2.938 L-0.007,2.938 L-0.007,0.580 L20.004,0.580 L20.004,2.938 Z"></path>
                    </svg>
                    </span>
                        <input name="qty" data-id="${id}" min="1" value="1" type="number" class="field-input w-100 h-100 font-23 text-center border-0 form-control product-qty ${per_price && "product-qty_per_price"}"/>
                    <span  class="d-flex align-items-center h-100 pointer position-absolute product-count-plus">
                    <svg viewBox="0 0 20 20" width="20px" height="20px">
                    <path fill-rule="evenodd" fill="rgb(211, 214, 223)" d="M20.004,10.938 L11.315,10.938 L11.315,20.000 L8.696,20.000 L8.696,10.938 L-0.007,10.938 L-0.007,8.580 L8.696,8.580 L8.696,0.007 L11.315,0.007 L11.315,8.580 L20.004,8.580 L20.004,10.938 Z"></path>
                    </svg>
                    </span>
                    </div>`)
                    $(this).closest('div').find('.package_checkbox')[0].click();
                }


                const prices_array = $('.product-qty:not(.product-qty_per_price)').toArray().map(function(el) {
                    const price = $(el).closest('[data-price]').attr('data-price');
                    const count = $(el).val();
                    return price * count;
                });
                const price = prices_array.length !== 0 ? prices_array.reduce((accumulator, a) => {
                    return accumulator + a;
                }) : 0;
                const $total = $('.price-place-summary');
                console.log(per_price, per_price_value, 'loging---------------------');

                //nnn
            });


            const prices_array = $('.product-qty:not(.product-qty_per_price)').toArray().map(function(el) {
                const price = $(el).closest('[data-price]').attr('data-price');
                const count = $(el).val();
                return price * count;
            });
            const price = prices_array.length !== 0 ? prices_array.reduce((accumulator, a) => {
                return accumulator + a;
            }) : 0;

            console.log('per_price_value', per_price_value,$(`#products-list_${list_id}`).attr('data-price'));
            console.log(99999,price,per_price_value);
            const $total = $('.price-place-summary');
            //nnn

            $('body').on('keypress', '.continue-shp-wrapp_qty .field-input', function () {
                return false;
            });

            $(`#products-list_${list_id}`).on('click', '.product-count-minus', function (ev) {
                eventInitialDefault(ev)
                const input = $($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]);
                Number(input.val()) > 1 && input.val(Number(input.val()) - 1);
                qty = new_qty($(`#products-list_${list_id}`));

                const price = $(this).closest('[data-price]').attr('data-price');
                $(this).closest('[data-price]').find('.price-placee').html(`$${price*Number(input.val())}`);

                const prices_array = $('.product-qty:not(.product-qty_per_price)').toArray().map(function(el) {
                    const price = $(el).closest('[data-price]').attr('data-price');
                    const count = $(el).val();
                    return price * count;
                });
                const total_price = prices_array.length !== 0 ? prices_array.reduce((accumulator, a) => {
                    return accumulator + a;
                }) : 0;
                const $total = $('.price-place-summary');
                //nnn
            });


            $(`#products-list_${list_id}`).on('click', '.product-count-plus', function (ev) {
                eventInitialDefault(ev)
                qty = new_qty($(`#products-list_${list_id}`));
                const input = $($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]);
                Number(input.val()) < Number(limit) - Number(qty) +
                Number($($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val())
                && input.val(Number(input.val()) + 1);
                qty = new_qty($(`#products-list_${list_id}`));

                const price = $(this).closest('[data-price]').attr('data-price');
                $(this).closest('[data-price]').find('.price-placee').html(`$${price*Number(input.val())}`);

                const prices_array = $('.product-qty:not(.product-qty_per_price)').toArray().map(function(el) {
                    const price = $(el).closest('[data-price]').attr('data-price');
                    const count = $(el).val();
                    return price * count;
                });
                const total_price = prices_array.length !== 0 ? prices_array.reduce((accumulator, a) => {
                    return accumulator + a;
                }) : 0;
                const $total = $('.price-place-summary');
                //nnn
            });
        });

        //--------------------------------List end
        let dg = null;
        let popup_limit = 0;
        $("body").on('click','.popup-select',function () {
            dg = $(this).attr('data-group');
            let group = $(this).attr('data-group');
            popup_limit = $(this).closest('.limit').attr('data-limit');
            const selectedIds = $(this).closest('.product-single-info_row').find('.menu-item-selected').toArray().map(function(item) {
                console.log($(item).attr('data-id'));
                return $(item).attr('data-id');
            });
            console.log(selectedIds, 'selectedIds');
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
                        $("#popUpModal .modal-content").html(data.html);
                        $('.title_popup').text(`You can add ${popup_limit} product`);
                        $("#popUpModal").modal();
                    } else {
                        alert("error");
                    }
                }
            });
        });



        const popup_qty = function() {
            let qty = 0;
            $('.selected-items_popup').find('.popup_field-input').each(function() {
                qty += Number($(this).val());
            });
            return qty;
        };

        $("body").on('click', ".single-item-wrapper .single-item", function(ev) {
            const id = $(this).closest(".single-item-wrapper").attr('data-id');
            const title = $(this).find('.name-item').text().trim();
            if(popup_limit > popup_qty() && !$(this).closest(".single-item-wrapper").hasClass('active')) {
                console.log($(this).closest(".single-item-wrapper"));
                $(this).closest(".single-item-wrapper").addClass('active');
                $('.selected-items_popup')
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
                                    <a href="javascript:void(0)" data-el-id="28" class="btn btn-sm delete-menu-item text-danger"><i class="fa fa-times"></i></a>
                                </div>
                                </div>
                              </div>
                            </div>`);
            } else if($(this).closest(".single-item-wrapper").hasClass('active')) {
                $(`[data-id-popup="${id}"]`).remove();
                $(this).closest(".single-item-wrapper").removeClass('active');
            }
        });

        $('body').on('click', '#popUpModal .selected-item-popup_qty-plus' , function (ev) {
            eventInitialDefault(ev)
            if(popup_limit > popup_qty()) {
                $(this).siblings(".popup_field-input").val(Number($(this).siblings(".popup_field-input").val()) + 1);
                console.log('1');
            }
        });

        $('body').on('click', '#popUpModal .selected-item-popup_qty-minus' , function (ev) {
            eventInitialDefault(ev)
            $(this).siblings(".popup_field-input").val() > 1 && $(this).siblings(".popup_field-input").val(Number($(this).siblings(".popup_field-input").val()) - 1);
        });

        $('#popUpModal').on('click', '.b_close', function() {
            $(".single-item-wrapper").removeClass('active');
        });

        $('body').on('click', '.modal-footer .b_save', function() {
            const items_array = [];
            $('.modal-body').find('.single-item-wrapper').each(function() {
                $(this).hasClass('active') && (items_array.push($(this).attr('data-id')));
            });

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
                    // console.log(json.html);
                    let prices = 0;
                    const limit = $($(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.limit')[0]).attr('data-limit');
                    let qty = 0;

                    const new_qty = function() {
                        qty = 0;
                        $(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.product-qty').each(function() {
                            qty += Number($(this).val());
                        });
                    };

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').append(json.html);
                    const popup_items_qty = [];
                    $(`.selected-items_popup`).find('.popup_field-input').each(function() {
                        popup_items_qty.push({
                            id: $(this).closest('.selected-item_popup').attr('data-id-popup'),
                            value: $(this).val()
                        });
                    });

                    console.log(popup_items_qty)
                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.field-input').each(function() {
                        const d_id = $(this).attr('data-id');
                        const value = popup_items_qty.find((el) => {
                            return el.id === d_id;
                        }).value;
                        $(this).val(value);
                        $(this).closest('.menu-item-selected').find('.price-placee')
                            .html('$'+ Number($(this).closest('.menu-item-selected').attr('data-price')) * Number($(this).val()));
                    });
                    $('#popUpModal').modal('hide');

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').find('.menu-item-selected[data-price]').each(function(){
                        prices += Number($(this).attr('data-price'))*Number($(this).find('.field-input').val());
                    });


                    //nnn
                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').on('click', '.delete-menu-item', function() {

                        //nnn

                        $(this).closest('.menu-item-selected').remove();

                    });

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').on('click','.product-count-minus', function(ev){
                        eventInitialDefault(ev)
                        const input = $($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]);
                        if(Number(input.val()) > 1) {
                            input.val(Number(input.val()) - 1);
                            const price = Number($(this).closest('[data-price]').attr('data-price'));
                            $(this).closest('[data-price]').find('.price-placee').html(`$${price * Number(input.val())}`);

                            const $total = $('.price-place-summary');
                            console.log('$(`[data-group="${dg}"]`)', $(`[data-group="${dg}"]`));
                            //nnn
                        }
                    });

                    $(`[data-group="${dg}"]`).closest('.product-single-info_row').on('click','.product-count-plus', function(ev){
                        eventInitialDefault(ev)
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
                            //nnn
                        };

                    });
                });
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


