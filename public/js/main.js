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
