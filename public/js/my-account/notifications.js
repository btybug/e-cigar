/**
 * Created by hook on 1/9/2019.
 */

$(document).ready(function(){

    function Get_content() {
        var _this = this;

        this.myEvents = function(){

            $(".__modal").click(function(){
                let id = $(this).attr("data-id");


                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "/my-account/notifications",
                    method: "POST",
                    data:{
                        id: id
                    },
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