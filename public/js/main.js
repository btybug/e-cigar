$(function() {
    heightBlock('.main-left-tabs .nav','.main-left-tabs .nav a');
    $( window ).resize(function() {
        heightBlock('.main-left-tabs .nav','.main-left-tabs .nav a');
    });

    // hidden sidebars slide from right
    openSidbar($('#ptofileBtn'), $('#profileSidebar'));
    openSidbar($('#headerShopCartBtn'), $('#cartSidebar'));

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
        autoAdvance:true,
        show: {
            "0px": 1,
            "500px": 2,
            "980px": 3
        }
    });

    // product range
    $('body').on('change','.product-range input',function () {
        $(this).closest('.product-range').children().removeClass('active line-none');
        if($(this).is(":checked")){
            $(this).parent().addClass('active');
            $(this).parent().prevAll( ).addClass('active');
            $(this).parent().addClass('line-none')
        }
    });

});

function heightBlock(mainDiv,element) {
    let countElement = 0;
    $(element).each(function(){
        countElement += $(this).outerHeight();
    });
    if($(mainDiv).outerHeight()<countElement){
        $(mainDiv).css('display','block')
    }else{
        $(mainDiv).css('display','flex')
    }
}

function openSidbar(btn, sidebar) {
    btn.on('click', function (e) {
        e.stopPropagation();
        if(!sidebar.hasClass('show')){
            $('.hidden-sidebar').removeClass('show')
        }
        if(sidebar.hasClass('show')){
            sidebar.removeClass('show');
        }else{
            sidebar.addClass('show');
        }

    });

    $('body').on('click', function (e) {
        if(e.target !== sidebar[0] && !$(e.target).closest(sidebar).length) {
            sidebar.removeClass('show');
        }
    });

}

////new
$(function() {
    $('.select-2--no-search').select2({
        minimumResultsForSearch: Infinity
    });
    $('.select_with-tag').select2();


    $('.nav-item.nav-item--has-dropdown').hover(
        function() {
            let darkBg = $(this).closest('body').find('.dark-bg_body')
            if($('body').hasClass('show-filter')){
                $('body').removeClass('show-filter')
            }else {
                darkBg.addClass('show')
            }

        }, function() {
            let darkBg = $(this).closest('body').find('.dark-bg_body')
            if(!$('.top-filters .nav-item--has-dropdown_dropdown').hasClass('open')){
                darkBg.removeClass('show')
            }else{
                $('body').addClass('show-filter')
            }

        }
    );
// filter show
    $('body').on('click','.top-filters .arrow-wrap .arrow',function () {
        let darkBg = $(this).closest('body').find('.dark-bg_body');
        if(darkBg.hasClass('show')){
            darkBg.removeClass('show')
        }else{
            darkBg.addClass('show')
        }
        $(this).toggleClass('opened');
        $(this).closest('.arrow-wrap').find('.nav-item--has-dropdown_dropdown').toggleClass('open');

        $(this).closest('body').toggleClass('show-filter')
    })


    // cards display
    $('body').on('click', '.display-icon', function (e) {
        e.preventDefault();
        $('.display-icon').removeClass('active');
        $(this).addClass('active');
        if($(this).attr('id') === 'dispGrid'){
            $('.products-wrap').addClass('display-grid')
        }else {
            $('.products-wrap').removeClass('display-grid')
        }
    });

    // scroll top
    $('#scrollTopBtn').on('click', function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
    })
    // display filter for mobile
    $('body').on('click', '.filters-for-mobile .btn--filter', function () {
        $(this).closest('.top-filters').find('.main-filters').toggleClass('closed-mobile')
    });
    // menu click mobile
    $('body').on('click', '.header-top .nav-item--has-dropdown', function () {
        $(this).toggleClass('active')
        $('body').find('.dark-bg_body').removeClass('show')
    });
} );
