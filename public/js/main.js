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
    minimumResultsForSearch: Infinity,
    maximumSelectionLength: 1
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
        var msd = $(".multi_v_select");
        msd && msd.each(function (i,e){
            let id = $(e).attr('data-id');

            fetch("/products/get-package-type-limit", {
                method: "post",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-Token": $('input[name="_token"]').val()
                },
                credentials: "same-origin",
                body: JSON.stringify({id: id})
            })
                .then(function (response) {
                    return response.json();

                })
                .then(function (json) {
                    const limit = Number(json.limit);
                    $(`#multi_v_select_${id}`).select2({
                        minimumResultsForSearch: Infinity,
                        maximumSelectionLength: Number(json.limit)
                    });

                    let qty = 0;

                    const new_qty = function() {
                        qty = 0;
                        console.log(id, 'id')
                        $(`#multi_v_select_${id}`).closest('.product-single-info_row').find('.product-qty').each(function() {
                            qty += Number($(this).val());
                        });
                        console.log(qty, 'qty');
                    };


                                                //********************//
                                                //*******minus-*******//
                                                //********************//

                    $('body').on('keypress', '.continue-shp-wrapp_qty .field-input', function() {
                        return false
                    })
                    $(`#multi_v_select_${id}`).closest('.product-single-info_row').on('click','.product-count-minus', function(ev){
                        ev.preventDefault();
                        ev.stopImmediatePropagation();
                        const input = $($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0])
                        Number(input.val()) > 1 && input.val(Number(input.val()) - 1);

                        new_qty();

                        $(`#multi_v_select_${id}`).select2({maximumSelectionLength: Number(limit) - Number(qty) + $(`#multi_v_select_${id}`).closest('.product-single-info_row').find('input[name="qty"]').length});
                    });

                                                //********************//
                                                //*******+plus+*******//
                                                //********************//

                    $(`#multi_v_select_${id}`).closest('.product-single-info_row').on('click','.product-count-plus', function(ev){
                        ev.preventDefault();
                        ev.stopImmediatePropagation();
                        new_qty();
                        const input = $($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]);
                        console.log($($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val(), 'this' );
                        Number(input.val()) < Number(limit) - Number(qty) +
                            Number($($(this).closest('.continue-shp-wrapp_qty').find('.field-input')[0]).val()) && input.val(Number(input.val()) + 1);
                        new_qty();
                        $(`#multi_v_select_${id}`).select2({maximumSelectionLength: Number(limit) - Number(qty) + $(`#multi_v_select_${id}`).closest('.product-single-info_row').find('input[name="qty"]').length});
                    });

                                                //******************//
                                                //**select2:select**//
                                                //******************//

                    $(`#multi_v_select_${id}`).on('select2:select', function (e) {
                        const _this = this;
                        const current_item_id = $(e.params.data.element).attr('data-select2-id');
                        new_qty();

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
                                $(_this).closest('.product-single-info_row').append(json.html);

                                $('.delete-menu-item').on('click', function() {
                                    const s_id = $(this).attr('data-el-id');
                                    $(`.select2-selection__choice[data-select2-id="${s_id}"] .select2-selection__choice__remove`).click();
                                    $(`#multi_v_select_${id} option[data-select2-id="${s_id}"]`);
                                    $(this).closest('.menu-item-selected').remove();
                                });
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                    });

                                                //********************//
                                                //**select2:unselect**//
                                                //********************//

                    $(`#multi_v_select_${id}`).on('select2:unselect', function (e) {
                        new_qty();
                        $(this).closest('.product-single-info_row').find(`.menu-item-selected[data-id="${e.params.data.id}"]`).remove();
                    });
                })
                .catch(function (error) {
                    console.log(error);
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


