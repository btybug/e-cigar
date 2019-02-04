/**
 * Created by hook on 1/9/2019.
 */

$(document).ready(function(){

    function Get_content() {
        var _this = this;

        this.myEvents = function(){

            $(".__modal").click(function(){
                let data = {id:$(this).attr("data-id"),object:$(this).attr("data-object")};


                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "/my-account/notifications",
                    method: "POST",
                    data:data,
                    success:function(r){
                        $(".modal-body").html(r);
                        $("#notif_modal").modal();
                    }
                })
            })

        }();

    }

    var app = new Get_content();

})