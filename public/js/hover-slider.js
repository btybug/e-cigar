$(document).ready(function(){

	function Hover_slider() {
        var _this = this;

        this.myEvents = function(){

            $(".product-card_thumb-img-holder").mouseover(function(){
                // console.log(1)

                let img_path = $(this).find("img").attr("src")
                let data_img = $(this).find("img").attr("data-img")

                $(".products-wrap_col:nth-child("+data_img+") .product-card_thumb-img-holder").removeClass("active_slider")
                $(this).addClass("active_slider")
                
                $(".products-wrap_col:nth-child("+data_img+") img.card-img-top").attr("src",img_path)
            })

        }();

        
    }

    var app = new Hover_slider();

})